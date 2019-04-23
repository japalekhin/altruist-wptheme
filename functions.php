<?php

require_once(get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php');

add_action('after_setup_theme', function() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(756, 426, true);

  register_nav_menu('primary', __('Primary Menu', 'altruist'));
});

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
  wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Cabin|Lora');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
  wp_enqueue_style('altruist', get_stylesheet_directory_uri() . '/css/main.css', ['bootstrap', 'fonts', 'fontawesome',]);

  wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', [], false, true);
});

// title backwards compatibility (actually not needed since minimum wp version is 5.0.0)
if (!function_exists('_wp_render_title_tag')) {
  add_action('wp_head', function () {
      echo '<title>';
      wp_title('|', true, 'right');
      echo '</title>';
  });
}

// remove admin bar
add_filter('show_admin_bar', '__return_false');

// modify excerpt more
add_filter('excerpt_more', function ($more) {
  return '&hellip;';
});

// drop cap calculator
add_filter('the_content', function($content) {
  if (!is_single()) return $content;

  $explodedContent = explode(' ', $content);
  if (count($explodedContent) > 1 && strlen($explodedContent[0]) < 4) {
    $droppedWord = '<span class="droppedLetters rounded">' . $explodedContent[0] . '</span>';
    array_shift($explodedContent);
    $content = $droppedWord . ' ' . implode(' ', $explodedContent);
  } else {
    $droppedLetter = '<span class="droppedLetters rounded">' . substr($content, 0, 1) . '</span>';
    $content = $droppedLetter . substr($content, 1);
  }
  return $content;
}, 1);
