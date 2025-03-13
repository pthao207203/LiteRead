<footer>
  <div class="container">
    <p>&copy; <?php echo date('Y'); ?> from 6 con gắn. All Rights Reserved.</p>
  </div>
</footer>

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
</body>

</html>