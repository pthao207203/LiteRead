<footer>
  <div class="container">
    <p>&copy; <?php echo date('Y'); ?> from 6 con gắn. All Rights Reserved.</p>
  </div>
</footer>
<script src="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.umd.js"></script>
<script>
  const {
    ClassicEditor,
    Essentials,
    Bold,
    Italic,
    Font,
    Paragraph
  } = CKEDITOR;

  ClassicEditor
    .create(document.querySelector('#synopsis'), {
      licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NzI4NDE1OTksImp0aSI6ImZiNWRjYTYxLTJhYjMtNGJiYi05NzRmLTNmYzQ1MDY4ZTA3ZSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCJdLCJ2YyI6IjM2N2ExNTRmIn0.saEcMiR4u754TNX1KZI529kC3pOohhTF3t61SU3450ELc2Cwc2uM78PW_S06KXg98Ftv4ubam2HOiRszXXhjTw',
      plugins: [Essentials, Bold, Italic, Font, Paragraph],
      toolbar: [
        'undo', 'redo', '|', 'bold', 'italic', '|',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
      ],
    })
    .then( /* ... */)
    .catch( /* ... */);
</script>
<?php wp_footer(); ?>
</body>

</html>