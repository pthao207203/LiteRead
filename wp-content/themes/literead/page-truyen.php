<?php
get_header();

global $wpdb;

// Lấy slug từ URL
$slug = get_query_var('story_slug');

// Lấy thông tin truyện từ database `wp_stories`
$story = $wpdb->get_row($wpdb->prepare("SELECT * FROM wp_stories WHERE slug = %s", $slug));

if ($story) {
  echo '<h1>' . esc_html($story->title) . '</h1>';
  echo '<div>' . wp_kses_post($story->content) . '</div>';
  echo '<p>Thể loại: ' . esc_html($story->genre) . '</p>';
} else {
  echo '<p>Truyện không tồn tại.</p>';
}

get_footer();
