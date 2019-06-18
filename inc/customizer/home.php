<?php
add_action('customize_register', function ($c) {
  // cover
  $c->add_setting('frontpageCover', [
    'default' => 0,
    'type' => 'theme_mod',
    'sanitize_callback' => 'absint',
  ]);
  $c->add_control(
    new WP_Customize_Media_Control(
      $c,
      'frontpageCover',
      [
        'label' => 'Cover image',
        'section' => 'static_front_page',
        'settings' => 'frontpageCover',
        'button_labels' => [
          'select' => 'Select Image',
          'change' => 'Change Image',
          'remove' =>'Remove',
          'default' => 'Default',
          'placeholder' => 'No image selected',
          'frame_title' => 'Select Image',
          'frame_button' => 'Choose Image',
        ],
      ]
    )
  );
});
