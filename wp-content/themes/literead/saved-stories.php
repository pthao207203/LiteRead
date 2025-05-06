<?php
/*template name: Saved Stories */
get_header();

// Kiểm tra nếu user chưa đăng nhập
echo "<script>console.log('" . $_COOKIE['signup_token'] . "')</script>";
if (!isset($_COOKIE['signup_token']) || empty($_COOKIE['signup_token'])) {
  echo "<script>alert('Bạn cần đăng nhập để xem trang này!'); window.location.href = '" . home_url('/dang-nhap') . "'; </script>";
  exit();
}

$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;

$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
// echo '<script> console.log(' . $screen_width . ')</script>';

global $wpdb;



// Lấy thông tin người dùng từ cookie
$users_literead = $wpdb->prefix . "users_literead";
$user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $users_literead WHERE token = %s", $_COOKIE['signup_token']));
$user_id = $user_info->id;  // Lấy user_id từ thông tin người dùng

// Truy vấn lấy các truyện đã lưu
$favorites_table = $wpdb->prefix . 'users_likes';
$stories_table = $wpdb->prefix . 'stories';

$saved_stories = $wpdb->get_results(
  $wpdb->prepare(
    "SELECT s.* FROM {$wpdb->prefix}users_likes ul
       JOIN {$wpdb->prefix}stories s ON ul.story_id = s.id
       WHERE ul.user_id = %d",
    $user_id
  )
);

?>

<main class="relative flex flex-col mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigation -->
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>

      <section id="mainContent"
        class="transition-all gap-[0.75rem] w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div class="flex flex-col justify-center p-[2.25rem] grow w-full bg-white max-md:max-w-full">
          <header>
            <h1
              class="font-bold leading-none text-red-dark text-[20px] lg:text-[2rem] uppercase text-center max-md:max-w-full">
              Truyện đã thích
            </h1>

            <nav
              class="flex flex-wrap gap-[10px] items-start mt-[12px] lg:mt-[24px] w-full font-medium text-red-normal max-md:max-w-full"
              aria-label="Story filters">
              <button
                class="gap-2.5 self-stretch p-2.5 text-orange-light bg-red-normal text-[16px] lg:text-[1.75rem] rounded-xl"
                aria-current="page">
                Mới cập nhật
              </button>
              <button class="gap-2.5 self-stretch p-2.5 bg-orange-light-hover text-[16px] lg:text-[1.75rem] rounded-xl">
                Đã full
              </button>
            </nav>
          </header>

          <div class="mt-[12px] lg:mt-[24px] w-full max-md:max-w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[12px] lg:gap-[2.25rem] w-full  ">
              <!-- Story Cards -->
              <?php if (!empty($saved_stories)): ?>
                <?php foreach ($saved_stories as $story):
                  $chapter_lastest = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * FROM wp_chapters WHERE story_id = %s ORDER BY chapter_number DESC LIMIT 2",
                      $story->id
                    )
                  );
                  ?>
                  <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
                    <img
                      src="<?= esc_url($story->cover_image_url ?: "https://cdn.builder.io/api/v1/image/assets/TEMP/dc856669e14cfc9235a8d8326089d88b4938c1f787734b0722fd369985adc15f?placeholderIfAbsent=true&apiKey=02079658ccf1406d920515bd4a481c0d") ?>"
                      alt="Story cover" class="object-cover shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12.5rem]" />
                    <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                      <?php
                      if ($story->status == "Hoàn thành") {
                        echo "<span class='gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]'>Hoàn thành</span>";
                      } else {
                        echo "<span class='gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-orange-light whitespace-nowrap bg-red-normal rounded-[2px]'>Đang cập nhật</span>";
                      }
                      ?>
                      <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug)); ?>"
                        class="hover:no-underline hover:text-orange-dark text-orange-darker">
                        <h2
                          class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                          <?php echo esc_html($story->story_name) ?>
                        </h2>
                      </a>
                      <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
                        <div class="flex items-start" aria-label="Rating: 4 out of 5">
                          <span
                            class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                        </div>
                        <span
                          class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]"><?php echo esc_html($story->rate) ?></span>
                      </div>

                      <?php
                      if (!empty($chapter_lastest)) {
                        foreach ($chapter_lastest as $chapter) {
                          ?>
                          <div class='flex justify-between items-center mt-[8px] mb-[-4px] w-full'>
                            <a href='<?php echo esc_url(home_url('/truyen/' . $story->slug . '/chuong-' . $chapter->chapter_number)); ?>'
                              class='text-red-normal hover:no-underline hover:text-red-dark'>
                              <p class='text-[14px] lg:text-[1.5rem] text-regular'>
                                Chương <?php echo $chapter->chapter_number; ?>
                              </p>
                            </a>
                            <p class='text-[12px] lg:text-[1.25rem] text-red-normal text-regular'>
                              <?php echo time_ago($chapter->created_at); ?>
                            </p>
                          </div>
                          <?php
                        }
                      }
                      ?>
                    </div>
                  </article>
                <?php endforeach; ?>
              <?php else: ?>
                <p class="text-center text-gray-500">Bạn chưa thích truyện nào.</p>
              <?php endif; ?>
            </div>
          </div>
          <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-9357894106826270"
            data-ad-slot="4222935559" data-auto-format="rspv" data-full-width="">
            <div overflow=""></div>
          </amp-ad>
        </div>

        <!-- Recommended stories -->
        <section class="flex flex-col pt-[0.75rem] w-full rounded-none bg-white">
          <!-- Tiêu đề -->
          <h2
            class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
            Truyện đề cử
          </h2>
          <div class="flex flex-col w-full rounded-none">
            <?php include "de-cu.php"; ?>
          </div>
        </section>
      </section>
    </div>
  </div>
</main>