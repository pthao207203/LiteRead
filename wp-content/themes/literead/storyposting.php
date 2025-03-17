<?php
/* Template Name: storyposting */
get_header();

// Kiểm tra nếu user chưa đăng nhập
if (!isset($_COOKIE['signup_token']) || empty($_COOKIE['signup_token'])) {
  echo "<script>alert('Bạn cần đăng nhập để xem trang này!');</script>";
  wp_redirect(home_url('/dang-nhap'));
  exit();
}

global $wpdb;


$signup_token = sanitize_text_field($_COOKIE['signup_token']);
$users_literead = $wpdb->prefix . "users_literead";

// Lấy thông tin người dùng
$user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $users_literead WHERE token = %s", $signup_token));

if (!$user_info) {
  echo "<script>alert('Không tìm thấy thông tin người dùng. Vui lòng liên hệ với quản trị viên!');</script>";
  wp_redirect(home_url('/dang-nhap'));
  exit();
}

// Gán giá trị vào biến PHP
$full_name = !empty($user_info->full_name) ? esc_html($user_info->full_name) : "Chưa cập nhật";
$email = !empty($user_info->email) ? esc_html($user_info->email) : "Chưa cập nhật";
$phone = !empty($user_info->phone) ? esc_html($user_info->phone) : "Chưa cập nhật";
$created_at_display = !empty($user_info->created_at) ? date("Y-m-d", strtotime($user_info->created_at)) : "";
$updated_at_display = !empty($user_info->edited_at) ? date("Y-m-d", strtotime($user_info->edited_at)) : "";
$avatar_url = !empty($user_info->avatar_image_url) ? $user_info->avatar_image_url : '';


// Thông tin truyện
$stories_table = $wpdb->prefix . "stories";
$users_table = $wpdb->prefix . "users_literead";

// Lấy tổng số truyện
$total_stories = $wpdb->get_var("SELECT COUNT(*) FROM $stories_table WHERE editor = $user_info->id");


// Tính tổng lượt xem (view) và lượt thích (likes)
$total_views = $wpdb->get_var("SELECT SUM(view) FROM $stories_table WHERE editor = '{$user_info->id}'");
$total_likes = $wpdb->get_var("SELECT SUM(likes) FROM $stories_table WHERE editor = '{$user_info->id}'");

// Lấy số xu của người dùng từ wp_users_literead
$user_coin = $wpdb->get_var($wpdb->prepare("SELECT coin FROM $users_table WHERE token = %s", $_COOKIE['signup_token']));

// Xử lý cập nhật thông tin
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_profile"])) {
  $new_full_name = sanitize_text_field($_POST["Hoten"]);
  $new_phone = sanitize_text_field($_POST["SDT"]);
  $avatar_url = !empty($user_info->avatar_image_url) ? $user_info->avatar_image_url : ''; // Giữ ảnh cũ

  if (!empty($_FILES['avatar']['name'])) {
    if (!function_exists('wp_handle_upload')) {
      require_once ABSPATH . 'wp-admin/includes/file.php';
    }

    $uploaded_file = $_FILES['avatar'];
    $upload_overrides = array('test_form' => false);

    $upload = wp_handle_upload($uploaded_file, $upload_overrides);

    if (!isset($upload['error']) && isset($upload['url'])) {
      $avatar_url = $upload['url']; // Cập nhật URL ảnh mới
    } else {
      echo "<script>alert('Lỗi upload ảnh: " . esc_js($upload['error']) . "');</script>";
    }
  }
  // Cập nhật vào database
  $result = $wpdb->update(
    $users_literead,
    [
      "full_name" => $new_full_name,
      "phone" => $new_phone,
      "avatar_image_url" => $avatar_url,
      "edited_at" => current_time('mysql'),
    ],
    ["token" => $signup_token],
  );
  // Kiểm tra xem có lỗi khi cập nhật không
  if ($result !== false) {
    // Sau khi cập nhật thành công, thêm thông báo "success" vào URL
    echo "<script>window.location.href = window.location.href + '?success=true';</script>";
    exit();
  } else {
    echo "<script>alert('Lỗi khi cập nhật: " . esc_js($wpdb->last_error) . "');</script>";
  }
}

