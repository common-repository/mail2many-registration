<?php

  if (!defined('ABSPATH')) exit; // Exit if accessed directly

  add_action('wp_enqueue_scripts', 'mail2many_load_assets');

  function mail2many_load_assets() {
    wp_register_style('mail2many-registration', plugins_url( '/../css/main.css' , __FILE__ ), [], 1, 'all');
    wp_register_script('mail2many-registration', plugins_url( '/../js/main.js' , __FILE__ ), ['jquery'], 1, true );

    wp_enqueue_style('mail2many-registration');
    wp_enqueue_script('mail2many-registration');
  }

  add_shortcode('mail2many-registration', 'mail2many_load_shortcode');

  function mail2many_load_shortcode() {
    $privacy_text = get_option('mail2many_form_privacy_text');
    if (trim($privacy_text) == "") $privacy_text = __('Yes, I have read the privacy policy and agree that the data I have provided will be collected and stored electronically.', 'mail2many-registration');

    $html = '
    <div class="mail2many-registration">
      <form id="mail2many-registration-form" type="post" action="">
        ' . wp_nonce_field('wp_rest') . '
        <div class="row gender">
          <div class="gender">
            <label class="cb cb-checkbox">
              ' . esc_html(__('Mr.', 'mail2many-registration')) . '
              <input type="radio" checked="checked" value="1" name="gender">
              <div class="cb_indicator"></div>
            </label>

            <label class="cb cb-checkbox">
              ' . esc_html(__('Mrs.', 'mail2many-registration')) . '
              <input type="radio" value="2" name="gender">
              <div class="cb_indicator"></div>
            </label>

            <label class="cb cb-checkbox">
              ' . esc_html(__('Mx.', 'mail2many-registration')) . '
              <input type="radio" value="3" name="gender">
              <div class="cb_indicator"></div>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="firstname">
            <input type="text" value="" name="firstname" placeholder="' . esc_attr(__('First name', 'mail2many-registration')) . '">
          </div>
        </div>
        <div class="row">
          <div class="lastname">
            <input type="text" value="" name="lastname" placeholder="' . esc_attr(__('Last name', 'mail2many-registration')) . '">
          </div>
        </div>
        <div class="row">
          <div class="email">
            <input type="email" class="required email" value="" name="email" placeholder="' . esc_attr(__('Email', 'mail2many-registration')) . '*">
          </div>
        </div>

        <div class="mandatory">
          * ' . esc_html(__('Required fields', 'mail2many-registration')) . '
        </div>

        <div class="privacy">
          <label class="cb cb-checkbox">
            ' . esc_html($privacy_text) . '
            <input type="checkbox" value="1" name="newsletter-privacy">
            <div class="cb_indicator"></div>
          </label>
        </div>

        <div class="message" id="mail2many-message"></div>

        <div class="submit-button">
          <input class="button submit" type="submit" value="' . esc_attr(__('Submit', 'mail2many-registration')) . '" />
        </div>
      </form>
    </div>

    <script>
      jQuery(document).ready(function($) {
        $("#mail2many-registration-form").submit(function(event) {

          var $privacyInput = $("#mail2many-registration-form").find("input[name=newsletter-privacy]");

          var s = true;
          if ($privacyInput.is(":checked")) {
            $privacyInput.closest(".privacy").removeClass("error");
          } else {
            $privacyInput.closest(".privacy").addClass("error");
            s = false;
          }

          if (s) {
            var form = $(this);
            $.ajax({
              type: "POST",
              url: "' . get_rest_url(null, 'v1/mail2many-registration/submit') . '",
              data: form.serialize(),
              success: function(res) {
                if (res.status == 200) {
                  $("#mail2many-message").html(res.message).addClass("show").removeClass("error");
                } else {
                  $("#mail2many-message").html(res.message).addClass("show").addClass("error");
                }
              },
              error: function(res) {
                alert("' . esc_html(__('Unfortunately, an error occurred while submitting. Please try again later.', 'mail2many-registration')) . '");
              }
            });
          }

          event.preventDefault();
        });
      });
    </script>
    ';

    return $html;
  }

  function mail2many_register_api_hooks() {
    register_rest_route(
      'v1/mail2many-registration', 'submit',
      [
        'methods'  => 'POST',
        'callback' => 'mail2many_handle_registration'
      ]
    );
  }

  function mail2many_handle_registration($data) {
    $params = $data->get_params();

    if (!wp_verify_nonce($params['_wpnonce'], 'wp_rest')) {
      return new WP_Rest_Response('Registration not submitted', 422);
    }

    $website_url = get_bloginfo('url');

    $firstname = ""; if (array_key_exists('firstname', $params)) $firstname = sanitize_text_field($params['firstname']);
    $lastname = ""; if (array_key_exists('lastname', $params)) $lastname = sanitize_text_field($params['lastname']);
    $email = ""; if (array_key_exists('email', $params)) $email = sanitize_text_field($params['email']);
    $genderId = null; if (array_key_exists('gender', $params)) $genderId = intval($params['gender']);

    $api_server = get_option('mail2many_api_server');
    $api_key = get_option('mail2many_api_key');

    $body = [
      'genderId' => $genderId,
      'email' => $email,
      'firstname' => $firstname,
      'lastname' => $lastname,
      'reference' => 'Wordpress - ' . $website_url,
    ];

    $args = [
      'body'        => wp_json_encode($body),
      'timeout'     => '5',
      'redirection' => '5',
      'httpversion' => '1.0',
      'blocking'    => true,
      'headers'     => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode('atrivio:' . $api_key),
                       ],
      'cookies'     => [],
    ];

    $response = wp_remote_post('https://' . $api_server . '/api/v1/subscribers/register', $args);

    if (!array_key_exists('body', $response)) return new WP_Rest_Response('Registration not submitted', 500);

    $response_body = json_decode($response['body'], true);
    if (array_key_exists('statusCode', $response_body) && array_key_exists('message', $response_body)) {
      $statusCode = $response_body['statusCode'];
      $message = $response_body['message'];

      if ($message === 'Invalid credentials.') $message = __('The API key is not correct. Please check the API key or create it again.', 'mail2many-registration');
      if ($message === 'The email field is required.') $message = __('Please enter your e-mail address.', 'mail2many-registration');

      return new WP_Rest_Response(['status' => $statusCode, 'message' => esc_html($message)], 200);
    } else {
      return new WP_Rest_Response(['status' => 200, 'message' => esc_html(__('The registration has been sent successfully. Please check your inbox.', 'mail2many-registration'))], 200);
    }
  }
  add_action('rest_api_init', 'mail2many_register_api_hooks');
?>