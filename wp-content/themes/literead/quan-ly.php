<?php
/* Template Name: Manage Stories */

// Kiểm tra nếu user chưa đăng nhập
if (!isset($_COOKIE['signup_token']) || empty($_COOKIE['signup_token'])) {
  echo "<script>alert('Bạn cần đăng nhập để xem trang này!'); window.location.href='" . home_url('/dang-nhap') . "';</script>";
  exit();
}

session_start();
get_header();

$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;



$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
echo '<script>console.log(' . $screen_width . ')</script>';

global $wpdb;
// Kiểm tra đăng nhập
if (!isset($_COOKIE['signup_token'])) {
  echo "<p class='text-center text-red-500 font-bold text-lg relative mt-[4.425rem]'>Bạn cần đăng nhập để quản lý truyện.</p>";
  get_footer();
  exit;
}

// Lấy thông tin user từ bảng `users_literead`
  $users_literead = $wpdb->prefix . "users_literead";
  $user = $wpdb->get_row($wpdb->prepare(
  "SELECT * FROM $users_literead WHERE token = %s",
  $_COOKIE['signup_token']
  ));

  if (!$user) {
    echo "<p class='text-center text-red-500 font-bold text-lg relative mt-[4.425rem]'>Tài khoản không tồn tại.</p>";
    get_footer();
    exit;
  }


  // Kiểm tra nếu user chưa có quyền đăng truyện
  if (isset($user) && $user->type === 1) {
    echo "<script>alert('Bạn cần có quyền đăng truyện!'); window.location.href='" . home_url('/') . "';</script>";
    exit();
  }

  $stories_table = $wpdb->prefix . "stories";
  $chapters_table = $wpdb->prefix . "chapters";
  $comments_table = $wpdb->prefix . "comments_literead";
  // Lấy tên nhà dịch truyện
  $editor_name= !empty($user->full_name) ? esc_html($user->full_name) : "Chưa cập nhật";
  // Lấy tổng số truyện
  $total_stories = $wpdb->get_var("SELECT COUNT(*) FROM $stories_table WHERE editor = $user->id");
  $total_stories_full = $wpdb->get_var("SELECT COUNT(*) FROM $stories_table WHERE status = 'Hoàn thành' AND editor = $user->id");
 // Truy vấn tính tổng lượt thích của tất cả các truyện của tác giả
  $total_likes = $wpdb->get_var($wpdb->prepare(
    "SELECT SUM(likes) 
     FROM $stories_table 
     WHERE editor = %d", // Điều kiện lọc truyện theo editor
    $user->id
  ));
   // Truy vấn tính tổng lượt view của tất cả các truyện của tác giả
   $total_view = $wpdb->get_var($wpdb->prepare(
    "SELECT SUM(view) 
     FROM $stories_table 
     WHERE editor = %d", // Điều kiện lọc truyện theo editor
    $user->id
  ));

  // Truy vấn lấy tất cả truyện của tác giả
  $total = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM $stories_table WHERE editor = %d ORDER BY created_at DESC", $user->id)
  );  
  if (!isset($total)) {
    $total = 0;
  }
?>


