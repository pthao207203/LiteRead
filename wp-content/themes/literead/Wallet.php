<?php
/* Template Name: Wallet */
get_header(); 
?>

<main class="flex flex-col bg-[#FFE5E1]">
    <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigation -->
      <?php get_sidebar(); ?>
      <section id="mainContent" class="md:w-10/12 md:ml-[1.25rem] bg-white flex-grow transition-all max-md:ml-0 max-md:w-full">
            <div class="flex flex-col grow w-full bg-white max-md:mt-5 max-md:max-w-full">
              <div class="flex flex-col justify-center items-start p-10 w-full max-md:px-6 max-md:max-w-full">
                <div class="flex flex-wrap gap-6 items-end self-stretch w-full font-medium text-[#A04D4C] max-md:max-w-full">
                  <img
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/bd0ca8d22fd36fd515ee44e1a303c09023fa4b73b118f2740f1c0ff31e6ea2d7?apiKey=6229360b683b4404b05897d272b93037&"
                    class="object-contain shrink-0 aspect-square w-[8.375rem]"
                    alt="User profile picture"/>
                  <div class="flex flex-col flex-1 shrink items-start basis-0 w-[15rem] max-md:max-w-full">
                    <div class="flex flex-col">
                      <div class="text-4xl">Lê Thị Dung</div>
                      <div class="mt-3 text-3xl opacity-60">cabietbay@gmail.com</div>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col mt-12 max-w-full text-4xl tracking-wide leading-none text-[#A04D4C] w-[394px] max-md:mt-10">
                  <div class="font-semibold">Tổng xu</div>
                  <div class="flex overflow-hidden flex-col justify-center py-4 mt-2 w-full font-medium whitespace-nowrap border-b border-solid border-b-[#A04D4C]">
                    <div class="ml-2 opacity-60">50.1K</div>
                  </div>
                </div>
                <form class="flex flex-col mt-12 max-w-full font-medium w-[708px] max-md:mt-10">
                  <label for="withdrawAmount" class="text-4xl font-semibold tracking-wide leading-none text-[#A04D4C] max-md:max-w-full">Rút xu
                  </label>
                  <div class="flex flex-wrap gap-2 items-start w-full whitespace-nowrap max-md:max-w-full">
                    <input
                      type="number"
                      id="withdrawAmount"
                      class="overflow-hidden flex-1 shrink px-2 py-4 text-3xl tracking-wide leading-none text-[#A04D4C] border-b border-solid border-b-[#A04D4C]  max-md:max-w-full"
                      placeholder="0000"
                      aria-label="Số xu muốn rút"/>
                    <button type="submit" class="ml-2 gap-2.5 w-[5.69rem] h-[4.56rem] self-stretch p-2.5 text-4xl text-[#FFF7F5] bg-[#D56665] rounded-xl">Rút
                    </button>
                  </div>
                  <div class="mt-4 text-2xl text-[#CD0800] max-md:max-w-full">
                    Tiền sẽ được thanh toán qua số điện thoại Momo của bạn!
                  </div>
                </form>
                <div class="flex flex-col mt-12 max-w-full text-4xl tracking-wide leading-none text-[#A04D4C] w-[708px] max-md:mt-10">
                  <div class="font-semibold max-md:max-w-full">
                    Lịch sử biến đổi
                  </div>
                  <div class="grid grid-cols-4 gap-4 mt-2 w-full font-medium">
                    <!-- Cột 1: SD trước -->
                    <div class="flex flex-col mt-3">
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        SD trước
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        50.060
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        50.060
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        50.060
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        50.060
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        50.060
                      </div>
                    </div>

                    <!-- Cột 2: Số lượng -->
                    <div class="flex flex-col mt-3">
                      <div class="px-2 py-3 border-b border-rose-600 text-[#A04D4C] opacity-60">
                        Số lượng
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 text-[#CD0800]">
                        - 5.550
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 text-[#088E00]">
                        +2.090
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 text-[#088E00]">
                        + 5.550
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 text-[#088E00]">
                        + 5.550
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 text-[#088E00]">
                        + 5.550
                      </div>
                    </div>

                    <!-- Cột 3: SD sau -->
                    <div class="flex flex-col mt-3">
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        SD sau
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        45.000
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        52.150
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        52.150
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        52.150
                      </div>
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        52.150
                      </div>
                    </div>

                    <!-- Cột 4: Thời gian -->
                    <div class="flex justify-between flex-1 flex-col w-[20rem] mt-3">
                      <div class="px-2 py-3 border-b border-rose-600 opacity-60">
                        Thời gian
                      </div>
                      <div class="flex px-2 py-3 border-b border-rose-600 opacity-60">
                        <span class="mr-3 text-[#A04D4C]">00:31</span> 2025/02/27
                      </div>
                      <div class="flex px-2 py-3 border-b border-rose-600 opacity-60">
                        <span class="mr-3 text-[#A04D4C]">00:31</span> 2025/02/27
                      </div>
                      <div class="flex px-2 py-3 border-b border-rose-600 opacity-60">
                        <span class="mr-3 text-[#A04D4C]">00:31</span> 2025/02/27
                      </div>
                      <div class="flex px-2 py-3 border-b border-rose-600 opacity-60">
                        <span class="mr-3 text-[#A04D4C]">00:31</span> 2025/02/27
                      </div>
                      <div class="flex px-2 py-3 border-b border-rose-600 opacity-60">
                        <span class="mr-3 text-[#A04D4C]">00:31</span> 2025/02/27
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</main>
<?php get_footer(); ?>