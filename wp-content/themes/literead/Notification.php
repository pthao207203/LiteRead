<?php
/* Template Name: Notification */
get_header();
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện

$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
echo '<script> console.log(' . $screen_width . ')</script>';
?>
<main class="relative flex flex-col mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigation -->
      <?php get_sidebar(); ?>
      <section id="mainContent"
        class="flex-grow transition-all w-full <?= ($isHome || $isSingleTruyen || $isMobile) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <header class="flex flex-col justify-center p-[2.125rem] w-full max-md:p-[1.0625rem] bg-white">
          <div class="flex items-start self-start gap-[0.5rem] text-[1.875rem] max-md:text-[1.125rem] font-medium">
            <h1
              class="self-stretch flex items-center justify-center px-[1.25rem] py-[0.625rem] text-red-normal bg-orange-light-hover rounded-[0.75rem]">
              Thông báo
            </h1>
            <button
              class="self-stretch p-[0.625rem] text-[#FBF6E3] font-medium whitespace-nowrap bg-red-normal rounded-[0.75rem]">
              Sửa
            </button>
          </div>

          <section class="w-full  max-md:max-w-full">
            <article
              class=" mt-[1.5rem] max-md:mt-[0.75rem] text-red-dark p-[2.125rem] w-full max-md:p-[1.0625rem] bg-orange-light-hover rounded-[1rem] border-b border-t border-r border-l border-solid border-red-normal max-md:max-w-full">
              <h2 class="text-[1.75rem] max-md:text-[1rem] font-semibold leading-none max-md:max-w-full">
                Báo cáo, trả xu đọc truyện ngày 28-02-2025
              </h2>
              <p class="mt-[1rem] text-[1.25rem] max-md:text-[0.875rem]  font-medium leading-7 max-md:max-w-full">
                Bạn vừa nhận được 2.240xu với 224 lượt đọc.<br />
                Trân trọng, <br />
                Một xu <br />
              </p>
              <time class="mt-[1rem] text-[1.375rem] max-md:text-[0.75rem] leading-tight block max-md:max-w-full">
                15 ngày trước
              </time>
            </article>

            <article
              class=" mt-[1.5rem] max-md:mt-[0.75rem] text-red-darker p-[2.125rem] w-full max-md:p-[1.0625rem] bg-none rounded-[1rem] border-b border-t border-r border-l border-solid border-red-normal max-md:max-w-full">
              <h2 class="text-[1.75rem] max-md:text-[1rem] font-semibold leading-none max-md:max-w-full">
                Thông báo bảo trì.
              </h2>
              <p class="mt-[1rem] text-[1.25rem] max-md:text-[0.875rem] font-medium leading-7 max-md:max-w-full">
                Chúng tôi tiến hành bảo trì nâng cấp hệ thống. Thời gian dự kiến 2h-3h
                ngày 14/2/2025. Xin cảm ơn.
              </p>
              <time class="mt-[1rem] text-[1.375rem] max-md:text-[0.75rem] leading-tight block max-md:max-w-full">
                15 ngày trước
              </time>
            </article>

            <article
              class=" mt-[1.5rem] max-md:mt-[0.75rem] text-red-darker p-[2.125rem] w-full max-md:p-[1.0625rem] bg-none rounded-[1rem] border-b border-t border-r border-l border-solid border-red-normal max-md:max-w-full">
              <h2 class="text-[1.75rem] max-md:text-[1rem] font-semibold leading-none max-md:max-w-full">
                Bạn có cmt mới!
              </h2>
              <p class="mt-[1rem] text-[1.25rem] max-md:text-[0.875rem] font-medium leading-7 max-md:max-w-full">
                Khanh Ngu vừa cmt vào truyện mới của bạn!!
              </p>
              <time class="mt-[1rem] text-[1.375rem] max-md:text-[0.75rem] leading-tight block max-md:max-w-full">
                15 ngày trước
              </time>
            </article>

            <article
              class=" mt-[1.5rem] max-md:mt-[0.75rem] text-red-darker p-[2.125rem] w-full max-md:p-[1.0625rem] bg-none rounded-[1rem] border-b border-t border-r border-l border-solid border-red-normal max-md:max-w-full">
              <h2 class="text-[1.75rem] max-md:text-[1rem] font-semibold leading-none max-md:max-w-full">
                Báo cáo, trả xu đọc truyện ngày 28-02-2025
              </h2>
              <p class="mt-[1rem] text-[1.25rem] max-md:text-[0.875rem] font-medium leading-7 max-md:max-w-full">
                Bạn vừa nhận được 2.240xu với 224 lượt đọc.<br />
                Trân trọng, <br />
                Một xu <br />
              </p>
              <time class="mt-[1rem] text-[1.375rem] max-md:text-[0.75rem] leading-tight block max-md:max-w-full">
                15 ngày trước
              </time>
            </article>

            <article
              class=" mt-[1.5rem] max-md:mt-[0.75rem] text-red-darker p-[2.125rem] w-full max-md:p-[1.0625rem] bg-none rounded-[1rem] border-b border-t border-r border-l border-solid border-red-normal max-md:max-w-full">
              <h2 class="text-[1.75rem] max-md:text-[1rem] font-semibold leading-none max-md:max-w-full">
                Báo cáo, trả xu đọc truyện ngày 28-02-2025
              </h2>
              <p class="mt-[1rem] text-[1.25rem] max-md:text-[0.875rem] font-medium leading-7 max-md:max-w-full">
                Bạn vừa nhận được 2.240xu với 224 lượt đọc.<br />
                Trân trọng, <br />
                Một xu <br />
              </p>
              <time class="mt-[1rem] text-[1.375rem] max-md:text-[0.75rem] leading-tight block max-md:max-w-full">
                15 ngày trước
              </time>
            </article>
          </section>
        </header>
      </section>
    </div>
  </div>
</main>