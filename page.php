<?php get_header(); ?>
<?php the_post(); ?>
<div class="article articlePage">
  <header class="articleHeader">
    <div class="container">
      <div class="articleContainer">
        <h1 class="articleTitle"><?php the_title(); ?></h1>
      </div>
    </div>
  </header>
  <section class="articleBody">
    <div class="container">
      <div class="articleContainer">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>
</div>
