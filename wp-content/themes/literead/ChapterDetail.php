<?php
/* Template Name: ChapterDetail */
get_header(); 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chapter Detail Dropdown</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Đóng mở dropdown */
    .dropdown-hidden {
      display: none;
    }
    .dropdown-visible {
      display: block;
    }
  </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">

<div class="flex flex-col py-[17px] px-[17px] w-full">
  <!-- Title -->
  <h1 class="text-[20px] font-semibold text-red-darker text-left ">
    <span class="font-bold">
      SỔ TAY BẠCH LIÊN HOA LỪA NGƯỜI - CHƯƠNG 1
    </span>
  </h1>
    <!--Bộ điều hướng 1 (Trên) -->
    <div class="flex self-center mt-[20px] min-h-6">
      <!-- Mũi tên trái -->
  <div class="flex justify-center items-center h-full bg-red-normal p-[10px] w-[50px] cursor-pointer rounded-l-[8px]">
    <button class="" aria-label="Previous chapter">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
        <path d="M15.5 19.92L8.97997 13.4C8.20997 12.63 8.20997 11.37 8.97997 10.6L15.5 4.08002" 
              stroke="#FFF7F5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </div>



      <!-- Dropdown Chương -->
      <div id="dropdownToggleTop" class="flex justify-center items-center text-[14px] p-[10px] bg-orange-light-hover text-red-darker w-[133px] border-t border-b border-solid border-red-normal relative cursor-pointer">
        <span class="mr-[10px]">Chương 1</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="transition-transform duration-200">
          <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498" stroke="#593B37" stroke-width="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <!-- Dropdown Menu -->
        <div id="dropdownMenuTop" class="h-[342px] px-[10px] py-[10px] dropdown-hidden absolute mt-[5px] top-full center w-[133px] bg-orange-light-hover ">
          <ul class="text-red-darker text-[16px] text-center">
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 1</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 2</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 3</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 4</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 5</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 6</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 7</li>
          </ul>
        </div>
      </div>

      <!-- Mũi tên phải -->
      <div class="flex justify-center items-center h-full bg-red-normal p-[10px] w-[50px] cursor-pointer rounded-r-[8px]">
        <button aria-label="Next chapter">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
            <path d="M9.41003 19.92L15.93 13.4C16.7 12.63 16.7 11.37 15.93 10.6L9.41003 4.08002" 
              stroke="#FFF7F5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Chapter Content -->
  <div class="flex flex-col mt-[20px] w-full text-[18px] ">
    <h2 class="font-medium text-center text-red-darker ">
     Nữ diễn viên tuyến mười tám
    </h2>

    <div class="mt-[20px] lg:px-[60px] leading-relaxed text-red-darker space-y-4">
