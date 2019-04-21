<?php get_header(); ?>
<?php the_post(); ?>
<div class="article article-single">
  <header class="article-header pt-4 pt-lg-5 pb-3">
    <div class="container">
      <div class="article-container">
        <h1 class="article-title"><?php the_title(); ?></h1>
        <p class="article-subtitle">Drawing graphics on the screen is an essential part of developing games. Sure, some text-based games exist but let’s face it, those are too specialized and only a few people understand how good they are (if they are).</p>
        <div class="article-meta pt-2 pb-4">article meta</div>
      </div>
    </div>
    <div class="article-cover text-center">
      <?php the_post_thumbnail(); ?>
    </div>
  </header>
  <section class="article-body">
    <div class="container">
      <div class="article-container">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>
