<?php

use Mailgun\Mailgun;
use Mailgun\Connection\Exceptions\MissingRequiredParameters;

function altruistMailingListSubscribe($name, $email)
{ }

add_action('rest_api_init', function () {
  register_rest_route("altruist/v1", '/mailing-list-subscribe', [
    'methods' => 'POST',
    'callback' => function (WP_REST_Request $request) {
      require __DIR__ . '/../config/mailgun.php';

      $nonce = trim($request['nonce']);
      if (!wp_verify_nonce($nonce, 'mailing-list-subscribe')) {
        return 'Invalid session (' . $nonce . '), please refresh your page!';
      }

      $name = trim($request['name']);
      if (empty($name)) {
        return 'Please enter your name!';
      }

      $email = trim($request['email']);
      if (empty($email)) {
        return 'Please enter your email!';
      }
      if (!is_email($email)) {
        return 'Please enter a VALID email!';
      }

      try {
        $mg = MailGun::create($mailgunConfig->apiKey);
        $mg->post('lists/all@mg.alekhin.io/members', [
          'address' => $email,
          'name' => $name,
          'subscribed' => 'yes',
        ]);
      } catch (MissingRequiredParameters $e) {
        return 'already_subscribed';
      } catch (Exception $e) {
        return 'Can\'t add you to the mailing list! The subscribe thingy is acting up.';
      }
      return 'subscribed';
    },
  ]);
});

add_shortcode('mailing-list-subscribe-form', function () {
  ob_start();
  echo '<mailing-list-subscribe-form browser-session="' . wp_create_nonce('mailing-list-subscribe') . '"></mailing-list-subscribe-form>';
  return ob_get_clean();
});
