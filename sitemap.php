<?php
// Gọi header thông tin cho XML
header('Content-Type: application/xml; charset=UTF-8');

// Kết nối tới WordPress
define('WP_USE_THEMES', false);
require('wp-blog-header.php');  // Đảm bảo bạn đã bao gồm tệp wp-blog-header.php

// In ra phần mở đầu của Sitemap XML
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Lấy tất cả các bài viết từ cơ sở dữ liệu của WordPress
global $wpdb;
$posts = $wpdb->get_results("SELECT ID, post_modified, post_name FROM $wpdb->posts WHERE post_status = 'publish'");

foreach ($posts as $post) {
    $post_url = get_permalink($post->ID); // Lấy URL của bài viết
    $last_modified = $post->post_modified; // Lấy ngày sửa cuối cùng của bài viết
    
    echo '<url>';
    echo '<loc>' . esc_url($post_url) . '</loc>';
    echo '<lastmod>' . date('Y-m-d', strtotime($last_modified)) . '</lastmod>';
    echo '<changefreq>daily</changefreq>';
    echo '<priority>0.8</priority>';
    echo '</url>';
}

// Đóng phần XML
echo '</urlset>';
?>
