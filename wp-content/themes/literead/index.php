<?php
/* Template Name: Home */
get_header();

global $wpdb;
$stories_hot = $wpdb->get_results("SELECT * FROM wp_stories WHERE hot='1' LIMIT 6");

$type = $wpdb->prefix . 'type';
if ($wpdb->get_var("SHOW TABLES LIKE '$type'") != $type) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $type (
    id MEDIUMINT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
    type_name TEXT NOT NULL,
    decription TEXT DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (id)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);

  $sql = "INSERT INTO $type (`type_name`) VALUES 
    ('ABO'), ('Mạt thế'), ('Ngọt sủng'), ('Ngược'), ('Ngọt sủng'), ('Ngôn tình'),
    ('Đam mỹ'), ('Bách hợp'), ('HE'), ('SE'), ('OE'), ('Cổ đại'), ('Dân quốc'),
    ('Hiện đại'), ('Xuyên không'), ('Trọng sinh'), ('Hệ thống'), ('Nữ cường'),
    ('Tổng tài'), ('Thế thân'), ('Tu tiên'), ('Nam chủ')";

  $wpdb->query($sql);

}

$stories_view = $wpdb->prefix . 'stories_view_day';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_view'") != $stories_view) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_view (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    day DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, day)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$stories_like = $wpdb->prefix . 'stories_like_day';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_like'") != $stories_like) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_like (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    day DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, day)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$stories_view = $wpdb->prefix . 'stories_view_month';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_view'") != $stories_view) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_view (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    month DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, month)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$stories_like = $wpdb->prefix . 'stories_like_month';
if ($wpdb->get_var("SHOW TABLES LIKE '$stories_like'") != $stories_like) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $stories_like (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    month DATETIME DEFAULT CURRENT_TIMESTAMP,
    view INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (story_id, month)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}


?>

