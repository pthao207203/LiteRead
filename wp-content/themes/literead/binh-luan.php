<?php
global $wpdb;
// Lấy slug của câu chuyện
$story_slug = get_query_var('truyen_parent') ? get_query_var('truyen_parent') : get_query_var('name');
$stories = $wpdb->prefix . 'stories';
$story = $wpdb->get_row($wpdb->prepare("SELECT * FROM $stories WHERE slug = %s", $story_slug));
$users_literead = $wpdb->prefix . 'users_literead';
$comments_table = $wpdb->prefix . 'comments_literead';
$per_page_comments = 10; // Số chương hiển thị mỗi trang
$current_page_comments = isset($_GET['page_comments']) ? max(1, intval($_GET['page'])) : 1; // Lấy trang hiện tại từ URL
$offset_comments = ($current_page_comments - 1) * $per_page_comments;
// Kiểm tra nếu $story là null
if (is_null($story)) {
  echo "Câu chuyện không tồn tại!";
  exit();  // Dừng script nếu không tìm thấy câu chuyện
}
if ($story && isset($story->id)) {
  $total_comments = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $comments_table WHERE story_id = %d", $story->id));
} else {
  $total_comments = 0;  // Không có dữ liệu thì gán số lượng comment là 0
}
$total_pages_comments = ceil($total_comments / $per_page_comments);
$comments = $wpdb->get_results(
  $wpdb->prepare("SELECT * FROM $comments_table WHERE story_id = %d ORDER BY created_at DESC LIMIT %d OFFSET %d", $story->id, $per_page_comments, $offset_comments)
);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_comment'])) {
  if (!isset($_COOKIE['signup_token'])) {
    wp_redirect(home_url('/dang-nhap'));
    exit();  // Dừng script để không thực thi thêm mã phía dưới
  }

  $user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $users_literead WHERE token = %s", $_COOKIE['signup_token']));
  $synopsis = $_POST['content'];
  $story_id = $story->id;
  $user_id = $user_info->id;

  if (empty(trim($synopsis))) {
    $content_error = 'Vui lòng nhập nội dung!';
  } else {
    $content_error = '';
    // Chèn dữ liệu vào bảng comments
    $wpdb->insert(
      $comments_table,
      array(
        'story_id' => $story_id,
        'user_id' => $user_id,
        'content' => $synopsis,
      )
    );
    // Lấy ID tác giả (sender_id) của câu chuyện
    $author_id = $story->editor;
    $current_user_name = !empty($user_info->full_name) ? $user_info->full_name : $user_info->email;
    // Tạo thông báo gửi cho tác giả
    $message = $current_user_name . ' vừa comment vào truyện mới của bạn!!';
    $wpdb->insert(
      $wpdb->prefix . 'notifications',
      array(
        'recipient_id' => $author_id,  // Tác giả nhận thông báo
        'sender_id' => $user_id,  // Người gửi (người dùng đang comment)
        'story_id' => $story_id,
        'message' => $message,
        'created_at' => current_time('mysql')
      ),
      array('%d', '%d', '%d', '%s', '%s')
    );
    echo "<script>window.location.href = window.location.href + '?success=true';</script>";
    exit();
  }
}
?>

<h2 id="comment"
  class="gap-2.5 self-start p-2.5 text-[18px] md:text-[1.875rem] font-medium text-red-normal bg-orange-light-hover rounded-xl">
  Bình luận
</h2>

