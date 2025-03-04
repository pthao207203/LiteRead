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

<div class="flex flex-col pt-[17px] w-full">
  <!-- Title -->
  <h1 class="lg:text-[1.875rem] text-[1.125rem] lg:px-[56px] px-[17px] font-semibold text-red-darker text-left ">
    <span class="font-bold">
      SỔ TAY BẠCH LIÊN HOA LỪA NGƯỜI - CHƯƠNG 1
    </span>
  </h1>
    <!--Bộ điều hướng 1 (Trên) -->
    <div class="flex self-center mt-[18px] min-h-6">
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
      <div id="dropdownToggleTop" class="flex justify-center items-center lg:text-[1.5rem] md:text-[0.875rem] sm:text-[0.875rem] px-[20px] py-[10px] bg-orange-light-hover text-red-darker  border-t border-b border-solid border-red-normal relative cursor-pointer">
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
  <div class="flex flex-col mt-[18px] w-full  ">
    <h2 class="font-medium text-center text-red-darker lg:text-[1.875rem] text-[1.125rem] ">
     Nữ diễn viên tuyến mười tám
    </h2>

    <div class="lg:text-[1.75rem] text-[1rem] mt-[18px] lg:px-[56px] px-[17px] leading-relaxed text-red-darker space-y-4 ">
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
<p>Lâm Linh thật sự không cần phải khiêm tốn. Ngũ quan của cô xinh đẹp, dáng người cao gầy, trước lồi sau lõm, những nơi cần có Lâm Linh đều có, nói một câu xinh đẹp động lòng người cũng không quá đáng. Với ngoại hình xinh đẹp như thế mà vẫn còn lăn lộn trong tuyến mười tám này tận hai năm, đây là điều mà tất cả mọi người đều không ngờ tới.</p>
<p>Lâm Linh kết thúc cảnh quay của mình rồi bắt một chiếc taxi trở về nhà, bây giờ đã là một giờ sáng.</p>
<p>Cô bật đèn phòng khách, đặt túi ở hành lang, cởi giày cao gót rồi thay dép lê đi lên phòng chuẩn bị tắm rửa thay đồ ngủ. Cô bật đèn trong phòng lên, trên chiếc giường phẳng phiu bỗng nhiên xuất hiện thêm một người.</p>
<p>Giang Ngộ đang ngủ thì bị hành động của Lâm Linh đánh thức, khuôn mặt tuấn tú nhíu lại.</p>
<p>"Tôi đã nói với em là đừng về muộn như thế rồi mà."</p>
<p>Lâm Linh bước nhanh vài bước đến cạnh giường rồi nói bằng giọng đầy ngạc nhiên:</p>
<p>"Anh tới rồi à."</p>
<p>Sau đó lại có chút áy náy:</p>
<p>"Ngại quá, em không biết là anh về, nếu em sớm biết thế thì đã không đánh thức anh rồi."</p>
<p>Giang Ngộ đã ngồi dậy tựa lưng vào đầu giường, anh cau mày nhìn mặt Lâm Linh:</p>
<p>"Trên mặt em là cái gì thế, còn không mau đi rửa đi!"</p>
<p>Trên mặt Lâm Linh vẫn còn lớp trang điểm lúc quay phim, mỗi ngày kết thúc công việc đều không dặm phấn, hơn nữa cô cũng chỉ là một nữ diễn viên tuyến mười tám nên có tẩy trang hay không cũng chả có gì quan trọng. Giang Ngộ không nói thì cô cũng biết mặt mình khó coi đến mức nào. Lâm Linh nhanh chóng lấy bộ váy ngủ trong tủ quần áo ra rồi đi vào phòng tắm.</p>
<p>Một tiếng sau, Lâm Linh bước ra khỏi phòng tắm với bộ đồ ngủ tơ tằm hai dây. Sau khi tẩy trang, trên gương mặt trắng nõn bóng loáng sạch sẽ, không có chút tì vết nào.</p>
<p>Cổ áo ngủ bằng tơ tằm khá rộng, có thể nhìn thấy vùng ven trắng nõn run lên nhè nhẹ. Lâm Linh đi tới bàn trang điểm thoa sản phẩm dưỡng da, vòng eo thon gọn thoắt ẩn thoắt hiện trong làn váy.</p>
<p>Nhờ sự xuất hiện của Giang Ngộ nên từ lúc Lâm Linh ở cùng anh, các sản phẩm chăm sóc da mà Lâm Linh dùng đều là hàng cao cấp, giây phút mà mỗi ngày cô hưởng thụ nhất chính là giây phút này.</p>
<p>Cô đổ toner ra tay, nhẹ nhàng thoa lên mặt, chờ toner thẩm thấu vào da thì cô lại lấy ra một lọ thủy tinh…</p>
<p>Sau khi Giang Ngộ bị Lâm Linh đánh thức thì vẫn chưa ngủ tiếp. Người phụ nữ này tắm rửa hết một tiếng, tắm rửa xong lại ngồi trước gương bôi bôi trét trét cả nửa ngày.</p>
<p>Giang Ngộ không nhịn được lên tiếng thúc giục:</p>
<p>"Nhanh lên."</p>
<p>Lâm Linh ngoài miệng đáp "vâng" nhưng thực tế thì động tác của cô cũng chẳng nhanh hơn bao nhiêu. Cô thoa từng lớp lên mặt một cách nhẹ nhàng, có trình tự, sau khi thoa xong, cô đổ sữa dưỡng thể ra tay, bắt đầu thoa từ bờ vai trắng nõn, mềm mại.</p>
<p>Cuối cùng Lâm Linh cũng thoa xong hết, chờ cô lên giường, Giang Ngộ còn chưa kịp nói gì thì Lâm Linh đã ngồi xổm trên chăn, cánh tay trắng nõn mềm mại vòng lên cổ của Giang Ngộ, mùi sữa dưỡng thể quả đào trên người cô phiêu tán trong không khí, xộc vào mũi anh một mùi hương ngọt ngào phát ngán.</p>
<p>"Mùi sữa dưỡng thể hôm nay của em là mùi đào đó, anh có ngửi thấy không? Em rất thích mùi này, không biết anh có thích nó không?"</p>
<p>Lâm Linh quấn chặt người anh, vừa nói vừa dán sát vào người anh, mãi đến khi da thịt của hai người tiếp xúc thân mật. Động tác di chuyển của Lâm Linh khiến dây áo mỏng trên vai hơi trượt xuống, lộ ra đường cong tròn trịa.</p>
<p>Trong phút chốc làm cho lửa giận của Giang Ngộ biến mất không còn tí gì. Bộ đồ ngủ tơ tằm dính mùi thơm của cơ thể của cô kề sát trên da thịt anh khiến anh hơi ngứa ngáy.</p>
<p>Giang Ngộ đưa tay kéo dây áo trên vai cô xuống. Tay phải ôm lấy vòng eo thon gọn của cô, giọng trầm thấp ám muội: "Tôi càng thích cái này hơn."</p>
<p>…</p>
<p>Bảy giờ sáng, đồng hồ báo thức trong điện thoại của Lâm Linh vang lên đúng giờ, tuy cô đã nhanh tay tắt chuông nhưng Giang Ngộ vẫn bị tiếng chuông đồng hồ báo thức làm tỉnh giấc. Giang Ngộ có tính gắt ngủ, nó được thể hiện rõ nhất khi đang ngủ thì bị đánh thức hoặc là ngủ không được, Lâm Linh hiểu rõ tính này của anh.</p>
<p>Cô nhanh chóng quay qua giải thích:</p>
<p>"Không phải em cố tình muốn làm ồn đến anh nhưng sáng nay em còn có cảnh quay nên phải đi trước."</p>
<p>Theo động tác của cô, vài sợi tóc của cô bay đến trên mặt anh rồi lại nhanh chóng rời khỏi mặt anh.</p>
<p>Giang Ngộ tức giận:</p>
<p>"Em đi quay mấy bộ phim rách đó thì kiếm được bao nhiêu tiền? Mỗi ngày cứ đi sớm về khuya như thế mà em không biết mệt à?"</p>
<p>"Không kiếm được bao nhiêu cả."</p>
<p>Lâm Linh thành thật nói:</p>
<p>"Nhưng đây là công việc yêu thích của em, em cố gắng nỗ lực vì công việc, chăm chỉ vươn lên, có kinh nghiệm, có tích lũy, có trưởng thành. Đây là những thứ không phải tiền bạc có thể sánh được. Khi đối mặt với một nhân viên làm việc thận trọng, có gặp phải thất bại cũng không từ bỏ, vẫn tiếp tục cố gắng vươn lên thì chẳng lẽ anh lại đả kích cô ấy, nói là cô chẳng kiếm được bao nhiêu tiền đâu, đừng có làm việc nữa à? Anh nên khen em có lý tưởng, có mục tiêu chứ không phải là ở đây đả kích em."</p>
<p>Giang Ngộ bị câu nói của cô làm cho nghẹn họng, cuối cùng bỏ lại một câu:</p>
<p>"Mặc kệ em."</p>
<p>Sau đó anh đứng dậy đi vào phòng tắm.</p>
<p>Sau khi xong việc nửa đêm, Giang Ngộ dứt khoát không thèm mặc áo mà đứng dậy, trên người chỉ có mỗi một cái quần ngủ. Không thể không nói cơ thể của Giang Ngộ rất đáng xem, tuyến cơ bụng rõ ràng, hai chân thon khỏe. Nửa thân trên cường tráng trần trụi phơi bày trong không khí, tản ra hormone vô hạn.</p>
<p>Lâm Linh làm mặt quỷ sau lưng anh.</p>
<p>Hừ, anh đang xem thường ai vậy chứ?</p>
<p>Giang Ngộ chiếm phòng tắm nên Lâm Linh phải sang phòng khác rửa mặt. Sau khi rửa mặt sạch sẽ, Lâm Linh làm xong bữa sáng rồi đặt lên bàn ăn cùng với Giang Ngộ.</p>
<p>Thời gian gấp rút, Lâm Linh phải đến phim trường trước chín giờ để trang điểm. Đi từ nhà đến phim trường nếu trên đường không bị kẹt xe thì đi mất nửa tiếng, nếu kẹt xe thì thời gian còn phải lâu hơn. Vì vậy, Lâm Linh chỉ làm qua loa hai cái sandwich, trứng rán rồi rót thêm một cốc sữa là xong một bữa sáng đơn giản.</p>
<p>Lâm Linh rất vội, làm gì cũng tùy tiện. Cô cũng không chú ý nhiều nhưng hiển nhiên cậu cả không quen ăn bữa sáng này.</p>
<p>"Lâm Linh, tiền tôi cho em không đủ dùng à?"</p>
<p>Cậu cả ngồi trước bàn ăn nhìn miếng bánh sandwich, một cái trứng rán trên đĩa và một ly sữa bò trước mặt mà đen mặt lại.</p>
<p>Lâm Linh đặt cái bánh sandwich xuống. Cô hơi bị nghẹn, sắc mặt của cậu cả không kiên nhẫn đưa ly sữa bên cạnh cho cô.</p>
<p>Cô cầm ly uống một ngụm rồi mới nói:</p>
<p>"Không phải, là do em không có nhiều thời gian nên hôm nay ăn tạm vậy đi nha, được không?"</p>
<p>"Không được!"</p>
<p>Giọng điệu của Giang Ngộ không hề có ý muốn thương lượng:</p>
<p>"Em phải làm lại một phần khác cho tôi."</p>
<p>Lâm Linh nhanh chóng nuốt những lời thô tục vừa đến bên miệng xuống, tỏ vẻ đáng thương:</p>
<p>"Em xin lỗi mà, không phải em làm cho có lệ nhưng hôm nay em thật sự không có thời gian, chắc chắn lần sau em sẽ làm một bàn tiệc đầy ắp món Hán cho anh tẩm bổ được không?"</p>
<p>Lâm Linh không dám đối mặt với Giang Ngộ, chỉ dám âm thầm chỉ trích anh.</p>
<p>Lâm Linh khuyên hết lời thì sắc mặt Giang Ngộ mới dịu xuống một chút nhưng ngoài miệng vẫn không tha:</p>
<p>"Em chắc chắn trình độ của em có thể làm ra một bàn tiệc?"</p>
<p>"Bây giờ em không làm được."</p>
<p>Lâm Linh không hề bị đả kích:</p>
<p>"Em sẽ học vì anh. Không cần biết tiệc toàn món Hán hay gì cả, chỉ cần anh muốn ăn, cho dù là món Tây, món Pháp, món Nhật hay tám món ăn chính của chúng ta, em đều làm cho anh."</p>
<p>Giang Ngộ: "Mong là em sẽ học được."</p>
<p>Cô không học được, đời này có học cũng không được! Nhưng da bò vẫn có thể thổi được, dù sao Giang Ngộ cũng không thể bắt cô đi làm một bàn tiệc toàn món Hán được.</p>
<p>Giang Ngộ công việc bề bộn, trong nước ngoài nước bay khắp nơi, thời gian hai người bên nhau vốn đã ít, cơ hội ngồi ăn sáng với nhau cũng chỉ đếm được bằng năm đầu ngón tay. Và ngay cả có thời gian, anh cũng không ở cùng cô thường xuyên.</p>
<p>Năm ngoái, Giang Ngộ đã mua căn hộ này. Sau khi Lâm Linh dọn đến ở anh cũng ít đến nơi này, hơn nửa tháng có lẽ đây là lần đầu tiên anh đến. Lại nói, hai người là người yêu, nhưng Giang Ngộ chưa từng công khai, cô cũng thức thời, không xuất hiện những chỗ đông người, ngay cả bạn thân cô cũng không biết cô ở cùng Giang Ngộ.</p>
<p>Thái độ Giang Ngộ đối với cô cũng không giống như người yêu. Nó giống như một mối quan hệ mập mờ, Giang Ngộ ở trên, cô ở dưới. Không có quyền gì trong lời nói, chỉ có điều Lâm Linh cũng không để ý.</p>
<p>Giang Ngộ thường bận rộn với công việc, khi cô ngủ dậy, nơi anh nằm đã lạnh không còn một chút hơi ấm, như ngày hôm nay quả thực hiếm có.</p>
<p>Để tránh cho Giang Ngộ không nói về chủ đề này, Lâm Linh định chuyển sự chú ý của anh, bèn hỏi:</p>
<p>"Hôm nay anh không bận sao?"</p>
<p>"Ừ."</p>
<p>Vẻ mặt Giang Ngộ không vui, gắp miếng trứng chiên trên đĩa cau mày ăn từng miếng.</p><p>"Vậy thì anh có thể ngủ thêm một giấc nữa, hôm qua anh làm việc vất vả rồi."</p>
<p>Nhìn vẻ mặt của anh chỉ biết không hài lòng với vị của món trứng chiên, quả nhiên cậu cả này không hài lòng nói một tiếng bằng giọng mũi:</p>
<p>"Khó ăn quá."</p>

    
</div>



    <!--Bộ điều hướng 2 (Dưới) -->
    <div class="flex self-center mt-[18px] min-h-6">
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
      <div id="dropdownToggleBottom" class="flex justify-center items-center lg:text-[1.5rem] text-[0.875rem] px-[20px] py-[10px] bg-orange-light-hover text-red-darker border-t border-b border-solid border-red-normal relative cursor-pointer">
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
  <section class="relative z-10 pt-[17px] lg:pt-[34px] mt-0 w-full bg-white rounded-[20px]">
    <div class="flex flex-col w-full rounded-none">
      <!-- Tiêu đề -->
      <h2 class="gap-2.5 self-start p-[10px] lg:px-[20px] ml-[17px] lg:ml-[34px] mb-[-3px] text-[18px] lg:text-[2.25rem] font-semibold text-red-normal bg-red-light rounded-tl-[12px] rounded-tr-[12px]">
        Truyện đề cử
      </h2>

      <!-- Wrapper cuộn ngang + Grid cho màn hình lớn -->
      <div class="flex overflow-x-auto lg:grid lg:grid-cols-6 gap-[17px] lg:gap-[46px] items-center p-[17px] pt-[14px] lg:p-[34px] lg:pt-[28px] bg-red-light scrollbar-thin scrollbar-thumb-red-normal scrollbar-track-red-light lg:overflow-x-hidden" role="list">
        
        <!-- Story Cards (6 items) -->
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[2rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.75rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>

        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[2rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.75rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[2rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.75rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[2rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.75rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[2rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.75rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        <article class="flex flex-col self-stretch my-auto min-h-[261px] w-[121px] shrink-0 lg:w-auto" role="listitem">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c15eb5496bb8e85fb322900632e2ea4133bb697a11272de14372a2225b57bd1a" alt="Thiên Quan Tứ Phúc book cover" class="object-contain rounded-lg aspect-[0.81] w-[121px] lg:w-full" />
          <span class="gap-2.5 self-start px-[2px] mt-[4px] lg:my-[8px] text-[12px] lg:text-[1.5rem] font-medium text-red-light whitespace-nowrap bg-red-normal rounded-[2px]">Full</span>
          <div class="flex flex-col mt-[4px] w-full">
            <h3 class="flex-1 shrink gap-2.5 self-stretch w-full text-[16px] lg:text-[2rem] font-medium basis-0 text-orange-darker break-words">
              Thiên Quan Tứ Phúc
            </h3>
            <div class="flex gap-1 items-start self-start mt-[4px] ">
              <div class="flex items-start" aria-label="Rating: 4 out of 5">
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
                <span class="text-[#FFC700] w-[16px] h-[16px] lg:w-[1.75rem] lg:h-[1.75rem] text-[16px] lg:text-[2rem]">★</span>
              </div>
              <span class="text-[12px] lg:text-[1.5rem] text-regular text-red-normal lg:mt-[6px]">4</span>
            </div>
            <p class="flex-1 shrink gap-2.5 self-stretch mt-1 w-full text-[14px] lg:text-[1.75rem] text-regular text-red-normal basis-0">
              Chương 120
            </p>
          </div>
        </article>
        
      </div>
    </div>

    <section class="flex flex-col lg:flex-row gap-6 mt-[12px] lg:mt-[24px] w-full lg:bg-orange-light">
  

      
    
    </section>

  </section>

</body>
</html>

<?php get_footer(); ?>
