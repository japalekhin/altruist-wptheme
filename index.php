<?php get_header(); ?>
<div class="homePosts">
  <div class="container">
    <?php while(have_posts()): ?>
      <?php the_post(); ?>
      <div class="homePost d-flex flex-column flex-md-row align-items-center align-items-md-start my-5">
        <?php $imageURL = altruistGetHomePostImageURL(get_the_ID()); ?>
        <?php if ($imageURL != ''): ?>
          <a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $imageURL; ?>');" class="homePostImage mb-2 mb-md-0 mr-md-4 flex-shrink-0"></a>
        <?php endif; ?>
        <div class="homePostDetails">
          <h2 class="homePostTitle">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          </h2>
          <p class="homePostSubtitle">Subtitle</p>
          <div class="homePostMeta">
            <span class="homePostMetaItem">
              <i class="far fa-clock mr-1"></i>
              <?php the_time('l, F j, Y'); ?>
            </span>
            <?php if (comments_open()): ?>
              <i class="far fa-comments mr-1"></i>
              <span class="commentsLink homePostMetaItem">
                <?php comments_popup_link(__('Comment', 'devin'), __('1 Comment', 'devin'), __('% Comments', 'devin')); ?>
              </span>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <hr class="d-lg-none mx-auto mb-4" />
    <?php endwhile; ?>

    <nav class="homePostsNav text-center mb-5">
      <?php if (get_next_posts_link() != null): ?>
        <a class="btn btn-info" href="<?php echo get_next_posts_page_link(); ?>" role="button">
          <i class="fas fa-long-arrow-alt-left"></i>
          Older posts
        </a>
      <?php endif; ?>
      <?php if (get_previous_posts_link() != null): ?>
        <a class="btn btn-info" href="<?php echo get_previous_posts_page_link(); ?>" role="button">
          Newer posts
          <i class="fas fa-long-arrow-alt-right"></i>
        </a>
      <?php endif; ?>
    </nav>
  </div>
</div>
<?php get_footer();
