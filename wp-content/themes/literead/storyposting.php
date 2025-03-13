<<<<<<< HEAD
<?php

/* Template Name: storyposting */
get_header();

?>
<div class="pb-7 bg-orange-light-active rounded-xl">
  <div class="max-md:max-w-full">
    <div class="flex gap-5 max-md:flex-col">
      <aside class="w-[18rem] md:w-full">
      </aside>
      <main class="w-[calc(100%-19.25rem)] max-md:w-full">
        <div class="w-full max-md:mt-5 max-md:max-w-full">
          <section class="px-[3.5rem] py-[2.125rem] max-w-full w-[1520px] bg-white">
            <header class="flex flex-wrap gap-6 items-end w-full font-medium text-pink-800 max-md:max-w-full">
              <div class="relative">
                <img id="avatarImg"
                    src="https://cdn.builder.io/api/v1/image/assets/098eab35f97a42d2ab00c28a92331526/19f6d05b507f3b0342a5b3659b7ee4a740cff5e8224fa48c5439a249ff514361?placeholderIfAbsent=true"
                    alt="Profile avatar"
                    style="object-fit: cover; border-radius: 50%;"
                    class="object-contain shrink-0 aspect-square w-[6.1875rem] rounded-full border border-gray-300" />
                <input type="file" id="avatarInput" accept="image/*"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer hidden" />
            </div>

            <!-- Thông tin người dùng -->
            <div class="flex flex-col flex-1 shrink items-start basis-0 min-w-60 max-md:max-w-full">
                <h1 id="hoten" class="text-[1.875rem]">Nhung nè</h1>
                <p id="email" class="mt-3 text-[1.75rem] opacity-60">cabietbay@gmail.com</p>
            </div>
            </header>

            <nav class="flex gap-2 items-start self-start mt-12 text-[1.875rem] font-medium max-md:mt-10">
              <button
                class="gap-2 self-stretch px-[1.25rem] py-[0.625rem] text-[1.875rem] text-[#D56665] bg-[#FFF2F0] rounded-xl min-w-60">
                Thông tin cá nhân
              </button>
              <button id="editButton" class="gap-2.5 self-stretch p-2.5 text-[#FFF7F5] whitespace-nowrap bg-[#D56665] rounded-xl">
                Sửa
              </button>
            </nav>

            <section class="mt-12 w-full text-[1.75rem] text-[#A04D4C] max-md:mt-10 max-md:max-w-full">

              <div class="flex flex-wrap gap-[1.375rem] items-start w-full max-md:max-w-full">

                <div class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full">
                  <label for="Hoten" class="font-semibold max-md:max-w-full">Họ và tên</label>
                  <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                  <input type="text" id="Hoten" name="Hoten" value="Trần Lâm Ngọc Khanh" readonly
                    class="text-[#A04D4C] font-medium px-[0.5rem] py-[1rem] mt-4 w-full border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] outline-none"
                    required />
                    </div>
                </div>

                <div class="grow shrink font-medium min-w-60 w-[566px] max-md:max-w-full">
                <label for="SDT" class="font-semibold tracking-wide leading-none max-md:max-w-full">Số điện thoại</label>
                <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                  <input type="tel" id="SDT" name="SDT" value="0987654213" readonly
                    class="text-[#A04D4C] font-medium px-[0.5rem] py-[1rem] mt-4 w-full border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] outline-none"
                    required />                
                </div>
                  <p class="mt-[1rem] text-[1.5rem] text-[CD0800] max-md:max-w-full">
                    Vui lòng nhập đúng số điện thoại liên kết Momo.
                  </p>
                </div>

                <div
                  class="grow shrink tracking-wide leading-none whitespace-nowrap min-w-60 w-[566px] max-md:max-w-full">
                  <label for="Gmail" class="font-semibold tracking-wide leading-none max-md:max-w-full">Gmail</label>
                  <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                  <input type="text" id="Gmail" name="Gmail" value="cabietbay@gmail.com" readonly
                    class="overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)]  outline-none max-md:max-w-full"
                   require/>
      
                  </div>    
                </div>

                <div class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full">
                <label for="ngaythamgia" class="font-semibold tracking-wide leading-none max-md:max-w-full">Ngay tham gia</label>
                <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                  <input type="date" id="ngaythamgia" name="ngaythamgai" value="2023-08-20" readonly
                    class="overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)]  outline-none max-md:max-w-full"
                    require/>
                </div>
                </div>

                <div class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full">
                <label for="ngaythamgia" class="font-semibold tracking-wide leading-none max-md:max-w-full">Cập nhật lần cuối</label>
                <div class="overflow-hidden w-full max-md:max-w-full text-[#A04D4C]">
                  <input type="date" id="ngaythamgia" name="ngaythamgai" value="2023-08-20" readonly
                    class="overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)]  outline-none max-md:max-w-full"
                    require/>
                </div>
                </div>
            </section>

            <section class="mt-12 max-md:mt-10">
              <h2
                class="gap-2 self-stretch px-[1.25rem] py-[0.625rem] text-[1.875rem] text-[#D56665] bg-[#FFF2F0] rounded-xl font-medium w-fit">
                Thông tin truyện
              </h2>

              <div class="mt-12 w-full text-pink-800 max-md:mt-10 max-md:max-w-full">
                <h3
                  class="flex-1 shrink gap-[0.75rem] self-stretch w-full text-[1.875rem] font-medium leading-none basis-0 max-md:max-w-full">
                  14 Truyện
                </h3>

                <div class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full">
                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular">4</p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Truyện sáng tác</h4>
                  </article>

                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular">10</p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Truyện dịch</h4>
                  </article>
                </div>

                <div class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full">
                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular">120</p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Lượt thích</h4>
                  </article>

                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular">66.6K</p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Lượt đọc</h4>
                  </article>
                </div>

                <div class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full">
                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular">50.1K</p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Số xu</h4>
                  </article>

                  <article
                    class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full">
                    <p class="text-[1.875rem] font-regular">600</p>
                    <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Lượt lưu</h4>
                  </article>
                </div>
              </div>
            </section>
          </section>
          </section>
        </div>
      </main>
    </div>
  </div>
