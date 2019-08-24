<?php

// get cover image
function altruistGetCoverImageId($postId)
{
  return get_post_thumbnail_id($postId);
}

function altruistHasCoverImage($postId)
{
  return altruistGetCoverImageId($postId) != 0;
}

function altruistGetCoverImageUrl($postId, $size = 'full')
{
  $imageId = altruistGetCoverImageId($postId);
  if ($imageId == 0) return '';
  $src = wp_get_attachment_image_src($imageId, $size);
  return $src[0];
}

// get read length in minutes
function altruistGetReadLength($postID)
{
  // opinionated constants
  $wordsPerMinute = 200;
  $secondsPerImage = 10;

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

// pager
function altruistBootstrapPagination($classes, $wp_query = null, $echo = true)
{

  if (null === $wp_query) {
    global $wp_query;
  }

  $currentPage = max(1, get_query_var('paged'));
  $maxPages = $wp_query->max_num_pages;

  $pages = paginate_links(
    [
      'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
      'format'       => '?paged=%#%',
      'current'      => $currentPage,
      'total'        => $maxPages,
      'type'         => 'array',
      'show_all'     => false,
      'end_size'     => 3,
      'mid_size'     => 1,
      'prev_next'    => true,
      'prev_text'    => '« Newer',
      'next_text'    => 'older »',
      'add_args'     => false,
      'add_fragment' => ''
    ]
  );
  if (is_array($pages)) {
    //$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
    $pagination = '<nav class="' . $classes . '" aria-label="Posts page navigation">';
    $pagination .= '<ul class="pagination">';
    foreach ($pages as $page) {
      $page = str_replace('/page/1', '', $page);
      $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
    }
    $pagination .= '</ul></nav>';
    if ($echo) {
      echo $pagination;
    } else {
      return $pagination;
    }
  }
  return null;
}
