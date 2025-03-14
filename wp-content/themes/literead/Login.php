<?php
/* Template Name: Login */
get_header(); 

?>
<div
  class="flex overflow-hidden flex-col mx-auto w-full bg-white max-w-[428px]"
>

  <div
    class="flex flex-col px-[17px] pt-[17px] w-full text-red-dark bg-white min-h-[779px] text-[18px] "
  >
    <form>
      <div class="flex flex-col w-full tracking-wide leading-none ">
        <label for="emailOrPhone" class="font-semibold">Email hoặc số điện thoại</label>
        <input
          type="text"
          id="emailOrPhone"
          class="flex overflow-hidden flex-col justify-center px-[12px] py-[12px] mt-[8px] w-full whitespace-nowrap border-b border-solid border-red-dark"
          placeholder="123@gmail.com"
        />
      </div>
      <div class="flex flex-col mt-[12px] w-full leading-none">
        <label for="password" class="font-semibold tracking-wide">Mật khẩu</label>
        <div
          class="flex overflow-hidden gap-1.5 items-center px-[12px] py-[12px] mt-[8px] w-full tracking-wide whitespace-nowrap border-b border-solid border-red-dark"
        >
          <input
            type="password"
            id="password"
            class="flex-1 shrink self-stretch my-auto opacity-60 basis-0"
            value="**********"
          />
        </div>
        <button class="mt-[8px] text-[16px] font-medium text-right">Quên mật khẩu</button>
      </div>
      <div class="mt-[12px] w-full text-base font-medium text-center text-stone-500">
        <span class="text-red-dark  text-[16px] ">Bạn chưa có tài khoản?</span>
        <button class="font-semibold text-red-dark-hover  text-[16px] ">Đăng ký</button>
      </div>
      <button
        type="submit"
        class="self-stretch py-[16px] mt-[12px] w-full font-medium text-center text-orange-light bg-red-normal rounded-[8px] hover:bg-red-light hover:text-red-normal transition-colors duration-300"
      >
        Đăng nhập
      </button>
    </form>
    <div
      class="flex justify-center items-center px-2.5 mt-[12px] w-full text-base font-semibold text-center text-red-dark-hover"
    >
      <div
        class="flex-1 shrink self-stretch my-auto h-0 border-b border-solid border-red-dark-hover basis-5 w-[116.5px]"
      ></div>
      <div class="self-stretch px-2.5 my-auto w-[141px] text-[16px] "> 
        Đăng nhập với
      </div>
      <div
        class="flex-1 shrink self-stretch my-auto h-0 border-b border-solid border-red-dark-hover basis-5 w-[116.5px]"
      ></div>
    </div>
    <button
      class="self-stretch text-red-dark px-[10px] py-[12px] mt-[12px] w-full font-medium text-center whitespace-nowrap bg-orange-light rounded-[8px] border-b border-t border-l border-r border-solid border-red-normal"
    >
      Google
    </button>
    <button
      class="self-stretch text-red-dark px-[10px] py-[12px] mt-[12px] w-full font-medium text-center whitespace-nowrap bg-orange-light rounded-[8px] border-b border-t border-l border-r border-solid border-red-normal"
    >
      Facebook
    </button>
  </div>
</div>

<?php get_footer(); ?>