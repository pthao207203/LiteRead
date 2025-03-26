<?php
/* Template Name: Wallet */

// Kiểm tra nếu user chưa đăng nhập
if (!isset($_COOKIE['signup_token']) || empty($_COOKIE['signup_token'])) {
  echo "<script>alert('Bạn cần đăng nhập để xem trang này!'); window.location.href='" . home_url('/dang-nhap') . "';</script>";
  exit();
}

get_header();
global $wpdb;
$table_name = $wpdb->prefix . 'wallet_history';

if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
        id MEDIUMINT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
        user_id BIGINT(20) UNSIGNED NOT NULL,
        before_balance INT UNSIGNED NOT NULL,
        amount INT NOT NULL,
        after_balance INT UNSIGNED NOT NULL,
        transaction_type ENUM('withdraw', 'deposit') NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        KEY user_id (user_id)
    ) $charset_collate;";

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$user_id = get_current_user_id();

// Xử lý AJAX rút xu
if (!empty($_POST["action"]) && $_POST["action"] === "withdraw_coins") {
  header("Content-Type: application/json");

  $withdrawAmount = intval($_POST["withdrawAmount"] ?? 0);

  // Kiểm tra số xu hợp lệ
  if ($withdrawAmount <= 0) {
    echo json_encode(["status" => "error", "message" => "Số xu phải lớn hơn 0!"]);
    exit;
  }

  // Lấy thông tin số dư của người dùng
  $user = $wpdb->get_row($wpdb->prepare("SELECT coin FROM wp_users_literead WHERE token = %s", $_COOKIE['sign_up']));
  if (!$user) {
    echo json_encode(["status" => "error", "message" => "Lỗi: Không tìm thấy tài khoản!"]);
    exit;
  }
  // Kiểm tra nếu user chưa có quyền đăng truyện
  if (isset($user) && $user->type === 1) {
    echo "<script>alert('Bạn cần có quyền đăng truyện!'); window.location.href='" . home_url('/') . "';</script>";
    exit();
  }

  $current_balance = intval($user->coin);
  $new_balance = $current_balance - $withdrawAmount;

  if ($new_balance < 0) {
    echo json_encode(["status" => "error", "message" => "Số dư không đủ!"]);
    wp_die();
  }

  // Bắt đầu giao dịch SQL
  $wpdb->query('START TRANSACTION');

  // Cập nhật số dư an toàn
  $update_result = $wpdb->query($wpdb->prepare(
    "UPDATE wp_users_literead SET coin = coin - %d WHERE id = %d AND coin >= %d",
    $withdrawAmount,
    $user_id,
    $withdrawAmount
  ));
  echo "<script>console.log(1)</script>";
  if ($wpdb->last_error) {
    $wpdb->query('ROLLBACK');
    echo json_encode(["status" => "error", "message" => "Lỗi SQL: " . $wpdb->last_error]);
    wp_die();
  }

  // Lấy lại số dư để kiểm tra cập nhật thành công
  $check_balance = intval($wpdb->get_var($wpdb->prepare(
    "SELECT coin FROM wp_users_literead WHERE id = %d",
    $user_id
  )));

  if ($update_result && $check_balance === $new_balance) {
    // Ghi lịch sử giao dịch
    $wpdb->insert('wp_wallet_history', [
      'user_id' => $user_id,
      'before_balance' => $current_balance,
      'amount' => -$withdrawAmount,
      'after_balance' => $new_balance,
      'transaction_type' => 'withdraw',
      'created_at' => current_time('mysql')
    ]);

    // Xác nhận giao dịch
    $wpdb->query('COMMIT');
    //Trả về kết quả
    echo json_encode(["status" => 200, "message" => "Rút $withdrawAmount xu thành công!", "new_balance" => $new_balance]);
  } else {
    $wpdb->query('ROLLBACK');
    echo json_encode(["status" => "error", "message" => "Lỗi khi cập nhật số dư!"]);
  }
  wp_die();
}

// Lấy thông tin ví của người dùng 
$user = $wpdb->get_row($wpdb->prepare("SELECT * FROM wp_users_literead WHERE token = %s", $_COOKIE['signup_token']));

// Lấy lịch sử giao dịch
$transactions = $wpdb->get_results($wpdb->prepare(
  "SELECT * FROM wp_wallet_history WHERE user_id = %d ORDER BY created_at DESC LIMIT 5",
  $user_id
)) ?: [];
$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;

$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
echo '<script> console.log(' . $screen_width . ')</script>';

