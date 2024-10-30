<?php
  /*
   * Plugin Name:       mail2many Registration
   * Plugin URI:        https://www.mail2many.de
   * Description:       A registration form for mail2many
   * Version:           1.1.2
   * Text Domain:       mail2many-registration
   * Requires at least: 5.2
   * Requires PHP:      8.1
   * Author:            Christoph Graf
   * Author URI:        https://www.atrivio.de
   * License:           GPLv2 or later
   * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
   */

  if (!defined('ABSPATH')) {
    exit;
  }

  include __DIR__ . '/includes/settings.php';
  include __DIR__ . '/includes/template.php';

?>