<?php
// Đảm bảo header cho XML
header("Content-Type: application/xml; charset=UTF-8");

// Lấy dữ liệu từ cơ sở dữ liệu
global $wpdb;

// Lấy danh sách các truyện
$stories_table = $wpdb->prefix . 'stories';
$stories = $wpdb->get_results("SELECT * FROM $stories_table");

// In header của sitemap XML
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Trang chủ
echo '<url><loc>' . esc_url(home_url('/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>daily</changefreq><priority>1.0</priority></url>';

// Các trang nội dung chính
echo '<url><loc>' . esc_url(home_url('/tong-quan/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
echo '<url><loc>' . esc_url(home_url('/truyen-da-thich/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>';
echo '<url><loc>' . esc_url(home_url('/quan-ly-truyen/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>daily</changefreq><priority>0.9</priority></url>';
echo '<url><loc>' . esc_url(home_url('/vi-cua-toi/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>';
echo '<url><loc>' . esc_url(home_url('/dieu-khoan/')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>yearly</changefreq><priority>0.5</priority></url>';

// Các URL của tác giả
$users_table = $wpdb->prefix . 'users_literead';
$users = $wpdb->get_results("SELECT * FROM $users_table");
foreach ($users as $user) {
    echo '<url>';
    echo '<loc>' . esc_url(home_url('/trang-ca-nhan/' . $user->slug)) . '</loc>';
    echo '<lastmod>' . date('Y-m-d') . '</lastmod>';
    echo '<changefreq>weekly</changefreq>';
    echo '<priority>0.7</priority>';
    echo '</url>';
}

// Các URL của truyện
foreach ($stories as $story) {
    echo '<url>';
    echo '<loc>' . esc_url(home_url('/truyen/' . $story->slug)) . '</loc>';
    echo '<lastmod>' . date('Y-m-d', strtotime($story->modified)) . '</lastmod>';
    echo '<changefreq>daily</changefreq>';
    echo '<priority>0.9</priority>';
    echo '</url>';

    // Lấy các chương của truyện
    $chapters = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "chapters WHERE story_id = %d", $story->id));

    // Thêm các chương vào sitemap
    foreach ($chapters as $chapter) {
        echo '<url>';
        echo '<loc>' . esc_url(home_url('/truyen/' . $story->slug . '/chuong-' . $chapter->slug)) . '</loc>';
        echo '<lastmod>' . date('Y-m-d', strtotime($chapter->modified)) . '</lastmod>';
        echo '<changefreq>daily</changefreq>';
        echo '<priority>0.9</priority>';
        echo '</url>';
    }
}

// Đóng thẻ urlset
echo '</urlset>';
?>
