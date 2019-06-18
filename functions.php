<?php

require_once(get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php');

add_action('after_setup_theme', function() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(756, 426, true);

  register_nav_menu('primary', __('Primary Menu', 'altruist'));
});

// customizer functions
require(get_stylesheet_directory() . '/inc/customizer/header.php');
require(get_stylesheet_directory() . '/inc/customizer/home.php');

// move scripts to footer
add_action('init', function () {
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  add_action('wp_footer', 'print_emoji_detection_script', 5);
  add_action('wp_footer', 'wp_print_scripts', 5);
  add_action('wp_footer', 'wp_print_head_scripts', 5);
});

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('altruist', get_stylesheet_directory_uri() . '/assets/styles/main.css', []);
  wp_enqueue_script('altruist', get_stylesheet_directory_uri() . '/assets/scripts/main.js', [], false, true);
});

add_action('wp_enqueue_scripts', function () {
  wp_deregister_script('jquery');
}, 11);

add_action('admin_init', function() {
  add_editor_style('css/editor-style.css');
});

// title backwards compatibility (actually not needed since minimum wp version is 5.0.0)
if (!function_exists('_wp_render_title_tag')) {
  add_action('wp_head', function () {
      echo '<title>';
      wp_title('|', true, 'right');
      echo '</title>';
  });
}

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

// *** functions

// get frontpage cover image url
function altruistGetFrontpageCoverImageUrl($imageId) {
  $src = wp_get_attachment_image_src($imageId, 'full');
  return $src[0];
}

// get post cover image url
function altruistGetHomePostImageURL($postID) {
  $attachmentID = get_post_thumbnail_id();
  if ($attachmentID == 0) return '';
  $src = wp_get_attachment_image_src($attachmentID, 'post-thumbnail');
  return $src[0];
}

// get read length in minutes
function altruistGetReadLength($postID) {
  // opinionated constants
  $wordsPerMinute = 200;
  $secondsPerImage = 3;

  // get content
  $content = get_post_field('post_content', $postID);

  // get plain text and collapse whitespace
  $plainContent = wp_strip_all_tags($content, true);
  $plainContent = preg_replace('/\s+/', ' ', $plainContent);

  // count words
  $words = explode(' ', $plainContent);

  // minutes on words
  $wordMinutes = count($words) / $wordsPerMinute;

  // count images
  $imageCount = substr_count($content, '<img');

  // minutes on images
  $imageSeconds = $imageCount * $secondsPerImage;
  $imageMinutes = $imageSeconds / 60;

  // totals
  $totalMinutes = $wordMinutes + $imageMinutes;
  $remainderMinutes = $totalMinutes - intval($totalMinutes);
  return max(
    1,
    intval($totalMinutes) + ($remainderMinutes < .5 ? 0 : 1)
  );
}
