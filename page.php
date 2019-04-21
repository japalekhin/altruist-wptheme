<?php get_header(); ?>
<?php the_post(); ?>
<header class="article-header">
  <div class="container">
    <div class="article-container">
      <h1 class="article-title"><?php the_title(); ?></h1>
    </div>
  </div>
</header>
<section class="article-body">
  <div class="container">
    <div class="article-container">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php get_header(); ?>
