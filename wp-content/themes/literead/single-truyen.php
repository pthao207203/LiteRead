<?php
get_header();
// echo 'Đây là single-truyen.php';

global $wpdb;
$story_slug = get_query_var('story_slug');
$current_url = home_url($wp->request);
// echo $current_url; // Trả về toàn bộ URL: http://localhost/literead/story/chu-tien

$segments = explode('/', trim(parse_url($current_url, PHP_URL_PATH), '/'));
if (isset($segments[2])) {
  $story_slug = $segments[2];
  // echo 'Story Slug: ' . $story_slug; // Kết quả: Story Slug: chu-tien
}
$table_name = $wpdb->prefix . 'stories';

$story = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $table_name WHERE slug = %s", $story_slug)
);

if ($story) {
  $genres = explode(',', $story->genres);
  ?>


  <main class="home w-full max-md:max-w-full">
    <!-- Overview -->
    <section class="book-details max-md:p-4 px-14 py-11 " aria-labelledby="book-title">
      <div class="flex flex-col justify-start items-start max-sm:items-center mx-auto w-full ">
        <div class="flex flex-col sm:flex-row sm:gap-4 md:gap-6">
          <img loading="lazy" src=<?php echo esc_url($story->cover_image_url); ?> alt=<?php echo esc_html($story->story_name); ?>
            class="object-cover lg:w-1/4 sm:w-1/3 w-[24.625rem] shrink-0  rounded-lg aspect-[0.64]" />
          <div class="flex flex-col items-start mt-3 lg:w-3/4 w-[24.625rem] sm:w-full gap-2.5 justify-end">
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
                <dt class="font-semibold text-[#593B37]">Tác giả:</dt>
                <a>
                  <dd class="font-normal text-[#593B37]"><?php echo esc_html($story->author); ?></dd>
                </a>
              </div>
              <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                <dt class="font-semibold text-[#593B37]">Nhóm dịch:</dt>
                <dd class="font-normal text-[#593B37]"><?php echo esc_html($story->editor); ?></dd>
              </div>
              <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                <dt class="font-semibold text-[#593B37]">Số chương:</dt>
                <dd class="font-normal text-[#593B37]">4 chương</dd>
              </div>
              <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                <dt class="font-semibold text-[#593B37]">Lượt đọc:</dt>
                <dd class="font-normal text-[#593B37]"><?php echo esc_html($story->view); ?></dd>
              </div>
              <div class="flex gap-2.5 self-stretch text-[16px] md:text-[1.75rem] mt-2.5">
                <dt class="font-semibold text-[#593B37]">Lượt thích:</dt>
                <dd class="font-normal text-[#593B37]"><?php echo esc_html($story->likes); ?></dd>
              </div>
            </dl>
            <div class="flex flex-wrap gap-2.5 items-center self-stretch mt-2.5 w-full" aria-label="Book categories">
              <?php
              foreach ($genres as $genre) {
                echo '<span class="px-2.5 py-1 text-[14px] md:text-[1.5rem] font-normal text-[#593B37] bg-orange-light-active rounded-lg">'
                  . esc_html(trim($genre)) .
                  '</span>';
              }
              ?>
            </div>
            <div
              class="flex flex-wrap gap-4 items-center justify-start mt-2.5 text-[18px] md:text-[1.875rem] font-normal text-orange-light max-md:max-w-full">
              <a href="#first-chapter"
                class=" self-stretch px-[1rem] py-[0.5rem] md:px-[1.25rem] md:py-[0.625rem] bg-red-normal rounded-xl">
                Chương đầu
              </a>
              <a href="#last-chapter"
                class="self-stretch px-[1rem] py-[0.5rem] md:px-[1.25rem] md:py-[0.625rem] bg-red-normal rounded-xl">
                Chương cuối
              </a>
              <button id="toggle-btn">
                <img id="toggle-img" src="https://storage.googleapis.com/tagjs-prod.appspot.com/3AYFbkhn66/qbs6wbpy.png"
                  class="w-[3.5625rem] max-sm:w-[2.625rem] max-sm:h-[2.625rem] h-[3.5625rem] object-fill shrink "
                  alt="Toggle Button" />
              </button>

              <script>
                document.getElementById("toggle-btn").addEventListener("click", function () {
                  const img = document.getElementById("toggle-img");
                  const img1 = "https://storage.googleapis.com/tagjs-prod.appspot.com/3AYFbkhn66/qbs6wbpy.png";
                  const img2 = "https://storage.googleapis.com/tagjs-prod.appspot.com/3AYFbkhn66/tkn6hjhe.png";

                  img.src = img.src === img1 ? img2 : img1;
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="h-[0.5rem] bg-[#FFE5E1]" role="separator">
    </div>

    <div class="flex md:flex-row flex-col w-full max-md:max-w-full">
      <div class="flex flex-col max-md:p-4 px-14 py-14 gap-10 max-md:gap-4 md:w-8/12 box-border w-full">
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
          <nav class="flex overflow-x-auto flex-col justify-center mt-3 w-full bg-white text-[#593B37]"
            aria-label="Chapter navigation">
            <ul class="list-none p-0 mx-2">
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter1"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  1</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter2"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  2</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter3"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  3</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter4"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  4</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter5"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  5</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter6"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  6</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter7"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  7</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter8"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  8</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li
                class="flex gap-2.5 justify-center items-center py-1.5 w-full border-solid border-b-[0.1px] border-b-[#593B37]/50">
                <a href="#chapter9"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  9</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
              <li class="flex gap-2.5 justify-center items-center py-1.5 w-full">
                <a href="#chapter10"
                  class="flex-1 shrink self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium basis-0">Chương
                  10</a>
                <span class="self-stretch my-auto text-[14px] md:text-[1.5rem] font-normal">10 tiếng
                  trước</span>
              </li>
            </ul>
            <nav
              class="flex gap-1 justify-center items-center self-center font-medium text-center text-red-normal whitespace-nowrap mt-4"
              aria-label="Pagination">
              <button aria-label="Page 1"
                class="self-stretch px-0.5 my-auto text-orange-light text-[18px] md:text-[1.875rem] bg-[#D56665] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center"
                aria-current="page">1</button>
              <button aria-label="Page 2"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">2</button>
              <button aria-label="Page 3"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">3</button>
              <span
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] rounded-lg text-[16px] md:text-[1.75rem] aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">...</span>
              <button aria-label="Page 6"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">6
              </button>
              <button aria-label="Next page"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">&gt;</button>
            </nav>
          </nav>
        </section>

        <section class="flex flex-col  bg-white" aria-label="Comment Section">
          <h2 id="comment"
            class="gap-2.5 self-start p-2.5 text-[18px] md:text-[1.875rem] font-medium text-red-normal bg-orange-light-hover rounded-xl">
            Bình luận
          </h2>

          <div class="flex flex-col mt-6 w-full text-red-darker max-md:max-w-full">
            <!-- Comment Input -->
            <textarea id="commentBox"
              class="p-2.5 w-full bg-orange-light text-red-dark placeholder-red-dark text-[16px] md:text-[1.75rem] resize-none overflow-y-auto block min-h-[3.75rem]"
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
                    <h3 class="self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium w-[126px]">
                      Midori
                    </h3>
                    <time class="self-stretch my-auto text-[14px] md:text-[1.5rem] text-right">9 giờ
                      trước</time>
                  </header>
                  <p
                    class="md:p-9 p-4 w-full text-[16px] md:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
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
                    <h3 class="self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium w-[126px]">
                      Midori
                    </h3>
                    <time class="self-stretch my-auto text-[14px] md:text-[1.5rem] text-right">9 giờ
                      trước</time>
                  </header>
                  <p
                    class="p-4 md:p-9 w-full text-[16px] md:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
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
                    <h3 class="self-stretch my-auto text-[16px] md:text-[1.75rem] font-medium w-[126px]">
                      Midori
                    </h3>
                    <time class="self-stretch my-auto text-[14px] md:text-[1.5rem] text-right">9 giờ
                      trước</time>
                  </header>
                  <p
                    class="p-9 w-full text-[16px] md:text-[1.75rem] bg-orange-light rounded-tr-xl rounded-b-xl max-md:px-5 max-md:max-w-full">
                    Xời nam9 xức sắc, 10 đỉm, tập sau ảnh đá bay nam phụ độc ác ra
                    chuồng gà:))))
                  </p>
                </div>
              </article>
            </div>

            <!-- Pagination -->
            <nav
              class="flex gap-1 justify-center items-center self-center font-medium text-center text-red-normal whitespace-nowrap mt-4"
              aria-label="Pagination">
              <button aria-label="Page 1"
                class="self-stretch px-0.5 my-auto text-orange-light text-[18px] md:text-[1.875rem] bg-[#D56665] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center"
                aria-current="page">1</button>
              <button aria-label="Page 2"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">2</button>
              <button aria-label="Page 3"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">3</button>
              <span
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] rounded-lg text-[16px] md:text-[1.75rem] aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">...</span>
              <button aria-label="Page 6"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">6
              </button>
              <button aria-label="Next page"
                class="self-stretch px-0.5 my-auto bg-[#FFF2F0] text-[16px] md:text-[1.75rem] rounded-lg aspect-[1/1] h-[30px] min-h-[30px] w-[30px] flex items-center justify-center">&gt;</button>
            </nav>
          </div>
        </section>
      </div>

      <!-- 🌟 Nổi bật (4/12) -->
      <aside
        class="w-full md:w-4/12 box-border bg-red-light bg-white p-4 md:p-8 max-md:mt-4 flex flex-col items-center  mx-auto"
        aria-labelledby="hot-list">
        <h2 id="host-list"
          class="gap-2.5 self-start p-2.5 text-[18px] md:text-[1.875rem] font-medium text-red-normal bg-orange-light-hover rounded-xl">
          Nổi bật</h2>

        <div
          class="flex gap-2.5 justify-center items-start mt-[12px] md:mt-[24px] w-full font-medium text-red-normal whitespace-nowrap"
          role="tablist">
          <button
            class="gap-2.5 self-stretch py-2.5 px-2 text-red-light bg-red-normal rounded-[12px] text-[18px]  md:text-[1.5rem]"
            role="tab" aria-selected="true">
            Ngày
          </button>
          <button
            class="gap-2.5 self-stretch py-2.5 px-2 bg-red-light rounded-[12px] text-[18px]  md:text-[1.5rem]"
            role="tab">
            Tuần
          </button>
          <button
            class="gap-2.5 self-stretch py-2.5 px-2 bg-red-light rounded-[12px] text-[18px]  md:text-[1.5rem]"
            role="tab">
            Tháng
          </button>
          <button
            class="gap-2.5 self-stretch py-2.5 px-2 bg-red-light rounded-[12px] text-[18px]  md:text-[1.5rem]"
            role="tab">
            Năm
          </button>
        </div>

        <div class="flex flex-col items-center mt-[12px] md:mt-[24px] w-full" role="tabpanel">
          <!-- Trending Stories -->
          <article class="flex gap-3 w-full mb-[12px] md:mb-[24px]">
            <span
              class="gap-2.5 self-center my-auto w-[2rem] h-[2rem] text-[12px] md:text-[1.25rem] p-0.5 font-medium text-center text-red-normal whitespace-nowrap rounded-[2px] border"
              style="border-color: #D56665 !important;">1</span>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb5b10fca047125b9225596f15a42d2b2fb7a3a9bcb118b51677934c02dbee35"
              alt="Trending story thumbnail"
              class="object-contain shrink-0 self-start items-start my-auto rounded-lg aspect-[0.81] w-[84px] md:w-[8rem]" />
            <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 ">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Thể loại: HE, hắc đạo
              </p>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                </div>
                <span class="text-[14px] md:text-[1.5rem] text-normal text-red-normal">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[14px] md:text-[1.5rem] text-red-normal basis-0">
                Số chữ: 24.7K
              </p>
            </div>
          </article>

          <article class="flex gap-3 items-center w-full mb-[12px] md:mb-[24px]">
            <span
              class="gap-2.5 self-center my-auto w-[2rem] h-[2rem] p-0.5 text-[12px] md:text-[1.25rem] font-medium text-center text-red-normal whitespace-nowrap rounded-[2px] border"
              style="border-color: #D56665 !important;">2</span>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb5b10fca047125b9225596f15a42d2b2fb7a3a9bcb118b51677934c02dbee35"
              alt="Trending story thumbnail"
              class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-[0.81] w-[84px] md:w-[8rem]" />
            <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 ">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Thể loại: HE, hắc đạo
              </p>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                </div>
                <span class="text-[14px] md:text-[1.5rem] text-normal text-red-normal">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[14px] md:text-[1.5rem] text-red-normal basis-0">
                Số chữ: 24.7K
              </p>
            </div>
          </article>
          <article class="flex gap-3 items-center w-full mb-[12px] md:mb-[24px]">
            <span
              class="gap-2.5 self-center items-center my-auto w-[2rem] h-[2rem] p-0.5 text-[12px] md:text-[1.25rem] font-medium text-center text-red-normal whitespace-nowrap rounded-[2px] border"
              style="border-color: #D56665 !important;">3</span>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb5b10fca047125b9225596f15a42d2b2fb7a3a9bcb118b51677934c02dbee35"
              alt="Trending story thumbnail"
              class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-[0.81] w-[84px] md:w-[8rem]" />
            <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 ">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Thể loại: HE, hắc đạo
              </p>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.25rem] md:h-[1.75rem] text-[14px] md:text-[1.5rem]">★</span>
                </div>
                <span class="text-[14px] md:text-[1.5rem] text-normal text-red-normal">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[14px] md:text-[1.5rem] text-red-normal basis-0">
                Số chữ: 24.7K
              </p>
            </div>
          </article>
          <!-- Additional trending stories would follow the same pattern -->
        </div>
      </aside>
    </div>

    <!-- Recommended stories -->
    <section class="relative z-10 mt-0 w-full bg-white rounded-[20px]">
      <div class="flex flex-col w-full rounded-none">
        <!-- Tiêu đề
      <h2 class="gap-2.5 self-start p-[10px] md:px-[20px] ml-[17px] md:ml-[34px] mb-[-3px] text-[18px]  md:text-[2.25rem] font-semibold text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
        Truyện đề cử
      </h2> -->

        <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
        <div
          class="flex overflow-x-auto md:grid md:grid-cols-6 gap-4 md:gap-11 items-center p-4 pt-[14px] md:p-[34px] md:pt-[28px] bg-red-light scrollbar-thin scrollbar-thumb-red-normal scrollbar-track-red-light md:overflow-x-hidden"
          role="list">

          <!-- Story Cards (6 items) -->
          <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
              alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
            <span
              class="gap-2.5 self-start px-[2px] mt-[4px] md:my-[8px] text-[12px] md:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
            <div class="flex flex-col mt-[4px] w-full">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                Thiên Quan Tứ Phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] md:text-[1.25rem] text-normal text-red-normal md:mt-1.5">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Chương 120
              </p>
            </div>
          </article>

          <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
              alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
            <span
              class="gap-2.5 self-start px-[2px] mt-[4px] md:my-[8px] text-[12px] md:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
            <div class="flex flex-col mt-[4px] w-full">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                Thiên Quan Tứ Phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] md:text-[1.25rem] text-normal text-red-normal md:mt-[6px]">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Chương 120
              </p>
            </div>
          </article>
          <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
              alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
            <span
              class="gap-2.5 self-start px-[2px] mt-[4px] md:my-[8px] text-[12px] md:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
            <div class="flex flex-col mt-[4px] w-full">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                Thiên Quan Tứ Phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] md:text-[1.25rem] text-normal text-red-normal md:mt-[6px]">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] md:text-[1.25rem] text-normal text-red-normal basis-0">
                Chương 120
              </p>
            </div>
          </article>
          <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
              alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
            <span
              class="gap-2.5 self-start px-[2px] mt-[4px] md:my-[8px] text-[12px] md:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
            <div class="flex flex-col mt-[4px] w-full">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                Thiên Quan Tứ Phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] md:text-[1.25rem] text-normal text-red-normal md:mt-[6px]">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Chương 120
              </p>
            </div>
          </article>
          <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
              alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
            <span
              class="gap-2.5 self-start px-[2px] mt-[4px] md:my-[8px] text-[12px] md:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
            <div class="flex flex-col mt-[4px] w-full">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                Thiên Quan Tứ Phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] md:text-[1.25rem] text-normal text-red-normal md:mt-[6px]">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Chương 120
              </p>
            </div>
          </article>
          <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
              alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
            <span
              class="gap-2.5 self-start px-[2px] mt-[4px] md:my-[8px] text-[12px] md:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
            <div class="flex flex-col mt-[4px] w-full">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                Thiên Quan Tứ Phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[16px] md:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] md:text-[1.25rem] text-normal text-red-normal md:mt-[6px]">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] md:text-[1.5rem] text-normal text-red-normal basis-0">
                Chương 120
              </p>
            </div>
          </article>

        </div>
      </div>
    </section>

  </main>


  <?php
} else { ?>
  <p>Truyện không tồn tại hoặc đã bị xóa.</p>
<?php }
; ?>

<?php get_footer(); ?>