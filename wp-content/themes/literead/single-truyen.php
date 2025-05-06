<?php
get_header();

global $wpdb;
$story_slug = get_query_var('name');
$stories = $wpdb->prefix . 'stories';

$story = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $stories WHERE active = 0 AND slug = %s", $story_slug)
);
if (!$story) {
  echo '<p class = "relative mt-[4.425rem] bg-white mb-[5px]">Truyện không tồn tại hoặc đã bị tạm khoá.</p>';
  get_footer();
  exit;
}
$users = $wpdb->prefix . 'users_literead';
$user = $wpdb->get_row(
  $wpdb->prepare("SELECT user_name, full_name, slug FROM $users WHERE id = %s", $story->editor)
);

$comments_table = $wpdb->prefix . 'comments_literead';
if ($wpdb->get_var("SHOW TABLES LIKE '$comments_table'") != $comments_table) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $comments_table (
    id MEDIUMINT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id MEDIUMINT(9) UNSIGNED NOT NULL,
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (id),
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES wp_users_literead(id) ON DELETE CASCADE,
    CONSTRAINT fk_story_id FOREIGN KEY (story_id) REFERENCES wp_stories(id) ON DELETE CASCADE
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

if ($story) {

  $per_page = 10;
  $current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
  $offset = ($current_page - 1) * $per_page;

  $chapter_name = $wpdb->prefix . 'chapters';
  $total_chapters = $wpdb->get_var("SELECT COUNT(*) FROM $chapter_name WHERE story_id = $story->id");
  $total_pages = ceil($total_chapters / $per_page);
  $chapters = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM $chapter_name WHERE story_id = %s ORDER BY chapter_number ASC LIMIT %d OFFSET %d", $story->id, $per_page, $offset)
  );

  $genres = $wpdb->get_col($wpdb->prepare(
    "SELECT t.type_name 
     FROM wp_story_type st 
     INNER JOIN wp_type t ON st.type_id = t.id 
     WHERE st.story_id = %d",
    $story->id
  ));

  $per_page_comments = 10;
  $current_page_comments = isset($_GET['page_comments']) ? max(1, intval($_GET['page'])) : 1;
  $offset_comments = ($current_page_comments - 1) * $per_page_comments;
  $total_comments = $wpdb->get_var("SELECT COUNT(*) FROM $comments_table WHERE story_id = $story->id");
  $total_pages_comments = ceil($total_comments / $per_page_comments);
  $comments = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM $comments_table WHERE story_id = %s ORDER BY created_at DESC LIMIT %d OFFSET %d", $story->id, $per_page_comments, $offset_comments)
  );

  $first_chapter = $wpdb->get_var($wpdb->prepare(
    "SELECT MIN(chapter_number) FROM $chapter_name WHERE story_id = %d",
    $story->id
  ));
  $last_chapter = $wpdb->get_var($wpdb->prepare(
    "SELECT MAX(chapter_number) FROM $chapter_name WHERE story_id = %d",
    $story->id
  ));
  $previous_chapter_url = $first_chapter ? site_url("/truyen/$story_slug/chuong-$first_chapter") : '#';
  $last_chapter_url = $last_chapter ? site_url("/truyen/$story_slug/chuong-$last_chapter") : '#';

  $users_literead = $wpdb->prefix . "users_literead";
  $chapter_name = $wpdb->prefix . 'chapters';
  $total_chapter = $wpdb->get_var(
    $wpdb->prepare(
      "SELECT COUNT(*) FROM $chapter_name WHERE story_id = %d",
      $story->id
    )
  );

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_story'])) {
    if (!isset($_COOKIE['signup_token'])) {
      echo "<p>Vui lòng đăng nhập để lưu truyện!</p>";
      exit;
    }
    $user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $users_literead WHERE token = %s", $_COOKIE['signup_token']));
    if (isset($user_info)) {
      $user_id = $user_info->id;
    }
    $story_id = $_POST['story_id'];

    $favorites_table = $wpdb->prefix . 'users_likes';
    $existing_favorite = $wpdb->get_var($wpdb->prepare(
      "SELECT COUNT(*) FROM $favorites_table WHERE user_id = %d AND story_id = %d",
      $user_id,
      $story_id
    ));
    if ($existing_favorite == 0) {
      $wpdb->insert(
        $favorites_table,
        array(
          'user_id' => $user_id,
          'story_id' => $story_id,
          'created_at' => current_time('mysql'),
        ),
        array('%d', '%d', '%s')
      );

      // GỬI THÔNG BÁO CHO TÁC GIẢ
      $author_id = $story->editor;
      $current_user_name = !empty($user_info->full_name) ? $user_info->full_name : $user_info->email;
      $message = $current_user_name . ' đã thích truyện của bạn!';
      $wpdb->insert(
        $wpdb->prefix . 'notifications',
        array(
          'recipient_id' => $author_id,
          'sender_id' => $user_id,
          'story_id' => $story_id,
          'message' => $message,
          'created_at' => current_time('mysql')
        ),
        array('%d', '%d', '%d', '%s', '%s')
      );

      echo "<script>alert('Truyện đã được lưu vào danh sách yêu thích!');</script>";
    } else {
      echo "<script>alert('Truyện đã bị xóa khỏi danh sách yêu thích!');</script>";
    }
  }

  $isHome = is_front_page();
  $isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false;
  $screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
  $isMobile = $screen_width < 768;
  echo '<script> console.log(' . $screen_width . ')</script>';
  ?>
  <main class="flex flex-col relative mt-[4.425rem] ">
    <div class="w-full max-md:max-w-full ">
      <div class="flex max-md:flex-col bg-white">
        <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
          <?php get_sidebar(); ?>
        <?php endif; ?>
        <div id="mainContent"
          class="md:w-10/12 flex-grow transition-all max-md:ml-0 max-md:w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
          <!-- Overview -->
          <section class="book-details max-md:p-[1rem] px-[3.5rem] py-[2.75rem] " aria-labelledby="book-title">
            <div class="flex flex-col justify-start items-start max-sm:items-center mx-auto w-full max-md:max-w-full">
              <div
                class="flex flex-col sm:flex-row sm:gap-[1rem] md:gap-[1.5rem] items-center justify-start sm:items-end text-center w-full">
                <img loading="lazy" src=<?php echo esc_url($story->cover_image_url); ?> alt=<?php echo esc_html($story->story_name); ?>
                  class="object-cover lg:w-1/4 sm:w-1/3 w-full shrink-0  rounded-lg aspect-[0.64]" />
                <div class="flex flex-col items-start  mt-3 lg:w-3/4 sm:w-2/3 w-full  gap-2.5 justify-end">
                  <h1 id="book-title"
                    class="flex shrink gap-2.5 self-end w-full md:text-[2rem] text-[20px] font-bold max-md:leading-9 text-red-normal uppercase">
                    <?php echo esc_html($story->story_name); ?>
                  </h1>
                  <div class="flex gap-1 justify-center items-center" aria-label="Book rating">
                    <span
                      class="self-stretch my-auto text-[18px] md:text-[1.875rem] text-red-normal"><?php echo esc_html($story->rate); ?></span>
                    <div class="flex items-end self-center my-auto text-[20px] md:text-[2rem]" role="img">
                      <span class="flex text-yellow-400" aria-hidden="true">★</span>
                    </div>
                  </div>
                  <dl class="w-full text-[16px] md:text-[1.75rem]">
                    <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem]">
                      <dt class="font-semibold text-left text-[#593B37]">Tác giả:</dt>
                      <dd class="font-normal text-left text-[#593B37]"><?php echo esc_html($story->author); ?></dd>
                    </div>
                    <?php if (isset($user)) { ?>
                      <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                        <dt class="font-semibold text-left text-[#593B37]">Nhóm dịch:</dt>
                        <dd class="font-normal text-[#593B37]">
                          <a href=<?php echo home_url("/trang-ca-nhan/" . $user->slug); ?>
                            class="font-medium hover:no-underline hover:text-orange-dark">
                            <?php echo esc_html(isset($user->full_name) && $user->full_name != '' ? $user->full_name : $user->user_name); ?>
                          </a>
                        </dd>
                      </div>
                    <?php } ?>
                    <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                      <dt class="font-semibold text-left text-[#593B37]">Số chương:</dt>
                      <dd class="font-normal text-left text-[#593B37]"><?php echo esc_html($total_chapter) ?> chương</dd>
                    </div>
                    <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                      <dt class="font-semibold text-left text-[#593B37]">Lượt đọc:</dt>
                      <dd class="font-normal text-left text-[#593B37]"><?php echo esc_html($story->view); ?></dd>
                    </div>
                    <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                      <dt class="font-semibold text-left text-[#593B37]">Lượt thích:</dt>
                      <dd class="font-normal text-left text-[#593B37]"><?php echo esc_html($story->likes); ?></dd>
                    </div>
                  </dl>
                  <div class="flex flex-wrap gap-2.5 items-center self-stretch mt-2.5 w-full"
                    aria-label="Book categories">
                    <?php
                    if (!empty($genres)) {
                      foreach ($genres as $genre) {
                        echo '<span class="px-2.5 py-1 text-[14px] md:text-[1.5rem] font-normal text-[#593B37] bg-orange-light-active rounded-lg">'
                          . esc_html(trim($genre)) .
                          '</span> ';
                      }
                    } else {
                      echo '<p>Không có thể loại nào</p>';
                    }
                    ?>
                  </div>
                  <div
                    class="flex flex-wrap gap-4 items-center justify-start mt-2.5 text-[18px] md:text-[1.875rem] font-normal text-orange-light max-md:max-w-full">
                    <a href="<?php echo esc_url($previous_chapter_url); ?>" aria-label="Previous chapter"
                      class=" self-center px-[1rem] py-[0.5rem] md:px-[1.25rem] md:py-[0.625rem] bg-red-normal rounded-xl hover:no-underline hover:text-red-light-hover">
                      Chương đầu
                    </a>
                    <a href="<?php echo esc_url($last_chapter_url); ?>" aria-label="Last chapter"
                      class="self-center px-[1rem] py-[0.5rem] md:px-[1.25rem] md:py-[0.625rem] bg-red-normal rounded-xl hover:no-underline hover:text-red-light-hover">
                      Chương cuối
                    </a>
                    <form method="POST" id="save-story-form" action="" class="mb-0">
                      <input type="hidden" name="story_id" value="<?php echo esc_attr($story->id); ?>" />
                      <button type="button" name="save_story" id="toggle-btn"
                        data-story-id="<?php echo esc_attr($story->id); ?>">
                        <img id="toggle-img" src="https://i.pinimg.com/736x/51/77/79/5177792642d80bea99b5ab7415e3b66f.jpg"
                          class="w-[3.5625rem] max-sm:w-[2.625rem] max-sm:h-[2.625rem] h-[3.5625rem] object-fill shrink "
                          alt="Toggle Button" />
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <div class="h-[0.5rem] bg-[#FFE5E1] " role="separator">
          </div>

          <div class="flex lg:flex-row flex-col w-full max-md:max-w-full">
            <div class="flex flex-col max-md:p-4 px-14 py-14 gap-10 max-md:gap-4 lg:w-8/12 box-border w-full">
              <!-- Intro -->
              <section class="flex flex-col bg-white justify-center items-center  mx-auto w-full "
                aria-labelledby="introduction-title">
                <h2 id="introduction-title"
                  class="gap-2.5 self-start p-2.5 text-[18px] md:text-[1.875rem] font-medium text-red-normal bg-orange-light-hover rounded-xl">
                  Giới thiệu
                </h2>
                <div
                  class="flex overflow-x-auto flex-1 mt-3 text-[16px] md:text-[1.75rem] whitespace-nowrap bg-white size-full text-[#593B37]"
                  role="region" aria-label="Scrollable content">
                </div>
                <div
                  class="flex-1 shrink basis-0 text-ellipsis text-[16px] md:text-[1.75rem] font-normal text-[#593B37] [&>p]:mb-4">
                  <?php echo wpautop(wp_kses_post(htmlspecialchars_decode($story->synopsis, ENT_QUOTES))); ?>
                </div>
              </section>

              <!-- Chapter list -->
              <section class="flex flex-col bg-white justify-center items-center  mx-auto w-full "
                aria-labelledby="chapter-list-title">
                <h2 id="chapter-list-title"
                  class="gap-2.5 self-start p-2.5 text-[18px] md:text-[1.875rem] font-medium text-red-normal bg-orange-light-hover rounded-xl">
                  Chương truyện
                </h2>
                <nav class="flex overflow-x-auto flex-col justify-center mt-3 w-full bg-white text-orange-darker"
                  aria-label="Chapter navigation">
                  <ul class="list-none p-0 mx-2">
                    <?php
                    $first = true;
                    foreach ($chapters as $chapter) {
                      if ($first) {
                        ?>
                        <li class="flex gap-2.5 justify-center items-center py-1.5 w-full">
                          <a href="<?php echo home_url("/truyen/$story_slug/chuong-" . $chapter->chapter_number); ?>"
                            class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0 hover:no-underline hover:text-orange-dark">Chương
                            <?php echo $chapter->chapter_number; ?></a>
                          <span
                            class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal"><?php echo time_ago($chapter->edited_at); ?></span>
                        </li>
                        <?php
                        $first = false;
                      } else {
                        ?>
                        <li
                          class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-t-[0.1px] border-t-[#593B37]/50">
                          <a href="<?php echo home_url("/truyen/$story_slug/chuong-" . $chapter->chapter_number); ?>"
                            class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0 hover:no-underline hover:text-orange-dark">Chương
                            <?php echo $chapter->chapter_number; ?></a></a>
                          <span
                            class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal"><?php echo time_ago($chapter->created_at); ?></span>
                        </li>
                        <?php
                      }
                    } ?>
                  </ul>
                  <nav
                    class="flex gap-1 justify-center items-center self-center font-medium text-center text-red-normal whitespace-nowrap mt-4"
                    aria-label="Pagination">
                    <?php if ($current_page > 1): ?>
                      <a href="?page=<?php echo ($current_page - 1); ?>"
                        class="px-2 py-1 bg-[#FFF2F0] rounded-lg text-[16px] md:text-[1.75rem] hover:no-underline hover:text-red-normal-hover">←</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                      <a href="?page=<?php echo $i; ?>"
                        class="px-0.5 py-1 <?php echo $i == $current_page ? 'bg-[#D56665] text-orange-light hover:no-underline hover:text-orange-light' : 'bg-[#FFF2F0]'; ?> rounded-lg text-[16px] md:text-[1.75rem] self-stretch my-auto aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">
                        <?php echo $i; ?>
                      </a>
                    <?php endfor; ?>
                    <?php if ($current_page < $total_pages): ?>
                      <a href="?page=<?php echo ($current_page + 1); ?>"
                        class="px-2 py-1 bg-[#FFF2F0] rounded-lg text-[16px] md:text-[1.75rem] hover:no-underline hover:text-red-normal-hover">→</a>
                    <?php endif; ?>
                  </nav>
                </nav>
              </section>

              <section class="flex flex-col  bg-white" aria-label="Comment Section">
                <?php
                include "binh-luan.php";
                ?>
              </section>
              <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-9357894106826270"
                data-ad-slot="4222935559" data-auto-format="rspv" data-full-width="">
                <div overflow=""></div>
              </amp-ad>
            </div>

            <!-- 🌟 Nổi bật (4/12) -->
            <aside class="w-full lg:w-4/12 box-border bg-white p-4 md:p-8 max-md:mt-4 flex flex-col items-center  mx-auto"
              aria-labelledby="hot-list">
              <?php include "noi-bat.php"; ?>
            </aside>
          </div>
          <?php
          $stories_hot = $wpdb->get_results("SELECT * FROM wp_stories WHERE hot='1' LIMIT 6");
          ?>
          <!-- Recommended stories -->
          <section class="relative z-10 mt-0 w-full rounded-[20px]">
            <div class="flex flex-col w-full rounded-none ">
              <!-- Tiêu đề -->
              <!-- <h2
            class="gap-2.5 self-start p-[10px] md:px-[20px] ml-[17px] md:ml-[34px] mb-[-3px] text-[18px]  md:text-[2.25rem] font-semibold text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
            Truyện đề cử
          </h2> -->

              <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
              <?php include "de-cu.php"; ?>
            </div>
          </section>

          <?php get_footer(); ?>
        </div>
      </div>
    </div>
  </main>


<?php } else { ?>
  <p>Truyện không tồn tại hoặc đã bị xóa.</p>
<?php }
; ?>

