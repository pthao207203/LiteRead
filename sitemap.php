<?php
// Đảm bảo header cho XML
header("Content-Type: application/xml; charset=UTF-8");

// Kết nối tới WordPress
define('WP_USE_THEMES', false);
require('wp-blog-header.php');

// Tạo file sitemap.xml (nếu chưa tồn tại) và ghi nội dung vào
$sitemap_file = 'sitemap.xml'; // Tên file sitemap

// Mở file và ghi dữ liệu vào
$file = fopen($sitemap_file, 'w');

// In ra phần mở đầu của Sitemap XML
fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>' . "\n");
fwrite($file, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n");

// Trang chủ
fwrite($file, '<url><loc>' . esc_url(home_url('/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>daily</changefreq><priority>1.0</priority></url>' . "\n");

// Các trang chính khác
fwrite($file, '<url><loc>' . esc_url(home_url('/tong-quan/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>' . "\n");
fwrite($file, '<url><loc>' . esc_url(home_url('/truyen-da-thich/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>' . "\n");
fwrite($file, '<url><loc>' . esc_url(home_url('/quan-ly-truyen/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>daily</changefreq><priority>0.9</priority></url>' . "\n");
fwrite($file, '<url><loc>' . esc_url(home_url('/vi-cua-toi/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>' . "\n");
fwrite($file, '<url><loc>' . esc_url(home_url('/dieu-khoan/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>yearly</changefreq><priority>0.5</priority></url>' . "\n");
fwrite($file, '<url><loc>' . esc_url(home_url('/tim-kiem/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>' . "\n");
fwrite($file, '<url><loc>' . esc_url(home_url('/thong-bao/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>' . "\n");

// Các URL của các tác giả
$users_table = $wpdb->prefix . 'users_literead';
$users = $wpdb->get_results("SELECT * FROM $users_table");
foreach ($users as $user) {
    fwrite($file, '<url>');
    fwrite($file, '<loc>' . esc_url(home_url('/trang-ca-nhan/' . $user->slug)) . '</loc>');
    fwrite($file, '<lastmod>' . date('Y-m-d') . '</lastmod>');
    fwrite($file, '<changefreq>weekly</changefreq>');
    fwrite($file, '<priority>0.7</priority>');
    fwrite($file, '</url>' . "\n");
}

// Lấy dữ liệu từ bảng 'stories' (Truyện)
$stories_table = $wpdb->prefix . 'stories';
$stories = $wpdb->get_results("SELECT * FROM $stories_table");

// Các URL của truyện
foreach ($stories as $story) {
    // Kiểm tra sự tồn tại của thuộc tính slug
    if (!empty($story->slug)) {
        $story_slug = $story->slug;
    } else {
        $story_slug = ''; // Nếu không có slug, có thể dùng giá trị mặc định
    }

    // Kiểm tra nếu $story->modified không phải là null
    $story_modified = !empty($story->modified) ? $story->modified : date('Y-m-d');
    
    fwrite($file, '<url>');
    fwrite($file, '<loc>' . esc_url(home_url('/truyen/' . $story_slug)) . '</loc>');
    fwrite($file, '<lastmod>' . date('Y-m-d', strtotime($story_modified)) . '</lastmod>');
    fwrite($file, '<changefreq>daily</changefreq>');
    fwrite($file, '<priority>0.9</priority>');
    fwrite($file, '</url>' . "\n");

    // Lấy các chương của truyện
    $chapters = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "chapters WHERE story_id = %d", $story->id));

    // Thêm các chương vào sitemap
    foreach ($chapters as $chapter) {
        // Kiểm tra sự tồn tại của thuộc tính slug
        if (!empty($chapter->slug)) {
            $chapter_slug = $chapter->slug;
        } else {
            $chapter_slug = ''; // Nếu không có slug, có thể dùng giá trị mặc định
        }
        
        // Kiểm tra nếu $chapter->modified không phải là null
        $chapter_modified = !empty($chapter->modified) ? $chapter->modified : date('Y-m-d');
        
        fwrite($file, '<url>');
        fwrite($file, '<loc>' . esc_url(home_url('/truyen/' . $story_slug . '/chuong-' . $chapter->chapter_number)) . '</loc>');
        fwrite($file, '<lastmod>' . date('Y-m-d', strtotime($chapter_modified)) . '</lastmod>');
        fwrite($file, '<changefreq>daily</changefreq>');
        fwrite($file, '<priority>0.9</priority>');
        fwrite($file, '</url>' . "\n");
    }
}

// Đóng thẻ urlset
fwrite($file, '</urlset>' . "\n");

// Đóng file
fclose($file);
?>
