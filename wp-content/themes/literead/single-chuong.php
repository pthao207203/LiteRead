<?php
get_header();
global $wpdb;

$chapter_slug = get_query_var('chuong'); // Lấy slug truyện từ URL
if (preg_match('/chuong-(\d+)/', $chapter_slug, $matches)) {
  $chapter_number = (int) $matches[1];
}
$chapters_table = $wpdb->prefix . 'chapters';

$story_slug = get_query_var('truyen_parent');
$stories = $wpdb->prefix . 'stories';
$story = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $stories WHERE active = 0 AND slug = %s", $story_slug)
);
$user_id = $story->editor;
if (!$story) {
  echo '<p class = "relative mt-[4.425rem]">Truyện không tồn tại hoặc đã bị tạm khoá.</p>';
  get_footer();
  exit;
}
$chapter = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $chapters_table WHERE chapter_number = %s AND story_id = %d", $chapter_number, $story->id)
);

if (!$chapter) {
  echo '<p class = "relative mt-[4.425rem]">Chương không tồn tại.</p>';
  get_footer();
  exit;
}

$chapters = $wpdb->get_results(
  $wpdb->prepare("SELECT chapter_number FROM $chapters_table WHERE story_id = %s ORDER BY chapter_number ASC", $story->id)
);

// Lấy chương đầu tiên
$first_chapter = $wpdb->get_var($wpdb->prepare(
  "SELECT MIN(chapter_number) FROM $chapters_table WHERE story_id = %d",
  $story->id
));

// Nếu đang ở chương đầu tiên, vô hiệu hoá nút Previous
$disable_previous = ($chapter->chapter_number == $first_chapter);

// Lấy chương cuối cùng
$next_chapter = $wpdb->get_var($wpdb->prepare(
  "SELECT MAX(chapter_number) FROM $chapters_table WHERE story_id = %d",
  $story->id
));

// Nếu đang ở chương đầu tiên, vô hiệu hoá nút Previous
$disable_next = ($chapter->chapter_number == $next_chapter);

// Xác định chương trước và chương sau
$previous_chapter_number = $chapter->chapter_number > $first_chapter ? $chapter->chapter_number - 1 : null;
$next_chapter_number = $chapter->chapter_number < $next_chapter ? $chapter->chapter_number + 1 : null;

// Tạo URL cho chương trước và chương sau
$previous_chapter_url = $previous_chapter_number ? site_url("/truyen/$story_slug/chuong-$previous_chapter_number") : '#';
$next_chapter_url = $next_chapter_number ? site_url("/truyen/$story_slug/chuong-$next_chapter_number") : '#';
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;

