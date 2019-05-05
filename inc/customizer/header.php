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
});
