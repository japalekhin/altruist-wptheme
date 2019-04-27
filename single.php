<?php get_header(); ?>
<?php the_post(); ?>
<div class="article articleSingle">
  <header class="articleHeader pt-4 pt-lg-5 pb-3 mb-5">
    <div class="container">
      <div class="articleContainer">
        <h1 class="articleTitle"><?php the_title(); ?></h1>
        <!-- <p class="articleSubtitle">Drawing graphics on the screen is an essential part of developing games. Sure, some text-based games exist but let’s face it, those are too specialized and only a few people understand how good they are (if they are).</p> -->
        <div class="articleMeta pt-2 pb-4">
          <span class="articleMetaItem">
            <i class="far fa-clock mr-1"></i>
            <?php the_time('D, F j, Y'); ?>
          </span>
          <span class="articleMetaItem">
            <?php $readTime = altruistGetReadLength(get_the_ID()); ?>
            <i class="fas fa-glasses mr-1"></i>
            <?php echo $readTime; ?> minute<?php echo ($readTime == 1 ? '' : 's'); ?>
          </span>
          <?php if (comments_open()): ?>
            <i class="far fa-comments mr-1"></i>
            <span class="commentsLink articleMetaItem">
              <?php comments_popup_link(__('Comment', 'devin'), __('1 Comment', 'devin'), __('% Comments', 'devin')); ?>
            </span>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="articleCover text-center">
      <?php the_post_thumbnail(); ?>
    </div>
  </header>
  <section class="articleBody">
    <div class="container">
      <div class="articleContainer">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
  <?php if (get_post_status(get_the_ID()) == 'publish' && comments_open() || '0' != get_comments_number()): ?>
    <footer class="articleFooter articleComments my-5">
      <div class="container">
        <?php comments_template('', true); ?>
      </div>
    </footer>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