$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
echo '<script> console.log(' . $screen_width . ')</script>';
?>
<main class="flex flex-col relative mt-[4.425rem] bg-white">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigationx -->
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
      <div id="mainContent"
        class="md:w-10/12 flex-grow transition-all max-md:ml-0 max-md:w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div class="flex flex-col pt-[17px] w-full">
          <!-- Title -->
          <h1 class="lg:text-[1.875rem] text-[18px] lg:px-[56px] px-[17px] font-semibold text-red-darker text-left ">
            <span class="font-bold uppercase">
              <a href="<?php echo home_url("/truyen/" . $story->slug); ?>"
                class="hover:no-underline hover:text-red-normal ">
                <?php echo esc_attr($story->story_name); ?>
              </a> - CHƯƠNG <?php echo esc_attr($chapter->chapter_number); ?>
            </span>
          </h1>
          <!--Bộ điều hướng 1 (Trên) -->
          <div class="flex self-center lg:mt-[2.25rem] mt-[18px] min-h-6">
            <!-- Mũi tên trái -->
            <div
              class="flex justify-center items-center bg-red-normal p-[10px] w-[50px] h-[44px] lg:w-[3.125rem] lg:h-[3.063rem] cursor-pointer rounded-l-[8px] lg:rounded-l-[0.5rem] <?php echo $disable_previous ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'; ?>">
              <a href="<?php echo esc_url($previous_chapter_url); ?>" class="" aria-label="Previous chapter">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"
                  class="lg:w-[1.75rem] lg:h-[1.75rem]">
                  <path d="M15.5 19.92L8.97997 13.4C8.20997 12.63 8.20997 11.37 8.97997 10.6L15.5 4.08002"
                    stroke="#FFF7F5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </a>

            </div>



            <!-- Dropdown Chương -->
            <div id="dropdownToggleTop"
              class="flex justify-center items-center lg:text-[1.5rem] text-[14px]  w-[128px] h-[44px] lg:w-[10.875rem] lg:h-[3.063rem] bg-orange-light-hover text-red-darker border-t border-b border-solid border-red-normal relative cursor-pointer">
              <span class="mr-[10px]">Chương <?php echo esc_attr($chapter->chapter_number); ?></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
                class="transition-transform duration-200">
                <path
                  d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498"
                  stroke="#593B37" stroke-width="0.8" stroke-miterlimit="10" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>

              <!-- Dropdown Menu -->
              <div id="dropdownMenuTop"
                class="px-[5px] py-[5px] overflow-y-auto max-h-[252px] hidden absolute mt-[5px] top-full center w-[170px] max-lg:w-[215px] bg-orange-light-hover ">
                <ul class="text-red-darker text-[14px] text-center">
                  <?php foreach ($chapters as $chap):
                    if ($chap->chapter_number == $chapter->chapter_number) {
                      ?>
                      <li class="flex justify-center items-center py-[6px] h-[36px] cursor-pointer bg-orange-normal">
                        Chương
                        <?php echo $chap->chapter_number; ?>
                      </li>
                      <?php
                    } else {
                      ?>
                      <a href="<?php echo home_url("/truyen/$story_slug/chuong-" . $chap->chapter_number); ?>"
                        class="hover:no-underline hover:text-red-darker">
                        <li
                          class="flex justify-center items-center py-[6px] h-[36px] cursor-pointer hover:bg-orange-normal">
                          Chương
                          <?php echo $chap->chapter_number; ?>
                        </li>
                      </a>

                      <?php
                    }
                  endforeach; ?>
                </ul>
              </div>
            </div>

            <!-- Mũi tên phải -->
            <div
              class="flex justify-center items-center bg-red-normal p-[10px] w-[50px] h-[44px] lg:w-[3.125rem] lg:h-[3.063rem] cursor-pointer rounded-r-[8px] lg:rounded-r-[0.5rem] <?php echo $disable_next ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'; ?>">
              <a href="<?php echo esc_url($next_chapter_url); ?>" aria-label="Next chapter">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"
                  class="lg:w-[1.75rem] lg:h-[1.75rem]">
                  <path d="M9.41003 19.92L15.93 13.4C16.7 12.63 16.7 11.37 15.93 10.6L9.41003 4.08002" stroke="#FFF7F5"
                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>

          <!-- Chapter Content -->
          <div class="flex flex-col mt-[18px] w-full lg:mt-[2.25rem]">
            <h2 class="font-medium text-center text-red-darker lg:text-[1.875rem] text-[18px] ">
              <?php if ($chapter->chapter_name)
                echo esc_attr($chapter->chapter_name);
              else
                echo 'Chương ', esc_attr($chapter->chapter_number); ?>
            </h2>

            <div
              class="lg:text-[1.75rem] text-[16px] lg:mt-[2.25rem] mt-[18px] lg:px-[56px] px-[17px] leading-relaxed text-red-darker space-y-4 ">
              <?php echo wpautop(wp_kses_post(htmlspecialchars_decode($chapter->synopsis, ENT_QUOTES))); ?>
            </div>

            <div class="flex self-center lg:mt-[2.25rem] mt-[18px] min-h-6 mb-[17px]">
              <!-- Mũi tên trái -->
              <div
                class="flex justify-center items-center bg-red-normal p-[10px] w-[50px] h-[44px] lg:w-[3.125rem] lg:h-[3.063rem] cursor-pointer rounded-l-[8px] lg:rounded-l-[0.5rem] <?php echo $disable_previous ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'; ?>">
                <a href="<?php echo esc_url($previous_chapter_url); ?>" class="" aria-label="Previous chapter">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"
                    class="lg:w-[1.75rem] lg:h-[1.75rem]">
                    <path d="M15.5 19.92L8.97997 13.4C8.20997 12.63 8.20997 11.37 8.97997 10.6L15.5 4.08002"
                      stroke="#FFF7F5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </a>

              </div>

              <!-- Dropdown Chương -->
              <div id="dropdownToggleBottom"
                class="flex justify-center items-center lg:text-[1.5rem] text-[14px] w-[128px] h-[44px] lg:w-[10.875rem] lg:h-[3.063rem] bg-orange-light-hover text-red-darker border-t border-b border-solid border-red-normal relative cursor-pointer">
                <span class="mr-[10px]">Chương <?php echo esc_attr($chapter->chapter_number); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
                  class="transition-transform duration-200">
                  <path
                    d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498"
                    stroke="#593B37" stroke-width="0.8" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>

                <!-- Dropdown Menu -->
                <div id="dropdownMenuBottom"
                  class="px-[5px] py-[5px]  overflow-y-auto max-h-[252px]  hidden absolute mb-[5px] bottom-full center w-[170px] max-lg:w-[215px]  bg-orange-light-hover ">
                  <ul class="text-red-darker text-[14px] text-center">
                    <?php foreach ($chapters as $chap):
                      if ($chap->chapter_number == $chapter->chapter_number) {
                        ?>
                        <li class="flex justify-center items-center py-[6px] h-[36px] cursor-pointer bg-orange-normal">
                          Chương
                          <?php echo $chap->chapter_number; ?>
                        </li>
                        <?php
                      } else {
                        ?>
                        <a href="<?php echo home_url("/truyen/$story_slug/chuong-" . $chap->chapter_number); ?>"
                          class="hover:no-underline hover:text-red-darker">
                          <li
                            class="flex justify-center items-center py-[6px] h-[36px] cursor-pointer hover:bg-orange-normal">
                            Chương
                            <?php echo $chap->chapter_number; ?>
                          </li>
                        </a>

                        <?php
                      }
                    endforeach; ?>
                  </ul>
                </div>
              </div>

              <!-- Mũi tên phải -->
              <div
                class="flex justify-center items-center bg-red-normal p-[10px] w-[50px] h-[44px] lg:w-[3.125rem] lg:h-[3.063rem] cursor-pointer rounded-r-[8px] lg:rounded-r-[0.5rem] <?php echo $disable_next ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'; ?>">
                <a href="<?php echo esc_url($next_chapter_url); ?>" aria-label="Next chapter">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"
                    class="lg:w-[1.75rem] lg:h-[1.75rem]">
                    <path d="M9.41003 19.92L15.93 13.4C16.7 12.63 16.7 11.37 15.93 10.6L9.41003 4.08002"
                      stroke="#FFF7F5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          <!-- JavaScript -->
          <script>
            // Xử lý dropdown cho từng vị trí
            function setupDropdown(toggleId, menuId) {
              const dropdownToggle = document.getElementById(toggleId);
              const dropdownMenu = document.getElementById(menuId);

              dropdownToggle.addEventListener("click", (event) => {
                event.stopPropagation();
                dropdownMenu.classList.toggle("hidden");
                dropdownMenu.classList.toggle("block");
              });

              document.addEventListener("click", function (event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                  dropdownMenu.classList.add("hidden");
                  dropdownMenu.classList.remove("block");
                }
              });

              // Cập nhật tên chương khi chọn
              const chapterItems = dropdownMenu.querySelectorAll("li");
              chapterItems.forEach(item => {
                item.addEventListener("click", () => {
                  dropdownToggle.querySelector("span").textContent = item.textContent;
                  dropdownMenu.classList.add("dropdown-hidden");
                  dropdownMenu.classList.remove("dropdown-visible");
                });
              });
            }

            // Kích hoạt dropdown cho cả trên và dưới
            setupDropdown("dropdownToggleTop", "dropdownMenuTop");
            setupDropdown("dropdownToggleBottom", "dropdownMenuBottom");
          </script>
          <section class="flex flex-col px-[17px] lg:px-[56px] bg-white" aria-label="Comment Section">
            <?php
            include "binh-luan.php";
            ?>
          </section>

          <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-9357894106826270"
            data-ad-slot="4222935559" data-auto-format="rspv" data-full-width="">
            <div overflow=""></div>
          </amp-ad>

          <?php
          $stories_hot = $wpdb->get_results("SELECT * FROM wp_stories WHERE hot='1' LIMIT 6");
          ?>
          <section class="relative z-10 pt-[17px] lg:pt-[34px] mt-0 w-full bg-white rounded-[20px]">
            <div class="flex flex-col w-full rounded-none">
              <!-- Tiêu đề -->
              <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
              <?php include "de-cu.php"; ?>
            </div>
          </section>
          <script>
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>"
            document.addEventListener("DOMContentLoaded", function () {
              setTimeout(() => {
                let formData = new URLSearchParams();
                formData.append("action", "update_view"); // Đảm bảo action là update_view
                formData.append("story_id", <?php echo json_encode(intval($chapter->story_id)); ?>);
                formData.append("chapter_id", <?php echo json_encode(intval($chapter->id)); ?>);
                formData.append("user_id", <?php echo json_encode(intval($user_id)); ?>);

                fetch(ajaxurl, {
                  method: 'POST',
                  body: formData,
                  headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                })
                  .then(response => response.json())
                  //   .then(data => console.log("Update Response:", data))
                  .catch(error => console.error("Fetch Error:", error));
              }, 1000 * 2 * 60);
            });

          </script>
        </div>

        <?php get_footer(); ?>
      </div>
    </div>
  </div>
</main>