$isHome = is_front_page();
$isSingleTruyen = strpos($_SERVER['REQUEST_URI'], '/truyen/') !== false; // Kiểm tra nếu là trang truyện
$isAuthPage = strpos($_SERVER['REQUEST_URI'], 'dang-nhap') !== false || strpos($_SERVER['REQUEST_URI'], 'dang-ky') !== false;

$screen_width = isset($_COOKIE['screen_width']) ? intval($_COOKIE['screen_width']) : 0;
$isMobile = $screen_width < 768;
echo '<script>console.log(' . $screen_width . ')</script>';
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
        <div class="grow w-full bg-white  max-md:max-w-full">
          <section class="px-[3.5rem] py-[2.125rem] max-w-full w-[1520px] bg-white">
            <header class="flex flex-wrap gap-6 items-end w-full font-medium text-pink-800 max-md:max-w-full">
              <form method="POST" enctype="multipart/form-data">
                <div class="relative">
                  <img id="avatarImg" style="object-fit: cover; border-radius: 50%;"
                    src="<?php echo !empty($avatar) ? esc_url($avatar) : 'https://media.defense.gov/2020/Feb/19/2002251686/-1/-1/0/200219-A-QY194-002.JPG'; ?>"
                    alt="Profile avatar"
                    class="object-contain shrink-0 aspect-square w-[6.1875rem] rounded-full border border-gray-300" />

                  <input type="file" id="avatarInput" name="avatar" accept="image/*"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer hidden" />
                </div>
              </form>

              <!-- Thông tin người dùng -->
              <div class="flex flex-col flex-1 shrink items-start basis-0 min-w-60 max-md:max-w-full">
                <h1 id="hoten" class="text-[1.875rem]"><?php echo esc_html($full_name); ?></h1>
                <p id="email" class="mt-3 text-[1.75rem] opacity-60"><?php echo esc_html($email); ?></p>
              </div>
            </header>

            <nav class="flex gap-2 items-start self-start mt-12 text-[1.875rem] font-medium max-md:mt-10">
              <button
                class="gap-2 self-stretch px-[1.25rem] py-[0.625rem] text-[1.875rem] text-[#D56665] bg-[#FFF2F0] rounded-xl min-w-60">
                Thông tin cá nhân
              </button>
              <div class="">
                <button type="button" id="editButton"
                  class="gap-2.5 px-[1.25rem] py-[0.625rem] bg-[#D56665] hover:bg-[#C05C5B] hover:text-[#FFF2F0] text-[#FFF7F5] rounded-xl">
                  Sửa
                </button>
                <button type="submit" id="saveButton" name="update_profile" class="hidden">
                  Lưu
                </button>
              </div>
            </nav>

            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="update_profile" value="1">
              <input type="submit" id="submitButton" class="hidden">
              <section class="mt-12 w-full text-[1.75rem] text-[#A04D4C] max-md:mt-10 max-md:max-w-full">
                <div class="flex flex-wrap gap-[1.375rem] items-start w-full max-md:max-w-full">

                  <div class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full">
                    <label for="Hoten" class="font-semibold max-md:max-w-full">Họ và tên</label>
                    <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                      <input type="text" id="Hoten" name="Hoten" value="<?php echo esc_attr($full_name); ?>" readonly
                        class="text-[#A04D4C] font-medium px-[0.5rem] py-[1rem] mt-4 w-full border-b border-solid h-[3.5rem]
                                    border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] outline-none" required />
                    </div>
                  </div>

                  <div class="grow shrink font-medium min-w-60 w-[566px] max-md:max-w-full">
                    <label for="SDT" class="font-semibold tracking-wide leading-none max-md:max-w-full">Số điện
                      thoại</label>
                    <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                      <input type="text" id="SDT" name="SDT" value="<?php echo esc_attr($phone); ?>" readonly class="text-[#A04D4C] font-medium px-[0.5rem] py-[1rem] mt-4 w-full border-b border-solid h-[3.5rem]
                                    border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] outline-none" required />
                    </div>
                    <p class="mt-[1rem] text-[1.5rem] text-[CD0800] max-md:max-w-full">
                      Vui lòng nhập đúng số điện thoại liên kết Momo.
                    </p>
                  </div>

                  <div
                    class="grow shrink tracking-wide leading-none whitespace-nowrap min-w-60 w-[566px] max-md:max-w-full">
                    <label for="Gmail" class="font-semibold tracking-wide leading-none max-md:max-w-full">Gmail</label>
                    <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                      <input type="text" id="Gmail" name="Gmail" value="<?php echo esc_attr($email); ?>" readonly
                        class="bg-[#F0F3F5] overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid h-[3.5rem]
                                    border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] outline-none max-md:max-w-full" required />
                    </div>
                  </div>

                  <div class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full">
                    <label for="ngaythamgia" class="font-semibold  tracking-wide leading-none max-md:max-w-full">Ngày
                      tham gia</label>
                    <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                      <input type="date" id="ngaythamgia" name="ngaythamgia"
                        value="<?php echo esc_attr($created_at_display); ?>" readonly
                        class="bg-[#F0F3F5] overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid h-[3.5rem] border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] outline-none max-md:max-w-full" />
                    </div>
                  </div>

                  <div class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full">
                    <label for="Capnhat" class="font-semibold tracking-wide leading-none max-md:max-w-full">Cập nhật lần
                      cuối</label>
                    <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                      <input type="date" id="Capnhat" name="Capnhat"
                        value="<?php echo esc_attr($updated_at_display); ?>" readonly
                        class="bg-[#F0F3F5] overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid h-[3.5rem] border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] outline-none max-md:max-w-full" />
                    </div>
                  </div>


                </div>
              </section>
            </form>

            <section class="mt-12 max-md:mt-10">
              <h2
                class="gap-2 self-stretch px-[1.25rem] py-[0.625rem] text-[1.875rem] text-[#D56665] bg-[#FFF2F0] rounded-xl font-medium w-fit">
                Thông tin truyện
              </h2>

              <div class="mt-12 w-full text-pink-800 max-md:mt-10 max-md:max-w-full">
                <h3
                  class="flex-1 shrink gap-[0.75rem] self-stretch w-full text-[1.875rem] font-medium leading-none basis-0 max-md:max-w-full">
                  <?php echo esc_html($total_stories); ?> Truyện
                </h3>

                <div class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full">
                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular"><?php echo esc_html($total_stories); ?></p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Truyện dịch</h4>
                  </article>

                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular"><?php echo esc_html($user_coin); ?></p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Số xu</h4>
                  </article>
                </div>

                <div class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full">
                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular"><?php echo esc_html($total_likes ?? 0); ?></p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Lượt thích</h4>
                  </article>

                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular"><?php echo esc_html($total_views ?? 0); ?></p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Lượt view</h4>
                  </article>
                </div>

              </div>
            </section>
          </section>
        </div>
      </section>
    </div>
  </div>
