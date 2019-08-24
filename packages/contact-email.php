<?php

use Mailgun\Mailgun;

add_action('rest_api_init', function () {
  register_rest_route("altruist/v1", '/send-contact', [
    'methods' => 'POST',
    'callback' => function (WP_REST_Request $request) {
      require __DIR__ . '/../config/mailgun.php';

      $nonce = trim($request['nonce']);
      if (!wp_verify_nonce($nonce, 'send-message')) {
        return 'Invalid session, please refresh your page!';
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

      $subject = trim($request['subject']);
      if (empty($subject)) {
        return 'Please enter a subject!';
      }

      $message = trim($request['message']);
      if (empty($message)) {
        return 'Please enter your message!';
      }

      try {
        $mg = Mailgun::create($mailgunConfig->apiKey);
        $mg->messages()->send($mailgunConfig->domain, [
          'from'    => "{$name} <{$email}>",
          'to'      => 'jap@alekhin.io',
          'subject' => $subject,
          'text'    => $message,
        ]);
      } catch (Exception $e) {
        return 'The message was not sent! The sending mechanism failed.';
      }
      return 'sent';
    },
  ]);
});

add_shortcode('contact-form', function () {
  ob_start(); ?>
<form class="contactForm" novalidate>
  <?php wp_nonce_field('send-message'); ?>
  <div class="d-flex flex-column flex-md-row">
    <div class="nameFormGroup form-group mx-2">
      <label for="txtName">Name</label>
      <input type="text" class="form-control" id="txtName" name="name" placeholder="Enter your name" required>
    </div>
    <div class="emailFormGroup form-group mx-2">
      <label for="txtEmail">Email address</label>
      <input type="email" class="form-control" id="txtEmail" placeholder="Enter email" required>
      <small class="form-text text-muted">I'll never share your email with anyone.</small>
    </div>
  </div>
  <div class="form-group mx-2">
    <label for="txtSubject">Subject</label>
    <input type="text" class="form-control" id="txtSubject" name="subject" placeholder="What's up?" required>
  </div>
  <div class="form-group mx-2">
    <label for="txtMessage">Message/details</label>
    <textarea class="form-control" id="txtMessage" name="message" rows="7" required></textarea>
  </div>
  <div class="alert mt-3 mx-2" role="alert" style="display: none;"></div>
  <div class="form-group mx-2">
    <button type="submit" id="btnSend" name="send" class="btn btn-primary" disabled>Send Message</button>
  </div>
</form>
<?php
  return ob_get_clean();
});
