<?php get_header(); ?>
<div class="indexPage siteBody py-5">
  <div class="container d-flex flex-column flex-lg-row">
    <div class="posts flex-grow-1">
      <?php altruistBootstrapPagination('mb-5'); ?>
      <?php while (have_posts()) : ?>
      <?php the_post(); ?>
      <div class="postPreview d-sm-flex flex-sm-row-reverse mb-5">
        <?php if (altruistHasCoverImage(get_the_ID())) : ?>
        <a href="<?php the_permalink(); ?>" class="image d-sm-inline flex-shrink-0 ml-3">
          <div class="imageContainer" style="background-image: url('<?php echo altruistGetCoverImageUrl(get_the_ID(), 'small') ?>');"></div>
        </a>
        <?php endif; ?>
        <div class="details flex-grow-1">
          <header class="header">
            <h2 class="title mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="excerpt font-copy"><?php the_excerpt(); ?></div>
          </header>
          <section class="meta d-flex flex-row flex-wrap">
            <div class="time mr-3">
              <i class="fas fa-clock"></i>
              <?php the_time('D, F j, Y'); ?>
            </div>
            <div class="read mr-3">
              <?php $readTime = altruistGetReadLength(get_the_ID()); ?>
              <i class="fas fa-glasses"></i>
              <?php echo $readTime; ?> minute<?php echo ($readTime == 1 ? '' : 's'); ?>
            </div>
            <?php if (comments_open()) : ?>
            <div class="comments mr-3">
              <i class="fas fa-comments"></i>
              <span class="commentsLink homePostMetaItem">
                <?php comments_popup_link(__('Comment', 'altruist'), __('1 Comment', 'altruist'), __('% Comments', 'altruist')); ?>
              </span>
            </div>
            <?php endif; ?>
            <!--div class="categories">categories</div-->
          </section>
        </div>
      </div>
      <?php endwhile; ?>
      <?php altruistBootstrapPagination('mt-5'); ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer();
