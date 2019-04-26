<!doctype html>
<html class="no-js h-100" lang="">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: "ca-pub-5310211034721162",enable_page_level_ads: true});</script>
  <meta name="flattr:id" content="pd2l5k" />
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
          <ul class="nav navbar-nav navSocial d-flex flex-row mt-3 mb-3 my-lg-auto ml-auto mr-lg-2">
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
