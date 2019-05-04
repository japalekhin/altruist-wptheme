<?php
add_action('customize_register', function ($c) {
  $c->add_panel('siteHeader', [
    'title' => 'Header',
    'description' => 'Who needs descriptions anyway?',
  ]);

  // headers
  $c->add_section('siteIcon', [
    'title' => 'Gravatar',
    'description' => 'sup?',
    'panel' => 'siteHeader',
    'description_hidden' => false,
  ]);

  // gravatar
  $c->add_setting('gravatarEmail', [
    'sanitize_callback' => 'sanitize_email',
  ]);
  $c->add_control('gravatarEmail', [
    'label' => 'Gravatar Email',
    'section' => 'siteIcon',
    'type' => 'email',
  ]);
});
