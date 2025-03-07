<?php
/* Template Name: Wallet */
get_header(); 
?>

<main class="flex flex-col bg-[#FFE5E1]">
    <div class="w-full max-w-[1828px] max-md:max-w-full">
        <div class="flex gap-[1.25rem] max-md:flex-col">
  <!-- Sidebar -->
  <aside class="w-2/12 max-md:ml-0 max-md:w-full">
            <nav
              class="flex flex-col py-[1.25rem] mx-auto w-full bg-red-normal shadow-md min-h-[912px] max-md:mt-5">
              <ul
                class="flex-1 w-full text-[0.875rem] md:text-[1.5rem] font-medium leading-none text-orange-light">
                <li>
                  <a
                    href="#"
                    class="flex gap-6 items-center px-[1.25rem] py-[1.25rem] w-full border-l-2 border-red-400 min-h-[78px]">
                    <span
                      class="flex shrink-0 self-stretch my-auto h-[30px] w-[30px]"
                    ></span>
                    <span
                      class="flex-1 shrink gap-[0.625rem] self-stretch my-auto basis-0"
                    >Tổng quan
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
                    class="flex gap-6 items-center px-[1.25rem] py-[1.25rem] w-full border-l-2 border-red-400 min-h-[78px]"
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
                    class="flex overflow-hidden gap-6 items-center px-[1.25rem] py-[1.25rem] w-full text-red-normal bg-orange-light-hover border-l-2 border-red-400 min-h-[77px]"
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
                class="gap-[0.625rem] self-center px-14 py-2.5 mt-7 text-[1rem] md:text-[1.75rem] text-center text-red-normal bg-orange-light-hover rounded-xl min-h-[54px] max-md:px-5">
                Đăng xuất
              </button>
            </nav>
  </aside>
          <div class="flex flex-col w-[84%] max-md:ml-0 max-md:w-full">
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