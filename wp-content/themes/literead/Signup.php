<?php
/* Template Name: Signup */
if (isset($_COOKIE['signup_token'])) {
  wp_redirect(home_url('/'));
  exit;
}

ob_start();
get_header();

global $wpdb;
$users_literead = $wpdb->prefix . 'users_literead';

if (!$wpdb->get_var("SHOW COLUMNS FROM $users_literead LIKE 'password'")) {
  $wpdb->query("ALTER TABLE $users_literead ADD COLUMN password TEXT NOT NULL");
}

if ($wpdb->get_var("SHOW TABLES LIKE '$users_literead'") != $users_literead) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $users_literead (
    id MEDIUMINT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
    token VARCHAR(20) DEFAULT NULL,
    user_name VARCHAR(255) NOT NULL,
    password TEXT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    slug VARCHAR(255) NOT NULL UNIQUE,
    avatar_image_url TEXT DEFAULT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'active',
    type INT UNSIGNED DEFAULT 0,
    likes INT UNSIGNED DEFAULT 0,
    sum_coin INT UNSIGNED DEFAULT 0,
    coin INT UNSIGNED DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    edited_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$users_likes = $wpdb->prefix . 'users_likes';
if ($wpdb->get_var("SHOW TABLES LIKE '$users_likes'") != $users_likes) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $users_likes (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    user_id MEDIUMINT(9) UNSIGNED NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (story_id, user_id)
  ) $charset_collate;";

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

// Xử lý form đăng ký
// Xử lý form đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
  $email = sanitize_email($_POST["emailOrPhone"]);
  $password = sanitize_text_field($_POST["password"]);
  $confirmPassword = sanitize_text_field($_POST["confirmPassword"]);

  // Kiểm tra định dạng email hợp lệ
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_email = "Vui lòng nhập một địa chỉ email hợp lệ!";
  } elseif ($password !== $confirmPassword) {
    $error_pw = "Mật khẩu nhập lại không khớp!";
  } else {
    // Kiểm tra email đã tồn tại chưa
    $existing_user = $wpdb->get_var($wpdb->prepare(
      "SELECT COUNT(*) FROM $users_literead WHERE email = %s",
      $email
    ));

    if ($existing_user > 0) {
      $error_user = "Email này đã được sử dụng!";
    } else {
      // Tạo token đăng ký 20 ký tự
      $token = wp_generate_password(20, false);
      $activation_link = home_url("/signup/?token=" . $token);

      // Mã hóa mật khẩu
      $hashed_password = wp_hash_password($password);

      // Thêm dữ liệu vào bảng
      $wpdb->insert(
        $users_literead,
        [
          "user_name" => $email,
          "password" => $hashed_password,
          "full_name" => '',
          "phone" => '',
          "email" => $email,
          "slug" => sanitize_title($email),
          "token" => $token,
          "status" => 'pending',
          "created_at" => current_time('mysql'),
        ],
        ["%s", "%s", "%s", "%s", "%s", "%s", "%s"]
      );
      setcookie("signup_token", $token, time() + (7 * 24 * 60 * 60), "/", "", false, true);
      wp_redirect(home_url('/'));
      exit;
    }
  }
}
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;
?>

<main class="relative flex flex-col mt-[4.425rem] ">
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
            <div class="flex flex-col px-[1.0625rem] pt-[1.0625rem] w-full text-[1.5rem] text-red-dark bg-white">
              <form method="POST">
                <div class="flex flex-col w-full tracking-wide leading-none">
                  <label for="emailOrPhone" class="font-semibold">Email</label>
                  <div
                    class="flex overflow-hidden flex-col justify-center px-[8px] py-[12px] mt-[8px] w-full border-b border-solid border-red-dark">
                    <input type="text" id="emailOrPhone" name="emailOrPhone" placeholder="123@gmail.com"
                      class="opacity-60 bg-transparent border-none outline-none" required />
                  </div>
                  <?php if (!empty($error_email)): ?>
                    <p style="color: red;"><?php echo esc_html($error_email); ?></p>
                  <?php endif; ?>
                  <?php if (!empty($error_user)): ?>
                    <p style="color: red;"><?php echo esc_html($error_user); ?></p>
                  <?php endif; ?>
                </div>
                <div class="flex flex-col mt-[12px] w-full tracking-wide leading-none">
                  <label for="password" class="font-semibold">Mật khẩu</label>
                  <div
                    class="flex overflow-hidden gap-1.5 items-center px-[8px] py-[12px] mt-[8px] w-full border-b border-solid border-red-dark">
                    <input type="password" id="password" name="password" placeholder="**********"
                      class="flex-1 opacity-60 bg-transparent border-none outline-none" required />
                  </div>
                </div>

                <div class="flex flex-col mt-[12px] w-full tracking-wide leading-none">
                  <label for="confirmPassword" class="font-semibold">Nhập lại mật khẩu</label>
                  <div
                    class="flex overflow-hidden gap-1.5 items-center px-[8px] py-[12px] mt-[8px] w-full border-b border-solid border-red-dark">
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="**********"
                      class="flex-1 opacity-60 bg-transparent border-none outline-none" required />
                  </div>
                  <?php if (!empty($error_pw)): ?>
                    <p style="color: red;"><?php echo esc_html($error_pw); ?></p>
                  <?php endif; ?>
                </div>

                <div class="mt-[12px] w-full text-[1.5rem] font-medium text-center text-stone-500">
                  <span class="text-red-dark">Bạn đã có tài khoản?</span>
                  <a href="<?php echo esc_url(home_url('/dang-nhap')); ?>"
                    class="hover:no-underline hover:text-red-darker font-semibold text-red-dark-hover  text-[16px] ">Đăng
                    nhập</a>
                </div>

                <button type="submit" name="signup"
                  class="gap-2.5 self-stretch py-[16px] mt-[12px] w-full font-medium text-center text-orange-light bg-red-normal rounded-[8px] hover:bg-red-light hover:text-red-normal transition-colors duration-300">
                  Đăng ký
                </button>
              </form>
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