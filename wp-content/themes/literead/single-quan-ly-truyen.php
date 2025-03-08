<?php
/* Template Name: StoryManagement */
get_header();

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
// echo $story->story_name;

if ($story) {
  ?>
<main class="flex flex-col bg-[#FFE5E1]">
    <div class="w-full max-md:max-w-full">
        <div class="flex gap-[1.25rem] max-md:flex-col">
          <!-- Sidebar Navigation -->
        <?php get_sidebar(); ?>
        <section id="mainContent" class="w-10/12 flex-grow transition-all max-md:ml-0 max-md:w-full bg-white gap-[0.75rem]">
          <nav
            class="flex flex-wrap items-center w-full px-[20px] text-[1.125rem] font-medium  bg-white text-red-darker mb-[2px] max-sm:hidden "
            aria-label="Navigation menu">
            <div class="flex items-center self-stretch px-[0.75rem] py-[0.625rem] mr-0 ">
              <a href="#" class="self-stretch mr-[0.75rem]" tabindex="0">Truyện của tôi</a>
              <!-- ➡️ Mũi tên SVG -->
              <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
                  <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999"
                    stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>
            </div>

            <!-- 📝 Đăng truyện -->
            <div class="flex items-center self-stretch px-[0.75rem] py-[0.625rem] mr-0 ">
              <a href="#" class="self-stretch mr-[0.75rem]" tabindex="0">Đăng truyện</a>
              <!-- ➡️ Mũi tên SVG -->
              <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
                  <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999"
                    stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>
            </div>
          </nav>
          <div class="bg-[#FFE5E1] h-[0.125rem] max-sm:hidden"></div> 
          
          <!-- <section class="flex p-[1rem] ml-[2.5rem] mr-[2.5rem] mt-[1.25rem] bg-white rounded-2xl shadow-lg max-md:w-full">

          </section> -->
          <section class=" ml-10 mr-12 px-0 py-4 1.5rem">
          <article
                      class="flex  grow shrink gap-6 items-start mb-[1.5rem] p-[1.25rem] bg-white rounded-2xl shadow-lg  max-md:max-w-full"
                    >
            <div class="overflow-hidden rounded-md w-[16.625rem] h-[23.25rem]">
              <img src=<?php echo esc_url($story->cover_image_url); ?> alt=<?php echo esc_html($story->story_name); ?>
                alt="Story cover" class="object-cover w-[16.625rem] h-[23.25rem]" />
            </div>
            <div class="ml-6 max-md:mt-5">
              <h1 class="mb-2 text-[20px] md:text-[2rem] font-medium text-red-darker"><?php echo esc_html($story->story_name) ?></h1>
              <p class="mb-2 text-[16px] md:text-[1.75rem] text-red-darker">Số chữ: 24.7K</p>
              <p class="mb-2 text-[16px] md:text-[1.75rem] text-red-darker">
                <span>Trạng thái:</span>
                <span class="font-semibold">Đã duyệt</span>
              </p>
              <p class="mb-2 text-[16px] md:text-[1.75rem] text-red-darker">Thể loại: <?php echo esc_html($story->genres) ?></p>
              <p class="mb-2 text-[16px] md:text-[1.75rem] text-red-darker">Số chương: 120</p>
              <p class="mb-2 text-[16px] md:text-[1.75rem] text-red-darker">Lượt đọc: <?php echo esc_html($story->view) ?></p>
              <p class="mb-2 text-[16px] md:text-[1.75rem] text-red-darker">Yêu thích: <?php echo esc_html($story->likes) ?></p>
              <p class="mb-2 text-[16px] md:text-[1.75rem] text-red-darker">Bình luận: 200</p>
            </div>
            </article>
            <button class="px-3 py-3.5 text-[18px] md:text-[1.875rem] font-medium text-[#D56665] bg-[#FFF2F0] rounded-xl "> Giới
              thiệu
            </button>
            <button class="px-3 py-3.5 ml-2 text-[18px] md:text-[1.875rem] font-medium text-[#FBF6E3] bg-[#D56665] rounded-xl ">
              Sửa
            </button>
            <div
              class="flex-1 shrink basis-0 text-ellipsis text-[16px] md:text-[1.75rem] font-normal text-red-darker [&>p]:mb-4 mt-[0.75rem] border-1 border-solid border-red-normal border-w-1 rounded-2xl py-[1.25rem] px-[0.625rem]">
              <?php echo wpautop(wp_kses_post(htmlspecialchars_decode($story->synopsis, ENT_QUOTES))); ?>
            </div>
            <div>
              <button class="px-3 py-3.5 mt-[1.5rem] text-[18px] md:text-[1.875rem] font-medium text-[#D56665] bg-[#FFF2F0] rounded-xl ">
                Danh sách chương
              </button>
              <div class="flex gap-3 mt-4 mb-6">
                <button class="px-3 py-3.5 text-[18px] md:text-[1.875rem] font-medium text-[#FBF6E3] bg-[#D56665] rounded-xl ">
                  Chương mới
                </button>
                <button
                  class="flex items-center text-[18px] md:text-[1.875rem] px-3 py-3.5 font-medium text-[#FBF6E3] bg-[#D56665] rounded-xl ">
                  <svg width="20" height="20" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="delete-icon mr-2.5">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M28 8.5H4V12.5C4.61998 12.5 4.92997 12.5 5.1843 12.5681C5.87449 12.7531 6.41358 13.2922 6.59852 13.9824C6.66667 14.2367 6.66667 14.5467 6.66667 15.1667V22.5C6.66667 25.3284 6.66667 26.7426 7.54535 27.6213C8.42403 28.5 9.83824 28.5 12.6667 28.5H19.3333C22.1618 28.5 23.576 28.5 24.4547 27.6213C25.3333 26.7426 25.3333 25.3284 25.3333 22.5V15.1667C25.3333 14.5467 25.3333 14.2367 25.4015 13.9824C25.5864 13.2922 26.1255 12.7531 26.8157 12.5681C27.07 12.5 27.38 12.5 28 12.5V8.5ZM13.6667 15.1667C13.6667 14.6144 13.219 14.1667 12.6667 14.1667C12.1144 14.1667 11.6667 14.6144 11.6667 15.1667V21.8333C11.6667 22.3856 12.1144 22.8333 12.6667 22.8333C13.219 22.8333 13.6667 22.3856 13.6667 21.8333V15.1667ZM20.3333 15.1667C20.3333 14.6144 19.8856 14.1667 19.3333 14.1667C18.781 14.1667 18.3333 14.6144 18.3333 15.1667V21.8333C18.3333 22.3856 18.781 22.8333 19.3333 22.8333C19.8856 22.8333 20.3333 22.3856 20.3333 21.8333V15.1667Z"
                      fill="white">
                    </path>
                    <path
                      d="M13.424 4.99412C13.576 4.85237 13.9108 4.7271 14.3765 4.63776C14.8422 4.54843 15.4128 4.5 15.9998 4.5C16.5869 4.5 17.1575 4.54842 17.6232 4.63776C18.0889 4.7271 18.4237 4.85236 18.5756 4.99412"
                      stroke="white" stroke-width="2" stroke-linecap="round">
                    </path>
                  </svg>
                  <span>Xóa</span>
                </button>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <article
                class="p-4 bg-white rounded-2xl border-l-2 border-solid shadow-md border-l-[#D56665] max-sm:p-4 max-w-full h-[10.32rem]">
                <h3 class="mb-2 text-[18px] md:text-[1.875rem] font-medium text-red-darker "> Chương 1: Hồi kết</h3>
                <div class="flex gap-4 mb-2">
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">Số chữ: 2543</p>
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">2000 lượt đọc</p>
                </div>
                <p class="text-[16px] md:text-[1.5rem] italic text-red-darker">Cập nhật: 2 giờ trước</p>
              </article>

              <article
                class="p-4 bg-white rounded-2xl border-l-2 border-solid shadow-md border-l-[#D56665] max-sm:p-4 max-w-full h-[10.32rem]">
                <h3 class="mb-2 text-[18px] md:text-[1.875rem] font-medium text-red-darker "> Chương 2: Hồi kết</h3>
                <div class="flex gap-4 mb-2">
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">Số chữ: 2543</p>
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">2000 lượt đọc</p>
                </div>
                <p class="text-[16px] md:text-[1.5rem] italic text-red-darker">Cập nhật: 2 giờ trước</p>
              </article>

              <article
                class="p-4 bg-white rounded-2xl border-l-2 border-solid shadow-md border-l-[#D56665] max-sm:p-4 max-w-full h-[10.32rem]">
                <h3 class="mb-2 text-[18px] md:text-[1.875rem] font-medium text-red-darker "> Chương 3: Hồi kết</h3>
                <div class="flex gap-4 mb-2">
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">Số chữ: 2543</p>
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">2000 lượt đọc</p>
                </div>
                <p class="text-[16px] md:text-[1.5rem] italic text-red-darker">Cập nhật: 2 giờ trước</p>
              </article>

              <article
                class="p-4 bg-white rounded-2xl border-l-2 border-solid shadow-md border-l-[#D56665] max-sm:p-4 max-w-full h-[10.32rem]">
                <h3 class="mb-2 text-[18px] md:text-[1.875rem] font-medium text-red-darker "> Chương 4: Hồi kết</h3>
                <div class="flex gap-4 mb-2">
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">Số chữ: 2543</p>
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">2000 lượt đọc</p>
                </div>
                <p class="text-[16px] md:text-[1.5rem] italic text-red-darker">Cập nhật: 2 giờ trước</p>
              </article>

              <article
                class="p-4 bg-white rounded-2xl border-l-2 border-solid shadow-md border-l-[#D56665] max-sm:p-2 max-w-full h-[10.32rem]">
                <h3 class="mb-2 text-[18px] md:text-[1.875rem] font-medium text-red-darker "> Chương 5: Hồi kết</h3>
                <div class="flex gap-4 mb-2">
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">Số chữ: 2543</p>
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">2000 lượt đọc</p>
                </div>
                <p class="text-[16px] md:text-[1.5rem] italic text-red-darker">Cập nhật: 2 giờ trước</p>
              </article>

              <article
                class="p-4 bg-white rounded-2xl border-l-2 border-solid shadow-md border-l-[#D56665] max-sm:p-4 max-w-full h-[10.32rem]">
                <h3 class="mb-2 text-[18px] md:text-[1.875rem] font-medium text-red-darker "> Chương 6: Hồi kết</h3>
                <div class="flex gap-4 mb-2">
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">Số chữ: 2543</p>
                  <p class="text-[16px] md:text-[1.5rem] text-red-darker">2000 lượt đọc</p>
                </div>
                <p class="text-[16px] md:text-[1.5rem] italic text-red-darker">Cập nhật: 2 giờ trước</p>
              </article>
            </div>
      </div>
      </section>
    </div>
    </div>
  </main>
  <?php
} else { ?>
  <p>Truyện không tồn tại hoặc đã bị xóa.</p>
<?php }
; ?>

<?php get_footer(); ?>