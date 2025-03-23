<?php

global $wpdb;

$signup_token = sanitize_text_field($_COOKIE['signup_token']);
$users_literead = $wpdb->prefix . "users_literead";

// Lấy thông tin người dùng
$user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $users_literead WHERE token = %s", $signup_token));

if (!$user_info) {
  echo "<script>alert('Không tìm thấy thông tin người dùng. Vui lòng liên hệ với quản trị viên!'); window.location.href='" . home_url('/dang-nhap') . "';</script>";
  exit();
}

// Kiểm tra nếu user chưa có quyền đăng truyện
if (isset($user_info) && $user_info->type === 1) {
  echo "<script>alert('Bạn cần có quyền đăng truyện!'); window.location.href='" . home_url('/') . "';</script>";
  exit();
}

global $wpdb;
$table_name = $wpdb->prefix . 'stories';

if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
    id MEDIUMINT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
    story_name TEXT NOT NULL,
    slug TEXT NOT NULL,
    author VARCHAR(255) NOT NULL,
    editor VARCHAR(255) DEFAULT NULL,
    cover_image_url TEXT DEFAULT NULL,
    status TEXT NOT NULL,
    synopsis TEXT DEFAULT NULL,
    rate INT UNSIGNED DEFAULT 5,
    view INT UNSIGNED DEFAULT 0,
    likes INT UNSIGNED DEFAULT 0,
    hot INT UNSIGNED DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    edited_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY  (id)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);

}

$story_type = $wpdb->prefix . 'story_type';
if ($wpdb->get_var("SHOW TABLES LIKE '$story_type'") != $story_type) {
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $story_type (
    story_id MEDIUMINT(9) UNSIGNED NOT NULL,
    type_id MEDIUMINT(9) UNSIGNED NOT NULL,
    PRIMARY KEY (story_id, type_id),
    FOREIGN KEY (story_id) REFERENCES wp_stories(id) ON DELETE CASCADE,
    FOREIGN KEY (type_id) REFERENCES wp_type(id) ON DELETE CASCADE
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'story_upload_nonce')) {
  //   wp_die('Lỗi bảo mật. Vui lòng thử lại.');
  // }

  global $wpdb;
  $table_name = $wpdb->prefix . 'stories';

  // echo wp_unslash($_POST['synopsis']);

  // Lấy nội dung từ POST và giữ nguyên định dạng HTML
  $story_name = sanitize_text_field($_POST['story_name']);
  $slug = generate_unique_slug_truyen($story_name);
  $author = sanitize_text_field($_POST['author']);
  $status = sanitize_text_field($_POST['status']);
  $synopsis = isset($_POST['synopsis']) ? wp_unslash($_POST['synopsis']) : '';
  $genres = isset($_POST['genres']) ? implode(',', array_map('sanitize_text_field', $_POST['genres'])) : '';
  $editor = $user_info->id;

  if (empty(trim($story_name))) {
    $error_story_name = 'Nội dung không được để trống!';
  } else if (empty(trim($author))) {
    $error_story_name = '';
    $error_author = 'Nội dung không được để trống!';
  } else if (empty(trim($synopsis))) {
    $error_author = '';
    $error_synopsis = 'Nội dung không được để trống!';
  } else if (empty(trim($genres))) {
    $error_genres = 'Nội dung không được để trống!';
    $error_synopsis = '';
  } else {
    $error_genres = '';
    $cover_image_url = '';
    if (!empty($_FILES['cover_image']['name'])) {
      if (!function_exists('wp_handle_upload')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
      }
      $uploaded_file = $_FILES['cover_image'];
      $upload = wp_handle_upload($uploaded_file, array('test_form' => false));

      if (!isset($upload['error']) && isset($upload['url'])) {
        $cover_image_url = $upload['url'];
      }
    }

    $wpdb->insert(
      $table_name,
      array(
        'story_name' => $story_name,
        'slug' => $slug,
        'editor' => $editor,
        'author' => $author,
        'status' => $status,
        'synopsis' => $synopsis,
        'cover_image_url' => $cover_image_url,
      )
    );

    $type_names = array_map('trim', explode(',', $genres));

    $story_id = $wpdb->insert_id;
    foreach ($type_names as $type_name) {
      $type_id = $wpdb->get_var($wpdb->prepare(
        "SELECT id FROM wp_type WHERE type_name = %s",
        $type_name
      ));

      // Thêm vào bảng trung gian
      $wpdb->insert('wp_story_type', [
        'story_id' => $story_id,
        'type_id' => $type_id,
      ]);
    }


    if ($story_name) {
      // Chuyển hướng về trang chính với thông báo thành công
      echo "<script>alert('Thêm truyện thành công!'); window.location.href='" . home_url('/quan-ly-truyen/' . $slug) . "';</script>";
      exit;
    } else {
      // wp_die('Lỗi khi thêm truyện. Vui lòng thử lại.');
      $error_message = 'Lỗi khi lưu dữ liệu, vui lòng thử lại.';
    }

  }
}
?>