</main>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.querySelector("textarea");
    const wordCount = document.getElementById("wordCount");

    textarea.addEventListener("input", function () {
      const words = textarea.value
        .trim()
        .split(/\s+/)
        .filter((word) => word.length > 0);
      wordCount.textContent = `Số lượng từ: ${words.length}`;
    });
  });
</script>
<style>
  .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    /* Đảm bảo nó hiển thị trên cùng */
  }

  /* Nội dung của Popup */
  .popup-content {
    background-color: #fff;
    padding: 3.5rem;
    border-radius: 1.5rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: flex;
  }

  /* Nút của Popup */
  .popup-btn {
    /* background-color: #f28a8a;
        color: white; */
    border: none;
    padding: 1.25rem 1.25rem;
    font-size: 1.875rem;
    border-radius: 12px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .popup-btn:hover {
    background-color: #C05C5B;
    color: #FFF2F0;
  }

  .popup-btn.cancel {
    background-color: #FFE5E1;
  }

  .popup-btn.cancel:hover {
    background-color: #F2D0CF;
    color: #A04D4C;
  }

  /* Icon */
  .icon {
    font-size: 2rem;
    display: block;
    margin-bottom: 1rem;
  }
</style>
<!-- Pop-up Xác nhận Lưu -->
<div id="confirmPopup" class="popup-overlay hidden">
  <div class="popup-content flex flex-col">
    <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg"
      class="w-[3.125rem] h-[3.125rem] flex-shrink-0 mx-auto" aria-hidden="true">
      <circle cx="25" cy="25.7461" r="25" fill="#D56665"></circle>
      <path
        d="M26.734 31.6151L27.5554 10.916H22.3989L23.2659 31.6151H26.734ZM24.9543 41.4245C25.8061 41.4245 26.521 41.1508 27.099 40.6034C27.6771 40.0561 27.9661 39.4079 27.9661 38.6588C27.9661 37.8522 27.6771 37.1896 27.099 36.671C26.521 36.1525 25.8061 35.8932 24.9543 35.8932C24.1025 35.8932 23.4028 36.1525 22.8552 36.671C22.3077 37.1896 22.0339 37.8522 22.0339 38.6588C22.0339 39.4079 22.3077 40.0561 22.8552 40.6034C23.4028 41.1508 24.1025 41.4245 24.9543 41.4245Z"
        fill="#FFF7F5"></path>
    </svg>
    <div class="mt-[2.25rem] mb-[2.25rem] font-medium text-[1.75rem]">
      <p>Xác nhận lưu những thay đổi?</p>
    </div>
    <div class="flex flex-row">
      <button id="confirmSave" class="popup-btn mr-[10px] w-full bg-red-normal text-orange-light">Lưu</button>
      <button id="cancelSave" class="popup-btn w-full bg-orange-light-active text-red-normal cancel">Hủy</button>
    </div>
  </div>
</div>
<!-- Pop-up Thông báo Thành công -->
<div id="successPopup" class="popup-overlay hidden justify-center">
  <div class="popup-content flex-col justify-center">
    <div
      class="flex justify-center items-center bg-red-normal rounded-full w-[3.125rem] h-[3.125rem] mt-[3.64rem] mx-auto"
      role="img" aria-label="Success checkmark">
      <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.88889 9.24609L10.2222 17.5794L24.1111 0.912598" stroke="white" stroke-width="2"></path>
      </svg>
    </div>
    <div class="mt-[2.25rem] mb-[3.64rem] font-medium text-[1.75rem]">
      <p>Cập nhật thay đổi thành công!</p>
      <!-- <button id="closePopup" class="popup-btn">OK</button> -->
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let editButton = document.getElementById("editButton");
    let confirmPopup = document.getElementById("confirmPopup");
    let successPopup = document.getElementById("successPopup");
    let confirmSave = document.getElementById("confirmSave");
    let cancelSave = document.getElementById("cancelSave");
    let submitButton = document.getElementById("submitButton");

    // Khi bấm "Sửa"
    editButton.addEventListener("click", function () {
      let inputs = [document.getElementById("Hoten"), document.getElementById("SDT")];
      let avatarInput = document.getElementById("avatarInput");

      if (inputs[0].readOnly) {
        // Chế độ chỉnh sửa
        inputs.forEach(input => input.readOnly = false);
        avatarInput.classList.remove("hidden");
        editButton.textContent = "Lưu";
      } else {
        // Hiển thị pop-up xác nhận trước khi lưu
        confirmPopup.classList.remove("hidden");
      }
    });

    // Khi nhấn "Lưu" trong pop-up
    confirmSave.addEventListener("click", function () {
      confirmPopup.classList.add("hidden");
      submitButton.click(); // Submit form
    });

    // Khi nhấn "Hủy" trong pop-up
    cancelSave.addEventListener("click", function () {
      confirmPopup.classList.add("hidden");
    });

    // Khi nhấn bất kỳ đâu vào popup thành công để tắt
    successPopup.addEventListener("click", function () {
      successPopup.classList.add("hidden");

      // Xóa tham số success trong URL để ngừng hiển thị popup
      const urlParams = new URLSearchParams(window.location.search);
      urlParams.delete('success');
      window.history.replaceState({}, '', window.location.pathname + '?' + urlParams.toString());
    });

    // Kiểm tra sau khi form được submit
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
      successPopup.classList.remove('hidden'); // Hiển thị popup thành công
    }
  });
</script>