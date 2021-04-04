<?php get_header(); ?>
<?php the_post(); ?>
<div class="singlePost siteBody<?php echo altruistHasCoverImage(get_the_ID()) ? ' hasImage' : ''; ?>">
  <header class="cover d-flex flex-column bg-dark pt-5 pb-lg-3" style="background-image: url('<?php echo altruistGetCoverImageUrl(get_the_ID()); ?>');">
    <div class="container text-white mt-auto p-3">
      <h2 class="title text-center"><?php the_title(); ?></h2>
      <div class="meta d-flex flex-row flex-wrap justify-content-center">
        <div class="time me-3">
          <i class="fas fa-clock"></i>
          <?php the_time('D, F j, Y'); ?>
        </div>
        <div class="read me-3">
          <?php $readTime = altruistGetReadLength(get_the_ID()); ?>
          <i class="fas fa-glasses"></i>
          <?php echo $readTime; ?> minute<?php echo ($readTime == 1 ? '' : 's'); ?>
        </div>
        <?php if (comments_open()) : ?>
          <div class="comments me-3">
            <i class="fas fa-comments"></i>
            <span class="commentsLink homePostMetaItem">
              <?php comments_popup_link(__('Comment', 'altruist'), __('1 Comment', 'altruist'), __('% Comments', 'altruist')); ?>
            </span>
          </div>
        <?php endif; ?>
        <!--div class="categories">categories</div-->
      </div>
    </div>
  </header>
  <div class="container py-5">
    <div class="content">
      <div class="mb-5">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <?php if (get_post_status(get_the_ID()) == 'publish') : ?>
    <footer class="comments py-5">
      <div class="container">
        <?php comments_template('', true); ?>
      </div>
    </footer>
  <?php endif; ?>
</div>
<?php get_footer();