<?php
/* Template Name: UpStory */
get_header();
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
              <a href="#" class="self-stretch mr-[12px]" tabindex="0">Đăng truyện</a>
              <!-- ➡️ Mũi tên SVG -->
              <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
                  <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999"
                    stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>
            </div>

          </nav>


          <!-- Form Đăng Truyện -->
          <form id="storyForm"
            class="bg-white px-[17px] py-[17px] lg:px-[3.5rem] lg:py-[2.125rem] w-full text-[1.75rem]" method="POST"
            enctype="multipart/form-data">
            <?php wp_nonce_field('story_upload_action', 'story_nonce'); ?>

            <!-- Upload Ảnh Bìa -->
            <div class="flex items-end">
              <img id="previewImage" src="https://via.placeholder.com/150" alt="Ảnh bìa"
                class="w-[13.25rem] aspect-[0.67] object-cover border">
              <input type="file" id="coverUpload" name="cover_image" class="hidden" accept="image/*">
              <button type="button" id="uploadBtn"
                class="px-[1.25rem] py-[1.25rem] ml-[0.75rem] text-[1.75rem] bg-red-light-hover text-red-normal rounded-[0.75rem]">Chọn
                tệp</button>
            </div>

            <!-- Tên truyện -->
            <div>
              <label for="story-name" class="mt-[1.25rem] font-semibold text-red-dark">Tên truyện</label>
              <input id="story-name" name="story_name" type="text" placeholder="Nhập tên truyện..." value="<?php if (isset($story_name))
                echo esc_html($story_name); ?>"
                class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none" />
              <?php if (!empty($error_story_name)) {
                echo '<p style="color: red;"><?php echo esc_html($error_story_name); ?></p>';
              } ?>
            </div>

            <!-- Tác giả -->
            <div>
              <label for="author-name" class="font-semibold text-red-dark mt-[1.25rem]">Tác giả</label>
              <input id="author-name" name="author" type="text" placeholder="Tên tác giả..." value="<?php if (isset($author))
                echo esc_html($author); ?>"
                class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none" />
              <?php if (!empty($error_author)): ?>
                <p style="color: red;"><?php echo esc_html($error_author); ?></p>
              <?php endif; ?>
            </div>

            <!-- Tình trạng -->
            <div>
              <label for="status" class="font-semibold text-red-dark mt-[1.25rem]">Tình trạng</label>
              <select id="status" name="status"
                class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none">
                <option value="Đang tiến hành">Đang tiến hành</option>
                <option value="Hoàn thành">Hoàn thành</option>
                <option value="Tạm ngừng">Tạm ngừng</option>
              </select>
            </div>

            <!-- Thể loại -->
            <div>
              <label class="font-semibold text-red-dark-hover mt-[1.25rem]">Thể loại</label>
              <div class="flex flex-wrap gap-[1rem] mt-[1rem] text-[1.5rem]">
                <?php
                $genres = $wpdb->get_col("SELECT type_name FROM wp_type");
                foreach ($genres as $genre) {
                  echo "
            <label class='genre-label inline-block py-[1rem] px-[1.25rem] text-center cursor-pointer 
              bg-orange-light-active rounded-lg hover:bg-red-normal hover:text-red-light 
              transition-colors text-red-dark-hover'>
              <input type='checkbox' name='genres[]' value='$genre' class='hidden genre-checkbox' />
              <span class='font-normal'>$genre</span>
            </label>";
                }
                ?>
              </div>
              <?php if (!empty($error_genres)): ?>
                <p style="color: red;"><?php echo esc_html($error_genres); ?></p>
              <?php endif; ?>

            </div>

            <!-- Văn án -->
            <div>
              <label for="synopsis" class="font-semibold text-red-dark mt-[1.25rem]">Văn án</label>
              <textarea id="synopsis" name="synopsis" class="min-h-[200px]"> <?php if (isset($synopsis))
                echo esc_html($synopsis); ?>
      </textarea>
              <?php if (!empty($error_synopsis)): ?>
                <p style="color: red;"><?php echo esc_html($error_synopsis); ?></p>
              <?php endif; ?>
              <!-- <textarea name="synopsis" id="content"></textarea> -->
              <p class="mt-[1rem] text-[1.375rem] text-red-dark">Không quá 500 từ.</p>
              <p class="mt-[1rem] text-[1.375rem] text-red-dark">Nghiêm cấm sử dụng từ ngữ thô tục, 18+, phân biệt vùng
                miền,
                vấn đề liên quan
                đến chính trị. Nếu chúng tôi phát hiện sẽ từ chối duyệt, gỡ bỏ và có nguy cơ khóa tài khoản.</p>
            </div>

            <div class="flex justify-end mt-[1rem]">
              <div id="resultMessage" class="text-red-normal"></div>
            </div>

            <div class="flex justify-end mt-[1rem]">
              <button type="submit" name="upStory"
                class="ml-[0.75rem] px-[1.25rem] py-[1.25rem] bg-red-normal text-orange-light rounded-[0.75rem]">Đăng
                nháp</button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</main>

