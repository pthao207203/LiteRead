<style>
  .lite-read-text {
    color: #D66766;
    font-family: Moul;
    font-size: var(--Font-20, 32px);
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
    font-size: 3rem;
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
    font-size: 2rem;
    color: #A04D4C;
  }

  .footer-container .contact-info p {
    font-size: 1.75rem;
    line-height: 1.25;
    color: #A04D4C;
  }

  @media (max-width: 768px) {
    .footer-container {
      width: 100vw; /* Đảm bảo tràn toàn bộ màn hình */
      padding: 12px;    }

    .footer-container .contact-info h2 {
      font-size: 2rem;
    }

    .footer-container .contact-info address p {
      font-size: 1.5rem;
    }

    .footer-container .contact-info p {
      font-size: 1.25rem;
    }
  }

  @media (max-width: 576px) {
    .footer-container {
      width: 100vw; /* Đảm bảo tràn toàn bộ màn hình */
      padding: 6px;
    }

    .footer-container .contact-info h2 {
      font-size: 2rem;
    }

    .footer-container .contact-info address p {
      font-size: 1.25rem;
    }

    .footer-container .contact-info p {
      font-size: 1.25rem;
    }
  }
</style>

<footer class="fixed bottom-0 left-0 flex items-center md:px-[2.125rem] md:py-[0.625rem] p-[0.625rem] gap-[1rem] md:gap-[2.875rem] w-full bg-orange-light-active z-50">
  <div class="footer-container" role="contentinfo" aria-label="Contact Information">
    <div class="contact-info">
      <h2 class="lite-read-text">
        LiteRead
      </h2>
      <address>
        <p>
          <span class="sr-only">Phone:</span>
          <a href="tel:0849449448" class="hover:underline focus:outline-none focus:ring-2 focus:ring-pink-800">Điện thoại: 0849449448</a>
        </p>
        <p>
          <span class="sr-only">Email:</span>
          <a href="mailto:22521375@gm.uit.edu.vn" class="hover:underline focus:outline-none focus:ring-2 focus:ring-pink-800">Email: 22521375@gm.uit.edu.vn</a>
        </p>
        <p>
          <span class="sr-only">Address:</span>
          Địa chỉ: Số 15, đường số 10, phường Linh Xuân, TP. Thủ Đức, TP. Hồ Chí Minh
        </p>
      </address>
      <p>
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
