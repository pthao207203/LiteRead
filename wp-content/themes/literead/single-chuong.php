<?php
get_header();

$chapter_slug = get_query_var('chuong'); // Lấy slug truyện từ URL
if (preg_match('/chuong-(\d+)/', $chapter_slug, $matches)) {
  $chapter_number = (int) $matches[1];
}
$chapters_table = $wpdb->prefix . 'chapters';

$story_slug = get_query_var('truyen_parent');
$stories = $wpdb->prefix . 'stories';
$story = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $stories WHERE slug = %s", $story_slug)
);

$chapter = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $chapters_table WHERE chapter_number = %s AND story_id = %d", $chapter_number, $story->id)
);

if (!$chapter) {
  echo '<p>Chương không tồn tại.</p>';
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

?>

<div class="flex flex-col pt-[17px] w-full">
  <!-- Title -->
  <h1 class="lg:text-[1.875rem] text-[18px] lg:px-[56px] px-[17px] font-semibold text-red-darker text-left ">
    <span class="font-bold uppercase">
      <?php echo esc_attr($story->story_name); ?> - CHƯƠNG <?php echo esc_attr($chapter->chapter_number); ?>
    </span>
  </h1>
  <!--Bộ điều hướng 1 (Trên) -->
  <div class="flex self-center mt-[18px] min-h-6">
    <!-- Mũi tên trái -->
    <div
      class="flex justify-center items-center bg-red-normal p-[10px] w-[50px] h-[44px] lg:w-[3.125rem] lg:h-[3.063rem] cursor-pointer rounded-l-[8px] lg:rounded-l-[0.5rem] <?php echo $disable_previous ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'; ?>">
      <a href="<?php echo esc_url($previous_chapter_url); ?>" class="" aria-label="Previous chapter">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"
          class="lg:w-[1.75rem] lg:h-[1.75rem]">
          <path d="M15.5 19.92L8.97997 13.4C8.20997 12.63 8.20997 11.37 8.97997 10.6L15.5 4.08002" stroke="#FFF7F5"
            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </a>

    </div>



    <!-- Dropdown Chương -->
    <div id="dropdownToggleTop"
      class="flex justify-center items-center lg:text-[1.5rem] text-[14px]  w-[128px] h-[44px] lg:w-[10.875rem] lg:h-[3.063rem] bg-orange-light-hover text-red-darker border-t border-b border-solid border-red-normal relative cursor-pointer">
      <span class="mr-[10px]">Chương <?php echo esc_attr($chapter->chapter_number); ?></span>
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
        class="transition-transform duration-200">
        <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498"
          stroke="#593B37" stroke-width="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
      </svg>

      <!-- Dropdown Menu -->
      <div id="dropdownMenuTop"
        class="px-[5px] py-[5px] hidden absolute mt-[5px] top-full center w-[128px] lg:w-[10.875rem] bg-orange-light-hover ">
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
              <a href="<?php echo home_url("/truyen/$story_slug/chuong-" . $chap->chapter_number); ?>">
                <li class="flex justify-center items-center py-[6px] h-[36px] cursor-pointer hover:bg-orange-normal">
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
  <div class="flex flex-col mt-[18px] w-full  ">
    <h2 class="font-medium text-center text-red-darker lg:text-[1.875rem] text-[18px] ">
      <?php if ($chapter->chapter_name)
        echo esc_attr($chapter->chapter_number);
      else
        echo 'Chương ', esc_attr($chapter->chapter_number); ?>
    </h2>

    <div
      class="lg:text-[1.75rem] text-[16px] mt-[18px] lg:px-[56px] px-[17px] leading-relaxed text-red-darker space-y-4 ">
      <?php echo wpautop(wp_kses_post(htmlspecialchars_decode($chapter->synopsis, ENT_QUOTES))); ?>
    </div>



    <div class="flex self-center mt-[18px] min-h-6">
      <!-- Mũi tên trái -->
      <div
        class="flex justify-center items-center bg-red-normal p-[10px] w-[50px] h-[44px] lg:w-[3.125rem] lg:h-[3.063rem] cursor-pointer rounded-l-[8px] lg:rounded-l-[0.5rem] <?php echo $disable_previous ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'; ?>">
        <a href="<?php echo esc_url($previous_chapter_url); ?>" class="" aria-label="Previous chapter">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"
            class="lg:w-[1.75rem] lg:h-[1.75rem]">
            <path d="M15.5 19.92L8.97997 13.4C8.20997 12.63 8.20997 11.37 8.97997 10.6L15.5 4.08002" stroke="#FFF7F5"
              stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>

      </div>



      <!-- Dropdown Chương -->
      <div id="dropdownToggleBottom"
        class="flex justify-center items-center lg:text-[1.5rem] text-[14px]  w-[128px] h-[44px] lg:w-[10.875rem] lg:h-[3.063rem] bg-orange-light-hover text-red-darker border-t border-b border-solid border-red-normal relative cursor-pointer">
        <span class="mr-[10px]">Chương <?php echo esc_attr($chapter->chapter_number); ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
          class="transition-transform duration-200">
          <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498"
            stroke="#593B37" stroke-width="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <!-- Dropdown Menu -->
        <div id="dropdownMenuBottom"
          class="px-[5px] py-[5px] hidden absolute mt-[5px] top-full center w-[128px] lg:w-[10.875rem] bg-orange-light-hover ">
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
                <a href="<?php echo home_url("/truyen/$story_slug/chuong-" . $chap->chapter_number); ?>">
                  <li class="flex justify-center items-center py-[6px] h-[36px] cursor-pointer hover:bg-orange-normal">
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
  <section class=" lg:px-[56px] px-[17px] flex flex-col mt-[1.5rem]  bg-white" aria-label="Comment Section">
    <h2 id="comment"
      class="gap-2.5 self-start p-2.5 text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-orange-light-hover rounded-xl">
      Bình luận
    </h2>

    <div class="flex flex-col mt-6 w-full text-red-darker max-md:max-w-full">
      <!-- Comment Input -->
      <textarea id="commentBox"
        class="p-2.5 w-full bg-orange-light text-red-dark placeholder-red-dark text-[16px] lg:text-[1.75rem] resize-none overflow-y-auto block min-h-[3.75rem]"
        placeholder="Bình luận tại đây..." aria-label="Write your comment"></textarea>

      <!-- Comment List -->
      <div role="feed" aria-label="Comments list">
        <!-- Comment 1 -->
        <article
          class="flex flex-wrap gap-6 items-start py-4 md:py-8 mt-3 w-full border-solid border-t-[0.5px] border-t-[#593B37]/50 border-b-[0.1px] border-b-[#593B37]/50 max-md:max-w-full">
          <div
            class="flex shrink-0 gap-2.5 bg-orange-light aspect-[1/1] h-[50px] w-[50px] max-md:h-[30px] rounded-[99px] max-md:w-[30px]"
            role="img" aria-label="Midori's avatar"></div>
          <div class="flex-1 shrink basis-0  max-md:max-w-full">
            <header class="flex flex-wrap md:gap-10 gap-1 justify-between items-center w-full max-md:max-w-full">
              <h3 class="self-stretch my-auto text-[16px] lg:text-[1.75rem] font-medium w-[126px]">
                Midori
              </h3>
              <time class="self-stretch my-auto text-[12px] lg:text-[1.5rem] text-right">9 giờ trước</time>
            </header>
            <p
              class="md:p-9 p-4 w-full text-[16px] lg:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
              Thấy cmt tưởng não tàn lắm nhưng mà ngược lại. Thấy cũng ổn mà
            </p>
          </div>
        </article>

        <!-- Comment 2 -->
        <article
          class="flex flex-wrap gap-6 items-start py-4 md:py-8 mt-2 w-full border-solid border-b-[0.5px] border-b-[#593B37]/50 max-md:max-w-full">
          <div
            class="flex shrink-0 gap-2.5 bg-orange-light aspect-[1/1] h-[50px] w-[50px] max-md:h-[30px] rounded-[99px] max-md:w-[30px]"
            role="img" aria-label="Midori's avatar"></div>
          <div class="flex-1 shrink basis-0  max-md:max-w-full">
            <header class="flex flex-wrap md:gap-10 gap-1 justify-between items-center w-full max-md:max-w-full">
              <h3 class="self-stretch my-auto text-[16px] lg:text-[1.75rem] font-medium w-[126px]">
                Midori
              </h3>
              <time class="self-stretch my-auto text-[12px] lg:text-[1.5rem] text-right">9 giờ trước</time>
            </header>
            <p
              class="p-4 md:p-9 w-full text-[16px] lg:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
              Mạnh dạn đoán tác giả đang học cấp 3 hoặc ĐH
            </p>
          </div>
        </article>

        <!-- Comment 3 -->
        <article class="flex flex-wrap gap-3 items-start py-4 md:py-8 mt-2 w-full max-md:max-w-full">
          <div
            class="flex shrink-0 gap-2.5 bg-orange-light aspect-[1/1] h-[50px] w-[50px] max-md:h-[30px] rounded-[99px] max-md:w-[30px]"
            role="img" aria-label="Midori's avatar"></div>
          <div class="flex-1 shrink basis-0  max-md:max-w-full">
            <header class="flex flex-wrap md:gap-10 gap-1 justify-between items-center w-full max-md:max-w-full">
              <h3 class="self-stretch my-auto text-[16px] lg:text-[1.75rem] font-medium w-[126px]">
                Midori
              </h3>
              <time class="self-stretch my-auto text-[12px] lg:text-[1.5rem] text-right">9 giờ trước</time>
            </header>
            <p
              class="p-9 w-full text-[16px] lg:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
              Xời nam9 xức sắc, 10 đỉm, tập sau ảnh đá bay nam phụ độc ác ra
              chuồng gà:))))
            </p>
          </div>
        </article>
      </div>

      <!-- Pagination -->
      <nav
        class="flex gap-1 justify-center items-center self-center font-medium text-center text-red-normal whitespace-nowrap mt-4 text-[18px] lg:text-[1.875rem]"
        aria-label="Pagination">
        <button aria-label="Page 1"
          class="self-stretch px-0.5 my-auto text-orange-light bg-[#D56665] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center"
          aria-current="page">1</button>
        <button aria-label="Page 2"
          class="self-stretch px-0.5 my-auto bg-[#FFF2F0] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">2</button>
        <button aria-label="Page 3"
          class="self-stretch px-0.5 my-auto bg-[#FFF2F0] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">3</button>
        <span
          class="self-stretch px-0.5 my-auto bg-[#FFF2F0] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">...</span>
        <button aria-label="Page 6"
          class="self-stretch px-0.5 my-auto bg-[#FFF2F0] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">6
        </button>
        <button aria-label="Next page"
          class="self-stretch px-0.5 my-auto bg-[#FFF2F0] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">&gt;</button>
      </nav>
    </div>
  </section>


  <?php
  $stories_hot = $wpdb->get_results("SELECT * FROM wp_stories WHERE hot='1' LIMIT 6");
  ?>
  <section class="relative z-10 pt-[17px] lg:pt-[34px] mt-0 w-full bg-white rounded-[20px]">
    <div class="flex flex-col w-full rounded-none">
      <!-- Tiêu đề -->
      <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
      <div
        class="flex overflow-x-auto lg:grid lg:grid-cols-6 gap-[17px] lg:gap-[46px] items-center p-[17px] pt-[14px] lg:p-[34px] lg:pt-[28px] bg-red-light scrollbar-thin scrollbar-thumb-red-normal scrollbar-track-red-light lg:overflow-x-hidden"
        role="list">

        <?php if (!empty($stories_hot)): ?>
          <?php foreach ($stories_hot as $story): ?>
            <article class="flex flex-col self-stretch w-[121px] shrink-0 lg:w-auto" role="listitem">
              <img loading="lazy" src=<?php echo esc_url($story->cover_image_url); ?> alt=<?php echo esc_html($story->story_name); ?> class="object-cover rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
              <?php if ($story->status == "Hoàn thành")
                echo '<span
                class="gap-2.5 self-start px-[4px] mt-[4px] lg:mt-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Hoàn thành</span>';
              ?>
              <div class="flex flex-col mt-[4px] lg:mt-[8px] w-full">
                <h3
                  class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                  <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug)); ?>"
                    class="hover:no-underline hover:text-orange-dark">
                    <?php echo esc_html($story->story_name); ?>
                  </a>
                </h3>
                <div class="flex gap-1 items-start self-start mt-[4px] ">
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[3px]">4</span>
                  <div class="flex items-start" aria-label="Rating: 4 out of 5">
                    <span
                      class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  </div>
                </div>
                <p
                  class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                  <?php echo esc_html($story->author); ?>
                </p>
              </div>
            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center text-gray-500">Không có truyện nào để hiển thị.</p>
        <?php endif; ?>

      </div>
    </div>

    <section class="flex flex-col lg:flex-row gap-6 mt-[12px] lg:mt-[24px] w-full lg:bg-orange-light">




    </section>

  </section>

</div>

<?php get_footer(); ?>