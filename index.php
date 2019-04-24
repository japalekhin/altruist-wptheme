<?php get_header(); ?>
<div class="homePosts">
  <div class="container">
    <?php while(have_posts()): ?>
      <?php the_post(); ?>
      <div class="homePost d-flex flex-column flex-md-row align-items-center align-items-md-start my-5">
        <a href="<?php the_permalink(); ?>" class="homePostImage mb-2 mb-md-0 mr-md-4 flex-shrink-0"></a>
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
  </div>
</div>
<?php get_footer();
