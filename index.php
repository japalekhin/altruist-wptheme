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
  <header id="header" class="fixed-top bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
          <img alt="<?php bloginfo('name'); ?>" src="https://www.gravatar.com/avatar/b67403727ea18e05af2557dc8542b37b?s=160&d=mm" width="40" height="40" class="rounded-circle mr-1" />
          <?php bloginfo('name'); ?>
        </a>
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
          <ul class="nav navbar-nav nav-social d-flex flex-row mb-3 my-lg-auto ml-auto mr-lg-2">
            <li class="nav-item mx-1">
              <a href="https://github.com/japalekhin" target="_blank" title="GitHub">
                <img alt="GitHub" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-github.svg" width="32" height="32" />
              </a>
            </li>
            <li class="nav-item mx-1">
              <a href="https://discord.gg/SNvNfas" target="_blank" title="Discord">
                <img alt="Discord" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-discord.svg" width="32" height="32" />
              </a>
            </li>
            <li class="nav-item mx-1">
              <a href="https://www.strava.com/athletes/japalekhin" target="_blank" title="Strava">
                <img alt="Strava" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-strava.svg" width="32" height="32" />
              </a>
            </li>
            <li class="nav-item mx-1">
              <a href="https://www.twitch.tv/japalekhin" target="_blank" title="Twitch">
                <img alt="Twitch" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-twitch.svg" width="32" height="32" />
              </a>
            </li>
            <li class="nav-item mx-1">
              <a href="https://www.linkedin.com/in/japa-alekhin-llemos-400641167/" target="_blank" title="LinkedIn">
                <img alt="LinkedIn" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-linked-in.svg" width="32" height="32" />
              </a>
            </li>
            <li class="nav-item mx-1">
              <a href="https://www.facebook.com/japalekhin" target="_blank" title="Facebook">
                <img alt="Facebook" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-facebook.svg" width="32" height="32" />
              </a>
            </li>
            <li class="nav-item mx-1">
              <a href="https://twitter.com/japalekhin" target="_blank" title="Twitter">
                <img alt="Twitter" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-twitter.svg" width="32" height="32" />
              </a>
            </li>
            <li class="nav-item mx-1">
              <a href="https://www.instagram.com/japalekhin/" target="_blank" title="Instagram">
                <img alt="Instagram" src="<?php echo home_url(); ?>/wp-content/themes/altruist/img/icon-instagram.svg" width="32" height="32" />
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav mb-3 mb-lg-auto">
            <li class="nav-item">
              <a href="https://www.patreon.com/bePatron?u=6507717" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo home_url(); ?>/wp-content/uploads/2019/03/become-patron-button.png" alt="Become a patron" width="170" height="40" class="rounded">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main id="main">
    <div class="container">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mollis tristique lectus eget consectetur.</p>
      <p>Quisque semper quam sed euismod rutrum. Phasellus ut tortor urna. Aenean sed iaculis nisl. Fusce vel nulla pharetra, finibus lectus eleifend, egestas arcu. Integer dapibus mollis felis ac imperdiet.</p>
      <p>Proin vitae dui accumsan eros venenatis ullamcorper.</p>
      <p>Duis nunc ante, condimentum quis dolor a, malesuada dictum velit. Fusce volutpat sed nisl nec laoreet.</p>
      <p>Curabitur ac ullamcorper dui, gravida congue nibh. Integer et bibendum tellus. Nulla interdum aliquet imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse condimentum sodales pulvinar.</p>
      <p>Vestibulum scelerisque nulla ac nisi pretium malesuada. Quisque eu turpis libero. Nam malesuada venenatis justo. Duis dolor quam, ultricies vitae rhoncus at, efficitur eget tellus. Vestibulum dapibus lacus ac justo dignissim, non vulputate lacus elementum. Morbi pharetra justo quis lectus pretium porta eget non arcu. Mauris justo ex, tempus et tempor sit amet, tristique ac nisl. Vivamus ligula elit, dictum a rutrum eget, luctus non turpis. Suspendisse nec mauris eu felis varius cursus in id sem. Donec mauris odio, pellentesque id massa sit amet, malesuada sollicitudin ligula.</p>
      <p>Donec convallis, odio sed ornare viverra, nisl risus sollicitudin ante, vel dignissim nulla turpis a ligula. Curabitur non iaculis diam. Nam vel lacinia purus, in ornare magna. Duis hendrerit turpis arcu, eget maximus odio rhoncus a. Donec vestibulum mattis convallis. Nullam ex felis, porttitor sit amet lorem vitae, scelerisque lacinia nisi. Ut convallis cursus condimentum. In hac habitasse platea dictumst. Nulla egestas et arcu ut iaculis. Mauris ante velit, laoreet et neque sit amet, sagittis sodales ex. Nam condimentum accumsan tempor.</p>
      <p>Vestibulum non posuere elit, ut varius lorem. Donec sed quam a eros sodales tempor nec sit amet odio. Maecenas a tincidunt tortor, eu faucibus nisl. Donec hendrerit velit ac pellentesque faucibus.</p>
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
