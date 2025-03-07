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
function tao_custom_post_type()
{

  /*
   * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
   */
  $label = array(
    'name' => 'Truyện', //Tên post type dạng số nhiều
    'singular_name' => 'Truyện' //Tên post type dạng số ít
  );

  /*
   * Biến $args là những tham số quan trọng trong Post Type
   */
  $args = array(
    'labels' => $label, //Gọi các label trong biến $label ở trên
    'description' => 'Post type đăng truyện', //Mô tả của post type
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'author',
      'thumbnail',
      'comments',
      'trackbacks',
      'revisions',
      'custom-fields'
    ), //Các tính năng được hỗ trợ trong post type
    'taxonomies' => array('category', 'post_tag'), //Các taxonomy được phép sử dụng để phân loại nội dung
    'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
    'public' => true, //Kích hoạt post type
    'show_ui' => true, //Hiển thị khung quản trị như Post/Page
    'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
    'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
    'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
    'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
    'menu_icon' => '', //Đường dẫn tới icon sẽ hiển thị
    'can_export' => true, //Có thể export nội dung bằng Tools -> Export
    'has_archive' => true, //Cho phép lưu trữ (month, date, year)
    'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
    'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
    'capability_type' => 'post' //
  );

  register_post_type('truyen', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'tao_custom_post_type');

add_filter('pre_get_posts', 'lay_custom_post_type');
function lay_custom_post_type($query)
{
  if (is_home() && $query->is_main_query())
    $query->set('post_type', array('post', 'truyen'));
  return $query;
}

// Thêm Rewrite Rules trong functions.php
function custom_rewrite_rules()
{
  add_rewrite_rule(
    '^truyen/([^/]*)/?$', // Mẫu URL
    'index.php?post_type=truyen&name=$matches[1]', // Đúng query cho custom post type
    'top'
  );
}
add_action('init', 'custom_rewrite_rules');


// Đăng ký Query Variable
function custom_query_vars($vars)
{
  $vars[] = 'story_slug';
  return $vars;
}
add_filter('query_vars', 'custom_query_vars');

// Làm mới Rewrite Rules khi kích hoạt theme
function flush_rewrite_rules_on_activation()
{
  custom_rewrite_rules();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_on_activation');



?>