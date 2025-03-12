
<?php 
/* Template Name: categoryDetail */
get_header();

global $wpdb;
$category_name = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

$stories = [];
if (!empty($category_name)) {
    $stories = $wpdb->get_results($wpdb->prepare("
        SELECT s.* 
        FROM wp_stories s
        INNER JOIN wp_story_type st ON s.id = st.story_id
        INNER JOIN wp_type t ON st.type_id = t.id
        WHERE t.type_name = %s
    ", $category_name));
}
?>

<div class="bg-white">
  <section class="px-[17px] lg:px-[34px] py-[17px] lg:py-[34px] w-full max-md:max-w-full">
    <header>
      <h1 class="font-bold leading-none text-red-dark text-[20px] lg:text-[2rem] uppercase max-md:max-w-full">
        <?php echo esc_html($category_name); ?>
      </h1>
      <p class="mt-[12px] lg:mt-[24px] font-medium leading-none text-red-dark text-[18px] lg:text-[1.875rem] max-md:max-w-full">
        <?php echo count($stories); ?> Truyện
      </p>
    </header>

    <div class="mt-[12px] lg:mt-[24px] w-full max-md:max-w-full">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[12px] lg:gap-[24px] w-full">
        <?php if (!empty($stories)): ?>
          <?php foreach ($stories as $story): ?>
            <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
              <img src="<?php echo esc_url($story->cover_image_url); ?>" alt="Story cover" class="object-cover shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12.5rem]" />
              <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                <span class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                  <?php echo esc_html($story->status); ?>
                </span>
                <h2 class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                  <?php echo esc_html($story->story_name); ?>
                </h2>
                <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
                  <div class="flex items-start" aria-label="Rating">
                    <?php for ($i = 0; $i < $story->rate; $i++): ?>
                      <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                    <?php endfor; ?>
                  </div>
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]"><?php echo esc_html($story->rate); ?></span>
                </div>
                <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                  <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                    Chương <?php echo esc_html($story->latest_chapter ?? 'N/A'); ?>
                  </span>
                  <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]">
                    <?php echo human_time_diff(strtotime($story->created_at), current_time('timestamp')) . ' trước'; ?>
                  </time>
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


  <div class="flex flex-col w-full rounded-none lg:mt-[8px]">
      <!-- Tiêu đề -->
      <h2 class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
        Truyện đề cử
      </h2>

      <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
      <div class="flex overflow-x-auto lg:grid lg:grid-cols-6 gap-[17px] lg:gap-[46px] items-center p-[17px] pt-[14px] lg:p-[34px] lg:pt-[28px] bg-red-light scrollbar-thin scrollbar-thumb-red-normal scrollbar-track-red-light lg:overflow-x-hidden" role="list">
        
        <!-- Story Cards (6 items) -->
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>

        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
      </div>
    </div>
</div>



<?php get_footer(); ?>