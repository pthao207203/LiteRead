<?php
/* Template Name: Manage Stories */
?>

<?php get_header(); ?>

<main class="flex flex-col bg-[#FFE5E1]">
    <div class="w-full max-w-[1828px] max-md:max-w-full">
        <div class="flex gap-[1.25rem] max-md:flex-col">
          <!-- Sidebar Navigation -->
          <aside class="w-2/12 max-md:ml-0 max-md:w-full">
            <nav
              class="flex flex-col py-[1.25rem] mx-auto w-full bg-red-normal shadow-lg min-h-[912px] max-md:mt-5"
            >
              <ul
                class="flex-1 w-full text-[0.875rem] md:text-[1.5rem] font-medium leading-none text-orange-light"
              >
                <li>
                  <a
                    href="#"
                    class="flex gap-6 items-center px-[1.25rem] py-[1.25rem] w-full border-l-2 border-red-400 min-h-[78px]"
                  >
                    <span
                      class="flex shrink-0 self-stretch my-auto h-[30px] w-[30px]"
                    ></span>
                    <span
                      class="flex-1 shrink gap-[0.625rem] self-stretch my-auto basis-0"
                    >
                      Tổng quan
                    </span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="flex gap-6 items-center px-[1.25rem] py-[1.25rem] w-full border-l-2 border-red-400 min-h-[78px]"
                  >
                    <span
                      class="flex shrink-0 self-stretch my-auto h-[30px] w-[30px]"
                    ></span>
                    <span
                      class="flex-1 shrink gap-[0.625rem] self-stretch my-auto basis-0"
                    >
                      Truyện đã lưu
                    </span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="flex overflow-hidden gap-6 items-center px-[1.25rem] py-[1.25rem] w-full text-red-normal bg-orange-light-hover border-l-2 border-red-400 min-h-[77px]"
                  >
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/c5eed1176e40482f5d5aacff3a8462e8cfdf03f9f69ce2ad8e4411e84e915ece?placeholderIfAbsent=true"
                      class="object-contain shrink-0 self-stretch my-auto aspect-square w-[30px]"
                      alt="Quản lý truyện icon"
                    />
                    <span
                      class="flex-1 shrink gap-[0.625rem] self-stretch my-auto basis-0"
                    >
                      Quản lý truyện
                    </span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="flex gap-6 items-center px-[1.25rem] py-[1.25rem] w-full border-l-2 border-red-400 min-h-[78px]"
                  >
                    <span
                      class="flex shrink-0 self-stretch my-auto h-[30px] w-[30px]"
                    ></span>
                    <span
                      class="flex-1 shrink gap-[0.625rem] self-stretch my-auto basis-0"
                    >
                      Ví của tôi
                    </span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="flex gap-6 items-center px-[1.25rem] py-[1.25rem] w-full border-l-2 border-red-400 min-h-[77px]"
                  >
                    <span
                      class="flex shrink-0 self-stretch my-auto h-[30px] w-[30px]"
                    ></span>
                    <span
                      class="flex-1 shrink gap-[0.625rem] self-stretch my-auto basis-0"
                    >
                      Thông báo
                    </span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="flex gap-6 items-center px-[1.25rem] py-[1.25rem] w-full border-l-2 border-red-400 min-h-[78px]"
                  >
                    <span
                      class="flex shrink-0 self-stretch my-auto h-[30px] w-[30px]"
                    ></span>
                    <span
                      class="flex-1 shrink gap-[0.625rem] self-stretch my-auto basis-0"
                    >
                      Điều khoản
                    </span>
                  </a>
                </li>
              </ul>
              <button
                class="gap-[0.625rem] self-center px-14 py-2.5 mt-7 text-[1rem] md:text-[1.75rem] text-center text-red-normal bg-orange-light-hover rounded-xl min-h-[54px] max-md:px-5"
              >
                Đăng xuất
              </button>
            </nav>
          </aside>

          <!-- Main Content Area -->
          <section class="w-10/12 max-md:ml-0 max-md:w-full">
            <div class="grow w-full bg-white max-md:mt-5 max-md:max-w-full">
              <!-- Author Profile Section -->
              <section
                class="flex flex-col justify-center p-[2.25rem] w-full max-md:px-5 max-md:max-w-full"
              >
                <h2
                  class="self-center text-[1.25rem] md:text-[2rem] font-bold leading-none text-center text-red-dark uppercase max-md:max-w-full"
                >
                  Nguyệt hạ
                </h2>

                <!-- Author Stats -->
                <div class="mt-12 w-full max-md:mt-10 max-md:max-w-full">
                  <div
                    class="flex flex-wrap gap-3 justify-center items-center w-full font-medium max-md:max-w-full"
                  >
                    <p
                      class="flex-1 shrink self-stretch my-auto text-[1rem] md:text-[1.75rem] leading-none text-red-dark basis-5 max-md:max-w-full"
                    >
                      14 Truyện
                    </p>
                    <button
                      class="gap-[0.625rem] self-stretch p-[0.625rem] my-auto text-[1rem] md:text-[1.75rem] font-medium text-orange-light bg-red-normal rounded-xl "
                    >
                      Đăng truyện mới
                    </button>
                  </div>

                  <div
                    class="flex flex-wrap gap-3 items-start mt-3 w-full text-red-dark max-md:max-w-full"
                  >
                    <article
                      class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full"
                    >
                      <p class="text-[1rem] md:text-[1.75rem]">4</p>
                      <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">
                        Truyện sáng tác
                      </h3>
                    </article>
                    <article
                      class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full"
                    >
                      <p class="text-[1rem] md:text-[1.75rem]">0</p>
                      <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">Truyện dịch</h3>
                    </article>
                  </div>

                  <div
                    class="flex flex-wrap gap-3 items-start mt-3 w-full text-red-dark max-md:max-w-full"
                  >
                    <article
                      class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full"
                    >
                      <p class="text-[1rem] md:text-[1.75rem]">120</p>
                      <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">
                        Người theo dõi
                      </h3>
                    </article>
                    <article
                      class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full"
                    >
                      <p class="text-[1rem] md:text-[1.75rem]">66.6K</p>
                      <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">Lượt đọc</h3>
                    </article>
                  </div>
                </div>

                <!-- Story Management Section -->
                <div
                  class="mt-12 w-full text-[1rem] md:text-[1.75rem] max-md:mt-10 max-md:max-w-full"
                >
                  <!-- Tabs -->
                  <div
                    class="flex flex-wrap gap-[1.25rem] justify-center items-start w-full font-medium text-red-normal max-md:max-w-full"
                  >
                    <button
                      class="flex-1 shrink gap-[0.625rem] self-stretch p-[0.625rem] text-orange-light bg-red-normal rounded-xl basis-0  max-md:max-w-full"
                    >
                      Đã duyệt
                    </button>
                    <button
                      class="flex-1 shrink gap-[0.625rem] self-stretch p-[0.625rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full"
                    >
                      Chờ duyệt
                    </button>
                    <button
                      class="flex-1 shrink gap-[0.625rem] self-stretch p-[0.625rem] whitespace-nowrap bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full"
                    >
                      Nháp
                    </button>
                  </div>

                  <!-- Story Cards -->
                  <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-[2.25rem] items-start mt-[1.5rem] w-full text-red-darker max-md:max-w-full"
                  >
                    <!-- Story Card 1 -->
                    <article
                      class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl shadow-lg  max-md:max-w-full"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/50cbfd8cdfc73f54a9f3f27033cf3182a841382fe95cc17c2dc9ebde4c3ada8a?placeholderIfAbsent=true"
                        class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                        alt="Thiên quan tứ phúc book cover"
                      />
                      <div
                        class="flex flex-col justify-center items-start w-80 "
                      >
                        <h3
                          class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium"
                        >
                          Thiên quan tứ phúc
                        </h3>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chữ: 24.7K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Trạng thái:
                          <span class="font-semibold">Đã duyệt</span>
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Thể loại: Truyện dịch
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chương: 120</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Lượt đọc: 33.3k</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Yêu thích: 12K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Bình luận: 200</p>
                      </div>
                    </article>

                    <!-- Story Card 2 -->
                    <article
                      class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl  shadow-[6px_6px_20px_rgba(255,229,225,0.6)] max-md:max-w-full"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/9565f21a3af9e9049bd5c613dff50884de1cfb3afe6e748115db2dada2e14123?placeholderIfAbsent=true"
                        class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                        alt="Thiên quan tứ phúc book cover"
                      />
                      <div
                        class="flex flex-col justify-center items-start w-80 "
                      >
                        <h3
                          class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium"
                        >
                          Thiên quan tứ phúc
                        </h3>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chữ: 24.7K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Trạng thái:
                          <span class="font-semibold">Đã duyệt</span>
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Thể loại: Truyện dịch
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chương: 120</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Lượt đọc: 33.3k</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Yêu thích: 12K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Bình luận: 200</p>
                      </div>
                    </article>

                    <!-- Story Card 3 -->
                    <article
                      class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl  shadow-[6px_6px_20px_rgba(255,229,225,0.6)] max-md:max-w-full"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/7a4802fa00c22a125656b209ac0dd071fdb696791e0e5129c3e96a1a79de15ff?placeholderIfAbsent=true"
                        class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                        alt="Thiên quan tứ phúc book cover"
                      />
                      <div
                        class="flex flex-col justify-center items-start w-80 "
                      >
                        <h3
                          class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium"
                        >
                          Thiên quan tứ phúc
                        </h3>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chữ: 24.7K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Trạng thái:
                          <span class="font-semibold">Đã duyệt</span>
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Thể loại: Truyện dịch
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chương: 120</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Lượt đọc: 33.3k</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Yêu thích: 12K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Bình luận: 200</p>
                      </div>
                    </article>

                    <!-- Story Card 4 -->
                    <article
                      class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl  shadow-[6px_6px_20px_rgba(255,229,225,0.6)] max-md:max-w-full"
                    >
                      <img
                        src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/0e6118aa7734882da930c8db943db7e2da7752ff7c377a9121548d66f180a3ff?placeholderIfAbsent=true"
                        class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                        alt="Thiên quan tứ phúc book cover"
                      />
                      <div
                        class="flex flex-col justify-center items-start w-80 "
                      >
                        <h3
                          class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium"
                        >
                          Thiên quan tứ phúc
                        </h3>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chữ: 24.7K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Trạng thái:
                          <span class="font-semibold">Đã duyệt</span>
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">
                          Thể loại: Truyện dịch
                        </p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Số chương: 120</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Lượt đọc: 33.3k</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Yêu thích: 12K</p>
                        <p class="gap-[0.625rem] self-stretch mt-[0.5rem]">Bình luận: 200</p>
                      </div>
                    </article>
                  </div>
                </div>
              </section>

            <!-- Recommended stories -->
            <section class="relative z-10 mt-0 w-full bg-white rounded-[20px]">
            <div class="flex flex-col w-full rounded-none">
            <h2 class="gap-[0.625rem] self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[1.125rem] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
                Truyện đề cử
            </h2>

            <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
            <div class="flex overflow-x-auto md:grid md:grid-cols-6 gap-4 md:gap-11 items-center p-4 pt-[14px] md:p-[34px] md:pt-[28px] bg-red-light scrollbar-thin scrollbar-thumb-red-normal scrollbar-track-red-light md:overflow-x-hidden" role="list">
                
            <!-- Story Cards (6 items) -->
            <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/2f2af36a820558f250245bf8cbfcf84ed537ec84ec142b2a6eee78e7e09985cc?placeholderIfAbsent=true" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
                <span class="gap-[0.625rem] self-start px-[2px] mt-[4px] md:my-[8px] text-[0.75rem] md:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
                <div class="flex flex-col mt-[4px] w-full">
                    <h3 class="flex-1 shrink gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                    Thiên Quan Tứ Phúc
                    </h3>
                    <div class="flex gap-1 items-start self-start mt-[4px] ">
                    <div class="flex items-start" aria-label="Rating: 4 out of 5">
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                    </div>
                    <span class="text-[0.75rem] md:text-[1.5rem] text-normal text-red-normal md:mt-1.5">4</span>
                    </div>
                    <p class="flex-1 shrink gap-[0.625rem] self-stretch mt-1 w-full text-[0.875rem] md:text-[1.5rem] text-normal text-red-normal basis-0">
                    Chương 120
                    </p>
                </div>
                </article>

                <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/9dd267289a0cb27a587fb07b7828d086b3fae63f129a511567a0ef797a0cc83e?placeholderIfAbsent=true" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
                <span class="gap-[0.625rem] self-start px-[2px] mt-[4px] md:my-[8px] text-[0.75rem] md:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
                <div class="flex flex-col mt-[4px] w-full">
                    <h3 class="flex-1 shrink gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                    Thiên Quan Tứ Phúc
                    </h3>
                    <div class="flex gap-1 items-start self-start mt-[4px] ">
                    <div class="flex items-start" aria-label="Rating: 4 out of 5">
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                    </div>
                    <span class="text-[0.75rem] md:text-[1.5rem] text-normal text-red-normal md:mt-[6px]">4</span>
                    </div>
                    <p class="flex-1 shrink gap-[0.625rem] self-stretch mt-1 w-full text-[0.875rem] md:text-[1.5rem] text-normal text-red-normal basis-0">
                    Chương 120
                    </p>
                </div>
                </article>

                <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/f4328ea808e2caa1543ca62e045986f9aa118826c92eb8c55c73ed952790d8d8?placeholderIfAbsent=true" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
                <span class="gap-[0.625rem] self-start px-[2px] mt-[4px] md:my-[8px] text-[0.75rem] md:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
                <div class="flex flex-col mt-[4px] w-full">
                    <h3 class="flex-1 shrink gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                    Thiên Quan Tứ Phúc
                    </h3>
                    <div class="flex gap-1 items-start self-start mt-[4px] ">
                    <div class="flex items-start" aria-label="Rating: 4 out of 5">
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                    </div>
                    <span class="text-[0.75rem] md:text-[1.5rem] text-normal text-red-normal md:mt-[6px]">4</span>
                    </div>
                    <p class="flex-1 shrink gap-[0.625rem] self-stretch mt-1 w-full text-[0.875rem] md:text-[1.5rem] text-normal text-red-normal basis-0">
                    Chương 120
                    </p>
                </div>
                </article>

                <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/b1809ff9ef1703155c59e3b83491fa28bd0ea26d794044d7fbb24ec732522af2?placeholderIfAbsent=true" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
                <span class="gap-[0.625rem] self-start px-[2px] mt-[4px] md:my-[8px] text-[0.75rem] md:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
                <div class="flex flex-col mt-[4px] w-full">
                    <h3 class="flex-1 shrink gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                    Thiên Quan Tứ Phúc
                    </h3>
                    <div class="flex gap-1 items-start self-start mt-[4px] ">
                    <div class="flex items-start" aria-label="Rating: 4 out of 5">
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                    </div>
                    <span class="text-[0.75rem] md:text-[1.5rem] text-normal text-red-normal md:mt-[6px]">4</span>
                    </div>
                    <p class="flex-1 shrink gap-[0.625rem] self-stretch mt-1 w-full text-[0.875rem] md:text-[1.5rem] text-normal text-red-normal basis-0">
                    Chương 120
                    </p>
                </div>
                </article>
                <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/fa1aab32ed4fdfed4b0b89542c9cf41b51378fc0234b82eaf6c095cc0fb135ea?placeholderIfAbsent=true" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
                <span class="gap-[0.625rem] self-start px-[2px] mt-[4px] md:my-[8px] text-[0.75rem] md:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
                <div class="flex flex-col mt-[4px] w-full">
                    <h3 class="flex-1 shrink gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                    Thiên Quan Tứ Phúc
                    </h3>
                    <div class="flex gap-1 items-start self-start mt-[4px] ">
                    <div class="flex items-start" aria-label="Rating: 4 out of 5">
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                    </div>
                    <span class="text-[0.75rem] md:text-[1.5rem] text-normal text-red-normal md:mt-[6px]">4</span>
                    </div>
                    <p class="flex-1 shrink gap-[0.625rem] self-stretch mt-1 w-full text-[0.875rem] md:text-[1.5rem] text-normal text-red-normal basis-0">
                    Chương 120
                    </p>
                </div>
                </article>
                <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 md:w-auto" role="listitem">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/86d511a8c6c88d2970d2c4095ab76500972346f71c79e0b75b8d14fd9940ee36?placeholderIfAbsent=true" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] md:w-full" />
                <span class="gap-[0.625rem] self-start px-[2px] mt-[4px] md:my-[8px] text-[0.75rem] md:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
                <div class="flex flex-col mt-[4px] w-full">
                    <h3 class="flex-1 shrink gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium basis-0 text-orange-darker break-words">
                    Thiên Quan Tứ Phúc
                    </h3>
                    <div class="flex gap-1 items-start self-start mt-[4px] ">
                    <div class="flex items-start" aria-label="Rating: 4 out of 5">
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                        <span class="text-[#FFC700] w-[1rem] h-[1rem] md:w-[1.75rem] md:h-[1.75rem] text-[1rem] md:text-[2rem]">★</span>
                    </div>
                    <span class="text-[0.75rem] md:text-[1.5rem] text-normal text-red-normal md:mt-[6px]">4</span>
                    </div>
                    <p class="flex-1 shrink gap-[0.625rem] self-stretch mt-1 w-full text-[0.875rem] md:text-[1.5rem] text-normal text-red-normal basis-0">
                    Chương 120
                    </p>
                </div>
                </article>
                
            </div>
            </div>
            </section>

            </div>
          </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>