?>
<main class="relative flex flex-col mt-[4.425rem]">
  <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col h-full">
      <!-- Sidebar Navigation -->
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
      <section id="mainContent"
        class="flex-grow transition-all w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div
          class="flex flex-col justify-start items-start p-10 w-full max-md:px-6 max-md:max-w-full bg-white h-[calc(100vh-4.425rem)]">

          <!-- Thông tin người dùng -->
          <div
            class="flex flex-wrap gap-6 items-center self-stretch w-full font-medium text-[#A04D4C] max-md:max-w-full">
            <img loading="lazy"
              src="<?php echo esc_url($user->avatar_image_url ?? 'https://media.defense.gov/2020/Feb/19/2002251686/-1/-1/0/200219-A-QY194-002.JPG'); ?>"
              class="object-cover shrink-0 aspect-square w-[8.375rem] rounded-full" alt="User profile picture" />
            <div class="flex flex-col flex-1 shrink items-start basis-0 w-[15rem] max-md:max-w-full">
              <div class="flex flex-col">
                <?php if ($user->full_name != '')
                  echo '<div class="text-3xl">' . esc_html($user->full_name) . '</div>';
                else
                  echo "<div class='text-3xl'>Chưa cập nhật</div>" ?>
                  <div class="mt-3 text-3xl opacity-60"><?php echo esc_html($user->email); ?></div>
              </div>
            </div>
          </div>

          <!-- Tổng xu -->
          <!-- <div class="flex flex-col mt-12 max-w-full text-3xl tracking-wide leading-none text-[#A04D4C] w-[394px] max-md:mt-10">
                            <div class="font-semibold">Tổng xu</div>
                            <div class="flex overflow-hidden flex-col justify-center py-4 mt-2 w-full font-medium whitespace-nowrap border-b border-solid border-b-[#A04D4C]">
                                <div class="ml-2 opacity-60"><?php echo number_format($user->sum_coin, 0, ',', '.'); ?> xu</div>
                            </div>
                        </div> -->

          <!-- Số dư -->
          <div class="flex flex-col mt-12 text-3xl text-[#A04D4C] max-w-full w-[394px] max-md:mt-10">
            <div class="font-semibold">Tổng xu hiện tại</div>
            <div class="flex flex-col py-4 mt-2 w-full border-b border-solid border-b-[#A04D4C]">
              <div id="userBalance" class="ml-2 opacity-60"><?php echo number_format($user->coin, 0, ',', '.'); ?> xu
              </div>
            </div>
          </div>

          <!-- Form rút xu -->
          <form id="withdrawForm" class="flex flex-col max-w-full mt-12 w-[650px] max-md:mt-10">
            <label for="withdrawAmount" class="text-3xl font-semibold tracking-wide leading-none text-[#A04D4C]">Rút
              xu</label>
            <div class="flex flex-grow gap-2 items-start w-full">
              <input type="number" id="withdrawAmount" name="withdrawAmount"
                class="flex-1 px-2 py-4 text-3xl text-[#A04D4C] border-b border-[#A04D4C] placeholder-[#d89e9d]"
                placeholder="Nhập số xu..." required />
              <button id="withdrawButton" type="submit"
                class="ml-2 w-[5.69rem] h-[4.56rem] p-2.5 text-3xl text-white bg-[#D56665] rounded-xl hover:bg-[#C05C5D]">Rút</button>
            </div>
          </form>

          <!-- Pop-up xác nhận rút xu -->
          <div id="confirmPopup" class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50">

            <div class="bg-white rounded-3xl p-[3rem] shadow-lg text-center w-[36rem]">
              <!-- <img src="<?php echo esc_url(get_template_directory_uri() . '/wp-content/plugins/akismet/_inc/img/Group26.svg'); ?>" alt="Warning Icon" class="w-16 h-16 mx-auto"> -->
              <p class="text-3xl text-black my-[2rem]">Xác nhận rút <span id="confirmAmount"></span> xu?</p>
              <div class="flex justify-center gap-4">
                <button id="confirmWithdraw"
                  class="bg-[#D56665] text-white text-3xl p-2.5 rounded-lg w-[15.69rem] h-[4.56rem]">Rút</button>
                <button id="cancelWithdraw"
                  class="bg-[#FFE5E1] text-[#D56665] text-3xl p-2.5 rounded-lg w-[15.69rem] h-[4.56rem]">Hủy</button>
              </div>
            </div>
          </div>

          <!-- Pop-up hoàn tất -->
          <div id="successPopup"
            class="hidden fixed inset-0 z-50 top-10 left-10 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-3xl p-[3rem] shadow-lg text-center w-[36rem]">
              <!-- <img src="<?php echo esc_url(get_template_directory_uri() . '/wp-content/plugins/akismet/_inc/img/Check_ring_duotone_line.svg'); ?>" 
                                alt="Success Icon" class="w-16 h-16 mx-auto"> -->
              <p class="text-3xl text-black my-[2rem]">Tiền của bạn sẽ được thanh toán trong vòng 24 giờ</p>
            </div>
          </div>

          <!-- Lịch sử giao dịch -->
          <div class="flex flex-col mt-12 w-full text-3xl tracking-wide leading-none text-[#A04D4C] max-md:mt-10">
            <div class="font-semibold max-md:text-xl max-sm:text-3xl">Lịch sử biến đổi</div>
            <!-- Sử dụng grid layout với auto-fit để tự động điều chỉnh cột và căn chỉnh phần tử -->
            <div class="grid grid-cols-4 md:grid-cols-4 gap-4 mt-2 w-full max-w-full font-medium">
              <!-- SD trước -->
              <div class="flex flex-col justify-between">
                <div
                  class="px-2 py-3 border-b border-red-400 opacity-60 text-center text-3xl max-md:max-full max-sm:text-2xl whitespace-nowrap">
                  SD trước</div>
                <?php foreach ($transactions as $transaction): ?>
                  <div
                    class="px-2 py-3 mt-2 border-b border-red-400 opacity-60 text-center text-3xl max-md:max-full max-sm:text-2xl whitespace-nowrap">
                    <?php echo number_format($transaction->before_balance); ?>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- Số lượng -->
              <div class="flex flex-col justify-between">
                <div
                  class="px-2 py-3 border-b border-red-400 opacity-60 text-center text-3xl max-md:max-full max-sm:text-2xl whitespace-nowrap">
                  Số lượng</div>
                <?php foreach ($transactions as $transaction): ?>
                  <div
                    class="px-2 py-3 mt-2 border-b border-red-400 text-center text-3xl max-md:max-full max-sm:text-2xl whitespace-nowrap <?php echo $transaction->amount < 0 ? 'text-[#CD0800]' : 'text-[#088E00]'; ?>">
                    <?php echo ($transaction->amount < 0 ? '- ' : '+ ') . number_format(abs($transaction->amount)); ?>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- SD sau -->
              <div class="flex flex-col justify-between">
                <div
                  class="px-2 py-3 border-b border-red-400 opacity-60 text-center text-3xl max-md:max-full max-sm:text-2xl whitespace-nowrap">
                  SD sau</div>
                <?php foreach ($transactions as $transaction): ?>
                  <div
                    class="px-2 py-3 mt-2 border-b border-red-400 opacity-60 text-center text-3xl max-md:max-full max-sm:text-2xl whitespace-nowrap">
                    <?php echo number_format($transaction->after_balance); ?>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- Thời gian -->
              <div class="flex flex-col justify-between">
                <div
                  class="px-2 py-3 border-b border-red-400 opacity-60 text-center text-3xl max-md:max-full max-sm:text-2xl whitespace-nowrap">
                  Thời gian</div>
                <?php foreach ($transactions as $transaction): ?>
                  <div
                    class="px-2 py-3 mt-2 border-b border-red-400 opacity-60 text-center text-3xl max-md:max-full max-sm:text-2xl">
                    <?php echo date('H:i d/m/Y', strtotime($transaction->created_at)); ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  </div>
  </div>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const withdrawForm = document.getElementById("withdrawForm");
    const withdrawButton = document.getElementById("withdrawButton");
    const withdrawAmountInput = document.getElementById("withdrawAmount");
    const confirmPopup = document.getElementById("confirmPopup");
    const confirmWithdraw = document.getElementById("confirmWithdraw");
    const cancelWithdraw = document.getElementById("cancelWithdraw");
    const confirmAmount = document.getElementById("confirmAmount");
    const successPopup = document.getElementById("successPopup"); // Pop-up hoàn tất

    if (!successPopup) {
      console.error("Lỗi: Không tìm thấy phần tử successPopup trên trang!");
      return;
    }

    // Mở pop-up xác nhận khi nhấn "Rút"
    withdrawButton.addEventListener("click", function (e) {
      e.preventDefault();
      let amount = withdrawAmountInput.value.trim();
      if (amount < 50000 || isNaN(amount)) {
        alert("Vui lòng rút trên 50.000 xu!");
        return;
      }
      if (amount > <?= number_format($user->coin, 0, ',') ?>) {
        alert("Bạn không đủ tiền để rút!");
        return;
      }

      confirmAmount.textContent = new Intl.NumberFormat('vi-VN').format(amount);
      confirmPopup.classList.remove("hidden"); // Hiển thị pop-up xác nhận
      confirmPopup.classList.add("flex");
    });

    // Hủy rút xu
    cancelWithdraw.addEventListener("click", function () {
      confirmPopup.classList.add("hidden");
      confirmPopup.classList.remove("flex");
    });

    // Xử lý xác nhận rút xu
    confirmWithdraw.addEventListener("click", function () {
      let amount = withdrawAmountInput.value.trim();
      confirmPopup.classList.add("hidden"); // Ẩn pop-up xác nhận
      confirmPopup.classList.remove("flex");

      fetch(window.location.href, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "action=withdraw_coins&withdrawAmount=" + encodeURIComponent(amount)
      })
        .then(response => {
          response.json();
          console.log("response ", response);
          if (response.status === 200) {
            document.getElementById("userBalance").innerText = new Intl.NumberFormat('vi-VN').format(response.new_balance) + " xu";
            withdrawAmountInput.value = "";

            console.log("Hiển thị successPopup");
            successPopup.classList.remove("hidden"); // Hiển thị pop-up hoàn tất
            successPopup.classList.add("flex");

            // Kiểm tra nếu successPopup thực sự xuất hiện
            setTimeout(() => {
              console.log("Ẩn successPopup & reload trang");
              successPopup.classList.add("hidden");
              successPopup.classList.remove("flex");
              location.reload();
            }, 4000);
          } else {
            alert(response.message);
          }
        })
        .catch(error => {
          console.error("Lỗi:", error);
        });
    });
  });
</script>