<main class="relative flex flex-col mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col h-full">
      <!-- Sidebar Navigationx -->
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
      <?php get_sidebar(); ?>
      <?php endif; ?>
      <section id="mainContent"
        class="flex-grow transition-all w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div class="grow w-full bg-white  max-md:max-w-full ">
          <!-- editor Profile Section -->
          <section class="flex flex-col justify-center p-[2.25rem] w-full max-md:px-5 max-md:max-w-full">
            <h2
              class="self-center text-[1.25rem] md:text-[2rem] font-bold leading-none text-center text-red-dark uppercase max-md:max-w-full">
              <?php echo esc_html($editor_name); ?>
            </h2>

            <!-- editor Stats -->
            <div class="mt-12 w-full max-md:mt-10 max-md:max-w-full">
              <div class="flex flex-wrap gap-3 justify-end items-center w-full font-medium max-md:max-w-full">
                <a href="<?php echo home_url("/quan-ly-truyen/them-truyen-moi"); ?>">
                  <button
                    class="gap-[0.625rem] self-stretch p-[0.625rem] my-auto text-[1rem] md:text-[1.75rem] font-medium text-orange-light bg-red-normal rounded-xl ">
                    Đăng truyện mới
                  </button>
                </a>
              </div>

              <div class="flex flex-wrap gap-3 items-start mt-3 w-full text-red-dark max-md:max-w-full">
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]"><?php echo esc_html($total_stories); ?></p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">
                    Tổng số truyện
                  </h3>
                </article>
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]"><?php echo esc_html($total_stories_full); ?></p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">Đã hoàn thành</h3>
                </article>
              </div>

              <div class="flex flex-wrap gap-3 items-start mt-3 w-full text-red-dark max-md:max-w-full">
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]"><?php echo esc_html($total_likes ?? 0); ?></p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">
                    Lượt thích
                  </h3>
                </article>
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]"><?php echo esc_html($total_view ?? 0); ?></p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">Lượt đọc</h3>
                </article>
              </div>
            </div>

            <!-- Story Management Section -->
            <div class="mt-12 w-full text-[1rem] md:text-[1.75rem] max-md:mt-10 max-md:max-w-full">
              <!-- Tabs -->
              <h2
                class="flex flex-wrap gap-[1.25rem] justify-center items-start w-full font-semibold text-red-normal max-md:max-w-full">
                Danh sách truyện  
              </h2>

              <!-- Story Cards -->
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-[2.25rem] items-start mt-[1.5rem] w-full text-red-darker max-md:max-w-full">
                <?php  
                if (!empty($total)) :
                  foreach ($total as $story) :
                    $total_count = $wpdb->get_var(
                      $wpdb->prepare(
                        "SELECT SUM(count) FROM $chapters_table WHERE story_id = %d",
                        $story->id
                      )
                    );
                    $genres = $wpdb->get_col($wpdb->prepare(
                      "SELECT t.type_name 
                        FROM wp_story_type st 
                        INNER JOIN wp_type t ON st.type_id = t.id 
                        WHERE st.story_id = %d",
                      $story->id
                    ));
                    // Truy vấn số chương của từng truyện
                    $chapter_count = $wpdb->get_var($wpdb->prepare(
                      "SELECT COUNT(*) FROM $chapters_table WHERE story_id = %d",
                      $story->id
                    ));

                    // Truy vấn số bình luận của từng truyện
                    $comment_count = $wpdb->get_var($wpdb->prepare(
                      "SELECT COUNT(*) FROM $comments_table WHERE story_id = %d",
                      $story->id
                    ));
                ?>
                <!-- Story Card 1 -->
                <article
                  class="flex grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl shadow-lg max-md:max-w-full h-full self-stretch">
                  <img
                    src="<?= esc_url($story->cover_image_url ?:"https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/50cbfd8cdfc73f54a9f3f27033cf3182a841382fe95cc17c2dc9ebde4c3ada8a?placeholderIfAbsent=true") ?>"
                    class="object-cover rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                    alt=<?php echo esc_html($story->story_name); ?> />
                  <div class="flex flex-col justify-center items-start">
                    <a href="<?php echo esc_url(home_url('/quan-ly-truyen/' . $story->slug)); ?>"
                    class="hover:no-underline hover:text-orange-dark text-orange-darker">
                      <h3 class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium">
                      <?php echo esc_html($story->story_name) ?>
                      </h3>
                    </a>
                    <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chữ: <?php echo esc_html($total_count) ?></p>
                    <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                      Trạng thái:
                      <span class="font-semibold"><?php echo esc_html($story->status) ?></span>
                    </p>
                    <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                      Thể loại: <?php
                        if (!empty($genres)) {
                          echo esc_html(implode(', ', array_map('trim', $genres)));
                        } else {
                          echo '<p>Không có thể loại nào</p>';
                        }
                        ?>
                    </p>
                    <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chương: <?= $chapter_count ?></p>
                    <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Lượt đọc: <?php echo esc_html($story->view) ?></p>
                    <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Yêu thích: <?php echo esc_html($story->likes) ?></p>
                    <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Bình luận: <?php echo esc_html($comment_count) ?></p>
                  </div>
                </article>
                <?php endforeach; ?>
                <?php else: ?>
                  <p class="text-center text-gray-500">Bạn chưa đăng truyện nào.</p>
                <?php endif; ?>
              </div>
            </div>
          </section>

          <!-- Recommended stories -->
          <section class="relative z-10 mt-0 w-full bg-white rounded-[20px]">
            <div class="flex flex-col w-full rounded-none">
              <h2
                class="gap-[0.625rem] self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[1.125rem] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
                Truyện đề cử
              </h2>

              <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
              <?php include "de-cu.php"; ?>
            </div>
          </section>

        </div>
      </section>
    </div>
  </div>
</main>