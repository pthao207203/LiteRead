<?php
/* Template Name: categoryDetail */
get_header();

global $wpdb;
$category_slug = get_query_var('category');
// $category_name = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

$category = $wpdb->get_row(
  $wpdb->prepare("SELECT type_name FROM wp_type WHERE slug = %s", $category_slug)
);
$stories = [];
if (!empty($category_slug)) {
  $stories = $wpdb->get_results($wpdb->prepare("
        SELECT s.* 
        FROM wp_stories s
        INNER JOIN wp_story_type st ON s.id = st.story_id
        INNER JOIN wp_type t ON st.type_id = t.id
        WHERE t.slug = %s
    ", $category_slug));
}
?>

<div class="bg-white relative mt-[4.425rem]">
  <section class="px-[17px] lg:px-[34px] py-[17px] lg:py-[34px] w-full max-md:max-w-full">
    <header>
      <h1 class="font-bold leading-none text-red-dark text-[20px] lg:text-[2rem] uppercase max-md:max-w-full">
        <?php echo esc_html($category->type_name); ?>
      </h1>
      <p
        class="mt-[12px] lg:mt-[24px] font-medium leading-none text-red-dark text-[18px] lg:text-[1.875rem] max-md:max-w-full">
        <?php echo count($stories); ?> Truyện
      </p>
    </header>

    <div class="mt-[12px] lg:mt-[24px] w-full max-md:max-w-full">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[12px] lg:gap-[24px] w-full">
        <?php if (!empty($stories)): ?>
          <?php foreach ($stories as $story):
            $chapter_lastest = $wpdb->get_results(
              $wpdb->prepare(
                "SELECT * FROM wp_chapters WHERE story_id = %s ORDER BY chapter_number DESC LIMIT 2",
                $story->id
              )
            );
            ?>
            <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
              <img src="<?php echo esc_url($story->cover_image_url); ?>" alt="Story cover"
                class="object-cover shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12.5rem]" />
              <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                <span
                  class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                  <?php echo esc_html($story->status); ?>
                </span>
                <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug)); ?>"
                  class="hover:no-underline hover:text-orange-dark text-orange-darker">
                  <h2
                    class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0">
                    <?php echo esc_html($story->story_name); ?>
                  </h2>
                </a>
                <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
                  <div class="flex items-start" aria-label="Rating">
                    <?php for ($i = 0; $i < $story->rate; $i++): ?>
                      <span
                        class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                    <?php endfor; ?>
                  </div>
                  <span
                    class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]"><?php echo esc_html($story->rate); ?></span>
                </div>

                <!-- Hiển thị danh sách chương mới nhất theo từng truyện -->
                <div class="mt-[8px] lg:mt-[12px] w-full">
                  <?php
                  if (!empty($chapter_lastest)) {
                    foreach ($chapter_lastest as $chapter) {
                      // Chỉ hiển thị chương nếu nó thuộc về truyện này
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
                  } else {
                    echo "<p class='text-[14px] lg:text-[1.5rem] text-gray-500'>Chưa có chương mới</p>";
                  }
                  ?>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-lg text-gray-600">Không có truyện nào thuộc thể loại này.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-9357894106826270" data-ad-slot="4222935559"
    data-auto-format="rspv" data-full-width="">
    <div overflow=""></div>
  </amp-ad>
  <div class="flex flex-col w-full rounded-none lg:mt-[8px]">
    <!-- Tiêu đề -->
    <h2
      class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
      Truyện đề cử
    </h2>
    <?php include "de-cu.php"; ?>
  </div>
</div>

<?php get_footer(); ?>