<?php get_header(); ?>
<?php the_post(); ?>
<div class="article articleSingle">
  <header class="articleHeader pt-4 pt-lg-5 pb-3">
    <div class="container">
      <div class="articleContainer">
        <h1 class="articleTitle"><?php the_title(); ?></h1>
        <!-- <p class="articleSubtitle">Drawing graphics on the screen is an essential part of developing games. Sure, some text-based games exist but let’s face it, those are too specialized and only a few people understand how good they are (if they are).</p> -->
        <div class="articleMeta pt-2 pb-4">
          <span class="articleMetaItem">
            <?php the_time('l, F j, Y'); ?>
          </span>
          <?php if (comments_open()): ?>
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
</div>
<?php get_footer(); ?>
