<?php
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false || strpos($_SERVER['REQUEST_URI'], '/trang-ca-nhan/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;
if (!$isHome && !$isSingleTruyen) {
  $current_path = trim(parse_url(home_url($wp->request), PHP_URL_PATH), '/');
  $slug_parts = explode('/', $current_path);
  $current_slug = $slug_parts[1];
}
$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
echo '<script>console.log(' . $screen_width . ')</script>';

$is_logged_in = isset($_COOKIE['signup_token']);

$users_literead = $wpdb->prefix . "users_literead";
if (isset($_COOKIE['signup_token'])) {
  $user = $wpdb->get_row($wpdb->prepare("SELECT type FROM $users_literead WHERE token = %s", $_COOKIE['signup_token']), ARRAY_A);
}
?>

<aside id="sidebar" class="z-[60] overflow-y-auto font-medium max-sm:text-[1rem] md:text-[1.5rem] transition-all duration-200 ease-in-out bg-[#FFE5E1]
  <?php
  if ($isMobile) {
    echo '-translate-x-full fixed top-[4.425rem] left-0';
  } elseif ($isHome || $isSingleTruyen || $isAuthPage) {
    echo 'hidden fixed top-[4.425rem] left-0';
  } else {
    echo 'w-auto fixed top-[4.425rem] left-0';
  }
  ?>">
  <?php if ($is_logged_in): ?>
    <nav
      class="flex flex-col justify-between py-[1.25rem] md:min-h-[calc(100vh-4.425rem)] bg-red-normal shadow-lg mx-auto">
      <ul class="flex flex-col flex-1 w-full font-medium leading-none text-orange-light">
        <li>
          <button data-id="<?= home_url('/tong-quan'); ?>" onclick="handleSidebarClick(this)"
            class="sidebar-button flex w-full items-center  md:p-5 p-[0.75rem] gap-6 border-l-2 border-solid border-l-red-normal transition-all cursor-pointer
           hover:bg-orange-light hover:text-red-normal <?= (!$isHome && !$isSingleTruyen && $current_slug === 'tong-quan') ? 'bg-orange-light text-red-normal' : '' ?>">
            <div>
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-[1.875rem] h-[1.875rem] transition-all hover:stroke-red-normal active:stroke-red-normal ">
                <path
                  d="M15.1499 15.9751C15.0624 15.9626 14.9499 15.9626 14.8499 15.9751C12.6499 15.9001 10.8999 14.1001 10.8999 11.8876C10.8999 9.6251 12.7249 7.7876 14.9999 7.7876C17.2624 7.7876 19.0999 9.6251 19.0999 11.8876C19.0874 14.1001 17.3499 15.9001 15.1499 15.9751Z"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M23.4249 24.2252C21.1999 26.2627 18.2499 27.5002 15 27.5002C11.75 27.5002 8.79995 26.2627 6.57495 24.2252C6.69995 23.0502 7.44995 21.9002 8.78745 21.0002C12.2125 18.7252 17.8124 18.7252 21.2124 21.0002C22.5499 21.9002 23.2999 23.0502 23.4249 24.2252Z"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M15 27.5C21.9036 27.5 27.5 21.9036 27.5 15C27.5 8.09644 21.9036 2.5 15 2.5C8.09644 2.5 2.5 8.09644 2.5 15C2.5 21.9036 8.09644 27.5 15 27.5Z"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </div>
            <span class="text-[##FFF7F5] max-sm:text-[1rem] md:text-[1.5rem] text-left">Tổng quan</span>
          </button>
        </li>
        <li>
          <button data-id="<?= home_url('/truyen-da-thich'); ?>" onclick="handleSidebarClick(this)"
            class="sidebar-button flex w-full items-center  md:p-5 p-[0.75rem] gap-6 border-l-2 border-solid border-l-red-normal transition-all cursor-pointer
            hover:bg-orange-light hover:text-red-normal <?= (!$isHome && !$isSingleTruyen && $current_slug === 'truyen-da-thich') ? 'bg-orange-light text-red-normal' : '' ?>">
            <div>
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-[1.875rem] h-[1.875rem] transition-all hover:stroke-red-normal active:stroke-red-normal ">
                <path
                  d="M11.25 27.5H18.75C25 27.5 27.5 25 27.5 18.75V11.25C27.5 5 25 2.5 18.75 2.5H11.25C5 2.5 2.5 5 2.5 11.25V18.75C2.5 25 5 27.5 11.25 27.5Z"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M22.9749 19.0875V9.47505C22.9749 8.51255 22.1999 7.81256 21.2499 7.88756H21.1999C19.5249 8.02506 16.9874 8.88757 15.5624 9.77507L15.4249 9.86258C15.1999 10.0001 14.8124 10.0001 14.5749 9.86258L14.3749 9.73757C12.9624 8.85007 10.4249 8.01255 8.74991 7.87505C7.79991 7.80005 7.0249 8.51257 7.0249 9.46257V19.0875C7.0249 19.85 7.64988 20.5751 8.41238 20.6626L8.63737 20.7001C10.3624 20.9251 13.0374 21.8126 14.5624 22.6501L14.5999 22.6626C14.8124 22.7876 15.1624 22.7876 15.3624 22.6626C16.8874 21.8126 19.5749 20.9376 21.3124 20.7001L21.5749 20.6626C22.3499 20.5751 22.9749 19.8625 22.9749 19.0875Z"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M15 10.125V22.075" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"></path>
              </svg>
            </div>
            <span class="text-[##FFF7F5] max-sm:text-[1rem] md:text-[1.5rem] text-left">Truyện đã thích</span>
          </button>
        </li>
        <?php if (isset($user) && $user['type'] == 1) {
          ?>
          <li>
            <button data-id="<?= home_url('/quan-ly-truyen'); ?>" onclick="handleSidebarClick(this)"
              class="sidebar-button flex w-full items-center  md:p-5 p-[0.75rem] gap-6 border-l-2 border-solid border-l-red-normal transition-all cursor-pointer
       hover:bg-orange-light hover:text-red-normal <?= (!$isHome && !$isSingleTruyen && $current_slug === 'quan-ly-truyen') ? 'bg-orange-light text-red-normal' : '' ?>">
              <div>
                <svg width="30" height="30" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                  class="w-[1.875rem] h-[1.875rem] transition-all hover:stroke-red-normal active:stroke-red-normal ">
                  <g clip-path="url(#clip0_797_2468)">
                    <path
                      d="M13.7124 3H11.2124C4.9624 3 2.4624 5.5 2.4624 11.75V19.25C2.4624 25.5 4.9624 28 11.2124 28H18.7124C24.9624 28 27.4624 25.5 27.4624 19.25V16.75"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                      d="M27.35 4.94979C25.8125 8.78729 21.95 14.0123 18.725 16.5998L16.75 18.1748C16.5 18.3623 16.25 18.5123 15.9625 18.6248C15.9625 18.4373 15.95 18.2498 15.925 18.0498C15.8125 17.2123 15.4375 16.4248 14.7625 15.7623C14.075 15.0748 13.25 14.6873 12.4 14.5748C12.2 14.5623 12 14.5498 11.8 14.5623C11.9125 14.2498 12.075 13.9623 12.2875 13.7248L13.8625 11.7498C16.45 8.52479 21.6875 4.63729 25.5125 3.09979C26.1 2.87479 26.675 3.04979 27.0375 3.41229C27.4125 3.78729 27.5875 4.36229 27.35 4.94979Z"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                      d="M15.9751 18.6126C15.9751 19.7126 15.5501 20.7626 14.7626 21.5626C14.1501 22.1751 13.3251 22.6001 12.3376 22.7251L9.87512 22.9876C8.53762 23.1376 7.38762 22.0001 7.53762 20.6376L7.80012 18.1751C8.03762 15.9876 9.86262 14.5876 11.8126 14.5501C12.0126 14.5376 12.2126 14.5501 12.4126 14.5626C13.2626 14.6751 14.0876 15.0626 14.7751 15.7501C15.4501 16.4251 15.8251 17.2001 15.9376 18.0376C15.9626 18.2376 15.9751 18.4376 15.9751 18.6126Z"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M19.7751 15.4748C19.7751 12.8623 17.6626 10.7373 15.0376 10.7373" stroke="currentColor"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_797_2468">
                      <rect width="30" height="30" fill="white" transform="translate(0 0.5)"></rect>
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <span class="text-[##FFF7F5] max-sm:text-[1rem] md:text-[1.5rem] text-left">Quản lý truyện</span>
            </button>
          </li>
          <li>
            <button data-id="<?= home_url('/vi-cua-toi'); ?>" onclick="handleSidebarClick(this)"
              class="sidebar-button flex w-full items-center  md:p-5 p-[0.75rem] gap-6 border-l-2 border-solid border-l-red-normal transition-all cursor-pointer
            hover:bg-orange-light hover:text-red-normal <?= (!$isHome && !$isSingleTruyen && $current_slug === 'vi-cua-toi') ? 'bg-orange-light text-red-normal' : '' ?>">
              <div>
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                  class="w-[1.875rem] h-[1.875rem] transition-all hover:stroke-red-normal active:stroke-red-normal ">
                  <path
                    d="M22.55 16.9375C22.025 17.45 21.725 18.1875 21.8 18.975C21.9125 20.325 23.15 21.3125 24.5 21.3125H26.875V22.8C26.875 25.3875 24.7625 27.5 22.175 27.5H7.825C5.2375 27.5 3.125 25.3875 3.125 22.8V14.3875C3.125 11.8 5.2375 9.6875 7.825 9.6875H22.175C24.7625 9.6875 26.875 11.8 26.875 14.3875V16.1875H24.35C23.65 16.1875 23.0125 16.4625 22.55 16.9375Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path
                    d="M3.125 15.5126V9.80019C3.125 8.31269 4.0375 6.98764 5.425 6.46264L15.35 2.71264C16.9 2.12514 18.5625 3.27517 18.5625 4.93767V9.68766"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path
                    d="M28.1985 17.4624V20.0375C28.1985 20.725 27.6485 21.2875 26.9485 21.3125H24.4985C23.1485 21.3125 21.911 20.325 21.7985 18.975C21.7235 18.1875 22.0235 17.45 22.5485 16.9375C23.011 16.4625 23.6485 16.1875 24.3485 16.1875H26.9485C27.6485 16.2125 28.1985 16.7749 28.1985 17.4624Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M8.75 15H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                </svg>
              </div>
              <span class="text-[##FFF7F5] max-sm:text-[1rem] md:text-[1.5rem] text-left">Ví của tôi</span>
            </button>
          </li>
          <?php
        } ?>
        <li>
          <button data-id="<?= home_url('/thong-bao'); ?>" onclick="handleSidebarClick(this)"
            class="sidebar-button flex w-full items-center  md:p-5 p-[0.75rem] gap-6 border-l-2 border-solid border-l-red-normal transition-all cursor-pointer
            hover:bg-orange-light hover:text-red-normal <?= (!$isHome && !$isSingleTruyen && $current_slug === 'thong-bao') ? 'bg-orange-light text-red-normal' : '' ?>">
            <div>
              <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-[1.875rem] h-[1.875rem] transition-all hover:stroke-red-normal active:stroke-red-normal ">
                <path
                  d="M15.025 4.1377C10.8875 4.1377 7.52499 7.5002 7.52499 11.6377V15.2502C7.52499 16.0127 7.19999 17.1752 6.81249 17.8252L5.37499 20.2127C4.48749 21.6877 5.09999 23.3252 6.72499 23.8752C12.1125 25.6752 17.925 25.6752 23.3125 23.8752C24.825 23.3752 25.4875 21.5877 24.6625 20.2127L23.225 17.8252C22.85 17.1752 22.525 16.0127 22.525 15.2502V11.6377C22.525 7.5127 19.15 4.1377 15.025 4.1377Z"
                  stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                <path
                  d="M17.3374 4.4998C16.9499 4.3873 16.5499 4.2998 16.1374 4.2498C14.9374 4.0998 13.7874 4.1873 12.7124 4.4998C13.0749 3.5748 13.9749 2.9248 15.0249 2.9248C16.0749 2.9248 16.9749 3.5748 17.3374 4.4998Z"
                  stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                  stroke-linejoin="round"></path>
                <path
                  d="M18.7749 24.3252C18.7749 26.3877 17.0874 28.0752 15.0249 28.0752C13.9999 28.0752 13.0499 27.6502 12.3749 26.9752C11.6999 26.3002 11.2749 25.3502 11.2749 24.3252"
                  stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
              </svg>
            </div>
            <span class="text-[##FFF7F5] max-sm:text-[1rem] md:text-[1.5rem] text-left">Thông báo</span>
          </button>
        </li>
        <li>
          <button data-id="<?= home_url('/dieu-khoan'); ?>" onclick="handleSidebarClick(this)"
            class="sidebar-button flex w-full items-center  md:p-5 p-[0.75rem] gap-6 border-l-2 border-solid border-l-red-normal transition-all cursor-pointer
            hover:bg-orange-light hover:text-red-normal <?= ($current_slug === 'dieu-khoan') ? 'bg-orange-light text-red-normal' : '' ?>">
            <div data-svg-wrapper>
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-[1.875rem] h-[1.875rem] transition-all hover:stroke-red-normal active:stroke-red-normal">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M7.8125 4.375C4.375 4.375 4.375 4.635 4.375 7.8125V7.84375C4.375 9.2275 4.375 10.2275 4.71375 10.65C5.045 11.06 6.02875 11.25 7.8125 11.25C9.59625 11.25 10.58 11.0588 10.9113 10.6488C11.25 10.2275 11.25 9.2275 11.25 7.8425C11.25 4.635 11.25 4.375 7.8125 4.375ZM7.8125 13.125C5.705 13.125 4.12375 12.9038 3.255 11.825C2.5 10.8888 2.5 9.61125 2.5 7.84375L3.4375 7.8125H2.5C2.5 4.225 2.72625 2.5 7.8125 2.5C12.8987 2.5 13.125 4.225 13.125 7.8125C13.125 9.61 13.125 10.8888 12.37 11.825C11.5013 12.9038 9.92 13.125 7.8125 13.125Z"
                  fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M21.5625 4.375C18.125 4.375 18.125 4.635 18.125 7.8125V7.84375C18.125 9.2275 18.125 10.2275 18.4637 10.65C18.795 11.06 19.7787 11.25 21.5625 11.25C23.3463 11.25 24.33 11.0588 24.6613 10.6488C25 10.2275 25 9.2275 25 7.8425C25 4.635 25 4.375 21.5625 4.375ZM21.5625 13.125C19.455 13.125 17.8737 12.9038 17.005 11.825C16.25 10.8888 16.25 9.61125 16.25 7.84375L17.1875 7.8125H16.25C16.25 4.225 16.4763 2.5 21.5625 2.5C26.6487 2.5 26.875 4.225 26.875 7.8125C26.875 9.61 26.875 10.8888 26.12 11.825C25.2513 12.9038 23.67 13.125 21.5625 13.125Z"
                  fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M7.8125 18.125C4.375 18.125 4.375 18.385 4.375 21.5625V21.5938C4.375 22.9775 4.375 23.9775 4.71375 24.4C5.045 24.81 6.02875 25 7.8125 25C9.59625 25 10.58 24.8088 10.9113 24.3988C11.25 23.9775 11.25 22.9775 11.25 21.5925C11.25 18.385 11.25 18.125 7.8125 18.125ZM7.8125 26.875C5.705 26.875 4.12375 26.6538 3.255 25.575C2.5 24.6388 2.5 23.3612 2.5 21.5938L3.4375 21.5625H2.5C2.5 17.975 2.72625 16.25 7.8125 16.25C12.8987 16.25 13.125 17.975 13.125 21.5625C13.125 23.36 13.125 24.6388 12.37 25.575C11.5013 26.6538 9.92 26.875 7.8125 26.875Z"
                  fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M21.5625 18.125C18.125 18.125 18.125 18.385 18.125 21.5625V21.5938C18.125 22.9775 18.125 23.9775 18.4637 24.4C18.795 24.81 19.7787 25 21.5625 25C23.3463 25 24.33 24.8088 24.6613 24.3988C25 23.9775 25 22.9775 25 21.5925C25 18.385 25 18.125 21.5625 18.125ZM21.5625 26.875C19.455 26.875 17.8737 26.6538 17.005 25.575C16.25 24.6388 16.25 23.3612 16.25 21.5938L17.1875 21.5625H16.25C16.25 17.975 16.4763 16.25 21.5625 16.25C26.6487 16.25 26.875 17.975 26.875 21.5625C26.875 23.36 26.875 24.6388 26.12 25.575C25.2513 26.6538 23.67 26.875 21.5625 26.875Z"
                  fill="currentColor" />
              </svg>
            </div>
            <span class="text-[##FFF7F5] max-sm:text-[1rem] md:text-[1.5rem] text-left">Điều khoản</span>
          </button>
        </li>
      </ul>
      <button onclick="window.location.href='?action=custom_logout'"
        class="flex px-[3.5rem] py-[0.625rem] m-[1rem] md:text-[1.75rem] max-sm:text-[1rem] text-center justify-center text-red-normal bg-orange-light rounded-xl cursor-pointer p-[0.75rem] max-sm:mx-1.5 max-sm:mt-24 max-sm:mb-2.5">
        Đăng xuất
      </button>
    </nav>
  <?php else: ?>
    <!-- Nếu chưa đăng nhập -->
    <nav
      class="flex flex-col justify-between py-[1.25rem] md:h-[calc(100vh-4.425rem)] h-[calc(50vh)] bg-red-normal shadow-lg mx-auto">
      <div class="flex flex-col flex-1 mx-[1.0625rem] font-medium leading-none text-orange-light gap-[1rem] w-auto">
        <button onclick="window.location.href='<?= home_url('/dang-nhap'); ?>'"
          class="flex px-[3.5rem] py-[0.625rem] md:text-[1.75rem] max-sm:text-[1rem] text-center justify-center text-red-normal bg-orange-light rounded-xl cursor-pointer  max-sm:mx-1.5">
          Đăng nhập
        </button>

        <button onclick="window.location.href='<?= home_url('/dang-ky'); ?>'"
          class="flex px-[3.5rem] py-[0.625rem] md:text-[1.75rem] max-sm:text-[1rem] text-center justify-center text-red-normal bg-orange-light rounded-xl cursor-pointer  max-sm:mx-1.5">
          Đăng ký
        </button>
      </div>
    </nav>
  <?php endif; ?>
</aside>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const openSidebarBtn = document.getElementById("openSidebarBtn");
    const mainContent = document.getElementById("mainContent");

    if (!openSidebarBtn || !sidebar || !mainContent) {
      console.error("Không tìm thấy sidebar, mainContent hoặc openSidebarBtn!");
      return;
    }

    let isHomeOrSingleTruyen = window.location.pathname === "/" ||
      window.location.pathname === "/LiteRead/" ||
      window.location.pathname.includes("/truyen/");

    function updateLayout() {
      const isMobile = window.innerWidth < 768;
      sidebar.classList.remove("w-auto", "w-0", "hidden", "translate-x-0", "-translate-x-full");
      mainContent.classList.remove("pl-0", "pl-[19.5rem]");

      if (isMobile) {
        sidebar.classList.add("-translate-x-full");
        mainContent.classList.add("pl-0");
      } else if (isHomeOrSingleTruyen) {
        sidebar.classList.add("hidden");
        sidebar.classList.add("w-auto");
        mainContent.classList.add("pl-0");
      } else {
        sidebar.classList.add("w-auto");
        mainContent.classList.add("pl-[19.5rem]");
      }
    }

    // Setup ban đầu
    updateLayout();

    // Lắng nghe khi resize
    window.addEventListener("resize", () => {
      updateLayout();
    });

    openSidebarBtn.addEventListener("click", () => {
      const isMobile = window.innerWidth < 768;
      if (isMobile) {
        sidebar.classList.toggle("-translate-x-full");
        sidebar.classList.toggle("translate-x-0");
      } else if (isHomeOrSingleTruyen) {
        sidebar.classList.toggle("hidden");
      } else {
        sidebar.classList.toggle("w-0");
        sidebar.classList.toggle("w-auto");
      }

      // Cập nhật mainContent khi toggle
      if (!isHomeOrSingleTruyen && !isMobile) {
        if (sidebar.classList.contains("w-auto")) {
          mainContent.classList.remove("pl-0");
          mainContent.classList.add("pl-[19.5rem]");
        } else {
          mainContent.classList.remove("pl-[19.5rem]");
          mainContent.classList.add("pl-0");
        }
      }
    });

    // Đóng sidebar mobile khi click ra ngoài
    window.addEventListener("click", (e) => {
      const isMobile = window.innerWidth < 768;
      if (isMobile && !sidebar.contains(e.target) && !openSidebarBtn.contains(e.target)) {
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.remove("translate-x-0");
      }
    }, { passive: true });
  });


  // Xử lý khi nhấn vào button trong sidebar
  function handleSidebarClick(button) {
    const url = button.getAttribute("data-id"); // Lấy URL từ data-id của button
    console.log("Navigating to:", url);

    // Lưu trạng thái active vào localStorage
    localStorage.setItem('activeSidebarButton', url);

    // Xóa trạng thái active khỏi tất cả các nút khác
    document.querySelectorAll('.sidebar-button').forEach(btn => {
      btn.classList.remove('bg-orange-light', 'text-red-normal');
    });

    // Đánh dấu nút hiện tại là active
    button.classList.add('bg-orange-light', 'text-red-normal');

    // Chuyển hướng nếu có URL hợp lệ
    if (url) {
      window.location.href = url;
    } else {
      console.error("Page URL is missing!");
    }
  }

  // Khi tải lại trang, kiểm tra trạng thái active từ localStorage
  window.addEventListener('load', () => {
    const activeUrl = localStorage.getItem('activeSidebarButton');

    // Lấy phần sau home_url của URL hiện tại
    const baseUrl = window.location.origin + "/LiteRead/";  // Điều chỉnh nếu home_url khác
    const currentPath = window.location.href.replace(baseUrl, "").split("/")[0]; // Lấy phần đầu tiên của path
    console.log("Current Path:", currentPath);
    console.log("Active URL from LocalStorage:", activeUrl);

    document.querySelectorAll('.sidebar-button').forEach(button => {
      const buttonPath = button.getAttribute("data-id").replace(baseUrl, "").split("/")[0]; // Tương tự xử lý
      console.log("Comparing:", buttonPath, "vs", currentPath);

      // Nếu buttonPath trùng với currentPath, đặt trạng thái active
      // if (buttonPath === currentPath) {
      //   button.classList.add('bg-orange-light', 'text-red-normal');

      //   // Cập nhật LocalStorage với URL thực tế để đồng bộ trạng thái
      //   localStorage.setItem('activeSidebarButton', button.getAttribute("data-id"));
      // }
    });
  });

  document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('logout') === '1') {
      alert('Đăng xuất thành công!');
      urlParams.delete('logout'); // Xóa param sau khi hiển thị alert

      // Cập nhật URL mà không reload
      const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
      window.history.replaceState({}, document.title, newUrl);
    }
  });

</script>