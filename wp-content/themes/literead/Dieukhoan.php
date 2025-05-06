<?php
/* Template Name: Dieukhoan */
get_header();

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
    <article
      class="flex flex-col gap-[36px] mb-[5px] items-start px-14 py-9 w-full bg-white max-md:px-8 max-md:py-6 max-sm:p-4 transition-all duration-300">
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
          2. Quyền và trách nhiệm của tác giả
        </h2>
        <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          Tác giả chịu trách nhiệm hoàn toàn về bản quyền và tính hợp pháp của các tác phẩm mà họ đăng tải lên LiteRead. Tác giả phải đảm bảo rằng các tác phẩm của mình không vi phạm bản quyền, không sao chép hay sử dụng trái phép tác phẩm của người khác. LiteRead không chịu trách nhiệm về bất kỳ tranh chấp bản quyền nào liên quan đến các tác phẩm được đăng tải. Nếu phát hiện có vi phạm bản quyền, LiteRead có quyền yêu cầu tác giả gỡ bỏ nội dung hoặc xóa tài khoản của tác giả đó.
        </p>
        <p class="lg:text-[1.75rem] text-[16px] mt-[10px] text-red-dark">
          Tác giả không được phép đăng tải các tác phẩm có nội dung vi phạm pháp luật hoặc gây hại đến cộng đồng người dùng.
        </p>
        <p class="lg:text-[1.75rem] text-[16px] mt-[10px] text-red-dark">
          LiteRead không cung cấp chức năng tự đăng truyện trực tiếp trên trang web.
          Nếu bạn là tác giả và muốn đăng truyện lên LiteRead, vui lòng liên hệ với
          chúng tôi qua trang
          <a href="https://www.facebook.com/profile.php?id=61573035163575&sk=about" target="_blank"
            class="underline">Fanpage LiteRead</a>
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
        <p class="lg:text-[1.75rem] text-[16px] mt-[10px] text-red-dark">
          Tất cả người dùng được yêu cầu tuân thủ nghiêm ngặt luật pháp và quy định quốc gia có liên quan khi xuất bản nội dung. Chúng tôi từ chối mọi nội dung không hợp thuần phong mỹ tục, bạo lực, bất hợp pháp hoặc vi phạm các quy định khác và sẽ huỷ bỏ chúng ngay khi phát hiện.
        </p>
        <p class="lg:text-[1.75rem] text-[16px] mt-[10px] text-red-dark">
        Bản quyền của các tác phẩm trên trang này (tiểu thuyết, bình luận, hình ảnh, v.v.) thuộc về tác giả gốc. Trang này chỉ cung cấp chức năng tải lên, lưu trữ và hiển thị. Các tác phẩm, bình luận, nội dung hoặc hình ảnh đều do thành viên đăng tải. Nếu làm ảnh hưởng đến cá nhân hay tổ chức nào, khi được yêu cầu, chúng tôi sẽ xác minh và gỡ bỏ ngay lập tức.
        </p>
      </section>

      <section class="flex flex-col items-start w-full">
        <h2 class="lg:text-[1.875rem] text-[18px] font-bold text-red-dark">
          4. Điều khoản về vi phạm khi sử dụng công cụ (Tool)
        </h2>
        <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          Để đảm bảo tính công bằng, minh bạch và bảo vệ hệ thống khỏi các hành vi gian lận, LiteRead quy định rõ các
          điều khoản liên quan đến việc sử dụng công cụ (tool) khi truy cập và sử dụng dịch vụ của chúng tôi.
        </p>
        <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          <strong>Hành vi bị cấm</strong>
        <p class="lg:text-[1.75rem] text-[16px]  mt-[24px]  text-red-dark"> Người dùng <strong>không được phép</strong>
          sử dụng các công cụ, phần mềm hoặc phương pháp tự động để: </p>
        <ul class="list-disc pl-[24px]  lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          <li>Tăng lượt xem, lượt thích, lượt theo dõi hoặc tương tác giả mạo trên hệ thống.</li>
          <li>Tạo tài khoản hàng loạt hoặc thao túng tài khoản nhằm mục đích gian lận.</li>
          <li>Tấn công hệ thống bằng cách gửi yêu cầu tự động với tần suất cao gây quá tải.</li>
          <li>Trích xuất dữ liệu trái phép từ nền tảng của chúng tôi.</li>
          <li>Bất kỳ hành vi nào khác gây ảnh hưởng tiêu cực đến trải nghiệm của người dùng khác hoặc hoạt động của hệ
            thống.</li>
        </ul>
        </p>
        <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          <strong>Hình thức xử lý vi phạm </strong>
        <p class="lg:text-[1.75rem] text-[16px]  mt-[24px]  text-red-dark"> Nếu phát hiện <strong>vi phạm</strong>,
          chúng tôi có quyền áp dụng các biện pháp xử lý sau: </p>
        <ul class="list-disc pl-[24px] lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          <li>Cảnh báo và yêu cầu chấm dứt hành vi vi phạm.</li>
          <li>Tạm khóa hoặc hạn chế chức năng của tài khoản nếu tiếp tục vi phạm.</li>
          <li>Xóa tài khoản vĩnh viễn trong trường hợp vi phạm nghiêm trọng hoặc tái phạm nhiều lần.</li>
        </ul>
        </p>
        <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          <strong>Khiếu nại và xử lý tranh chấp</strong>
        <p class="lg:text-[1.75rem] text-[16px]  mt-[24px]  text-red-dark"> Người dùng có quyền khiếu nại nếu cho rằng
          tài khoản của mình bị xử lý nhầm. Khiếu nại cần được gửi về <strong> litereadstory@gmail.com</strong> trong
          vòng 7 ngày kể từ khi nhận thông báo vi phạm. Chúng tôi sẽ xem xét và phản hồi trong thời gian sớm nhất. </p>
        </p>
        <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          Bằng việc tiếp tục sử dụng dịch vụ, bạn <strong> đồng ý tuân thủ </strong> các điều khoản này.
        </p>
      </section>
      <section class="flex flex-col  items-start w-full">
        <h2 class="lg:text-[1.875rem] text-[18px] font-bold text-red-dark">
          5. Liên hệ
        </h2>
        <p class="lg:text-[1.75rem] text-[16px] mt-[24px] text-red-dark">
          Mọi thắc mắc, yêu cầu liên quan đến việc đăng truyện hoặc hợp tác vui lòng
          liên hệ chúng tôi qua fanpage chính thức:
          <a href="https://www.facebook.com/profile.php?id=61573035163575&sk=about" target="_blank"
            class="underline">Fanpage LiteRead.</a>
        </p>
      </section>
    </article>
    <?php get_footer() ?>
  </section>

</div>