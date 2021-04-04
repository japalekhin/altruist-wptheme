<?php ob_start(); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Dummmy</title>
</head>

<body>
  <div>
    <div>
      <?php ob_end_clean(); ?>
      <footer class="siteFooter pt-3 pb-4 mt-auto">
        <div class="container text-center">
          © <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All rights reserved.
        </div>
      </footer>
    </div>
  </div>
  <?php wp_footer(); ?>
</body>

</html>