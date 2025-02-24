<?php
// Theme setup

function theme_enqueue_styles() {
  wp_enqueue_style('my-style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function metruyen_theme_setup() {
    add_theme_support('post-thumbnails'); // Featured images
    add_theme_support('title-tag');       // Dynamic titles
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'metruyen'),
    ));
}
add_action('after_setup_theme', 'metruyen_theme_setup');

// Enqueue styles
function metruyen_enqueue_styles() {
    wp_enqueue_style('metruyen-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'metruyen_enqueue_styles');

// Register Custom Post Type "Truyện"
function metruyen_register_post_type() {
    register_post_type('truyen', array(
        'labels' => array(
            'name' => __('Truyện'),
            'singular_name' => __('Truyện')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'truyen'),
    ));
}
add_action('init', 'metruyen_register_post_type');
