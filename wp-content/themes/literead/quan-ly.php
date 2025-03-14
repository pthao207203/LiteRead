<?php
/* Template Name: Manage Stories */
?>
<?php get_header(); ?>

<main class="flex flex-col bg-[#FFE5E1]">
  <div class="w-full max-md:max-w-full">
    <div class="flex md:gap-[1.25rem] max-md:flex-col">
      <!-- Sidebar Navigationx -->
      <?php include "sidebar.php"; ?>

      <!-- Main Content Area -->
      <section id="mainContent" class="md:w-10/12 flex-grow transition-all max-md:ml-0 max-md:w-full">
        <div class="grow w-full bg-white  max-md:max-w-full">
          <!-- Author Profile Section -->
          <section class="flex flex-col justify-center p-[2.25rem] w-full max-md:px-5 max-md:max-w-full">
            <h2
              class="self-center text-[1.25rem] md:text-[2rem] font-bold leading-none text-center text-red-dark uppercase max-md:max-w-full">
              Nguyệt hạ
            </h2>

            <!-- Author Stats -->
            <div class="mt-12 w-full max-md:mt-10 max-md:max-w-full">
              <div class="flex flex-wrap gap-3 justify-center items-center w-full font-medium max-md:max-w-full">
                <p
                  class="flex-1 shrink self-stretch my-auto text-[1rem] md:text-[1.75rem] leading-none text-red-dark basis-5 max-md:max-w-full">
                  14 Truyện
                </p>
                <button
                  class="gap-[0.625rem] self-stretch p-[0.625rem] my-auto text-[1rem] md:text-[1.75rem] font-medium text-orange-light bg-red-normal rounded-xl ">
                  Đăng truyện mới
                </button>
              </div>

              <div class="flex flex-wrap gap-3 items-start mt-3 w-full text-red-dark max-md:max-w-full">
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]">4</p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">
                    Truyện sáng tác
                  </h3>
                </article>
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]">0</p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">Truyện dịch</h3>
                </article>
              </div>

              <div class="flex flex-wrap gap-3 items-start mt-3 w-full text-red-dark max-md:max-w-full">
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]">120</p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">
                    Người theo dõi
                  </h3>
                </article>
                <article
                  class="flex flex-col flex-1 shrink justify-center gap-[1.25rem] p-[1.25rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  <p class="text-[1rem] md:text-[1.75rem]">66.6K</p>
                  <h3 class="text-[0.875rem] md:text-[1.5rem] font-semibold">Lượt đọc</h3>
                </article>
              </div>
            </div>

            <!-- Story Management Section -->
            <div class="mt-12 w-full text-[1rem] md:text-[1.75rem] max-md:mt-10 max-md:max-w-full">
              <!-- Tabs -->
              <div
                class="flex flex-wrap gap-[1.25rem] justify-center items-start w-full font-medium text-red-normal max-md:max-w-full">
                <button
                  class="flex-1 shrink gap-[0.625rem] self-stretch p-[0.625rem] text-orange-light bg-red-normal rounded-xl basis-0  max-md:max-w-full">
                  Đã duyệt
                </button>
                <button
                  class="flex-1 shrink gap-[0.625rem] self-stretch p-[0.625rem] bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  Chờ duyệt
                </button>
                <button
                  class="flex-1 shrink gap-[0.625rem] self-stretch p-[0.625rem] whitespace-nowrap bg-orange-light-hover rounded-xl basis-0  max-md:max-w-full">
                  Nháp
                </button>
              </div>

              <!-- Story Cards -->
              <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-[2.25rem] items-start mt-[1.5rem] w-full text-red-darker max-md:max-w-full">
                <!-- Story Card 1 -->
                <article
                  class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl shadow-lg  max-md:max-w-full">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/50cbfd8cdfc73f54a9f3f27033cf3182a841382fe95cc17c2dc9ebde4c3ada8a?placeholderIfAbsent=true"
                    class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                    alt="Thiên quan tứ phúc book cover" />
                  <div class="flex flex-col justify-center items-start w-80 ">
                    <h3 class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium">
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
                  class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl  shadow-[6px_6px_20px_rgba(255,229,225,0.6)] max-md:max-w-full">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/9565f21a3af9e9049bd5c613dff50884de1cfb3afe6e748115db2dada2e14123?placeholderIfAbsent=true"
                    class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                    alt="Thiên quan tứ phúc book cover" />
                  <div class="flex flex-col justify-center items-start w-80 ">
                    <h3 class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium">
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
                  class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl  shadow-[6px_6px_20px_rgba(255,229,225,0.6)] max-md:max-w-full">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/7a4802fa00c22a125656b209ac0dd071fdb696791e0e5129c3e96a1a79de15ff?placeholderIfAbsent=true"
                    class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                    alt="Thiên quan tứ phúc book cover" />
                  <div class="flex flex-col justify-center items-start w-80 ">
                    <h3 class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium">
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
                  class="flex  grow shrink gap-6 items-start p-[1.25rem] bg-white rounded-2xl  shadow-[6px_6px_20px_rgba(255,229,225,0.6)] max-md:max-w-full">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/103bf3aa31034bd4a5ed1d2543b64cba/0e6118aa7734882da930c8db943db7e2da7752ff7c377a9121548d66f180a3ff?placeholderIfAbsent=true"
                    class="object-contain rounded-2xl aspect-[0.72] max-h-[23rem] md:w-[16.625rem] w-1/3"
                    alt="Thiên quan tứ phúc book cover" />
                  <div class="flex flex-col justify-center items-start w-80 ">
                    <h3 class="gap-[0.625rem] self-stretch w-full text-[1rem] md:text-[1.75rem] font-medium">
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
              <h2
                class="gap-[0.625rem] self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[1.125rem] lg:text-[1.875rem] font-medium text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
                Truyện đề cử
              </h2>

              <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
              <?php include "de-cu.php"; ?>
            </div>
          </section>

        </div>
      </section>
    </div>
  </div>
</main>

<?php get_footer(); ?>