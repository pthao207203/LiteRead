<?php
/* Template Name: Dieukhoan */
get_header();
if (!isset($_COOKIE['signup_token']) || empty($_COOKIE['signup_token'])) {
  echo "<script>alert('Bạn cần đăng nhập để xem trang này!'); window.location.href='" . home_url('/dang-nhap') . "';</script>";
  exit();
}

global $wpdb, $wp;

?>

<div class="flex w-full">
  <!-- Sidebar -->
  <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
          <?php get_sidebar(); ?>
  <?php endif; ?>

  <!-- Nội dung chính -->
<section id="mainContent"
  class="flex-grow gap-[0.75rem] mt-[4.425rem] overflow-y-auto <?= ($isHome || $isSingleTruyen || $isMobile || $isAuthPage) ? 'pl-0' : 'pl-[19.5rem]' ?>">
  <article class="flex flex-col gap-[36px] mb-[5px] items-start px-14 py-9 w-full bg-white max-md:px-8 max-md:py-6 max-sm:p-4 transition-all duration-300">
    <header class="flex flex-col items-start w-full">
      <h1 class="lg:text-[1.875rem] text-[18px] leading-6 font-bold text-red-dark">
        Điều Khoản Sử Dụng - LiteRead
      </h1>
      <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
        Chào mừng bạn đến với LiteReadStory.com. Khi truy cập và sử dụng trang web
        của chúng tôi, bạn đồng ý tuân thủ các điều khoản sau đây:
      </p>
    </header>

    <section class="flex flex-col items-start w-full">
      <h2 class="lg:text-[1.875rem] text-[18px] font-bold text-red-dark">
        1. Quyền và trách nhiệm của người đọc
      </h2>
      <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
        Người đọc được phép truy cập và đọc miễn phí các truyện được đăng trên
        LiteRead. Người đọc không được sao chép, chỉnh sửa, phát tán hay sử dụng
        nội dung từ LiteRead cho mục đích thương mại khi chưa có sự cho phép từ
        ban quản trị. Người đọc không được sử dụng trang web vào các hoạt động
        trái pháp luật, phá hoại hoặc gây ảnh hưởng xấu đến cộng đồng người dùng.
      </p>
    </section>

    <section class="flex flex-col items-start w-full">
      <h2 class="lg:text-[1.875rem] text-[18px] font-bold text-red-dark">
        2. Đăng truyện và quyền hạn của người viết
      </h2>
      <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
        LiteRead không cung cấp chức năng tự đăng truyện trực tiếp trên trang web.
        Nếu bạn là tác giả và muốn đăng truyện lên LiteRead, vui lòng liên hệ với
        chúng tôi qua trang
        <a href="https://www.facebook.com/profile.php?id=61573035163575&sk=about" target="_blank" class="underline">Fanpage LiteRead</a>
        chính thức để được hướng dẫn và xét duyệt nội dung.
      </p>
    </section>

    <section class="flex flex-col items-start w-full">
      <h2 class="lg:text-[1.875rem] text-[18px] font-bold text-red-dark">
        3. Quy định chung
      </h2>
      <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
        Nội dung truyện và các tài nguyên trên LiteRead đều thuộc quyền sở hữu
        hoặc đã được cấp phép cho LiteRead. Mọi hành vi sao chép, khai thác hoặc
        sử dụng nội dung không đúng mục đích đều bị nghiêm cấm và có thể bị xử lý
        theo quy định pháp luật.
      </p>
    </section>

    <section class="flex flex-col  items-start w-full">
      <h2 class="lg:text-[1.875rem] text-[18px] font-bold text-red-dark">
        4. Liên hệ
      </h2>
      <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
        Mọi thắc mắc, yêu cầu liên quan đến việc đăng truyện hoặc hợp tác vui lòng
        liên hệ chúng tôi qua fanpage chính thức:
        <a href="https://www.facebook.com/profile.php?id=61573035163575&sk=about" target="_blank" class="underline">Fanpage LiteRead.</a>
      </p>
    </section>
  </article>
  <?php get_footer() ?>
</section>

</div>