<div class="flex flex-col mt-6 w-full text-red-darker max-md:max-w-full">
  <!-- Comment Input -->
  <form method="POST">
    <textarea id="commentBox" name="content"
      class=" p-2.5 w-full bg-orange-light text-red-dark placeholder-red-dark text-[16px] md:text-[1.75rem] resize-none overflow-y-auto block min-h-[3.75rem]"
      placeholder="Bình luận tại đây..." aria-label="Write your comment"><?php if (isset($synopsis))
        echo $synopsis; ?></textarea>
    <?php if (isset($content_error) && $content_error !== '') {
      echo "<p style='color: red;'>" . esc_html($content_error) . "</p>";
    } ?>
    <div class="justify-self-end">
      <button type="submit" id="commentSubmit" name="save_comment"
        class="gap-2.5 p-2.5 mt-6 text-[18px] md:text-[1.875rem] font-medium bg-red-normal text-orange-light-hover rounded-xl">
        Đăng bình luận
      </button>
    </div>
  </form>
  <!-- Comment List -->
  <div role="feed" aria-label="Comments list">
    <?php
    if (isset($comments)) {
      $first = true;
      foreach ($comments as $comment) {
        $user = $wpdb->get_row(
          $wpdb->prepare("SELECT * FROM $users_literead WHERE id = %s", $comment->user_id)
        );
        if ($first) {
          ?>
          <article class="flex flex-wrap gap-6 items-start py-4 md:py-8 w-full max-md:max-w-full">
            <img
              class="flex shrink-0 gap-2.5 bg-orange-light object-cover aspect-[1/1] h-[50px] w-[50px] max-md:h-[30px] rounded-[99px] max-md:w-[30px]"
              src="<?php if ($user->avatar_image_url)
                echo $user->avatar_image_url;
              else
                echo ''; ?>">
            <div class="flex-1 shrink basis-0  max-md:max-w-full">
              <header class="flex flex-wrap md:gap-10 gap-1 justify-between items-center w-full max-md:max-w-full">
                <h3 class="self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium w-[126px]">
                  <?php echo $user->full_name ?>
                </h3>
                <time
                  class="self-stretch my-auto text-[14px] md:text-[1.5rem] text-right"><?php echo time_ago($comment->created_at); ?></time>
              </header>
              <p
                class="md:p-9 p-4 w-full text-[16px] md:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
                <?php echo $comment->content; ?>
              </p>
            </div>
          </article>
          <?php
          $first = false;
        } else {
          ?>
          <article
            class="flex flex-wrap gap-6 items-start py-4 md:py-8 w-full border-solid border-t-[0.5px] border-t-[#593B37]/50 max-md:max-w-full">
            <img
              class="flex shrink-0 gap-2.5 bg-orange-light object-cover aspect-[1/1] h-[50px] w-[50px] max-md:h-[30px] rounded-[99px] max-md:w-[30px]"
              src="<?php if ($user->avatar_image_url)
                echo $user->avatar_image_url;
              else
                echo ''; ?>">
            <div class="flex-1 shrink basis-0  max-md:max-w-full">
              <header class="flex flex-wrap md:gap-10 gap-1 justify-between items-center w-full max-md:max-w-full">
                <h3 class="self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium w-[126px]">
                  <?php echo $user->full_name ?>
                </h3>
                <time
                  class="self-stretch my-auto text-[14px] md:text-[1.5rem] text-right"><?php echo time_ago($comment->created_at); ?></time>
              </header>
              <p
                class="md:p-9 p-4 w-full text-[16px] md:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
                <?php echo $comment->content; ?>
              </p>
            </div>
          </article>
          <?php
        }
      }
    }
    ?>
  </div>

  <!-- Pagination -->
  <nav
    class="flex gap-1 justify-center items-center self-center font-medium text-center text-red-normal whitespace-nowrap mt-4"
    aria-label="Pagination">
    <?php if ($current_page_comments > 1): ?>
      <a href="?page=<?php echo ($current_page_comments - 1); ?>"
        class="px-2 py-1 bg-[#FFF2F0] rounded-lg text-[16px] md:text-[1.75rem] hover:no-underline hover:text-red-normal-hover">←</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $total_pages_comments; $i++): ?>
      <a href="?page=<?php echo $i; ?>"
        class="px-0.5 py-1 <?php echo $i == $current_page_comments ? 'bg-[#D56665] text-orange-light hover:no-underline hover:text-orange-light' : 'bg-[#FFF2F0]'; ?> rounded-lg text-[16px] md:text-[1.75rem] self-stretch my-auto aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">
        <?php echo $i; ?>
      </a>
    <?php endfor; ?>
    <?php if ($current_page_comments < $total_pages_comments): ?>
      <a href="?page=<?php echo ($current_page_comments + 1); ?>"
        class="px-2 py-1 bg-[#FFF2F0] rounded-lg text-[16px] md:text-[1.75rem] hover:no-underline hover:text-red-normal-hover">→</a>
    <?php endif; ?>
  </nav>
</div>