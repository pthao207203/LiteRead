<?php

add_action('wp_ajax_upload_story', 'handle_story_upload');
add_action('wp_ajax_nopriv_upload_story', 'handle_story_upload');

function handle_story_upload()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'stories';

  $story_name = sanitize_text_field($_POST['story_name']);
  $author = sanitize_text_field($_POST['author']);
  $status = sanitize_text_field($_POST['status']);
  $synopsis = sanitize_textarea_field($_POST['synopsis']);
  $genres = isset($_POST['genres']) ? implode(',', array_map('sanitize_text_field', $_POST['genres'])) : '';

  $cover_image_url = '';
  if (!empty($_FILES['cover_image']['name'])) {
    $uploaded_file = $_FILES['cover_image'];
    $upload = wp_handle_upload($uploaded_file, array('test_form' => false));

    if (!isset($upload['error']) && isset($upload['url'])) {
      $cover_image_url = $upload['url'];
    }
  }

  $wpdb->insert(
    $table_name,
    array(
      'story_name' => $story_name,
      'author' => $author,
      'status' => $status,
      'genres' => $genres,
      'synopsis' => $synopsis,
      'cover_image_url' => $cover_image_url,
    )
  );

  // echo 'Thêm truyện thành công!';
  echo $synopsis;
  wp_die(); // Kết thúc AJAX request
}


?>