<p>Gió thu thổi xào xạc, đèn đuốc ở phim trường vẫn sáng trưng, tiếng nói cười rộn rã. Có vài cô gái mặc đồ cổ trang tụ tập một bên, trên tay vài người còn cầm quyển kịch bản mỏng.</p>
<p>Một người phụ nữ búi tóc kiểu nha hoàn nhìn xung quanh rồi chợt lấy một nắm hạt dưa trong túi áo ra phân phát cho mấy người còn lại. Người phụ nữ búi tóc kiểu nha hoàn ấy thoạt nhìn tuổi tác cũng không nhỏ, khoảng chừng ba mươi tuổi, khi cười lên có thể thấy mấy nếp nhăn xuất hiện ở khóe mắt.</p>
<p>"Haizz... tôi định quay xong bộ phim này thì sẽ về nhà đi xem mắt. Tuổi cũng lớn rồi mà không có nổi một bộ phim được đưa ra thế giới, người trong nhà đã bắt đầu thúc giục tôi kết hôn rồi."</p>
<p>Người phụ nữ búi tóc kiểu nha hoàn vừa cắn hạt dưa, vừa than ngắn thở dài với mọi người. Cũng không phải chỉ có mỗi một mình người phụ nữ búi tóc kiểu nha hoàn phiền muộn vì bị thúc giục kết hôn, rất nhanh có người phụ họa theo cô ấy.</p>
<p>"Tôi cũng vậy đây. Tuần trước ba tôi vừa gọi điện cho tôi bảo tôi về nhà làm nhân viên công chức đi. Ông ấy nói tôi lăn lộn ở phim trường gần được một năm mà đã suýt không nuôi nổi bản thân mình rồi, vậy thì chi bằng nhân lúc còn sớm trở về kết hôn sinh con đi. Chỉ có điều tôi đã cam đoan với ba là nếu một năm nữa tôi vẫn không có thành tích gì thì tôi sẽ về nhà."</p>
<p>"Tôi cũng vậy."</p>
<p>"Giống nhau thôi."</p>
<p>Mọi người nói đến đề tài này đều không hẹn mà cùng thở dài.</p>
<p>Người phụ nữ búi tóc kiểu nha hoàn chợt nhìn Lâm Linh:</p>
<p>"Lâm Linh, cô có gương mặt xinh đẹp như thế, theo lẽ thường thì phải có hy vọng nổi tiếng hơn chúng tôi mới phải, sao cô còn lăn lộn trong tuyến mười tám này chứ?”</p>
<p>Lâm Linh nhìn trời, vẻ mặt sầu khổ:</p>
<p>"Nói đúng ra là tôi xinh đẹp như vậy, tính cách lại tốt, kỹ năng diễn xuất cũng ổn, vì cớ gì mà không có đạo diễn nào nhìn ra rồi cho tôi diễn nữ chính chứ? Ông trời bất công quá đi."</p>
<p>Mọi người bị cô chọc cười.</p>
<p>Người phụ nữ búi tóc kiểu nha hoàn hạ thấp giọng, rướn cổ về phía trước nói nhỏ với nhóm Lâm Linh:</p>
<p>"Tôi thấy là do cô không biết dựa dẫm đấy. Cô biết nữ số hai trong tổ của chúng ta mà nhỉ? Nghe nói cô ta phải đến gõ cửa phòng của đạo diễn và phó đạo diễn mấy lần mới được chốt cho vai này đấy.”</p>
<p>Ở trong giới giải trí thì đây là chuyện thường tình, muốn hot thì hoặc là có xuất thân, hoặc là có thiên phú và đủ cố gắng, hoặc là cam lòng hạ thể diện, buông bỏ liêm sỉ.</p>
<p>Chuyện của cô nữ phụ này cũng không ly kỳ gì.</p>
<p>Người phụ nữ búi tóc kiểu nha hoàn còn nói:</p>
<p>"Đáng tiếc, người trong sáng xinh đẹp như thế mà phải ngủ với mấy tên già nát rượu, cô ta nuốt được cũng hay thật đấy. Nhưng dù thế nào đi chăng nữa thì cũng không so được với nữ chính của tổ chúng ta được, cô ta thật sự rất khác biệt."</p>
<p>Có cô gái tò mò hỏi:</p>
<p>"Có gì khác chứ?"</p>
<p>Người phụ nữ búi tóc kiểu nha hoàn nói:</p>
<p>"Người ta có chỗ dựa là Giang Ngộ, sao có thể giống nhau được chứ?"</p>
<p>Cô gái kia hỏi lại:</p>
<p>"Giang Ngộ? Tôi không nghe nhầm chứ?"</p>
<p>Người phụ nữ búi tóc kiểu nha hoàn đáp:</p>
<p>"Đúng vậy."</p>
<p>Trong đó có một cô gái nói bằng giọng điệu hâm mộ:</p>
<p>"Hóa ra là Giang Ngộ, quý công tử có tiếng số một trong giới thượng lưu của thành phố C. Hàng vạn ngôi sao nữ tranh giành anh ta nhưng tôi nghe nói hiện giờ anh ấy vẫn còn độc thân, không ngờ Trần Tương lại may mắn như vậy, hâm mộ quá đi!"</p>
<p>Người phụ nữ búi tóc kiểu nha hoàn hừ lạnh một tiếng:</p>
<p>"Theo tôi thấy thì Trần Tương trông cũng bình thường thôi, Lâm Linh của chúng ta còn đẹp hơn."</p>
<p>Lâm Linh không hề khiêm tốn chút nào:</p>
<p>"Tôi cũng cảm thấy tôi còn xinh đẹp hơn cô ta nhiều! Ánh mắt của Giang Ngộ gì đó có vấn đề rồi, bao cô ta thì chẳng thà bao tôi còn hơn!”</p>
    </div>



    <!--Bộ điều hướng 2 (Dưới) -->
    <div class="flex self-center mt-[20px] min-h-6">
      <!-- Mũi tên trái -->
  <div class="flex justify-center items-center h-full bg-red-normal p-[10px] w-[50px] cursor-pointer rounded-l-[8px]">
    <button class="" aria-label="Previous chapter">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
        <path d="M15.5 19.92L8.97997 13.4C8.20997 12.63 8.20997 11.37 8.97997 10.6L15.5 4.08002" 
              stroke="#FFF7F5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </div>

      <!-- Dropdown Chương -->
      <div id="dropdownToggleBottom" class="flex justify-center items-center text-[14px] p-[10px] bg-orange-light-hover text-red-darker w-[133px] border-t border-b border-solid border-red-normal relative cursor-pointer">
        <span class="mr-[10px]">Chương 1</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="transition-transform duration-200">
          <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498" stroke="#593B37" stroke-width="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <!-- Dropdown Menu -->
        <div id="dropdownMenuBottom" class="h-[342px] px-[10px] py-[10px] dropdown-hidden absolute mt-[5px] top-full center w-[133px] bg-orange-light-hover ">
          <ul class="text-red-darker text-[16px] text-center">
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 1</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 2</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 3</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 4</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 5</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 6</li>
            <li class="flex justify-center items-center py-[6px] h-[46px] hover:bg-orange-normal  cursor-pointer">Chương 7</li>
          </ul>
        </div>
      </div>

      <!-- Mũi tên phải -->
      <div class="flex justify-center items-center h-full bg-red-normal p-[10px] w-[50px] cursor-pointer rounded-r-[8px]">
        <button aria-label="Next chapter">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
            <path d="M9.41003 19.92L15.93 13.4C16.7 12.63 16.7 11.37 15.93 10.6L9.41003 4.08002" 
              stroke="#FFF7F5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Xử lý dropdown cho từng vị trí
    function setupDropdown(toggleId, menuId) {
      const dropdownToggle = document.getElementById(toggleId);
      const dropdownMenu = document.getElementById(menuId);

      dropdownToggle.addEventListener("click", (event) => {
        event.stopPropagation();
        dropdownMenu.classList.toggle("dropdown-hidden");
        dropdownMenu.classList.toggle("dropdown-visible");
      });

      document.addEventListener("click", function(event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
          dropdownMenu.classList.add("dropdown-hidden");
          dropdownMenu.classList.remove("dropdown-visible");
        }
      });

      // Cập nhật tên chương khi chọn
      const chapterItems = dropdownMenu.querySelectorAll("li");
      chapterItems.forEach(item => {
        item.addEventListener("click", () => {
          dropdownToggle.querySelector("span").textContent = item.textContent;
          dropdownMenu.classList.add("dropdown-hidden");
          dropdownMenu.classList.remove("dropdown-visible");
        });
      });
    }

    // Kích hoạt dropdown cho cả trên và dưới
    setupDropdown("dropdownToggleTop", "dropdownMenuTop");
    setupDropdown("dropdownToggleBottom", "dropdownMenuBottom");
  </script>

</body>
</html>

<?php get_footer(); ?>
