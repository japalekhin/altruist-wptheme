<!doctype html>
<html class="no-js h-100" lang="">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">
  <?php wp_head(); ?>
</head>

<body class="d-flex flex-column h-100">
  <header class="fixed-top bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
            wp_nav_menu([
              'menu' => 'primary',
              'theme_location' => 'primary',
              'depth' => 5,
              'container' => 'div',
              'container_class' => '',
              'menu_class' => 'nav navbar-nav ',
              'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
              'walker' => new WP_Bootstrap_Navwalker(),
            ]);
          ?>
        </div>
      </div>
    </nav>
  </header>

  <main id="main">
    <div class="container">
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
    </div>
  </main>

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
      footer
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>

</html>
