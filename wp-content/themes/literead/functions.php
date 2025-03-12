<?php
// function dùng cho toàn bộ page 
error_reporting(E_ALL);
ini_set('display_errors', 1);

add_action('admin_menu', function () {
  add_submenu_page('tools.php', 'Rewrite Rules', 'Rewrite Rules', 'manage_options', 'rewrite_rules', function () {
    global $wp_rewrite;
    echo '<pre>';
    print_r($wp_rewrite->rules);
    echo '</pre>';
  });
});
function time_ago($datetime)
{
  date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ Việt Nam
  $timestamp = strtotime($datetime);
  $now = time();
  $diff = $now - $timestamp;

  if ($diff < 60) {
    return $diff . " giây trước";
  } elseif ($diff < 3600) {
    return floor($diff / 60) . " phút trước";
  } elseif ($diff < 86400) {
    return floor($diff / 3600) . " tiếng trước";
  } elseif ($diff < 2592000) { // Dưới 30 ngày
    return floor($diff / 86400) . " ngày trước";
  } elseif ($diff < 31536000) { // Dưới 12 tháng
    return floor($diff / 2592000) . " tháng trước";
  } else {
    return floor($diff / 31536000) . " năm trước";
  }
}
// --------------------------------------------------

// Thêm truyện 
function generate_unique_slug_truyen($title, $post_type = 'truyen')
{
  // Chuyển tiêu đề thành slug cơ bản
  $slug = sanitize_title($title);

  // Kiểm tra slug có bị trùng không
  $unique_slug = wp_unique_post_slug($slug, 0, '', $post_type, 0);

  return $unique_slug;
}
// --------------------------------------------------
// Chi tiết truyện, chi tiết chương
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


  // Đăng ký CPT "Chương"
  register_post_type('chuong', array(
    'labels' => array(
      'name' => __('Chương', 'textdomain'),
      'singular_name' => __('Chương', 'textdomain'),
    ),
    'public' => true,
    'has_archive' => false, // Chỉ hiển thị dưới "Truyện"
    'rewrite' => false, // Không có đường dẫn riêng
    'supports' => array('title', 'editor'),

    'taxonomies' => array('category', 'post_tag'), //Các taxonomy được phép sử dụng để phân loại nội dung
    'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
    'show_ui' => true, //Hiển thị khung quản trị như Post/Page
    'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
    'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
    'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
    'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
    'menu_icon' => '', //Đường dẫn tới icon sẽ hiển thị
    'can_export' => true, //Có thể export nội dung bằng Tools -> Export
    'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
    'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
    'capability_type' => 'post' //
  ));
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

