<?php
/* Template Name: Home */
get_header();

global $wpdb;
$stories = $wpdb->prefix . 'stories';
$top_stories_view = $wpdb->get_results("SELECT * FROM $stories WHERE active = 0 ORDER BY view DESC LIMIT 5");


$per_page = 10; // Số chương hiển thị mỗi trang
$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // Lấy trang hiện tại từ URL
$offset = ($current_page - 1) * $per_page;

$total_stories = $wpdb->get_var("SELECT COUNT(*) FROM $stories");
$total_pages = ceil($total_stories / $per_page);

$stories_new = $wpdb->get_results(
  $wpdb->prepare("SELECT * FROM $stories WHERE active = 0 ORDER BY edited_at DESC LIMIT %d OFFSET %d", $per_page, $offset)
);

$type = $wpdb->prefix . 'type';
if ($wpdb->get_var("SHOW TABLES LIKE '$type'") != $type) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $type (
    id MEDIUMINT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
    type_name TEXT NOT NULL,
    slug TEXT NOT NULL,
    decription TEXT DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (id)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);

  $sql = "INSERT INTO $type (`type_name`, `slug`) VALUES 
  ('ABO', 'abo'),
  ('Mạt thế', 'mat-the'),
  ('Ngược', 'nguoc'),
  ('Ngọt sủng', 'ngot-sung'),
  ('Ngôn tình', 'ngon-tinh'),
  ('Đam mỹ', 'dam-my'),
  ('Bách hợp', 'bach-hop'),
  ('HE', 'he'),
  ('SE', 'se'),
  ('OE', 'oe'),
  ('Cổ đại', 'co-dai'),
  ('Dân quốc', 'dan-quoc'),
  ('Hiện đại', 'hien-dai'),
  ('Xuyên không', 'xuyen-khong'),
  ('Trọng sinh', 'trong-sinh'),
  ('Hệ thống', 'he-thong'),
  ('Nữ cường', 'nu-cuong'),
  ('Tổng tài', 'tong-tai'),
  ('Thế thân', 'the-than'),
  ('Tu tiên', 'tu-tien'),
  ('Nam chủ', 'nam-chu'),
  ('Nữ chủ', 'nu-chu'),
  ('Linh dị', 'linh-di'),
  ('Xuyên sách', 'xuyen-sach')";
  $wpdb->query($sql);
}

$stories_view = $wpdb->prefix . 'stories_view_day';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_view'") != $stories_view) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_view (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    day DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, day)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$stories_like = $wpdb->prefix . 'stories_like_day';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_like'") != $stories_like) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_like (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    day DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, day)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$stories_view = $wpdb->prefix . 'stories_view_month';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_view'") != $stories_view) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_view (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    month DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, month)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$stories_like = $wpdb->prefix . 'stories_like_month';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_like'") != $stories_like) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_like (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    month DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, month)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;

$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
echo '<script>console.log(' . $screen_width . ')</script>';


?>