<script>
  const img_saved = "https://i.pinimg.com/736x/51/77/79/5177792642d80bea99b5ab7415e3b66f.jpg"; // saved
  const img_not_saved = "https://i.pinimg.com/736x/f5/f5/e3/f5f5e362c8bb9452e83630a6445653b1.jpg"; // not saved
  document.getElementById("toggle-btn").addEventListener("click", function (event) {
    event.preventDefault();

    const btn = event.currentTarget;
    const img = document.getElementById("toggle-img");
    const storyId = btn.dataset.storyId; // Lấy story_id động từ data attribute
    // Toggle UI ngay lập tức (mượt mà hơn)
    const isCurrentlySaved = img.src === img_saved;
    img.src = isCurrentlySaved ? img_not_saved : img_saved;
    const formData = new FormData();
    formData.append('action', 'save_story');
    formData.append('story_id', storyId);
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert(data.data.message);
          // Reload trang sau khi server xử lý xong
          window.location.reload();
        } else {
          alert(data.data.message);
          // Nếu server báo lỗi, revert lại icon
          img.src = isCurrentlySaved ? img_saved : img_not_saved;
        }
      })
      .catch(error => {
        console.error('Error:', error);
        img.src = isCurrentlySaved ? img_saved : img_not_saved;
      });
  });


  // Khi trang được tải lại, kiểm tra trạng thái đã lưu hay chưa và cập nhật nút
  document.addEventListener("DOMContentLoaded", function () {
    const img = document.getElementById("toggle-img");
    const storyId = document.getElementById("toggle-btn").dataset.storyId;

    // Gửi request kiểm tra trạng thái
    const formData = new FormData();
    formData.append('action', 'check_story_status');
    formData.append('story_id', storyId);

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Cập nhật lại trạng thái hình ảnh
          if (data.data.status === 'saved') {
            img.src = img_saved;
          } else {
            img.src = img_not_saved;
          }
        } else {
          console.log('Không thể kiểm tra trạng thái.');
        }
      });
  });
</script>