<main class="overflow-hidden mx-auto w-full bg-stone-200">

  <section class="flex relative flex-col w-full min-h-[246px] mb-[-20px] md:flex-row md:min-h-[300px] lg:min-h-[400px]">
    <img loading="lazy"
      src="https://cdn.builder.io/api/v1/image/assets/TEMP/9cd925cf87475432037a5d161cd9740a8bf77af205181197162397c1c41f9ae2"
      alt="Featured story background"
      class="object-cover absolute inset-0 w-full h-[calc(100%+20px)] z-0 filter blur-[8px]" />
    <div
      style="position: absolute; inset: 0; z-index: 10; background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0));">
    </div>
    <article
      class="flex relative gap-4 items-end pt-[17px] pr-[4px] pb-[6px] pl-[17px] z-20 lg:pt-[34px] lg:px-[34px] md:pb-[54px]">
      <img loading="lazy"
        src="https://cdn.builder.io/api/v1/image/assets/TEMP/246d716fd47fc915ccad0ade280ccb7d51e92f3338d35e99184b60d3b64433bb"
        alt="Book cover" class="object-contain shrink-0 rounded-lg aspect-[0.64] h-[25rem] lg:h-[30rem]" />
      <div class="flex flex-col min-w-60 w-full">
        <div class="flex gap-2 justify-center items-center self-start whitespace-nowrap">
          <span
            class="gap-2.5 self-stretch p-1 my-auto text-[16px] lg:text-[1.75rem] font-medium text-red-light bg-red-normal rounded-[2px]">Full</span>
          <div
            class="flex gap-1 items-center self-stretch my-auto text-[18px] lg:text-[1.875rem] font-semibold text-white">
            <span>4.5</span>
            <span class="ms-1 text-[#FFC700]">★</span>
          </div>
        </div>
        <h2
          class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[18px] lg:text-[1.875rem] font-medium text-white basis-0">
          Sổ tay bạch liên hoa lừa người
        </h2>
        <p class="gap-2.5 self-start mt-2 text-[14px] lg:text-[1.5rem] font-regular text-white">
          Thể loại: HE, hắc đạo
        </p>
        <p class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[12px] lg:text-[1.25rem] font-regular text-white basis-0 min-h-[5.5rem] max-h-[5.5rem]"
          style="line-clamp: 3; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">
          Chiều cuối hạ, cơn mưa bất chợt đổ xuống khu phố nhỏ, từng giọt nước
          rơi lộp độp trên mái tôn cũ kỹ, tạo nên bản nhạc quen thuộc mà An vẫn
          yêu thích từ bé. Cô đứng bên khung cửa sổ, tay cầm ly cà phê đã nguội
          lạnh, mắt nhìn xa xăm ra khoảng sân trước nhà, nơi những vũng nước lấp
          lánh phản chiếu ánh hoàng hôn nhạt nhòa. Chiều cuối hạ, cơn mưa bất chợt đổ xuống khu phố nhỏ, từng giọt nước
          rơi lộp độp trên mái tôn cũ kỹ, tạo nên bản nhạc quen thuộc mà An vẫn
          yêu thích từ bé. Cô đứng bên khung cửa sổ, tay cầm ly cà phê đã nguội
          lạnh, mắt nhìn xa xăm ra khoảng sân trước nhà, nơi những vũng nước lấp
          lánh phản chiếu ánh hoàng hôn nhạt nhòa.
        </p>
      </div>
    </article>
    <div
      class="flex relative z-10 gap-1.5 items-center justify-center self-center mt-[12px] mb-[30px] md:absolute md:bottom-[16px] md:mb-[12px] md:left-1/2 md:-translate-x-1/2"
      role="navigation" aria-label="Story carousel">
      <button class="flex shrink-0 self-stretch my-auto h-[8px] bg-[#8E98A8] rounded-full w-[9px]"
        aria-current="true"></button>
      <button class="flex shrink-0 self-stretch my-auto h-[8px] rounded-full bg-[#E7E4E4] w-[9px]"></button>
      <button class="flex shrink-0 self-stretch my-auto h-[8px] rounded-full bg-[#E7E4E4] w-[9px]"></button>
      <button class="flex shrink-0 self-stretch my-auto h-[8px] rounded-full bg-[#E7E4E4] w-[9px]"></button>
      <button class="flex shrink-0 self-stretch my-auto h-[8px] rounded-full bg-[#E7E4E4] w-[9px]"></button>
    </div>

  </section>

  <section class="relative z-10 pt-[17px] lg:pt-[34px] mt-0 w-full bg-white rounded-[20px]">
    <div class="flex flex-col w-full rounded-none">
      <!-- Tiêu đề -->
      <h2
        class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
        Truyện đề cử
      </h2>

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

    <section class="flex flex-col lg:flex-row gap-[2px] lg:gap-[12px] mt-[17px] lg:mt-[34px] w-full bg-orange-light">
      <!-- Mới cập nhật (8/12) -->
      <div class="w-full lg:w-8/12 bg-white pb-[17px] lg:pb-[34px]">
        <h2
          class="gap-2.5 self-start p-[10px] lg:px-[20px] mx-[17px] lg:mx-[34px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-[12px] inline-block">
          Mới cập nhật
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 mx-[17px] lg:mx-[34px] gap-6" role="list">
          <!-- 🔄 Story Card 1 -->
          <article class="flex gap-3 mt-[12px] lg:mt-[24px] items-end w-full lg:max-w-[38rem]" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/70123c7c239ebee31f002c0ecab392aa4d7d73bd7c93847b54030d562514fdae"
              alt="Story thumbnail" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
            <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
              <span
                class="gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <h3
                class="flex-1 shrink gap-2.5 self-stretch mt-[8px] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal lg:mt-[6px]">4</span>
              </div>
              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 20
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  10 tiếng trước
                </p>
              </div>

              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 19
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  2 ngày trước
                </p>
              </div>
            </div>
          </article>

          <!-- 🔄 Story Card 2 -->
          <article class="flex gap-3 mt-[12px] lg:mt-[24px] items-end w-full lg:max-w-[38rem]" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/70123c7c239ebee31f002c0ecab392aa4d7d73bd7c93847b54030d562514fdae"
              alt="Story thumbnail" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
            <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
              <span
                class="gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <h3
                class="flex-1 shrink gap-2.5 self-stretch mt-[8px] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal lg:mt-[6px]">4</span>
              </div>
              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 20
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  10 tiếng trước
                </p>
              </div>

              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 19
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  2 ngày trước
                </p>
              </div>
            </div>
          </article>

          <article class="flex gap-3 mt-[12px] lg:mt-[24px] items-end w-full lg:max-w-[38rem]" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/70123c7c239ebee31f002c0ecab392aa4d7d73bd7c93847b54030d562514fdae"
              alt="Story thumbnail" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
            <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
              <span
                class="gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <h3
                class="flex-1 shrink gap-2.5 self-stretch mt-[8px] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal lg:mt-[6px]">4</span>
              </div>
              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 20
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  10 tiếng trước
                </p>
              </div>

              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 19
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  2 ngày trước
                </p>
              </div>
            </div>
          </article>
          <article class="flex gap-3 mt-[12px] lg:mt-[24px] items-end w-full lg:max-w-[38rem]" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/70123c7c239ebee31f002c0ecab392aa4d7d73bd7c93847b54030d562514fdae"
              alt="Story thumbnail" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
            <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
              <span
                class="gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <h3
                class="flex-1 shrink gap-2.5 self-stretch mt-[8px] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal lg:mt-[6px]">4</span>
              </div>
              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 20
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  10 tiếng trước
                </p>
              </div>

              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 19
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  2 ngày trước
                </p>
              </div>
            </div>
          </article>
          <article class="flex gap-3 mt-[12px] lg:mt-[24px] items-end w-full lg:max-w-[38rem]" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/70123c7c239ebee31f002c0ecab392aa4d7d73bd7c93847b54030d562514fdae"
              alt="Story thumbnail" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
            <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
              <span
                class="gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <h3
                class="flex-1 shrink gap-2.5 self-stretch mt-[8px] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal lg:mt-[6px]">4</span>
              </div>
              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 20
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  10 tiếng trước
                </p>
              </div>

              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 19
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  2 ngày trước
                </p>
              </div>
            </div>
          </article>
          <article class="flex gap-3 mt-[12px] lg:mt-[24px] items-end w-full lg:max-w-[38rem]" role="listitem">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/70123c7c239ebee31f002c0ecab392aa4d7d73bd7c93847b54030d562514fdae"
              alt="Story thumbnail" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
            <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
              <span
                class="gap-2.5 self-start px-[2px] text-[12px] lg:text-[1.25rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <h3
                class="flex-1 shrink gap-2.5 self-stretch mt-[8px] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal lg:mt-[6px]">4</span>
              </div>
              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 20
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  10 tiếng trước
                </p>
              </div>

              <div class="flex justify-between items-center mt-[8px] mb-[-4px] w-full">
                <p class="text-[14px] lg:text-[1.5rem] text-red-normal text-regular">
                  Chương 19
                </p>
                <p class="text-[12px] lg:text-[1.25rem] text-red-normal text-regular">
                  2 ngày trước
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- Pagination -->
        <nav
          class="flex gap-[4px] lg:gap-[8px] self-center justify-center mt-5 text-base font-regular text-center text-red-normal whitespace-nowrap"
          aria-label="Pagination">
          <button
            class="self-stretch px-[2px] my-auto text-red-light text-medium text-[16px] lg:text-[1.875rem] bg-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]"
            aria-current="page">
            1
          </button>
          <button
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]">
            2
          </button>
          <button
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]">
            3
          </button>
          <span
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]">...</span>
          <button
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]">
            10
          </button>
          <button
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]">
            20
          </button>
          <button
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]">
            30
          </button>
          <span
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]">...</span>
          <button
            class="self-stretch px-[2px] my-auto bg-red-light text-medium text-[16px] lg:text-[1.875rem] text-red-normal rounded-[8px] aspect-[1/1] h-[30px] min-h-[30px] w-[30px]"
            aria-label="Next page">
            >
          </button>
        </nav>
      </div>

      <!-- 🌟 Nổi bật (4/12) -->
      <div class="w-full lg:w-4/12 bg-red-light bg-white px-[17px] lg:px-[34px] pt-[12px] lg:pt-[0]">
        <h2
          class="bg-red-light rounded-[12px] inline-block self-start p-[10px] lg:px-[20px] text-[18px] lg:text-[1.875rem] font-medium text-red-normal ">
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
          <article class="flex gap-3 items-center w-full mb-[12px] lg:mb-[24px]">
            <span
              class="gap-2.5 self-stretch my-auto w-[2rem] h-[2rem] text-[16px] lg:text-[1.25rem] font-medium text-center text-red-normal whitespace-nowrap rounded-[2px] border"
              style="border-color: #D56665 !important;">1</span>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb5b10fca047125b9225596f15a42d2b2fb7a3a9bcb118b51677934c02dbee35"
              alt="Trending story thumbnail"
              class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-[0.81] w-[84px] lg:w-[10rem]" />
            <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 min-w-60">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                Thể loại: HE, hắc đạo
              </p>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.25rem] text-red-normal basis-0">
                Số chữ: 24.7K
              </p>
            </div>
          </article>

          <article class="flex gap-3 items-center w-full mb-[12px] lg:mb-[24px]">
            <span
              class="gap-2.5 self-stretch my-auto w-[2rem] h-[2rem] text-[16px] lg:text-[1.25rem] font-medium text-center text-red-normal whitespace-nowrap rounded-[2px] border"
              style="border-color: #D56665 !important;">2</span>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb5b10fca047125b9225596f15a42d2b2fb7a3a9bcb118b51677934c02dbee35"
              alt="Trending story thumbnail"
              class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-[0.81] w-[84px] lg:w-[10rem]" />
            <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 min-w-60">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                Thể loại: HE, hắc đạo
              </p>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.25rem] text-red-normal basis-0">
                Số chữ: 24.7K
              </p>
            </div>
          </article>
          <article class="flex gap-3 items-center w-full mb-[12px] lg:mb-[24px]">
            <span
              class="gap-2.5 self-stretch my-auto w-[2rem] h-[2rem] text-[16px] lg:text-[1.25rem] font-medium text-center text-red-normal whitespace-nowrap rounded-[2px] border"
              style="border-color: #D56665 !important;">3</span>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb5b10fca047125b9225596f15a42d2b2fb7a3a9bcb118b51677934c02dbee35"
              alt="Trending story thumbnail"
              class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-[0.81] w-[84px] lg:w-[10rem]" />
            <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 min-w-60">
              <h3
                class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                Thiên quan tứ phúc
              </h3>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                Thể loại: HE, hắc đạo
              </p>
              <div class="flex gap-1 items-start self-start mt-[4px] ">
                <div class="flex items-start" aria-label="Rating: 4 out of 5">
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                  <span
                    class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.25rem] lg:h-[1.75rem] text-[16px] lg:text-[1.5rem]">★</span>
                </div>
                <span class="text-[12px] lg:text-[1.25rem] text-regular text-red-normal">4</span>
              </div>
              <p
                class="flex-1 shrink gap-2.5 self-stretch mt-2 w-full text-[16px] lg:text-[1.25rem] text-red-normal basis-0">
                Số chữ: 24.7K
              </p>
            </div>
          </article>
          <!-- Additional trending stories would follow the same pattern -->
        </div>
      </div>
    </section>

  </section>
</main>


<?php get_footer(); ?>