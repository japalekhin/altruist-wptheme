<?php

// basic theme features
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(640, 480, true);

  register_nav_menu('primary', __('Primary Menu', 'altruist'));
});

// move scripts to footer
add_action('init', function () {
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  add_action('wp_footer', 'print_emoji_detection_script', 5);
  add_action('wp_footer', 'wp_print_scripts', 5);
  add_action('wp_footer', 'wp_print_head_scripts', 5);
});

// remove jquery add main stylesheet and script
add_action('wp_enqueue_scripts', function () {
  wp_deregister_script('jquery');
  wp_enqueue_style('altruist', get_stylesheet_directory_uri() . '/assets/main.css', []);
  wp_enqueue_script('altruist', get_stylesheet_directory_uri() . '/assets/main.js', [], false, true);
});

// modify excerpt more
add_filter('excerpt_more', function ($more) {
  return '&hellip;';
});
