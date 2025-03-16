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
?>
<style>
.sort-btn:not(.current):hover {
  background-color: #F2D0CF; /* Thêm màu hover cho các nút không phải hiện tại */
  color: #A04D4C; /* Thêm màu cho văn bản khi hover */
}

.sort-btn.current {
  pointer-events: none; /* Vô hiệu hóa hover cho nút hiện tại */
}
</style>
<div class="bg-white ">
  <section class="px-[17px] lg:px-[34px] py-[17px] lg:py-[34px] w-full max-md:max-w-full">
    <header>
      <h1
        class="font-bold leading-none text-red-dark text-[20px] lg:text-[2rem] uppercase max-md:max-w-full">
        <?php echo esc_html($author_name); ?>
      </h1>
      <p
        class="mt-[12px] lg:mt-[24px] font-medium leading-none text-red-dark text-[18px] lg:text-[1.875rem] max-md:max-w-full">
        <?php echo esc_html($total_stories); ?> Truyện
      </p>

      <nav class="flex flex-wrap gap-[10px] items-start mt-[12px] lg:mt-[24px] w-full font-medium text-red-normal max-md:max-w-full" aria-label="Story filters">
        <a href="?page=moi-dang" class="hover:no-underline hover:text-red-normal-hover">
          <button class="sort-btn <?php if ($current_page == 'moi-dang') echo 'current text-orange-light bg-red-normal';
                                  else echo 'bg-orange-light-hover hover:bg-red-light-active hover:text-red-dark'; ?> gap-2.5 self-stretch p-2.5 text-[16px] lg:text-[1.75rem] rounded-xl" data-sort="created_at" aria-current="page">
            Mới đăng
          </button>
        </a>
        <a href="?page=danh-gia" class="hover:no-underline hover:text-red-normal-hover">
          <button class="sort-btn <?php if ($current_page == 'danh-gia') echo 'current text-orange-light bg-red-normal';
                                  else echo 'bg-orange-light-hover hover:bg-red-light-active hover:text-red-dark'; ?> gap-2.5 self-stretch p-2.5 text-[16px] lg:text-[1.75rem] rounded-xl" data-sort="rating">
            Đánh giá
          </button>
        </a>
        <a href="?page=luot-xem" class="hover:no-underline hover:text-red-normal-hover">
          <button class="sort-btn <?php if ($current_page == 'luot-xem') echo 'current text-orange-light bg-red-normal';
                                  else echo 'bg-orange-light-hover hover:bg-red-light-active hover:text-red-dark'; ?> gap-2.5 self-stretch p-2.5 text-[16px] lg:text-[1.75rem] rounded-xl" data-sort="views">
            Lượt xem
          </button>
        </a>
      </nav>

    </header>

    <div class="mt-[12px] lg:mt-[24px] w-full max-md:max-w-full">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[12px] lg:gap-[24px] w-full ">
        <!-- Story Cards -->
        <?php if ($stories): ?>
          <?php foreach ($stories as $story): ?>
            <article
              class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
              <img
                src="<?php echo esc_url($story->cover_image_url); ?>" alt="Story cover"
                class="object-cover shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12.5rem]" />
              <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                    <?php if ($story->status == "Hoàn thành"): ?>
                      <span class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                        Full
                      </span>
                    <?php else: ?>
                      <span class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-red-dark whitespace-nowrap rounded-sm">
                      Đang tiến hành
                    <?php endif; ?>
                <h2
                  class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                  <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug)); ?>"
                    class="hover:no-underline hover:text-orange-dark">
                    <?php echo esc_html($story->story_name); ?>
                  </a>
                </h2>
                <!-- <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]"> -->
                  <!-- <div class="flex items-start" aria-label="Rating: echo esc_html($story->rate); ?> out of 5">
                   
                  <?php
                   $rating = intval($story->rate);
                    // for ($i = 1; $i <= 5; $i++) {
                    //   if ($i <= $rating) {
                    //     // Hiển thị sao đầy
                    //     echo '<span style="display: inline-block; vertical-align: middle;" class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>';
                    //   } else {
                    //     // Hiển thị sao rỗng
                    //     echo '<span style="display: inline-block; vertical-align: middle;" class="text-[#D3D3D3] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>';
                    //   }
                    // }
                    // 
                    ?>
                  </div> -->
                  <!-- <span style="display: inline-block; vertical-align: middle; font-size: 1.5rem;" class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">
                    <echo esc_html($rating); ?>
                  </span>
                </div> -->
                
                <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
                  <p class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</p>
                  <span style="display: inline-block; vertical-align: middle; font-size: 1.5rem;" class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">
                    <?php echo esc_html($rating); ?>
                  </span>
                </div>

                <div
                  class="flex flex-col mt-[1rem] w-full items-center justify-center text-red-dark">
                  <?php
                  $chapter_query = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * FROM {$wpdb->prefix}chapters WHERE story_id = %d ORDER BY created_at DESC LIMIT 2",
                      $story->id
                    )
                  );
                  if ($chapter_query) :
                    foreach ($chapter_query as $chapter) :
                  ?>
                      <div class="flex self-stretch mt-[1rem]">
                      <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug . '/chuong-' . $chapter->chapter_number)); ?>" class="flex-1 hover:no-underline hover:text-orange-dark text-[14px] self-center lg:text-[1.5rem] text-regular">
                          Chương <?php echo esc_html($chapter->chapter_number); ?>
                      </a>
                        <time class="text-[10px] self-center  lg:text-[1.25rem]">
                          <?php echo time_ago($chapter->created_at); ?>
                        </time>
                      </div>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <p class="text-center text-gray-500">Không có chương nào để hiển thị.</p>
                  <?php endif; ?>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <p>Chưa có truyện nào của tác giả này.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
<div class="flex flex-col w-full rounded-none lg:mt-[8px]">
  <!-- Tiêu đề -->
  <h2 class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
    Truyện đề cử
  </h2>

  <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
  <?php include "de-cu.php"; ?>
</div>
</div>
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
<?php get_footer(); ?>