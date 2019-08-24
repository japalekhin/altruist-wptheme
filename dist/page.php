<?php get_header(); ?>
<?php the_post(); ?>
<div class="singlePage siteBody py-5">
  <div class="container d-flex flex-column flex-lg-row">
    <div class="pageContent flex-grow-1">
      <div class="pageHeader">
        <h2 class="title"><?php the_title(); ?></h2>
        <?php if (altruistHasCoverImage(get_the_ID())) : ?>
        <div class="pageCover" style="background-image: url('<?php echo altruistGetCoverImageUrl(get_the_ID()); ?>');"></div>
        <?php endif; ?>
      </div>
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer();
