<?php 

global $wpdb;
$stories = $wpdb->prefix . 'stories';
$stories_views = $wpdb->get_results("SELECT * FROM $stories ORDER BY view DESC LIMIT 5");
?>
<h2
  class="rounded-[12px] inline-block self-start p-[10px] lg:px-[20px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal ">
  Nổi bật</h2>
<div
  class="flex gap-2.5 justify-center items-start mt-[12px] lg:mt-[24px] w-full text-lg font-medium text-red-normal whitespace-nowrap"
  role="tablist">
  <button
    class="gap-2.5 self-stretch py-[10px] px-[8px] text-red-light bg-red-normal rounded-[12px] text-[18px] lg:text-[1.5rem]"
    role="tab" aria-selected="true">
    Ngày
  </button>
  <button
    class="gap-2.5 self-stretch py-[10px] px-[8px] bg-red-light rounded-[12px] text-[18px] lg:text-[1.5rem]"
    role="tab">
    Tuần
  </button>
  <button
    class="gap-2.5 self-stretch py-[10px] px-[8px] bg-red-light rounded-[12px] text-[18px] lg:text-[1.5rem]"
    role="tab">
    Tháng
  </button>
  <button
    class="gap-2.5 self-stretch py-[10px] px-[8px] bg-red-light rounded-[12px] text-[18px] lg:text-[1.5rem]"
    role="tab">
    Năm
  </button>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 mt-[12px] lg:mt-[24px] w-full" role="tabpanel">
  <!-- Trending Stories -->
  <?php if (!empty($stories_views)): 
    $index = 0; ?>
    <?php foreach ($stories_views as $story) {
      $genres = $wpdb->get_col($wpdb->prepare(
        "SELECT t.type_name 
          FROM wp_story_type st 
          INNER JOIN wp_type t ON st.type_id = t.id 
          WHERE st.story_id = %d",
        $story->id
      ));
      $index = $index + 1;
      ?>
      <article class="flex gap-3 items-center w-full mb-[12px] lg:mb-[24px]">
        <span
          class="gap-2.5 self-stretch my-auto w-[2rem] h-[2rem] text-[16px] lg:text-[1.25rem] font-medium text-center text-red-normal whitespace-nowrap rounded-[2px] border"
          style="border-color: #D56665 !important;"><?php echo $index;?></span>
        <img loading="lazy" src=<?php echo esc_url($story->cover_image_url); ?> alt=<?php echo esc_html($story->story_name); ?>
          class="object-cover shrink-0 self-stretch my-auto rounded-lg aspect-[0.81] w-[84px] lg:w-[10rem]" />
        <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 min-w-60">
          <a href="<?php echo esc_url(home_url('/truyen/' . $story->slug)); ?>"
            class="hover:no-underline hover:text-orange-dark text-orange-darker">
            <h3
              class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0">
              <?php echo esc_html($story->story_name) ?>
            </h3>
          </a>
          <p
            class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
            Thể loại:
            <?php
            if (!empty($genres)) {
              echo esc_html(implode(', ', array_map('trim', $genres)));
            } else {
              echo '<p>Không có thể loại nào</p>';
            }
            ?>
          </p>
          <div class="flex gap-1 items-start self-start mt-[4px] ">
            <div class="flex items-start" aria-label="Rating: 4 out of 5">
              <span
                class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
            </div>
            <span
              class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal"><?php echo esc_html($story->rate) ?></span>
          </div>
          <p
            class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.25rem] text-red-normal basis-0">
            Lượt xem: <?php echo $story->view; ?>
          </p>
        </div>
      </article>
    <?php } ?>
  <?php endif; ?>
</div>