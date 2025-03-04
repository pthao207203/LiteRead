<?php
/* Template Name: UpStory */
get_header(); 
?>

  <!-- 💡 Nội dung chính -->
  <div class="w-full p-0 flex-1">

    <!-- Nội dung bên dưới Header -->
    <nav class="flex flex-wrap items-center w-full px-[20px] text-[1.125rem] font-medium  bg-white text-red-darker mb-[2px]" aria-label="Navigation menu">
  
  <!-- 📚 Truyện của tôi -->
  <div class="flex items-center self-stretch px-[12px] py-[10px] mr-0 ">  
    <a href="#" class="self-stretch mr-[12px]" tabindex="0">Truyện của tôi</a>
    <!-- ➡️ Mũi tên SVG -->
    <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
        <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
  </div>

  <!-- 📝 Đăng truyện -->
  <div class="flex items-center self-stretch px-[12px] py-[10px] mr-0 ">  
    <a href="#" class="self-stretch mr-[12px]" tabindex="0">Đăng truyện</a>
    <!-- ➡️ Mũi tên SVG -->
    <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
        <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
  </div>

</nav>


      <!-- Form Đăng Truyện -->
<form class="bg-white px-[3.5rem] py-[2.125rem] w-full" method="POST" action="your-backend-endpoint" enctype="multipart/form-data">

    <!-- Upload Ảnh Bìa -->
    <div class="flex items-end">
        <img id="previewImage" src="https://via.placeholder.com/150" alt="Ảnh bìa" class="w-[13.25rem] h-[20.75rem] object-cover border">
        <input type="file" id="coverUpload" name="cover_image" class="hidden" accept="image/*">
        <button type="button" id="uploadBtn" class="px-[1.25rem] py-[1.25rem] ml-[0.75rem] text-[1.75rem] bg-red-light-hover text-red-normal rounded-[0.75rem]">Chọn tệp</button>
    </div>

    <!-- Tên truyện -->
    <div>
        <label for="story-name" class="mt-[1.25rem] font-semibold text-red-dark">Tên truyện</label>
        <input id="story-name" name="story_name" type="text" placeholder="Nhập tên truyện..." class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none" />
    </div>

    <!-- Tác giả -->
    <div>
        <label for="author-name" class="font-semibold text-red-dark mt-[1.25rem]">Tác giả</label>
        <input id="author-name" name="author" type="text" placeholder="Tên tác giả..." class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none" />
    </div>

    <!-- Tình trạng -->
    <div>
        <label for="status" class="font-semibold text-red-dark mt-[1.25rem]">Tình trạng</label>
        <select id="status" name="status" class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none">
            <option value="Đang tiến hành">Đang tiến hành</option>
            <option value="Hoàn thành">Hoàn thành</option>
            <option value="Tạm ngừng">Tạm ngừng</option>
        </select>
    </div>

    <!-- Thể loại -->
    <div>
        <label class="font-semibold text-red-dark mt-[1.25rem]">Thể loại</label>
        <div class="flex flex-wrap gap-[0.5rem] mt-[1rem]">
    <?php
        $genres = ['ABO', 'Mạt thế', 'Ngọt sủng', 'Ngược', 'Ngôn tình', 'Đam mỹ', 'Bách hợp', 'SE', 'OE', 'HE', 'Cổ đại', 'Hiện đại', 'Tu tiên', 'Xuyên không', 'Trọng sinh', 'Hệ thống', 'Nữ cường', 'Tổng tài'];
        foreach ($genres as $genre) {
            echo "
            <button type='button' class='genre-btn w-[10rem] py-[1.25rem] text-red-dark-hover bg-orange-light-active rounded-lg hover:bg-red-normal hover:text-red-light' data-selected='false' data-value='$genre'>
                $genre
            </button>
            <input type='hidden' name='genres[]' value='' class='genre-input' data-value='$genre' />";
            echo "$genre";
        }
    ?>
</div>


    </div>

    <!-- Văn án -->
    <div>
        <label for="synopsis" class="font-semibold text-red-dark mt-[1.25rem]">Văn án</label>
        <textarea id="synopsis" name="synopsis" rows="5" class="literead w-full px-[1rem] py-[0.5rem] mt-[1rem] text-red-dark border-1 rounded-[8px] focus:outline-none focus:ring-2 focus:ring-red-normal" style="border-color: #D56665 important!;" placeholder="Tóm tắt nội dung truyện..."></textarea>
        <p class="mt-[1rem] text-red-dark">Không quá 500 từ.</p>
        <p class="mt-[1rem] text-red-dark">Nghiêm cấm sử dụng từ ngữ thô tục, 18+, phân biệt vùng miền, vấn đề liên quan đến chính trị. Nếu chúng tôi phát hiện sẽ từ chối duyệt, gỡ bỏ và có nguy cơ khóa tài khoản.</p>
    </div>

    <!-- Nút hành động -->
    <div class="flex justify-end mt-[1rem]">
        <button type="submit" class="ml-[0.75rem] px-[1.25rem] py-[1.25rem] bg-red-normal text-orange-light rounded-[0.75rem]">Đăng nháp</button>
    </div>

</form>



  <!-- ✅ JavaScript -->
  <script>
    // Sidebar Toggle cho màn hình nhỏ
    const sidebar = document.getElementById("sidebar");
    const menuToggle = document.getElementById("menuToggle");

    menuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("sidebar-hidden");
    });

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
  </script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const genreButtons = document.querySelectorAll(".genre-btn");

    genreButtons.forEach(button => {
      button.addEventListener("click", function () {
        const isSelected = this.getAttribute("data-selected") === "true";

        if (isSelected) {
          this.classList.remove("bg-red-normal", "text-red-light");
          this.classList.add("bg-orange-light-active", "text-red-dark-hover");
          this.setAttribute("data-selected", "false");
        } else {
          this.classList.add("bg-red-normal", "text-red-light");
          this.classList.remove("bg-orange-light-active", "text-red-dark-hover");
          this.setAttribute("data-selected", "true");
        }
      });
    });
  });
</script>

<?php get_footer(); ?>
