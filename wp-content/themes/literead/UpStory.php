<?php
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
    genres TEXT DEFAULT NULL,
    synopsis TEXT DEFAULT NULL,
    rate INT UNSIGNED DEFAULT 5,
    view INT UNSIGNED DEFAULT 0,
    viewDay INT UNSIGNED DEFAULT 0,
    save INT UNSIGNED DEFAULT 0,
    likes INT UNSIGNED DEFAULT 0,
    hot INT UNSIGNED DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (id)
  ) $charset_collate;";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}
?>

<?php
/* Template Name: UpStory */
get_header();
?>

<main class="flex flex-col bg-[#FFE5E1]">
    <div class="w-full max-md:max-w-full">
    <div class="flex max-md:flex-col">
      <!-- Sidebar Navigationx -->
      <?php get_sidebar(); ?>
      <section  id="mainContent" class="md:w-10/12 md:ml-[1.25rem] flex-grow transition-all max-md:ml-0 max-md:w-full">
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
            stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
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
            stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </div>

  </nav>


  <!-- Form Đăng Truyện -->
  <form id="storyForm" class="bg-white px-[17px] py-[17px] md:px-[3.5rem] md:py-[2.125rem] w-full" method="POST"
    enctype="multipart/form-data">

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
      <input id="story-name" name="story_name" type="text" placeholder="Nhập tên truyện..."
        class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none" />
    </div>

    <!-- Tác giả -->
    <div>
      <label for="author-name" class="font-semibold text-red-dark mt-[1.25rem]">Tác giả</label>
      <input id="author-name" name="author" type="text" placeholder="Tên tác giả..."
        class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none" />
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
      <div class="flex flex-wrap gap-[0.5rem] mt-[1rem]">
        <?php
        $genres = ['ABO', 'Mạt thế', 'Ngọt sủng', 'Ngược', 'Ngôn tình', 'Đam mỹ', 'Bách hợp', 'SE', 'OE', 'HE', 'Cổ đại', 'Hiện đại', 'Tu tiên', 'Xuyên không', 'Trọng sinh', 'Hệ thống', 'Nữ cường', 'Tổng tài'];
        foreach ($genres as $genre) {
          echo "
              <label class='genre-label inline-block w-[10rem] py-[1.25rem] text-center cursor-pointer 
                bg-orange-light-active rounded-lg hover:bg-red-normal hover:text-red-light 
                transition-colors text-red-dark-hover'>
                <input type='checkbox' name='genres[]' value='$genre' class='hidden genre-checkbox' />
                <span class='font-normal'>$genre</span>
              </label>";
        }
        ?>
      </div>

    </div>

    <!-- Văn án -->
    <div>
      <label for="synopsis" class="font-semibold text-red-dark mt-[1.25rem]">Văn án</label>
      <div id="synopsis" class="min-h-[200px]">
      </div>
      <textarea name="synopsis" id="content" style="display:none;"></textarea>
      <p class="mt-[1rem] text-red-dark">Không quá 500 từ.</p>
      <p class="mt-[1rem] text-red-dark">Nghiêm cấm sử dụng từ ngữ thô tục, 18+, phân biệt vùng miền, vấn đề liên quan
        đến chính trị. Nếu chúng tôi phát hiện sẽ từ chối duyệt, gỡ bỏ và có nguy cơ khóa tài khoản.</p>
    </div>

    <div class="flex justify-end mt-[1rem]">
      <div id="resultMessage" class="text-red-normal"></div>
    </div>

    <!-- Nút hành động -->
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
      e.preventDefault(); // Ngăn form load lại trang

      var content = quill.root.innerHTML;
      document.getElementById('content').value = content;
      console.log('Nội dung gửi đi:', content);

      const formData = new FormData(this);
      formData.append('action', 'upload_story'); // Tên action đã khai báo trong PHP
      formData.append('security', '<?php echo wp_create_nonce('story_upload_nonce'); ?>'); // Thêm nonce để bảo mật

      try {
        const response = await fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
          method: 'POST',
          body: formData,
        });

        const result = await response.text();
        const resultMessage = document.getElementById('resultMessage');
        resultMessage.innerHTML = result;

        // Kiểm tra nếu thông báo thành công, chờ 3s rồi chuyển hướng
        if (result.toLowerCase().includes('thêm truyện thành công')) {
          setTimeout(() => {
            window.location.href = '<?php echo home_url('/'); ?>';
          }, 3000); // 3000ms = 3s
        }
      } catch (error) {
        console.error('Lỗi khi gửi form:', error);
        document.getElementById('resultMessage').innerHTML = 'Lỗi khi gửi form. Vui lòng thử lại!';
      }
    });


</script>
<?php get_footer(); ?>