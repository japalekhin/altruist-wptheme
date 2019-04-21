<?php

add_action('init', function () {
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  add_action('wp_footer', 'print_emoji_detection_script', 5);
  add_action('wp_footer', 'wp_print_scripts', 5);
  add_action('wp_footer', 'wp_print_head_scripts', 5);
});

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('altruist', get_template_directory_uri() . '/css/main.css', ['bootstrap',]);

  wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', [], false, true);
});

// remove admin bar
add_filter('show_admin_bar', '__return_false');
