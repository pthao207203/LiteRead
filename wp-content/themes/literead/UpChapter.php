<?php
/* Template Name: UpChapter */

// Kiểm tra nếu user chưa đăng nhập
if (!isset($_COOKIE['signup_token']) || empty($_COOKIE['signup_token'])) {
  echo "<script>alert('Bạn cần đăng nhập để xem trang này!'); window.location.href='" . home_url('/dang-nhap') . "';</script>";
  exit();
}

get_header();


global $wpdb;
$table_name = $wpdb->prefix . 'chapters';

if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
    id MEDIUMINT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    chapter_number INT NOT NULL,
    chapter_name TEXT DEFAULT NULL,
    synopsis TEXT DEFAULT NULL,
    count INT NOT NULL,
    view INT UNSIGNED DEFAULT 0,
    likes INT UNSIGNED DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    edited_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (id)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

$truyen_slug = get_query_var('truyen_parent'); // Lấy slug truyện từ URL
$table_name = $wpdb->prefix . 'stories';

$story = $wpdb->get_row(
  $wpdb->prepare("SELECT * FROM $table_name WHERE slug = %s", $truyen_slug)
);

if (!$story) {
  echo '<p>Truyện không tồn tại.</p>';
  get_footer();
  exit;
}

$users_literead = $wpdb->prefix . "users_literead";
$user = $wpdb->get_row($wpdb->prepare(
  "SELECT * FROM $users_literead WHERE token = %s",
  $_COOKIE['signup_token']
));
// Kiểm tra nếu user chưa có quyền chỉnh sửa truyện
if (isset($user) && $user->type === 1 && $story->editor == $user->id) {
  echo "<script>alert('Bạn không có quyền chỉnh sửa truyện này!'); window.location.href='" . home_url('/quan-ly-truyen') . "';</script>";
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'story_upload_nonce')) {
  //   wp_die('Lỗi bảo mật. Vui lòng thử lại.');
  // }

  global $wpdb;
  $chapters = $wpdb->prefix . 'chapters';

  // echo wp_unslash($_POST['synopsis']);

  // Lấy nội dung từ POST và giữ nguyên định dạng HTML
  $chapter_number = sanitize_text_field($_POST['chapter_number']);
  $chapter_name = isset($_POST['chapter_name']) ? sanitize_text_field($_POST['chapter_name']) : '';
  $synopsis = isset($_POST['synopsis']) ? wp_unslash($_POST['synopsis']) : '';
  $story_id = intval($_POST['story']);
  // $words = mb_split('\s+', trim($synopsis));
  $word_count = intval($_POST['word_count']);

  if (empty(trim($chapter_number))) {
    $error_chapter_number = 'Nội dung không được để trống!';
  } else if (empty(trim($synopsis))) {
    $error_chapter_number = '';
    $error_synopsis = 'Nội dung không được để trống!';
  } else {
    $error_synopsis = '';

    $wpdb->insert(
      $chapters,
      array(
        'story_id' => $story_id,
        'chapter_number' => $chapter_number,
        'chapter_name' => $chapter_name,
        'synopsis' => $synopsis,
        'count' => $word_count
      )
    );

    $wpdb->update(
      $table_name, // Tên bảng chứa stories
      array('edited_at' => current_time('mysql')), // Cập nhật thời gian hiện tại
      array('id' => $story_id) // Điều kiện cập nhật đúng story
    );

    echo '<script>alert("Đăng chương mới thành công!");window.location.href="' . home_url('/quan-ly-truyen/' . $truyen_slug) . '";</script>';
    exit;



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
        class="transition-all w-full <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
        <div class="w-full bg-white  max-md:max-w-full">
          <nav
            class="flex flex-wrap items-center w-full px-[20px] text-[1.125rem] font-medium  bg-white text-red-darker mb-[2px]"
            aria-label="Navigation menu">

            <!-- 📚 Truyện của tôi -->
            <div class="flex items-center self-stretch px-[12px] py-[10px] mr-0 ">
              <a href="#" class="self-stretch mr-[12px]" tabindex="0">Truyện của tôi</a>
              <!-- ➡️ Mũi tên SVG -->
              <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
                  <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999"
                    stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>
            </div>

            <!-- 📝 Đăng truyện -->
            <div class="flex items-center self-stretch px-[12px] py-[10px] mr-0 ">
              <a href="#" class="self-stretch mr-[12px]" tabindex="0"><?php if (isset($story->story_name))
                echo esc_attr($story->story_name); ?></a>
              <!-- ➡️ Mũi tên SVG -->
              <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
                  <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999"
                    stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>
            </div>

            <!-- 📝 Đăng truyện -->
            <div class="flex items-center self-stretch px-[12px] py-[10px] mr-0 ">
              <a href="#" class="self-stretch mr-[12px]" tabindex="0">Đăng chương</a>

          </nav>

          <form id="chapterForm" method="POST" enctype="multipart/form-data"
            class="px-[3.5rem] py-[2.125rem] max-md:p-[1.0625rem] max-w-full w-[1520px] text-[1.75rem] max-md:text-[1rem] text-red-dark bg-white">
            <div class="w-full tracking-wide leading-none max-md:max-w-full">
              <h2 class="font-semibold text-[1.75rem] max-md:max-w-full">Tên truyện</h2>
              <div
                class="flex overflow-hidden flex-col justify-center px-[0.5rem] py-[0.5rem] mt-[1rem] w-full whitespace-nowrap border-b border-solid border-b-red-dark max-md:max-w-full">
                <input type="text" placeholder="" readonly value="<?php if (isset($story->story_name))
                  echo esc_attr($story->story_name); ?>"
                  class="opacity-60 max-md:max-w-full w-full bg-transparent text-red-dark outline-none" />

                <input type="text" class="hidden" name="story" value="<?php if (isset($story->id))
                  echo esc_attr($story->id); ?>">

              </div>
            </div>

            <div class="mt-[1.75rem] w-full tracking-wide leading-none max-md:max-w-full">
              <h2 class="font-semibold text-[1.75rem] max-md:max-w-full">Số chương</h2>
              <div
                class="flex overflow-hidden flex-col justify-center px-[0.5rem] py-[0.5rem] mt-[1rem] w-full whitespace-nowrap border-b border-solid border-b-red-dark max-md:max-w-full">
                <input type="text" name="chapter_number" placeholder="Nhập số chương. Vui lòng chỉ nhập số." value="<?php if (isset($chapter_number))
                  echo esc_html($chapter_number); ?>"
                  class="max-md:max-w-full w-full text-red-dark bg-transparent outline-none" />
              </div>
            </div>

            <div class="mt-[1.75rem] w-full tracking-wide leading-none max-md:max-w-full">
              <h2 class="font-semibold text-[1.75rem] max-md:max-w-full">Tên chương</h2>
              <div
                class="flex overflow-hidden flex-col justify-center px-[0.5rem] py-[0.5rem] mt-[1rem] w-full whitespace-nowrap border-b border-solid border-b-red-dark max-md:max-w-full">
                <input type="text" name="chapter_name" placeholder="Nhập tên chương." value="<?php if (isset($chapter_name))
                  echo esc_html($chapter_name); ?>"
                  class="max-md:max-w-full w-full text-red-dark bg-transparent outline-none" />
              </div>
            </div>
            <div class="mt-[1.75rem] w-full max-md:max-w-full">
              <h3 class="font-semibold text-[1.75rem] mb-[1rem] tracking-wide leading-none max-md:max-w-full">
                Nội dung
              </h3>
              <textarea id="synopsis" name="synopsis" style="height: 1000px !important;"> <?php if (isset($synopsis))
                echo esc_html($synopsis); ?>
              </textarea>
              <p class="mt-[1rem] text-[1.375rem] font-medium tracking-wide leading-none max-md:max-w-full">
                Số từ:
                <span id="wordCount">0</span>
                <input type="number" id="word_count" name="word_count" class="hidden" value="0">
              </p>
              <p class="mt-[1rem] text-[1.375rem] font-medium tracking-wide leading-6 max-md:max-w-full">
                Nghiêm cấm sử dụng từ ngữ thô tục, 18+, phân biệt vùng miền, vấn
                đề liên quan đến chính trị. Nếu chúng tôi phát hiện sẽ từ chối
                duyệt, gỡ bỏ và có nguy cơ khóa tài khoản
              </p>
              <div
                class="flex justify-end mt-[1rem] w-fullfont-medium leading-none text-orange-light max-md:max-w-full">
                <button class="flex justify-end p-[1.25rem] bg-red-normal rounded-[0.75rem]">
                  <span class="gap-2.5 self-stretch my-auto">Đăng ngay</span>
                </button>
              </div>
            </div>
          </form>
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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("synopsis");
    const wordCount = document.getElementById("wordCount");

    textarea.addEventListener("input", function () {
      const words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);
      wordCount.textContent = words.length;
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $('#synopsis').summernote({
    placeholder: 'Nhập nội dung',
    tabsize: 2,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ],

    callbacks: {
      onKeyup: function (e) {
        updateWordCount();
      },
      onChange: function (contents, $editable) {
        updateWordCount();
      }
    }
  });

  function setupWordCountObserver() {
    let editableDiv = $('.note-editable');

    if (editableDiv.length) {
      editableDiv.on('input', function () {
        updateWordCount();
      });
    }
  }

  function updateWordCount() {
    let text = $('.note-editable').text().trim(); // Lấy text thuần không có HTML
    let words = text.length > 0 ? text.split(/\s+/).length : 0;
    $('#wordCount').text(words);
    $('#word_count').val(words);
  }

  // Đảm bảo sự kiện input được gắn sau khi Summernote load
  setTimeout(setupWordCountObserver, 1000);
</script>