</div>
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
    document.getElementById('editButton').addEventListener('click', function () {
        let inputs = [document.getElementById('Hoten'), document.getElementById('SDT')];
        let avatarInput = document.getElementById('avatarInput');
        let avatarImg = document.getElementById('avatarImg');
        let button = this;

        if (inputs[0].readOnly) {
            // Mở khóa input để chỉnh sửa
            inputs.forEach(input => input.readOnly = false);
            avatarInput.classList.remove('hidden'); // Hiện input chọn ảnh
            button.textContent = "Lưu"; // Đổi nút thành "Lưu"
            inputs[0].focus(); // Focus vào ô đầu tiên
        } else {
            // Khóa lại sau khi lưu
            inputs.forEach(input => input.readOnly = true);
            avatarInput.classList.add('hidden'); // Ẩn input chọn ảnh
            button.textContent = "Sửa"; // Đổi lại nút thành "Sửa"
        }
    });

    // Xử lý chọn ảnh
    document.getElementById('avatarInput').addEventListener('change', function (event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('avatarImg').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?php
get_footer();
?>
=======
<?php

/* Template Name: storyposting */
get_header(); 

?>
<div class="pb-7 bg-orange-light-active rounded-xl">
 <div class="max-md:max-w-full">
  <div class="flex gap-5 max-md:flex-col">
   <aside class="w-[18rem] md:w-full">
   </aside>
   <main class="w-[calc(100%-19.25rem)] max-md:w-full">
    <div class="w-full max-md:mt-5 max-md:max-w-full">
     <section class="px-[3.5rem] py-[2.125rem] max-w-full w-[1520px] bg-white">
     <header
    class="flex flex-wrap gap-6 items-end w-full font-medium text-pink-800 max-md:max-w-full"
  >
    <img
      src="https://cdn.builder.io/api/v1/image/assets/098eab35f97a42d2ab00c28a92331526/19f6d05b507f3b0342a5b3659b7ee4a740cff5e8224fa48c5439a249ff514361?placeholderIfAbsent=true"
      alt="Profile avatar"
      class="object-contain shrink-0 aspect-square w-[6.1875rem]"
    />
    <div
      class="flex flex-col flex-1 shrink items-start basis-0 min-w-60 max-md:max-w-full"
    >
      <h1 class="text-[1.875rem]">Nhung nè</h1>
      <p class="mt-3 text-[1.75rem] opacity-60">cabietbay@gmail.com</p>
    </div>
  </header>

  <nav
    class="flex gap-2 items-start self-start mt-12 text-[1.875rem] font-medium max-md:mt-10"
  >
    <button
      class="gap-2 self-stretch px-[1.25rem] py-[0.625rem] text-[1.875rem] text-[#D56665] bg-[#FFF2F0] rounded-xl min-w-60"
    >
      Thông tin cá nhân
    </button>
    <button
      class="gap-2.5 self-stretch p-2.5 text-[#FFF7F5] whitespace-nowrap bg-[#D56665] rounded-xl"
    >
      Sửa
    </button>
  </nav>

  <section
    class="mt-12 w-full text-[1.75rem] text-[#A04D4C] max-md:mt-10 max-md:max-w-full"
  >
    <div class="flex flex-wrap gap-[1.375rem] items-start w-full max-md:max-w-full">
      <div
        class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full"
      >
        <h2 class="font-semibold max-md:max-w-full">Họ và tên</h2>
        <p
          class="overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] max-md:max-w-full"
        >
          Trần Lâm Ngọc Khanh
        </p>
      </div>

      <div class="grow shrink font-medium min-w-60 w-[566px] max-md:max-w-full">
        <h2 class="font-semibold tracking-wide leading-none max-md:max-w-full">
          Số điện thoại
        </h2>
        <p
          class="overflow-hidden px-[0.5rem] py-[1rem] mt-[0.8rem] w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] max-md:max-w-full"
        >
          0987654213
        </p>
        <p class="mt-[1rem] text-[1.5rem] text-[CD0800] max-md:max-w-full">
          Vui lòng nhập đúng số điện thoại liên kết Momo.
        </p>
      </div>

      <div
        class="grow shrink tracking-wide leading-none whitespace-nowrap min-w-60 w-[566px] max-md:max-w-full"
      >
        <h2 class="font-semibold max-md:max-w-full">Gmail</h2>
        <p
          class="overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] max-md:max-w-full"
        >
          cabietbay@gmail.com
        </p>
      </div>

      <div
        class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full"
      >
        <h2 class="font-semibold max-md:max-w-full">Ngày tham gia</h2>
        <p
          class="overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] max-md:max-w-full"
        >
          20/08/2023
        </p>
      </div>

      <div
        class="grow shrink tracking-wide leading-none min-w-60 w-[566px] max-md:max-w-full"
      >
        <h2 class="font-semibold max-md:max-w-full">Cập nhật lần cuối</h2>
        <p
          class="overflow-hidden px-[0.5rem] py-[1rem] mt-4 w-full font-medium border-b border-solid border-b-[color:var(--Foundation-Red-red-Dark,#A04D4C)] max-md:max-w-full"
        >
          20/10/2023
        </p>
      </div>
    </div>
  </section>

  <section class="mt-12 max-md:mt-10">
    <h2
      class="gap-2 self-stretch px-[1.25rem] py-[0.625rem] text-[1.875rem] text-[#D56665] bg-[#FFF2F0] rounded-xl font-medium w-fit"
    >
      Thông tin truyện
    </h2>

    <div class="mt-12 w-full text-pink-800 max-md:mt-10 max-md:max-w-full">
      <h3
        class="flex-1 shrink gap-[0.75rem] self-stretch w-full text-[1.875rem] font-medium leading-none basis-0 max-md:max-w-full"
      >
        14 Truyện
      </h3>

      <div
        class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full"
      >
        <article
          class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full"
        >
          <p class="text-[1.875rem] font-regular">4</p>
          <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Truyện sáng tác</h4>
        </article>

        <article
          class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full"
        >
          <p class="text-[1.875rem] font-regular">10</p>
          <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Truyện dịch</h4>
        </article>
      </div>

      <div
        class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full"
      >
        <article
          class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full"
        >
          <p class="text-[1.875rem] font-regular">120</p>
          <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Người theo dõi</h4>
        </article>

        <article
          class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full"
        >
          <p class="text-[1.875rem] font-regular">66.6K</p>
          <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Lượt đọc</h4>
        </article>
      </div>

      <div
        class="flex flex-wrap gap-3 items-start mt-[0.75rem] w-full max-md:max-w-full"
      >
        <article
          class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full"
        >
          <p class="text-[1.875rem] font-regular">50.1K</p>
          <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Số xu</h4>
        </article>

        <article
          class="flex flex-col flex-1 shrink justify-center p-[1.25rem] bg-[#FFF2F0] rounded-xl basis-0 min-w-60 max-md:max-w-full"
        >
          <p class="text-[1.875rem] font-regular">600</p>
          <h4 class="mt-[1.25rem] text-[1.5rem] font-semibold">Lượt lưu</h4>
        </article>
      </div>
    </div>
  </section>
       </section>
     </section>
    </div>
   </main>
  </div>
 </div>
</div>
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
<?php
 get_footer(); 
?>
>>>>>>> f5fdf9ee927840a5c578c157359fd62f153a219c
