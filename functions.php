<?php
function infonepalonline_theme_setup() {
    load_theme_textdomain('infonepalonline-theme', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'infonepalonline-theme'),
        'footer' => __('Footer Menu', 'infonepalonline-theme'),
    ));
}
add_action('after_setup_theme', 'infonepalonline_theme_setup');
function infonepalonline_enqueue_assets() {
    wp_enqueue_style('infonepalonline-main', get_template_directory_uri() . '/main.css', array(), '1.0');
    wp_enqueue_script('infonepalonline-scripts', get_template_directory_uri() . '/scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'infonepalonline_enqueue_assets');
if (file_exists(get_template_directory() . '/acf-config.php')) {
    include get_template_directory() . '/acf-config.php';
}