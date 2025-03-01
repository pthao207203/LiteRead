<?php
/* Template Name: UpStory */
get_header(); 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Author Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Reset body margin */
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      background-color: #FFE5E1;
    }

    /* Sidebar */
    .sidebar {
      width: 18rem;
      height: 912px;
      background-color: #1f2937; /* Màu xám đậm */
      color: white;
      position: fixed;
      top: 60px; /* Đẩy xuống dưới header */
      left: 0;
      transition: transform 0.3s ease;
    }

    /* Mặc định ẩn sidebar ở màn hình nhỏ */
    .sidebar-hidden {
      transform: translateX(-100%);
    }

    /* Luôn hiển thị sidebar ở màn hình lớn */
    @media (min-width: 768px) {
      .sidebar {
        transform: translateX(0);
      }

      #menuToggle {
        display: none; /* Ẩn nút menu ở màn hình lớn */
      }
    }

    /* Main Content */
    .main-content {
      margin-left: 19.25rem;
      width: calc(100%-19.25rem);
      padding: 0;
      margin-top: 0px;
      flex: 1;
    }

    @media (max-width: 767px) {
      .main-content {
        margin-left: 0;
        width: 100%;
      }
    }


   
    /* Sidebar Link Hover */
    .sidebar a:hover {
      color: #fbbf24;
    }

    /* Nút Menu */
    #menuToggle {
      position: fixed;
      top: 70px;
      left: 10px;
      background-color: #f87171;
      color: white;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      z-index: 20;
    }
  </style>
</head>

<body>
  <!-- 📋 Sidebar -->
  <aside id="sidebar" class="sidebar sidebar-hidden md:sidebar">
    <h2 class="text-2xl font-bold p-4">📋 Menu</h2>
    <ul class="space-y-4 px-4">
      <li><a href="#" class="hover:text-yellow-400">🏠 Trang chủ</a></li>
      <li><a href="#" class="hover:text-yellow-400">📖 Thể loại</a></li>
      <li><a href="#" class="hover:text-yellow-400">⭐ Yêu thích</a></li>
      <li><a href="#" class="hover:text-yellow-400">⚙️ Cài đặt</a></li>
    </ul>
  </aside>

  <!-- Nút Toggle Sidebar -->
  <button id="menuToggle">📂 Menu</button>

  <!-- 💡 Nội dung chính -->
  <div class="main-content ">

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
      <form class="bg-white px-[3.5rem] py-[2.125rem] w-full">

        <!-- Upload Ảnh Bìa -->
        <div class="flex items-end">
          <img id="previewImage" src="https://via.placeholder.com/150" alt="Ảnh bìa" class="w-[13.25rem] h-[20.75rem] object-cover border">
          <input type="file" id="coverUpload" class="hidden" accept="image/*">
          <button type="button" id="uploadBtn" class="px-[1.25rem] py-[1.25rem] ml-[0.75rem] text-[1.75rem] bg-red-light-hover text-red-normal rounded-[0.75rem]">Chọn tệp</button>
        </div>

        <!-- Tên truyện -->
        <div>
          <label for="story-name" class="mt-[1.25rem] font-semibold text-red-dark">Tên truyện</label>
          <input id="story-name text-red-dark" type="text" placeholder="Nhập tên truyện..." class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark  focus:outline-none" />
        </div>

        <!-- Tác giả -->
        <div>
          <label for="author-name" class="font-semibold text-red-dark mt-[1.25rem] ">Tác giả</label>
          <input id="author-name" type="text" placeholder="Tên tác giả..." class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark  focus:outline-none" />
        </div>

        <!-- Tình trạng -->
        <div>
          <label for="status" class="font-semibold text-red-dark mt-[1.25rem] ">Tình trạng</label>
          <select id="status" class="w-full mt-[1rem] px-[0.5rem] py-[0.25rem] border-b border-red-dark text-red-dark focus:outline-none">
     
            <option>Đang tiến hành</option>
            <option>Hoàn thành</option>
            <option>Tạm ngừng</option>

          </select>
        </div>

        <!-- Thể loại -->
        <div>
    <label class="font-semibold text-red-dark mt-[1.25rem]">Thể loại</label>
    <div class="flex flex-wrap gap-[0.5rem] mt-[1rem]">
        <?php
            $genres = ['ABO', 'Mạt thế', 'Ngọt sủng', 'Ngược', 'Ngôn tình', 'Đam mỹ', 'Bách hợp', 'SE', 'OE', 'HE', 'Cổ đại', 'Hiện đại', 'Tu tiên', 'Xuyên không', 'Trọng sinh', 'Hệ thống', 'Nữ cường', 'Tổng tài'];
            foreach($genres as $genre) {
                echo "<button type='button' class='w-[10rem] py-[1.25rem] text-red-dark-hover bg-orange-light-active rounded-lg hover:bg-red-normal hover:text-red-light  genre-btn' data-selected='false'>$genre</button>";
            }
        ?>
    </div>
</div>


        <!-- Văn án -->
        <div>
          <label for="synopsis" class="font-semibold text-red-dark mt-[1.25rem]">Văn án</label>
          <textarea id="synopsis text-red-dark" rows="5" class="w-full px-[1rem] py-[0.5rem] mt-[1rem] text-red-dark border-1 border-red-normal rounded-[8px] focus:outline-none focus:ring-2 focus:ring-red-normal" placeholder="Tóm tắt nội dung truyện..."></textarea>
          <p class="mt-[1rem] tex text-red-dark">Không quá 500 từ.</p>
          <p class="mt-[1rem] tex text-red-dark">Nghiêm cấm sử dụng từ ngữ thô tục, 18+, phân biệt vùng miền, vấn đề liên quan đến chính trị. Nếu chúng tôi phát hiện sẽ từ chối duyệt, gỡ bỏ và có nguy cơ khóa tài khoản.</p>
        </div>

        <!-- Nút hành động -->
        <div class="flex justify-end mt-[1rem] ">
          <button type="button" class="px-[1.25rem] py-[1.25rem] text-[#6C8299] bg-[#E9EBF8] rounded-[0.75rem]">Đăng nháp</button>
          <button type="submit" class="ml-[0.75rem] px-[1.25rem] py-[1.25rem] bg-red-normal text-orange-light rounded-[0.75rem]">Gửi duyệt</button>
        </div>

      </form>
    </div>


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
          this.classList.remove("bg-red-200", "text-white");
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
</body>
</html>

<?php get_footer(); ?>
