<?php
/* Template Name: Author Page */
get_header();

global $wpdb;
$users_literead = $wpdb->prefix . 'users_literead'; // Bảng người dùng
$stories_table = $wpdb->prefix . 'stories'; // Bảng truyện

// Lấy slug từ URL
$author_slug = get_query_var('tacgia');

// Lấy thông tin tác giả từ bảng users_literead
$author_info = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $users_literead WHERE slug = %s", $author_slug)
);
$total_stories = $wpdb->get_var("SELECT COUNT(*) FROM $stories_table WHERE editor = $author_info->id");

$current_page = isset($_GET['page']) ? $_GET['page'] : 'moi-dang';


// Kiểm tra xem tác giả có tồn tại không
if ($author_info) {
  // Thông tin tác giả
  $author_name = $author_info->full_name;
  $author_email = $author_info->email;
  $author_avatar = $author_info->avatar_image_url ? esc_url($author_info->avatar_image_url) : 'https://via.placeholder.com/150';

  // Cập nhật truy vấn SQL dựa trên tham số sắp xếp
  if ($current_page == 'danh-gia') {
    $order_by = "ORDER BY rate DESC";
  } elseif ($current_page == 'luot-xem') {
    $order_by = "ORDER BY view DESC";
  } else {
    $order_by = "ORDER BY created_at DESC";
  }

  // Lấy danh sách truyện của tác giả theo sắp xếp
  $stories = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM $stories_table WHERE editor = %d $order_by", $author_info->id)
  );
}
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/trang-ca-nhan/') !== false; // Kiểm tra nếu là trang truyện

?>
<style>
  .sort-btn:not(.current):hover {
    background-color: #F2D0CF;
    /* Thêm màu hover cho các nút không phải hiện tại */
    color: #A04D4C;
    /* Thêm màu cho văn bản khi hover */
  }

  .sort-btn.current {
    pointer-events: none;
    /* Vô hiệu hóa hover cho nút hiện tại */
  }
</style>
<main class="flex flex-col relative mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigationx -->
      <?php get_sidebar(); ?>
      <div id="mainContent"
        class="md:w-10/12 flex-grow transition-all max-md:ml-0 max-md:w-full <?= ($isHome || $isSingleTruyen || $isMobile) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div class="flex flex-col w-full">
          <div class="bg-white ">
            <section class="px-[17px] lg:px-[34px] py-[17px] lg:py-[34px] w-full max-md:max-w-full">
              <header>
                <h1 class="font-bold leading-none text-red-dark text-[20px] lg:text-[2rem] uppercase max-md:max-w-full">
                  <?php echo esc_html($author_name); ?>
                </h1>
                <p
                  class="mt-[12px] lg:mt-[24px] font-medium leading-none text-red-dark text-[18px] lg:text-[1.875rem] max-md:max-w-full">
                  <?php echo esc_html($total_stories); ?> Truyện
                </p>

                <nav
                  class="flex flex-wrap gap-[10px] items-start mt-[12px] lg:mt-[24px] w-full font-medium text-red-normal max-md:max-w-full"
                  aria-label="Story filters">
                  <a href="?page=moi-dang" class="hover:no-underline hover:text-red-normal-hover">
                    <button
                      class="sort-btn <?php if ($current_page == 'moi-dang')
                        echo 'current text-orange-light bg-red-normal';
                      else
                        echo 'bg-orange-light-hover hover:bg-red-light-active hover:text-red-dark'; ?> gap-2.5 self-stretch p-2.5 text-[16px] lg:text-[1.75rem] rounded-xl"
                      data-sort="created_at" aria-current="page">
                      Mới đăng
                    </button>
                  </a>
                  <a href="?page=danh-gia" class="hover:no-underline hover:text-red-normal-hover">
                    <button
                      class="sort-btn <?php if ($current_page == 'danh-gia')
                        echo 'current text-orange-light bg-red-normal';
                      else
                        echo 'bg-orange-light-hover hover:bg-red-light-active hover:text-red-dark'; ?> gap-2.5 self-stretch p-2.5 text-[16px] lg:text-[1.75rem] rounded-xl"
                      data-sort="rating">
                      Đánh giá
                    </button>
                  </a>
                  <a href="?page=luot-xem" class="hover:no-underline hover:text-red-normal-hover">
                    <button
                      class="sort-btn <?php if ($current_page == 'luot-xem')
                        echo 'current text-orange-light bg-red-normal';
                      else
                        echo 'bg-orange-light-hover hover:bg-red-light-active hover:text-red-dark'; ?> gap-2.5 self-stretch p-2.5 text-[16px] lg:text-[1.75rem] rounded-xl"
                      data-sort="views">
                      Lượt xem
                    </button>
                  </a>
                </nav>

              </header>

              <div class="mt-[12px] lg:mt-[24px] w-full max-md:max-w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[12px] lg:gap-[24px] w-full ">
                  <!-- Story Cards -->
                  <?php if ($stories): ?>
                    <?php foreach ($stories as $story):
                      $chapter_lastest = $wpdb->get_results(
                        $wpdb->prepare(
                          "SELECT * FROM wp_chapters WHERE story_id = %s ORDER BY chapter_number DESC LIMIT 2",
                          $story->id
                        )
                      );
                      ?>
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
                              echo "
                              <div class='flex justify-between items-center mt-[8px] mb-[-4px] w-full'>
                                <p class='text-[14px] lg:text-[1.5rem] text-red-normal text-regular'>
                                  Chương " . $chapter->chapter_number . "
                                </p>
                                <p class='text-[12px] lg:text-[1.25rem] text-red-normal text-regular'>
                                  " . time_ago($chapter->edited_at) . "
                                </p>
                              </div>";
                            }
                          } else {
                            echo "
                            <div class='flex justify-between items-center mt-[8px] mb-[-4px] w-full'>
                              <p class='text-[14px] lg:text-[1.5rem] text-red-normal text-regular'>
                                Chưa có chương nào 
                              </p>
                            </div>";
                          }
                          ?>
                        </div>
                      </article>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <p>Chưa có truyện nào của tác giả này.</p>
                  <?php endif; ?>
                </div>
              </div>
            </section>
            <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-9357894106826270"
              data-ad-slot="4222935559" data-auto-format="rspv" data-full-width="">
              <div overflow=""></div>
            </amp-ad>
          </div>
          <div class="flex flex-col w-full rounded-none lg:mt-[8px]">
            <!-- Tiêu đề -->
            <h2
              class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
              Truyện đề cử
            </h2>

            <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
            <?php include "de-cu.php"; ?>
          </div>
        </div>
        <?php get_footer(); ?>
      </div>
    </div>
  </div>
</main>

<style>
  /* Hover và active cho các nút sắp xếp */
  .sort-btn:hover {
    background-color: #FF9A8B;
    /* Thay đổi màu sắc khi hover */
  }

  .sort-btn.active {
    background-color: #FF5A5F;
    /* Màu sắc của nút khi được nhấn */
  }
</style>