// --------------------------------------------------
// Trang quản lý truyện
function tao_quanly_custom_post_type()
{

  /*
   * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
   */
  $label = array(
    'name' => 'Quản lý truyện', //Tên post type dạng số nhiều
    'singular_name' => 'Quản lý truyện' //Tên post type dạng số ít
  );

  /*
   * Biến $args là những tham số quan trọng trong Post Type
   */
  $args = array(
    'labels' => $label, //Gọi các label trong biến $label ở trên
    'description' => 'Post type quản lý truyện', //Mô tả của post type
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
    'capability_type' => 'post', //
    'rewrite' => array('slug' => 'quan-ly-truyen', 'with_front' => true),
  );

  register_post_type('quan-ly-truyen', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'tao_quanly_custom_post_type');
add_filter('pre_get_posts', 'lay_quanly_custom_post_type');
function lay_quanly_custom_post_type($query)
{
  if (is_home() && $query->is_main_query())
    $query->set('post_type', array('post', 'quan-ly-truyen'));
  return $query;
}

// --------------------------------------------------
// Trang thêm chương mới
function chapter_custom_rewrite_rules()
{
  add_rewrite_rule(
    '^quan-ly-truyen/([^/]+)/them-chuong-moi/?$',
    'index.php?truyen_parent=$matches[1]&add_chapter=1',
    'top'
  );
}
add_action('init', 'chapter_custom_rewrite_rules');

function chapter_add_query_vars($vars)
{
  $vars[] = 'truyen_parent';
  $vars[] = 'add_chapter'; // Đánh dấu đây là trang "Thêm Chương"
  return $vars;
}
add_filter('query_vars', 'chapter_add_query_vars');


function handle_add_chapter_page()
{
  if (get_query_var('add_chapter') == 1) {
    include get_template_directory() . '/UpChapter.php';
    exit; // Dừng WordPress để không tải tiếp các nội dung khác
  }
}
add_action('template_redirect', 'handle_add_chapter_page');

// --------------------------------------------------
// Chung
// Thêm Rewrite Rules trong functions.php
function custom_rewrite_rules()
{
  // add_rewrite_rule(
  //   '^quan-ly-truyen/?$',
  //   'index.php?post_type=quan-ly-truyen&literead_all_story=1',
  //   'top' // Đưa lên đầu danh sách rules
  // );
  add_rewrite_rule(
    '^truyen/([^/]+)/([^/]+)/?$',
    'index.php?chuong=$matches[2]&truyen_parent=$matches[1]',
    'normal'
  );
  add_rewrite_rule(
    '^truyen/([^/]*)/?$',
    'index.php?post_type=truyen&name=$matches[1]',
    'bottom'
  );

  //Trang cá nhân 
  add_rewrite_rule(
    '^quan-ly-truyen/truyen/([^/]+)/chinh-sua-truyen/?$',
    'index.php?post_type=quan-ly-truyen&truyen_parent=$matches[1]&literead_edit_chapter=1',
    'top'
  );

  add_rewrite_rule(
    '^quan-ly-truyen/([^/]+)/([^/]+)/?$',
    'index.php?post_type=quan-ly-truyen&chuong=$matches[2]&truyen=$matches[1]',
    'normal'
  );
  add_rewrite_rule(
    '^quan-ly-truyen/([^/]*)/?$',
    'index.php?post_type=quan-ly-truyen&name=$matches[1]',
    'normal'
  );

  add_rewrite_rule(
    '^quan-ly-truyen/truyen/([^/]+)/them-chuong-moi/?$',
    'index.php?post_type=quan-ly-truyen&truyen_parent=$matches[1]&literead_add_chapter=1',
    'top'
  );

}
add_action('init', 'custom_rewrite_rules');


// Đăng ký Query Variable
function custom_query_vars($vars)
{
  $vars[] = 'story_slug';
  $vars[] = 'truyen_parent';
  $vars[] = 'chuong';
  $vars[] = 'literead_add_chapter';
  $vars[] = 'literead_edit_chapter';
  $vars[] = 'literead_all_story';
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

flush_rewrite_rules();

add_action('template_redirect', function () {
  global $wp_query;
  echo "<script>console.error('Debug Error: " . json_encode($wp_query->query_vars) . "');</script>";
  //[GET] /quan-ly-truyen
  if (is_post_type_archive('quan-ly-truyen')) {
    include(get_template_directory() . '/quan-ly.php');
    exit;
  }
  //[GET] /quan-ly-truyen/{ten-truyen}/chinh-sua-truyen
  if (isset($wp_query->query_vars['chuong']) && $wp_query->query_vars['chuong'] == 'chinh-sua-truyen') {
    include(get_template_directory() . '/EditStory.php');
    exit;
  }
  //[GET] /quan-ly-truyen/{ten-truyen}/{ten-chuong}
  if (isset($wp_query->query_vars['chuong']) && isset($wp_query->query_vars['truyen'])) {
    include(get_template_directory() . '/EditChapter.php');
    exit;
  }
  //[GET] /quan-ly-truyen/{ten-truyen}
  if (isset($wp_query->query_vars['post_type']) && $wp_query->query_vars['post_type'] == 'quan-ly-truyen') {
    include(get_template_directory() . '/quan-ly-truyen.php');
    exit;
  }
  //[GET] /quan-ly-truyen/{ten-truyen}
  if (isset($wp_query->query_vars['chuong']) && isset($wp_query->query_vars['truyen_parent'])) {
    include(get_template_directory() . '/single-chuong.php');
    exit;
  }
});

// global $wp_rewrite;
// echo '<pre>';
// print_r($wp_rewrite->wp_rewrite_rules());
// echo '</pre>';


?>