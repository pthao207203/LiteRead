<?php

global $wpdb;
$stories = $wpdb->prefix . 'stories';
$stories_hot = $wpdb->get_results("SELECT * FROM $stories WHERE hot='1' ORDER BY edited_at DESC LIMIT 6");
?>

<!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
<div
  class="flex overflow-x-auto lg:grid lg:grid-cols-6 gap-[17px] lg:gap-[46px] items-center p-[17px] pt-[14px] lg:p-[34px] lg:pt-[28px] bg-red-light scrollbar-thin scrollbar-thumb-red-normal scrollbar-track-red-light lg:overflow-x-hidden"
  role="list">

  <!-- Story Cards (6 items) -->
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
            <span
              class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[3px]"><?php echo esc_html($story->rate); ?></span>
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