<!-- ✅ JavaScript -->
<script>
  // Upload Ảnh Bìa
  const uploadBtn = document.getElementById("uploadBtn");
  const coverUpload = document.getElementById("coverUpload");
  const previewImage = document.getElementById("previewImage");

  uploadBtn.addEventListener("click", () => coverUpload.click());

  coverUpload.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = () => previewImage.src = reader.result;
      reader.readAsDataURL(file);
    }
  });
  document.addEventListener("DOMContentLoaded", function () {
    const genreLabels = document.querySelectorAll(".genre-label");

    genreLabels.forEach(label => {
      label.addEventListener("click", function () {
        const checkbox = this.querySelector(".genre-checkbox");
        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
          this.classList.add("bg-red-normal", "text-red-light");
          this.classList.remove("bg-orange-light-active", "text-red-dark-hover");
        } else {
          this.classList.remove("bg-red-normal", "text-red-light");
          this.classList.add("bg-orange-light-active", "text-red-dark-hover");
        }
      });
    });
  });

  document.getElementById('storyForm').addEventListener('submit', async function (e) {
    // e.preventDefault(); // Ngăn form load lại trang

    var content = $('#synopsis').summernote('code');
    document.getElementById('content').value = content;
    console.log('Nội dung gửi đi:', content);

    //   const formData = new FormData(this);
    //   formData.append('action', 'upload_story'); // Tên action đã khai báo trong PHP
    //   formData.append('security', '<?php echo wp_create_nonce('story_upload_nonce'); ?>'); // Thêm nonce để bảo mật

    //   try {
    //     const response = await fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
    //       method: 'POST',
    //       body: formData,
    //     });

    //     const result = await response.text();
    //     const resultMessage = document.getElementById('resultMessage');
    //     resultMessage.innerHTML = result;

    //     // Kiểm tra nếu thông báo thành công, chờ 3s rồi chuyển hướng
    //     if (result.toLowerCase().includes('thêm truyện thành công')) {
    //       // setTimeout(() => {
    //       //   window.location.href = '<?php echo home_url('/'); ?>';
    //       // }, 3000); // 3000ms = 3s
    //     }
    //   } catch (error) {
    //     console.error('Lỗi khi gửi form:', error);
    //     document.getElementById('resultMessage').innerHTML = 'Lỗi khi gửi form. Vui lòng thử lại!';
    //   }
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
  }

  // Đảm bảo sự kiện input được gắn sau khi Summernote load
  setTimeout(setupWordCountObserver, 1000);
</script>