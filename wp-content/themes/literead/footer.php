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
      licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NzI4NDE1OTksImp0aSI6IjQwMzM2MzAzLTgzNTctNGI2MS1iYjQ0LTAxZWJjNjg0ODI5MiIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiOWQ1YzkyMTYifQ.yb4HUcNtNQXDnvngKTJkfIs6BEIQ4BiFXC0-rM8HVavicpzmKxUI8QInB1VGxSt3nIL5u-EZ1MPOg6SvaVrSow',
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