<main class="relative flex flex-col mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigation -->
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
      <div id="mainContent"
        class="flex flex-col <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">


        <div id="storyCarousel"
          class="overflow-hidden relative min-w-full min-h-[246px] mb-[-20px] md:flex-row  lg:min-h-[400px]">
          <div class="carousel-wrapper flex transition-transform duration-700 ease-in-out"
            style="transform: translateX(0%)">
            <?php foreach ($top_stories_view as $story): ?>

              <section class="flex flex-col relative min-w-full">
                <img loading="lazy" src="<?php echo esc_url($story->cover_image_url); ?>"
                  alt="<?php echo esc_html($story->story_name); ?>"
                  class="object-cover absolute inset-0 w-full h-[calc(100%+20px)] z-0 filter blur-[8px]" />
                <div
                  style="position: absolute; inset: 0; z-index: 10; background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0));">
                </div>

                <article
                  class="story-item flex min-w-full relative gap-4 items-end pt-[17px] pr-[4px] pb-[6px] pl-[17px] z-20 lg:pt-[34px] lg:px-[34px] md:pb-[60px] max-md:pb-[45px]">
                  <img loading="lazy" src="<?php echo esc_url($story->cover_image_url); ?>"
                    alt="<?php echo esc_html($story->story_name); ?>"
                    class="object-cover shrink-0 rounded-lg aspect-[0.64] h-[25rem] lg:h-[30rem]" />

                  <div class="flex flex-col min-w-60 w-full">
                    <div class="flex gap-2 justify-center items-center self-start whitespace-nowrap">
                      <span
                        class="gap-2.5 self-stretch p-1 my-auto text-[16px] lg:text-[1.75rem] font-medium text-red-light bg-red-normal rounded-[2px]"><?php echo esc_html($story->status); ?></span>
                      <div
                        class="flex gap-1 items-center self-stretch my-auto text-[18px] lg:text-[1.875rem] font-semibold text-white">
                        <span><?php echo esc_html($story->rate); ?></span>
                        <span class="ms-1 text-[#FFC700]">★</span>
                      </div>
                    </div>

                    <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug)); ?>"
                      class="hover:no-underline hover:text-orange-normal text-white">
                      <h2
                        class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[18px] lg:text-[1.875rem] font-medium basis-0">
                        <?php echo esc_html($story->story_name); ?>
                      </h2>
                    </a>

                    <p class="gap-2.5 self-start mt-2 text-[14px] lg:text-[1.5rem] font-regular text-white">
                      <?php
                      $genres = $wpdb->get_col($wpdb->prepare(
                        "SELECT t.type_name 
                              FROM wp_story_type st 
                              INNER JOIN wp_type t ON st.type_id = t.id 
                              WHERE st.story_id = %d",
                        $story->id
                      ));
                      ?>
                      Thể loại:
                      <?php
                      if (!empty($genres)) {
                        echo esc_html(implode(', ', array_map('trim', $genres)));
                      } else {
                        echo '<p>Không có thể loại nào</p>';
                      }
                      ?>
                    </p>

                    <div
                      class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[12px] lg:text-[1.25rem] font-regular text-white basis-0 min-h-[5.5rem] max-h-[5.5rem]"
                      style="line-clamp: 3; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">
                      <?php echo wpautop(wp_kses_post(htmlspecialchars_decode($story->synopsis, ENT_QUOTES))); ?>
                    </div>
                  </div>
                </article>

              </section>
            <?php endforeach; ?>
          </div>
          <!-- Dots -->
          <div
            class="flex relative z-20 gap-1.5 items-center justify-center self-center mt-[12px] mb-[30px] md:absolute md:bottom-[16px] md:mb-[12px] max-md:bottom-[40px] max-md:mb-[-12px] md:left-1/2 md:-translate-x-1/2">
            <?php foreach ($top_stories_view as $index => $story): ?>
              <button class="dot flex shrink-0 self-stretch my-auto h-[8px] bg-[#8E98A8] rounded-full w-[9px]"
                data-index="<?php echo $index ?>"></button>

            <?php endforeach; ?>
          </div>


        </div>


        <section class="relative z-10 pt-[17px] lg:pt-[34px] mt-0 w-full bg-white rounded-[20px]">
          <div class="flex flex-col w-full rounded-none">
            <h2
              class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
              Truyện đề cử
            </h2>
            <?php include "de-cu.php"; ?>
          </div>

          <section
            class="flex flex-col lg:flex-row gap-[2px] lg:gap-[12px] mt-[17px] lg:mt-[34px] w-full bg-orange-light">
            <!-- Mới cập nhật (8/12) -->
            <div class="w-full lg:w-8/12 bg-white pb-[17px] lg:pb-[34px]">
              <h2
                class="gap-2.5 self-start p-[10px] lg:px-[20px] mx-[17px] lg:mx-[34px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-[12px] inline-block">
                Mới cập nhật
              </h2>

              <div class="grid grid-cols-1 md:grid-cols-2 mx-[17px] lg:mx-[34px] gap-6" role="list">
                <?php if (!empty($stories_new)): ?>
                  <?php foreach ($stories_new as $story):
                    $chapter_lastest = $wpdb->get_results(
                      $wpdb->prepare(
                        "SELECT * FROM wp_chapters WHERE story_id = %s ORDER BY chapter_number DESC LIMIT 2",
                        $story->id
                      )
                    );
                    ?>
                    <!-- 🔄 Story Card 1 -->
                    <article class="flex gap-3 mt-[12px] lg:mt-[24px] items-end w-full lg:max-w-[38rem]" role="listitem">
                      <img loading="lazy" src=<?php echo esc_url($story->cover_image_url); ?> alt=<?php echo esc_html($story->story_name); ?>
                        class="object-cover shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12.5rem]" />
                      <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                        <?php if ($story->status == "Hoàn thành")
                          echo "<span
                            class='gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]'>Hoàn thành</span>"
                            ?>
                          <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug)); ?>"
                          class="hover:no-underline hover:text-orange-dark text-orange-darker">
                          <h3
                            class="flex-1 shrink gap-2.5 self-stretch mt-[8px] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0">
                            <?php echo esc_html($story->story_name) ?>
                          </h3>
                        </a>
                        <div class="flex gap-1 items-start self-start mt-[4px] ">
                          <div class="flex items-start" aria-label="Rating: 4 out of 5">
                            <span
                              class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                          </div>
                          <span
                            class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal lg:mt-[6px]"><?php echo esc_html($story->rate) ?></span>
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
                  <p class="text-center text-gray-500">Không có truyện nào để hiển thị.</p>
                <?php endif; ?>
              </div>
              <!-- Pagination -->
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
            </div>

            <!-- 🌟 Nổi bật (4/12) -->
            <div class="w-full lg:w-4/12  bg-white px-[17px] lg:px-[34px] pt-[12px] lg:pt-[0]">
              <?php include "noi-bat.php"; ?>
            </div>
          </section>

        </section>

        <?php get_footer(); ?>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      let currentIndex = 0;
      const stories = document.querySelectorAll('.story-item');
      const totalStories = stories.length;
      const navButtons = document.querySelectorAll('.dot');
      const carouselWrapper = document.querySelector('.carousel-wrapper');

      function updateNavButtons() {
        navButtons.forEach((button, index) => {
          button.style.backgroundColor = (index === currentIndex) ? '#8E98A8' : '#E7E4E4';
        });
      }

      // Thay đổi slide
      function changeStory() {
        // Cập nhật vị trí của carousel wrapper
        const offset = -currentIndex * 100;
        carouselWrapper.style.transition = 'transform 0.7s ease-in-out'; // Thêm hiệu ứng mượt mà
        carouselWrapper.style.transform = `translateX(${offset}%)`;

        // Cập nhật nút điều hướng
        updateNavButtons();
      }

      // Cập nhật khi click vào dot
      navButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
          currentIndex = index;
          changeStory();
        });
      });

      // Thay đổi slide tự động mỗi 2.5 giây
      setInterval(() => {
        currentIndex = (currentIndex + 1) % totalStories;
        changeStory();
      }, 2500);

      // Cập nhật màu nút điều hướng khi tải trang lần đầu
      updateNavButtons();
    });
  </script>

</main>