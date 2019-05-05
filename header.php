<!doctype html>
<html class="no-js h-100" lang="">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">
  <meta name="flattr:id" content="pd2l5k" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: "ca-pub-5310211034721162",enable_page_level_ads: true});</script>
</head>

<body <?php body_class('d-flex flex-column h-100'); ?>>
  <header id="header" class="fixed-top bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
          <?php $brandingDisplay = get_theme_mod('brandingDisplay', ''); ?>
          <?php $gravatarEmail = strtolower(trim(get_theme_mod('gravatarEmail', ''))); ?>
          <?php $customSiteName = trim(get_theme_mod('customSiteName', '')); ?>
          <?php $useCustomSiteName = (get_theme_mod('useCustomSiteName', false) === true); ?>
          <?php $siteName = ($useCustomSiteName && $customSiteName !== '') ? $customSiteName : get_bloginfo('name'); ?>
          <?php if ($gravatarEmail !== '' && in_array($brandingDisplay, ['', 'gravatar'])): ?>
            <img alt="<?php echo $siteName; ?>" src="https://www.gravatar.com/avatar/<?php echo md5($gravatarEmail); ?>?s=160&d=mm" width="40" height="40" class="rounded-circle mr-1" />
          <?php endif; ?>
          <?php if (in_array($brandingDisplay, ['', 'name'])): ?>
            <?php echo $siteName; ?>
          <?php endif; ?>
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
          
          <?php $socialFacebook = trim(get_theme_mod('socialFacebook')); ?>
          <?php $socialTwitter = trim(get_theme_mod('socialTwitter')); ?>
          <?php $socialInstagram = trim(get_theme_mod('socialInstagram')); ?>
          <?php $socialGitHub = trim(get_theme_mod('socialGitHub')); ?>
          <?php $socialStrava = trim(get_theme_mod('socialStrava')); ?>
          <?php $socialLinkedIn = trim(get_theme_mod('socialLinkedIn')); ?>
          <?php $socialYoutube = trim(get_theme_mod('socialYoutube')); ?>
          <?php $socialTwitch = trim(get_theme_mod('socialTwitch')); ?>
          <?php $socialDiscord = trim(get_theme_mod('socialDiscord')); ?>
          <?php $socialWordPress = trim(get_theme_mod('socialWordPress')); ?>
          <?php $hasSocialLinks = $socialFacebook . $socialTwitter . $socialInstagram . $socialGitHub . $socialStrava . $socialLinkedIn . $socialYoutube . $socialTwitch . $socialDiscord !== ''; ?>
          <?php if ($hasSocialLinks): ?>
            <ul class="nav navbar-nav navSocial d-flex flex-row mt-3 mb-3 my-lg-auto ml-auto mr-lg-2">
              <?php if ($socialGitHub !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialGitHub; ?>" target="_blank" title="GitHub">
                    <img alt="GitHub" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-github.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialDiscord !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialDiscord; ?>" target="_blank" title="Discord">
                    <img alt="Discord" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-discord.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialStrava !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialStrava; ?>" target="_blank" title="Strava">
                    <img alt="Strava" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-strava.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialTwitch !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="htt<?php echo $socialTwitch; ?>" target="_blank" title="Twitch">
                    <img alt="Twitch" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-twitch.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialLinkedIn !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialLinkedIn; ?>" target="_blank" title="LinkedIn">
                    <img alt="LinkedIn" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-linked-in.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialWordPress !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialWordPress; ?>" target="_blank" title="WordPress.org">
                    <img alt="WordPress.org" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-wordpress.org.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialFacebook !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialFacebook; ?>" target="_blank" title="Facebook">
                    <img alt="Facebook" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-facebook.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialYoutube !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialYoutube; ?>" target="_blank" title="Youtube">
                    <img alt="Facebook" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-youtube.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialTwitter !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialTwitter; ?>" target="_blank" title="Twitter">
                    <img alt="Twitter" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-twitter.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($socialInstagram !== ''): ?>
                <li class="nav-item mx-1">
                  <a href="<?php echo $socialInstagram; ?>" target="_blank" title="Instagram">
                    <img alt="Instagram" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-instagram.svg" width="32" height="32" />
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          <?php endif; ?>
          <?php $socialPatreon = trim(get_theme_mod('socialPatreon')); ?>
          <?php if ($socialPatreon !== ''): ?>
            <ul class="nav navbar-nav mb-3<?php echo $hasSocialLinks ? '' : ' ml-auto'; ?> mb-lg-auto">
              <li class="nav-item">
                <a href="<?php echo $socialPatreon; ?>" target="_blank" rel="noopener noreferrer">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-patreon.png" alt="Become a patron" width="170" height="40" class="rounded">
                </a>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>

  <main id="main">
