<?php
/* Template Name: Login */
if (isset($_COOKIE['signup_token'])) {
  wp_redirect(home_url('/'));
  exit;
}
ob_start();
get_header();

global $wpdb;
$users_literead = $wpdb->prefix . 'users_literead';

$error_message = "";
$user_data = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $emailOrPhone = ($_POST['emailOrPhone']);
  $password = ($_POST['password']);
  // echo "<script>console.log('".$emailOrPhone."');</script>";

  // Lấy thông tin người dùng từ database
  $user = $wpdb->get_row($wpdb->prepare(
    "SELECT * FROM $users_literead WHERE email = %s OR phone = %s",
    $emailOrPhone,
    $emailOrPhone
  ));
  //echo "<script>console.log('".$user->password."');</script>";

  // echo "<script>window.alert(".$emailOrPhone.")</script>";

  if ($user) {
    // Kiểm tra mật khẩu
    // echo "<script>console.log('Password nhập vào: " . $password . "');</script>";
    //echo "<script>console.log('Password trong DB: " . $user->password . "');</script>";
    if (wp_check_password($password, $user->password)) {
      // Đăng nhập thành công, lấy thông tin người dùng để hiển thị
      $user_data = [
        'user_name' => $user->user_name,
        'email' => $user->email,
        //'full_name' => $user->full_name
      ];
      // echo "<script>console.log('Do');</script>";

      setcookie("signup_token", $user->token, time() + (7 * 24 * 60 * 60), "/", "", false, true);

      wp_redirect(home_url('/'));
    } else {
      //echo "<script>console.log('loi');</script>";
      $error_message2 = "Mật khẩu không đúng.";
    }
  } else {
    $error_message = "Email hoặc số điện thoại không tồn tại.";
  }
}
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;

$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
?>

<main class="relative flex flex-col mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigationx -->
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
      <section id="mainContent"
        class="flex-grow transition-all w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div class="grow w-full bg-white  max-md:max-w-full h-[calc(100vh-4.425rem)] overflow-y-auto">
          <div class="flex overflow-hidden flex-col pt-14 mx-auto w-full bg-white max-w-[428px]">

            <div class="flex flex-col px-[1.0625rem] pt-[1.0625rem] w-full text-red-dark bg-white text-[1.5rem] ">
              <form method="POST">
                <div class="flex flex-col w-full tracking-wide leading-none ">
                  <label for="emailOrPhone" class="font-semibold">Email hoặc số điện thoại</label>
                  <input type="text" name="emailOrPhone" id="emailOrPhone"
                    class="flex overflow-hidden flex-col justify-center px-[12px] py-[12px] mt-[8px] w-full whitespace-nowrap border-b border-solid border-red-dark"
                    placeholder="123@gmail.com" />
                </div>
                <?php if (!empty($error_message)): ?>
                  <p style="color: red;"><?php echo esc_html($error_message); ?></p>
                <?php endif; ?>
                <div class="flex flex-col mt-[12px] w-full leading-none">
                  <label for="password" class="font-semibold tracking-wide">Mật khẩu</label>
                  <div
                    class="flex overflow-hidden gap-1.5 items-center mt-[8px] w-full tracking-wide whitespace-nowrap">
                    <input type="password" name="password" id="password"
                      class="flex-1 shrink  px-[12px] py-[12px] w-full whitespace-nowrap border-b border-solid border-red-dark self-stretch my-auto opacity-60 basis-0"
                      placeholder="Nhập mật khẩu" value="" />
                  </div>
                  <?php if (!empty($error_message2)): ?>
                    <p style="color: red;"><?php echo esc_html($error_message2); ?></p>
                  <?php endif; ?>
                  <button class="mt-[8px] text-[1.5rem] font-medium text-right">Quên mật khẩu</button>
                </div>
                <div class="mt-[12px] w-full text-base font-medium text-center text-stone-500">
                  <span class="text-red-dark  text-[1.5rem] ">Bạn chưa có tài khoản?</span>
                  <a href="<?php echo esc_url(home_url('/dang-ky')); ?>"
                    class="hover:no-underline hover:text-red-darker font-semibold text-red-dark-hover  text-[1.5rem] ">Đăng
                    ký</a>
                </div>
                <button type="submit"
                  class="self-stretch py-[16px] mt-[12px] w-full font-medium text-center text-orange-light bg-red-normal rounded-[8px] hover:bg-red-light hover:text-red-normal transition-colors duration-300">
                  Đăng nhập
                </button>
              </form>
              <div
                class="flex justify-center items-center px-2.5 mt-[12px] w-full text-base font-semibold text-center text-red-dark-hover">
                <div
                  class="flex-1 shrink self-stretch my-auto h-0 border-b border-solid border-red-dark-hover basis-5 w-[116.5px]">
                </div>
                <div class="self-stretch px-2.5 my-auto w-[141px] text-[1.5rem] ">
                  Đăng nhập với
                </div>
                <div
                  class="flex-1 shrink self-stretch my-auto h-0 border-b border-solid border-red-dark-hover basis-5 w-[116.5px]">
                </div>
              </div>
              <button
                class="self-stretch text-red-dark px-[10px] py-[12px] mt-[12px] w-full font-medium text-center whitespace-nowrap bg-orange-light rounded-[8px] border-b border-t border-l border-r border-solid border-red-normal">
                Google
              </button>
              <button
                class="self-stretch text-red-dark px-[10px] py-[12px] mt-[12px] w-full font-medium text-center whitespace-nowrap bg-orange-light rounded-[8px] border-b border-t border-l border-r border-solid border-red-normal">
                Facebook
              </button>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-9357894106826270" data-ad-slot="4222935559"
    data-auto-format="rspv" data-full-width="">
    <div overflow=""></div>
  </amp-ad>
</main>