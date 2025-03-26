<?php
/* Template Name: Notification */

// Kiểm tra nếu user chưa đăng nhập
if (!isset($_COOKIE['signup_token']) || empty($_COOKIE['signup_token'])) {
  echo "<script>alert('Bạn cần đăng nhập để xem trang này!'); window.location.href = '" . home_url('/dang-nhap') . "'; </script>";
  exit();
}

get_header();
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;

global $wpdb;

$notifications_table = $wpdb->prefix . 'notifications';
if ($wpdb->get_var("SHOW TABLES LIKE '$notifications_table'") != $notifications_table) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $notifications_table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        recipient_id mediumint(9) NOT NULL,
        sender_id mediumint(9) DEFAULT NULL,
        story_id mediumint(9) DEFAULT NULL,
        message text NOT NULL,
        is_read tinyint(1) DEFAULT 0,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
}

if (!isset($_COOKIE['signup_token'])) {
  wp_redirect(home_url('/dang-nhap'));
  exit();
}

$user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}users_literead WHERE token = %s", $_COOKIE['signup_token']));
$user_id = $user_info->id;

$notifications = $wpdb->get_results(
  $wpdb->prepare("SELECT n.*, u.full_name AS sender_name FROM $notifications_table n LEFT JOIN {$wpdb->prefix}users_literead u ON n.sender_id = u.id WHERE recipient_id = %d OR recipient_id = 0 ORDER BY created_at DESC", $user_id)
);

$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false;
$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
?>

<main class="relative flex flex-col mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigation -->
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
      <section id="mainContent"
        class="flex-grow transition-all w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <header class="flex flex-col justify-center p-[2.125rem] w-full max-md:p-[1.0625rem] bg-white">
          <?php get_sidebar(); ?>
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

          <section class="w-full max-md:max-w-full">
            <?php foreach ($notifications as $notification):
              // Kiểm tra nếu message chứa "đã thích" hoặc "comment"
              if (strpos($notification->message, 'đã thích') !== false) {
                $message_display = "Bạn có lượt thích truyện mới!";
              } elseif (strpos($notification->message, 'comment') !== false) {
                $message_display = "Bạn có comment mới!";
              } else {
                $message_display = "Thông báo hệ thống."; // Hiển thị message gốc nếu không chứa từ khóa
              }
              ?>
              <article
                class="mt-[1.5rem] max-md:mt-[0.75rem] text-red-darker p-[2.125rem] w-full max-md:p-[1.0625rem] bg-none rounded-[1rem] border border-solid border-red-normal max-md:max-w-full">
                <h2 class="text-[1.75rem] max-md:text-[1rem] font-semibold leading-none max-md:max-w-full">
                  <?= $message_display ?>
                </h2>
                <p class="mt-[1rem] text-[1.25rem] max-md:text-[0.875rem] font-medium leading-7 max-md:max-w-full">
                  <?= esc_html($notification->message); ?>
                </p>
                <time class="mt-[1rem] text-[1.375rem] max-md:text-[0.75rem] leading-tight block max-md:max-w-full">
                  <?= esc_html(human_time_diff(strtotime($notification->created_at), current_time('timestamp')) . ' trước'); ?>
                </time>
              </article>
            <?php endforeach; ?>
          </section>
        </header>
      </section>
    </div>
  </div>
</main>