<?php
/* Template Name: UpChapter */
get_header(); 
?>
<main class="flex flex-col bg-[#FFE5E1]">
    <div class="w-full max-md:max-w-full">
        <div class="flex max-md:flex-col">
          <!-- Sidebar Navigationx -->
          <?php get_sidebar(); ?>
          <section  id="mainContent" class="md:w-10/12 md:ml-[1.25rem] flex-grow transition-all max-md:ml-0 max-md:w-full">
          <div class="w-full bg-white  max-md:max-w-full">
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
    <a href="#" class="self-stretch mr-[12px]" tabindex="0">Thiên quan tứ phúc</a>
    <!-- ➡️ Mũi tên SVG -->
    <div class="flex items-center justify-center w-5 h-5" aria-hidden="true">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none">
        <path d="M7.42499 16.5999L12.8583 11.1666C13.5 10.5249 13.5 9.4749 12.8583 8.83324L7.42499 3.3999" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
  </div>

   <!-- 📝 Đăng truyện -->
   <div class="flex items-center self-stretch px-[12px] py-[10px] mr-0 ">  
    <a href="#" class="self-stretch mr-[12px]" tabindex="0">Đăng chương</a>

</nav>

          <section
            class="px-[3.5rem] py-[2.125rem] max-w-full w-[1520px] text-3xl text-red-dark bg-white"
          >
            <div class="w-full tracking-wide leading-none max-md:max-w-full">
              <h2 class="font-semibold text-[1.75rem] max-md:max-w-full">Tiêu đề chương</h2>
              <div
                class="flex overflow-hidden flex-col justify-center px-[0.5rem] py-[0.75rem] mt-[1rem] w-full whitespace-nowrap border-b border-solid border-b-red-dark max-md:max-w-full"
              >
                <input
                  type="text"
                  placeholder="abc..."
                  class="opacity-60 max-md:max-w-full w-full bg-transparent outline-none"
                />
              </div>
            </div>

            <div class="mt-[1.5rem] w-full font-medium max-md:max-w-full">
              <h3
                class="font-semibold text-[1.75rem] mb-[1rem] tracking-wide leading-none max-md:max-w-full"
              >
                Nội dung
              </h3>
              <textarea id="synopsis" name="synopsis" rows="5" class="literead w-full px-[1rem] py-[0.5rem] mt-[1rem] text-red-dark border-1 rounded-[8px] focus:outline-none focus:ring-2 focus:ring-red-normal" style="border-color: #D56665 important!;" placeholder="Tóm tắt nội dung truyện..."></textarea>
              <p
                class="mt-[1rem] text-[1.375rem] tracking-wide leading-none max-md:max-w-full"
                id="wordCount"
              >
                Số lượng từ: 0
              </p>
              <p
                class="mt-[1rem] text-[1.375rem] tracking-wide leading-6 max-md:max-w-full"
              >
                Nghiêm cấm sử dụng từ ngữ thô tục, 18+, phân biệt vùng miền, vấn
                đề liên quan đến chính trị. Nếu chúng tôi phát hiện sẽ từ chối
                duyệt, gỡ bỏ và có nguy cơ khóa tài khoản
              </p>
              <div
                class="flex justify-end mt-[1rem] w-full leading-none text-orange-light max-md:max-w-full"
              >
                <button
                  class="flex justify-end p-[1.25rem] bg-red-normal rounded-[0.75rem]"
                >
                  <span class="gap-2.5 self-stretch my-auto">Đăng ngay</span>
                </button>
              </div>
            </div>
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


<?php get_footer(); ?>
