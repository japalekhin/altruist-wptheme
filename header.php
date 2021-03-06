<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>
  <div id="app">
    <div id="appTemplate" class="d-flex flex-column">
      <header class="siteHeader navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img alt="<?php bloginfo('name'); ?>" src="https://www.gravatar.com/avatar/b67403727ea18e05af2557dc8542b37b?s=32&d=mm" width="32" height="32" class="rounded-circle me-1" />
            <?php bloginfo('name'); ?>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            wp_nav_menu([
              'menu' => 'primary',
              'theme_location' => 'primary',
              'depth' => 5,
              'menu_class' => 'navbar-nav ',
              'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
              'walker' => new WP_Bootstrap_Navwalker(true),
            ]);
            ?>
            <ul class="featuredSocialLinks navbar-nav ms-auto me-lg-2 flex-row">
              <li class="nav-item">
                <a class="nav-link py-lg-0 pr-2 pl-lg-2" href="https://github.com/japalekhin" target="_blank"><i class="fab fa-github"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link py-lg-0 px-2" href="https://twitter.com/japalekhin" target="_blank"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link py-lg-0 px-2" href="https://discord.gg/SNvNfas" target="_blank"><i class="fab fa-discord"></i></a>
              </li>
            </ul>
            <ul class="moreSocialLinks navbar-nav me-lg-3">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown" href="#" id="dropdownMoreSocial" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v d-lg-none me-1"></i>
                  <i class="fas fa-ellipsis-h d-none d-lg-block"></i>
                  <span class="d-lg-none">More social network links</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMoreSocial">
                  <a class="dropdown-item" href="https://www.strava.com/athletes/japalekhin" target="_blank">
                    <i class="fab fa-strava fa-fw me-1"></i>
                    Strava
                  </a>
                  <a class="dropdown-item" href="https://www.youtube.com/channel/UCqmZ-WQn8KJ0glQqTsA8LfQ" target="_blank">
                    <i class="fab fa-youtube fa-fw me-1"></i>
                    YouTube
                  </a>
                  <a class="dropdown-item" href="https://www.facebook.com/japalekhin" target="_blank">
                    <i class="fab fa-facebook fa-fw me-1"></i>
                    Facebook
                  </a>
                  <a class="dropdown-item" href="https://www.instagram.com/japalekhin/" target="_blank">
                    <i class="fab fa-instagram fa-fw me-1"></i>
                    Instagram
                  </a>
                  <!-- <a class="dropdown-item" href="https://twitch.tv/japalekhin" target="_blank">
                    <i class="fab fa-twitch fa-fw me-1"></i>
                    Twitch
                  </a> -->
                </div>
              </li>
            </ul>
            <ul class="buyMeACoffeeLink navbar-nav order-lg-12">
              <li class="nav-item">
                <a class="buyMeACoffeeButton nav-link p-0 my-2 my-lg-0" href="https://www.buymeacoffee.com/japalekhin" target="_blank" title="Buy me a coffee">Buy me a coffee</a>
              </li>
            </ul>
            <ul class="patreonLink navbar-nav order-lg-12">
              <li class="nav-item">
                <a class="patreonButton nav-link p-0 my-2 my-lg-0 rounded" href="https://www.patreon.com/bePatron?u=6507717" target="_blank" title="Become a Patreon patron">Become a patron</a>
              </li>
            </ul>
          </div>
        </div>
      </header>
      <?php return; ?>
    </div>
  </div>
</body>

</html>