<?php
/* Template Name: Login */
get_header(); 
?>
<div class="flex overflow-hidden flex-col mx-auto w-full bg-white max-w-[53.5rem]">

  <div class="flex flex-col px-[2.125rem] pt-[2.125rem] w-full text-red-dark bg-white min-h-[97.375rem] text-[2.25rem]">
    <form>
      <div class="flex flex-col w-full tracking-wide leading-none">
        <label for="emailOrPhone" class="font-semibold">Email hoặc số điện thoại</label>
        <input
          type="text"
          id="emailOrPhone"
          class="flex overflow-hidden flex-col justify-center px-[1.5rem] py-[1.5rem] mt-[1rem] w-full whitespace-nowrap border-b border-solid border-red-dark"
          placeholder="123@gmail.com"
        />
      </div>

      <div class="flex flex-col mt-[1.5rem] w-full leading-none">
        <label for="password" class="font-semibold tracking-wide">Mật khẩu</label>
        <div class="flex overflow-hidden gap-[0.1875rem] items-center px-[1.5rem] py-[1.5rem] mt-[1rem] w-full tracking-wide whitespace-nowrap border-b border-solid border-red-dark">
          <input
            type="password"
            id="password"
            class="flex-1 shrink w-full self-stretch my-auto opacity-60 basis-0"
            value="**********"
          />
        </div>
        <button class="mt-[1rem] text-[2rem] font-medium text-right">Quên mật khẩu</button>
      </div>

      <div class="mt-[1.5rem] w-full text-base font-medium text-center text-stone-500">
        <span class="text-red-dark text-[2rem]">Bạn chưa có tài khoản?</span>
        <button class="font-semibold text-red-dark-hover text-[2rem]">Đăng ký</button>
      </div>

      <button type="submit" class="self-stretch py-[2rem] mt-[1.5rem] w-full font-medium text-center text-orange-light bg-red-normal rounded-[1rem] hover:bg-red-light hover:text-red-normal transition-colors duration-300">
        Đăng nhập
      </button>
    </form>

    <div class="flex justify-center items-center px-[0.3125rem] mt-[1.5rem] w-full text-base font-semibold text-center text-red-dark-hover">
      <div class="flex-1 shrink self-stretch my-auto h-0 border-b border-solid border-red-dark-hover basis-5 w-[14.5625rem]"></div>
      <div class="self-stretch px-[0.3125rem] my-auto w-[17.625rem] text-[2rem]">Đăng nhập với</div>
      <div class="flex-1 shrink self-stretch my-auto h-0 border-b border-solid border-red-dark-hover basis-5 w-[14.5625rem]"></div>
    </div>

    <button class="self-stretch text-red-dark px-[1.25rem] py-[1.5rem] mt-[1.5rem] w-full font-medium text-center whitespace-nowrap bg-orange-light rounded-[1rem] border border-solid border-red-normal">
      Google
    </button>

    <button class="self-stretch text-red-dark px-[1.25rem] py-[1.5rem] mt-[1.5rem] w-full font-medium text-center whitespace-nowrap bg-orange-light rounded-[1rem] border border-solid border-red-normal">
      Facebook
    </button>

  </div>
</div>

<?php get_footer(); ?>
