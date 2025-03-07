<?php

// Thêm truyện 
add_action('wp_ajax_upload_story', 'handle_story_upload');
add_action('wp_ajax_nopriv_upload_story', 'handle_story_upload');

function create_slug($string)
{
  $string = strtolower($string);
  $string = preg_replace('/[áàạảãâấầậẩẫăắằặẳẵ]/u', 'a', $string);
  $string = preg_replace('/[éèẹẻẽêếềệểễ]/u', 'e', $string);
  $string = preg_replace('/[íìịỉĩ]/u', 'i', $string);
  $string = preg_replace('/[óòọỏõôốồộổỗơớờợởỡ]/u', 'o', $string);
  $string = preg_replace('/[úùụủũưứừựửữ]/u', 'u', $string);
  $string = preg_replace('/[ýỳỵỷỹ]/u', 'y', $string);
  $string = preg_replace('/[đ]/u', 'd', $string);
  $string = preg_replace('/[^a-z0-9-\s]/', '', $string);
  $string = preg_replace('/([\s]+)/', '-', $string);
  return trim($string, '-');
}
function handle_story_upload()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'stories';

  $story_name = sanitize_text_field($_POST['story_name']);
  $slug = create_slug($story_name);
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
      'slug' => $slug,
      'author' => $author,
      'status' => $status,
      'genres' => $genres,
      'synopsis' => $synopsis,
      'cover_image_url' => $cover_image_url,
    )
  );

  echo 'Thêm truyện thành công!';
  wp_die(); // Kết thúc AJAX request
}

// Chi tiết truyện 
// Tạo rewrite rules cho trang chi tiết truyện
function custom_rewrite_rules()
{
  // Đường dẫn truyện: http://localhost/literead/truyen/ten-truyen
  add_rewrite_rule('^truyen/([^/]*)/?', 'index.php?story_slug=$matches[1]', 'top');

  // Đường dẫn thể loại: http://localhost/literead/the-loai/ten-the-loai
  add_rewrite_rule('^the-loai/([^/]*)/?', 'index.php?genre_slug=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_rules');

// Đăng ký biến truy vấn mới
function custom_query_vars($vars)
{
  $vars[] = 'story_slug';
  $vars[] = 'genre_slug';
  return $vars;
}
add_filter('query_vars', 'custom_query_vars');


?>