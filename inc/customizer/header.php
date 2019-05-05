<?php
add_action('customize_register', function ($c) {
  // panels
  $c->add_panel('siteHeader', ['title' => 'Sticky Header Section', 'description' => 'Customize the elements on the sticky header',]);

  // sections
  $c->add_section('siteBranding', [
    'title' => 'Site name and branding',
    'description' => 'Main branding section (logo an name)',
    'panel' => 'siteHeader',
    'description_hidden' => true,
  ]);
  $c->add_section('socialLinks', [
    'title' => 'Social links (and Patreon)',
    'description' => 'Social links + Patreon section',
    'panel' => 'siteHeader',
    'description_hidden' => true,
  ]);

  // gravatar
  $c->add_setting('gravatarEmail', ['sanitize_callback' => 'sanitize_email',]);
  $c->add_control('gravatarEmail', [
    'label' => 'Gravatar email',
    'section' => 'siteBranding',
    'type' => 'email',
  ]);

  // custom site name
  $c->add_setting('customSiteName', ['sanitize_callback' => 'sanitize_text_field',]);
  $c->add_control('customSiteName', [
    'label' => 'Custom Site Name',
    'section' => 'siteBranding',
    'type' => 'text',
  ]);
  // use custom site name
  $c->add_setting('useCustomSiteName', [
    'sanitize_callback' => function($input) {
      return isset($input) && true == $input;
    },
  ]);
  $c->add_control('useCustomSiteName', [
    'label' => 'Use custom site name',
    'section' => 'siteBranding',
    'type' => 'checkbox',
  ]);

  // branding display
  $c->add_setting('brandingDisplay', [
    'sanitize_callback' => function ($input, $setting) {
      $input = sanitize_key($input);
      $choices = $setting->manager->get_control($setting->id)->choices;
      return array_key_exists($input, $choices) ? $input : $setting->default;
    },
  ]);
  $c->add_control('brandingDisplay', [
    'label' => 'Branding display',
    'section' => 'siteBranding',
    'type' => 'select',
    'choices' => [
      '' => 'Gravatar and name',
      'gravatar' => 'Gravatar only',
      'name' => 'Site name only',
    ],
  ]);

  // social links
  $c->add_setting('socialPatreon', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialPatreon', [
    'label' => 'Patreon profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialFacebook', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialFacebook', [
    'label' => 'Facebook page/profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialTwitter', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialTwitter', [
    'label' => 'Twitter profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialInstagram', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialInstagram', [
    'label' => 'Instagram profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialGitHub', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialGitHub', [
    'label' => 'GitHub profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialStrava', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialStrava', [
    'label' => 'Strava athlete page URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialLinkedIn', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialLinkedIn', [
    'label' => 'LinkedIn profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialYoutube', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialYoutube', [
    'label' => 'Youtube channel URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialTwitch', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialTwitch', [
    'label' => 'Twitch profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialDiscord', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialDiscord', [
    'label' => 'Discord invite URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
  $c->add_setting('socialWordPress', ['sanitize_callback' => 'esc_url_raw',]);
  $c->add_control('socialWordPress', [
    'label' => 'WordPress.org profile URL',
    'section' => 'socialLinks',
    'type' => 'url',
  ]);
});
