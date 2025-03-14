<?php
/*template name: Saved Stories */
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
        class="transition-all gap-[0.75rem] w-full <?= ($isHome || $isSingleTruyen || $isMobile) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div class="flex flex-col justify-center p-[2.25rem] grow w-full bg-white  max-md:max-w-full">
          <header>
            <h1
              class="font-bold leading-none text-red-dark text-[20px] lg:text-[2rem] uppercase text-center max-md:max-w-full">
              Truyện đã thích
            </h1>

            <nav
              class="flex flex-wrap gap-[10px] items-start mt-[12px] lg:mt-[24px] w-full font-medium text-red-normal max-md:max-w-full"
              aria-label="Story filters">
              <button
                class="gap-2.5 self-stretch p-2.5 text-orange-light bg-red-normal text-[16px] lg:text-[1.75rem] rounded-xl"
                aria-current="page">
                Mới cập nhật
              </button>
              <button class="gap-2.5 self-stretch p-2.5 bg-orange-light-hover text-[16px] lg:text-[1.75rem] rounded-xl">
                Đã full
              </button>
            </nav>
          </header>

          <div class="mt-[12px] lg:mt-[24px] w-full max-md:max-w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[12px] lg:gap-[2.25rem] w-full  ">
              <!-- Story Cards -->
              <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/dc856669e14cfc9235a8d8326089d88b4938c1f787734b0722fd369985adc15f?placeholderIfAbsent=true&apiKey=02079658ccf1406d920515bd4a481c0d"
                  alt="Story cover" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12.5rem]" />
                <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                  <span
                    class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                    Full
                  </span>
                  <h2
                    class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                    Thiên quan tứ phúc
                  </h2>
                  <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
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
                    <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 120
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 10 tiếng trước </time>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 119
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 1 ngày trước </time>
                  </div>
                </div>
              </article>

              <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/a5baa9a8ed8d591fc625fe84584b50b21a017a67a3b76190c5879a7e376327b8?placeholderIfAbsent=true&apiKey=02079658ccf1406d920515bd4a481c0d"
                  alt="Story cover" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
                <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                  <span
                    class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                    Full
                  </span>
                  <h2
                    class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                    Thiên quan tứ phúc
                  </h2>
                  <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
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
                    <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 120
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 10 tiếng trước </time>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 119
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 1 ngày trước </time>
                  </div>
                </div>
              </article>
              <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/af07d19a358ed798f28cd005427dfe5f247df2766180c94eba463d4f97516c93?placeholderIfAbsent=true&apiKey=02079658ccf1406d920515bd4a481c0d"
                  alt="Story cover" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
                <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                  <span
                    class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                    Full
                  </span>
                  <h2
                    class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                    Thiên quan tứ phúc
                  </h2>
                  <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
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
                    <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 120
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 10 tiếng trước </time>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 119
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 1 ngày trước </time>
                  </div>
                </div>
              </article>
              <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/e2794de24afba10c682dd16f08a7e03091f0cead8a01bc67aec8a7ad9d14118d?placeholderIfAbsent=true&apiKey=02079658ccf1406d920515bd4a481c0d"
                  alt="Story cover" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
                <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                  <span
                    class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                    Full
                  </span>
                  <h2
                    class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                    Thiên quan tứ phúc
                  </h2>
                  <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
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
                    <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 120
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 10 tiếng trước </time>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 119
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 1 ngày trước </time>
                  </div>
                </div>
              </article>
              <article class="flex flex-wrap grow shrink gap-3 items-end min-w-60 w-full">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/dc856669e14cfc9235a8d8326089d88b4938c1f787734b0722fd369985adc15f?placeholderIfAbsent=true&apiKey=02079658ccf1406d920515bd4a481c0d"
                  alt="Story cover" class="object-contain shrink-0 rounded-lg aspect-[0.81] w-[121px] lg:w-[12,5rem]" />
                <div class="flex flex-col flex-1 shrink basis-0 min-w-60">
                  <span
                    class="gap-2.5 self-start px-[2px] font-medium text-[10px] lg:text-[1.25rem] text-orange-light whitespace-nowrap bg-red-normal rounded-sm">
                    Full
                  </span>
                  <h2
                    class="flex-1 shrink gap-2.5 self-stretch mt-[1rem] w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker">
                    Thiên quan tứ phúc
                  </h2>
                  <div class="flex gap-1 items-start self-start mt-[4px] mb-[-5px]">
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
                    <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 120
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 10 tiếng trước </time>
                  </div>
                  <div class="flex gap-2.5 justify-center items-center mt-[1rem] w-full text-red-dark">
                    <span class="flex-1 shrink self-stretch my-auto text-[14px] lg:text-[1.5rem] basis-0">
                      Chương 119
                    </span>
                    <time class="self-stretch my-auto text-[10px] lg:text-[1.25rem]"> 1 ngày trước </time>
                  </div>
                </div>
              </article>

            </div>
          </div>
        </div>

        <div class="flex flex-col w-full rounded-none bg-white">
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
            <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto"
              role="listitem">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
                alt="Thiên Quan Tứ Phúc book cover"
                class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
              <span
                class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <div class="flex flex-col mt-[4px] w-full">
                <h3
                  class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                  Thiên Quan Tứ Phúc
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
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                </div>
                <p
                  class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                  Chương 120
                </p>
              </div>
            </article>

            <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto"
              role="listitem">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
                alt="Thiên Quan Tứ Phúc book cover"
                class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
              <span
                class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <div class="flex flex-col mt-[4px] w-full">
                <h3
                  class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                  Thiên Quan Tứ Phúc
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
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                </div>
                <p
                  class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                  Chương 120
                </p>
              </div>
            </article>
            <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto"
              role="listitem">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
                alt="Thiên Quan Tứ Phúc book cover"
                class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
              <span
                class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <div class="flex flex-col mt-[4px] w-full">
                <h3
                  class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                  Thiên Quan Tứ Phúc
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
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                </div>
                <p
                  class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                  Chương 120
                </p>
              </div>
            </article>
            <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto"
              role="listitem">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
                alt="Thiên Quan Tứ Phúc book cover"
                class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
              <span
                class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <div class="flex flex-col mt-[4px] w-full">
                <h3
                  class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                  Thiên Quan Tứ Phúc
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
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                </div>
                <p
                  class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                  Chương 120
                </p>
              </div>
            </article>
            <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto"
              role="listitem">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
                alt="Thiên Quan Tứ Phúc book cover"
                class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
              <span
                class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <div class="flex flex-col mt-[4px] w-full">
                <h3
                  class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                  Thiên Quan Tứ Phúc
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
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                </div>
                <p
                  class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                  Chương 120
                </p>
              </div>
            </article>
            <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto"
              role="listitem">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a"
                alt="Thiên Quan Tứ Phúc book cover"
                class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
              <span
                class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
              <div class="flex flex-col mt-[4px] w-full">
                <h3
                  class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                  Thiên Quan Tứ Phúc
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
                  <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
                </div>
                <p
                  class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.5rem] text-regular text-red-normal basis-0">
                  Chương 120
                </p>
              </div>
            </article>

          </div>
        </div>
        <?php get_footer(); ?>
      </section>
    </div>
  </div>
</main>