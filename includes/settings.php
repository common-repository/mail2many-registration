<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

function mail2many_admin_menu() {
  add_options_page('mail2many API-Key settings', 'mail2many',  'manage_options', 'mail2many_settings', 'mail2many_settings_page');
}
add_action('admin_menu', 'mail2many_admin_menu');
add_action('admin_init', 'mail2many_register_settings');

function mail2many_settings_page() {
    ?>
    <div class="wrap">
      <h1><?php esc_html_e('Integration with mail2many', 'mail2many-registration'); ?></h1>
      <p><?php esc_html_e('Insert your mail2many API key here', 'mail2many-registration'); ?></p>
      <div class="card mail2many">
        <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
           viewBox="0 0 565.2 109" style="enable-background:new 0 0 565.2 109; width: 200px; padding-top: 20px" xml:space="preserve">
        <style type="text/css">
          .st0{fill:#9A1540;}
        </style>
        <path id="mail2many_1_" class="st0" d="M219.2,31.7h-9.3c-6.6,0-10.3,3.4-10.3,9.9v2.6h9V42c0-1.8,1-2.7,2.8-2.7h6.3
          c1.8,0,2.8,0.9,2.8,2.7v4.8l-12.2,1.5c-5.5,0.7-9.5,2.7-9.5,9.1v4.7c0,5.9,3.9,8.6,9.4,8.6h4.2c2.9,0,4.1-0.8,6-2l2.5-1.7l0.5,3.4
          h8.2V42C229.5,35.4,225.8,31.7,219.2,31.7z M220.4,59.4l-3.9,2.6c-1.1,0.8-1.9,1.1-3.2,1.1h-2.9c-1.8,0-2.6-0.7-2.6-2.5v-2.7
          c0-1.8,0.9-2.4,2.6-2.6l10-1.4V59.4z M170.8,31.7h-4.7c-2.8,0-4,0.7-5.6,1.7l-3.6,2.4c-1.5-2.6-4.2-4-8.1-4H144
          c-2.7,0-4,0.7-5.6,1.7l-2.9,1.9l-0.5-3.3h-8.4v38.3h9.3V43.8l4.4-2.9c1.1-0.7,1.7-1.1,3.4-1.1h2.3c1.8,0,2.7,0.9,2.7,2.7v27.8h9.3
          V43.8l4.4-2.9c1.2-0.7,1.7-1.1,3.4-1.1h2.3c1.8,0,2.6,0.9,2.6,2.7v27.8h9.3V41.1C180.1,35,176.9,31.7,170.8,31.7z M1.3,42.6
          c0.5,14,0.9,28.4,1.2,42.7L44.9,109l42.4-23.7c0.3-14.2,0.8-28.7,1.2-42.7c0.4-14,0.9-28.4,1.2-42.6H0C0.4,14.2,0.9,28.7,1.3,42.6z
           M77.1,79.1L44.9,97.2l-32.2-18v-0.1l-0.6-21.4h0.1l32.7-18.3l32.8,18.3C77.5,63.5,77.3,71.2,77.1,79.1z M10.7,10.5h68.5v0.1
          c-0.3,10.9-0.7,22-1,31.8c0,1.1-0.1,2.2-0.1,3.4v0.3L77.9,46l-8.2-4.6c-8.9-5-17.7-9.9-24.8-13.9L11.8,46.1l-0.1-3.9
          c-0.3-10.3-0.7-21-1-31.5V10.5z M249.4,70.3h9.3V32h-9.3V70.3z M317.5,55.5c0-1.8,0.3-2.7,2.3-3.4l14.2-5.2c4.4-1.6,7.1-4.5,7.1-9.9
          v-8.7c0-7.2-3.9-11.1-11.1-11.1H319c-7.2,0-11.1,3.9-11.1,11.1v6.6h9.5v-6.4c0-2,1-3,2.9-3h7.9c2,0,2.9,1,2.9,3v8.2
          c0,2.2-0.9,2.7-2.3,3.2l-13.3,4.8c-6.2,2.3-8,6-8,10.8v14.8h34.1v-8.6h-24.3V55.5z M506,31.7h-5.2c-2.7,0-4,0.6-5.6,1.7l-2.9,1.9
          l-0.5-3.3h-8.4v38.3h9.3V43.9l4.4-3c1.1-0.7,1.7-1.1,3.4-1.1h2.7c1.8,0,2.7,0.9,2.7,2.7v27.8h9.3V41.1C515.3,35,512,31.7,506,31.7z
           M556.2,32v10.1c0,1.7-0.2,2.4-0.6,3.3l-5.9,14.9l-6.2-14.9c-0.4-0.9-0.6-1.7-0.6-3.3V32h-9.3v11.1c0,1.8,0.8,3.8,1.1,4.3l10.6,24.1
          l-1,2.4c-0.6,1.7-1.4,2.7-3,2.7H536v8h7.1c6,0,7.6-3.9,9.9-9.6l11.1-27.6c0.2-0.5,1.1-2.5,1.1-4.3V32H556.2z M453.4,31.7H444
          c-6.6,0-10.3,3.4-10.3,9.9v2.6h9V42c0-1.8,1-2.7,2.8-2.7h6.3c1.8,0,2.8,0.9,2.8,2.7v4.8l-12.2,1.5c-5.5,0.7-9.5,2.7-9.5,9.1v4.7
          c0,5.9,3.9,8.6,9.4,8.6h4.2c2.9,0,4.1-0.8,6-2l2.5-1.7l0.5,3.4h8.2V42C463.7,35.4,460,31.7,453.4,31.7z M454.6,59.4l-3.9,2.6
          c-1.1,0.8-1.9,1.1-3.2,1.1h-2.9c-1.8,0-2.6-0.7-2.6-2.5v-2.7c0-1.8,0.9-2.4,2.6-2.6l10-1.4V59.4z M405,31.7h-4.7
          c-2.8,0-4,0.7-5.6,1.7l-3.6,2.4c-1.5-2.6-4.2-4-8.1-4h-4.7c-2.7,0-4,0.7-5.6,1.7l-2.9,1.9l-0.5-3.3H361v38.3h9.3V43.8l4.4-2.9
          c1.1-0.7,1.7-1.1,3.4-1.1h2.3c1.8,0,2.7,0.9,2.7,2.7v27.8h9.3V43.8l4.4-2.9c1.2-0.7,1.7-1.1,3.4-1.1h2.3c1.8,0,2.6,0.9,2.6,2.7v27.8
          h9.3V41.1C414.3,35,411,31.7,405,31.7z M249.2,26.8h9.6v-9.3h-9.6V26.8z M278.7,70.3h9.3V17.5h-9.3V70.3z"/>
        </svg>
        <p><?php esc_html_e('You can generate the API key in mail2many in the settings menu under "API Keys". For details see the documentation in mail2many or ask your contact person.', 'mail2many-registration'); ?></p>
        <form method="post" action="options.php">
          <?php
            settings_fields('mail2many_settings');
            do_settings_sections('mail2many_settings');
            submit_button();
          ?>
        </form>
      </div>
    </div>
    <?php
}

function mail2many_register_settings() {
  add_option('mail2many_api_key', '');
  add_option('mail2many_api_server', '127-api.mail2many.de');
  add_option('mail2many_form_privacy_text', '');
  register_setting('mail2many_settings', 'mail2many_api_key', 'sanitize_text_field');
  register_setting('mail2many_settings', 'mail2many_api_server', 'sanitize_text_field');
  register_setting('mail2many_settings', 'mail2many_form_privacy_text', 'sanitize_text_field');
  add_settings_section('mail2many_section', '', '__return_false', 'mail2many_settings');
  add_settings_field('mail2many_api_server', __('API server', 'mail2many-registration'), 'mail2many_api_server_callback', 'mail2many_settings', 'mail2many_section');
  add_settings_field('mail2many_api_key', __('API key', 'mail2many-registration'), 'mail2many_api_key_callback', 'mail2many_settings', 'mail2many_section');
  add_settings_field('mail2many_form_privacy_text', __('Privacy text', 'mail2many-registration'), 'mail2many_form_privacy_text_callback', 'mail2many_settings', 'mail2many_section');
}

function mail2many_api_key_callback() {
  $api_key = get_option('mail2many_api_key');
  echo '<input type="text" name="mail2many_api_key" value="' . esc_attr($api_key) . '" />';
}

function mail2many_api_server_callback() {
  $api_server = get_option('mail2many_api_server');
  echo '<select name="mail2many_api_server">';
  echo '  <option value="127-api.mail2many.de" ' . selected($api_server, '127-api.mail2many.de') . '>127.mail2many.de</option>';
  echo '  <option value="145-api.mail2many.de" ' . selected($api_server, '145-api.mail2many.de') . '>145.mail2many.de</option>';
  echo '</select>';
}

function mail2many_form_privacy_text_callback() {
  $privacy_text = get_option('mail2many_form_privacy_text');
  echo '<textarea type="text" cols="50" rows="6" class="regular-text" name="mail2many_form_privacy_text">' . esc_attr($privacy_text) . '</textarea>';
}

function mail2many_save_api_key() {
  if (isset($_POST['_wpnonce']) &&
      wp_verify_nonce(sanitize_key($_POST['_wpnonce']), 'mail2many_settings-options') &&
      isset($_POST['mail2many_api_key'])
    ) {
    $api_key = sanitize_text_field($_POST['mail2many_api_key']);

    if (!preg_match('/^[a-zA-Z0-9]{8}\.[0-9a-g]{32}$/', $api_key)) {
      add_settings_error(
        'mail2many_api_key',
        'invalid_api_key',
        __('The API key is not in the correct format. A function can not be guaranteed.', 'mail2many-registration'),
        'error'
      );
      return;
    }
  }
}
add_action('admin_init', 'mail2many_save_api_key');

function mail2many_enqueue($hook) {
  wp_register_style('options_page_style', plugins_url('/../css/admin.css',__FILE__));
  wp_enqueue_style('options_page_style');
}
add_action('admin_enqueue_scripts', 'mail2many_enqueue');