<style>
  .lite-read-text {
    color: #D66766;
    font-family: Moul;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
  }

  .footer-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px;
    width: 100%;
    background-color: white;
    overflow: hidden;
  }

  .footer-container .contact-info {
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: 4px;
    align-items: start;
    margin: 2rem;
  }

  .footer-container .contact-info h2 {
    width: 100%;
    color: #D66766;
  }

  .footer-container .contact-info address {
    display: flex;
    flex-direction: column;
    gap: 2px;
    align-items: start;
    width: 100%;
    font-style: normal;
  }

  .footer-container .contact-info address p {
    width: 100%;
    color: #A04D4C;
  }

  .footer-container .contact-info p {
    line-height: 1.25;
    color: #A04D4C;
  }
</style>

<footer class="flex items-center mx-auto gap-[1rem] md:gap-[2.875rem] w-full bg-[#FFE5E1]">
  <!-- Quảng cáo footer -->
  <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-9357894106826270" data-ad-slot="4222935559"
    data-auto-format="rspv" data-full-width="">
    <div overflow=""></div>
  </amp-ad>

  <div class="footer-container flex items-center mx-auto gap-[1rem] md:gap-[2.875rem] w-full bg-[#FFE5E1]"
    role="contentinfo" aria-label="Contact Information">
    <div class="contact-info">
      <h2 class="lite-read-text text-[20px] lg:text-[2rem]">
        LiteRead
      </h2>
      <address>
        <p class="text-[12px] lg:text-[1.375rem]">
          <span class="sr-only">Phone:</span>
          <a href="tel:0849449448" class="focus:ring-2 hover:no-underline hover:text-[#A04D4C]">Điện thoại:
            0849449448</a>
        </p>
        <p class="text-[12px] lg:text-[1.375rem]">
          <span class="sr-only">Email:</span>
          <a href="mailto:22521375@gm.uit.edu.vn" class="focus:ring-2 hover:no-underline hover:text-[#A04D4C]">Email:
            litereadstory@gmail.com</a>
        </p>
        <p class="text-[12px] lg:text-[1.375rem]">
          <span class="sr-only">Facebook:</span>
          <a href="https://www.facebook.com/profile.php?id=61573035163575"
            class="focus:ring-2 hover:no-underline hover:text-[#A04D4C]">Facebook:
            <span class="font-bold">Lite Read</span>
          </a>
        </p>
        <!--<p class="text-[12px] lg:text-[1.375rem]">-->
        <!--  <span class="sr-only">Address:</span>-->
        <!--  Địa chỉ: Số 15, đường số 10, phường Linh Xuân, TP. Thủ Đức, TP. Hồ Chí Minh-->
        <!--</p>-->
      </address>
      <p class="text-[10px] lg:text-[1.25rem]">
        © 2024 DORA. All Rights Reserved.
      </p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $('#synopsis').summernote({
      placeholder: 'Nhập nội dung',
      tabsize: 2,
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ],

      callbacks: {
        onKeyup: function (e) {
          updateWordCount();
        },
        onChange: function (contents, $editable) {
          updateWordCount();
        }
      }
    });

    function setupWordCountObserver() {
      let editableDiv = $('.note-editable');

      if (editableDiv.length) {
        editableDiv.on('input', function () {
          updateWordCount();
        });
      }
    }

    function updateWordCount() {
      let text = $('.note-editable').text().trim(); // Lấy text thuần không có HTML
      let words = text.length > 0 ? text.split(/\s+/).length : 0;
      $('#wordCount').text(words);
    }

    // Đảm bảo sự kiện input được gắn sau khi Summernote load
    setTimeout(setupWordCountObserver, 1000);
  </script>
  <?php wp_footer(); ?>
</footer>
</body>

</html>