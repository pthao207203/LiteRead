<?php
/* Template Name: Signup */
get_header(); 
?>
<div class="flex overflow-hidden flex-col mx-auto w-full bg-white max-w-[480px]">
  
  
  <div class="flex overflow-hidden flex-col w-full bg-red-100">
   
  <div class="flex flex-col px-[17px] pt-[17px] w-full text-[2.25rem] text-red-dark bg-white min-h-[779px]">
    <form>
      <div class="flex flex-col w-full tracking-wide leading-none">
        <label for="emailOrPhone" class="font-semibold">Email hoặc số điện thoại</label>
        <div class="flex overflow-hidden flex-col justify-center px-[8px] py-[12px] mt-[8px] w-full whitespace-nowrap border-b border-solid border-red-dark">
          <input type="text" id="emailOrPhone" placeholder="123@gmail.com" class="opacity-60 bg-transparent border-none outline-none" />
        </div>
      </div>
      <div class="flex flex-col mt-[12px] w-full tracking-wide leading-none">
        <label for="password" class="font-semibold">Mật khẩu</label>
        <div class="flex overflow-hidden gap-1.5 items-center px-[8px] py-[12px] mt-[8px] w-full whitespace-nowrap border-b border-solid border-red-dark">
          <input type="password" id="password" placeholder="**********" class="flex-1 shrink self-stretch my-auto opacity-60 basis-0 bg-transparent border-none outline-none" />

        </div>
      </div>
      <div class="flex flex-col mt-[12px] w-full tracking-wide leading-none">
        <label for="confirmPassword" class="font-semibold">Nhập lại mật khẩu</label>
        <div class="flex overflow-hidden gap-1.5 items-center px-[8px] py-[12px] mt-[8px] w-full whitespace-nowrap border-b border-solid border-red-dark">
          <input type="password" id="confirmPassword" placeholder="**********" class="flex-1 shrink self-stretch my-auto opacity-60 basis-0 bg-transparent border-none outline-none" />
        </div>
      </div>
      <div class="mt-[12px] w-full] text-[2rem] font-medium text-center text-stone-500">
        <span class="text-red-dark ">Bạn đã có tài khoản?</span>
        <a href="#" class="font-semibold text-red-dark-hover">Đăng nhập</a>
      </div>
      <button type="submit" class="gap-2.5 self-stretch py-[16px] mt-[12px] w-full font-medium text-center text-orange-light bg-red-normal rounded-[8px] hover:bg-red-light hover:text-red-normal transition-colors duration-300 ">
        Đăng ký
      </button>
    </form>
  </div>
</div>

<?php get_footer(); ?>
