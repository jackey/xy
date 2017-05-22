<?php 

/**
 * XyNewsletter
 *
 * .
 *
 * @package XyNewsletter
 * @subpackage Main
 */

/**
 * Plugin Name: Xy Newsletter
 * Plugin URI:  http://xie-yin.com
 * Description: 携隐Newsletter专用插件
 * Author:      Jackey Chen
 * Author URI:  http://github.com/jakcey
 * Version:     1.2
 * Text Domain: xynewsletter
 * Domain Path: /languages/
 * License:     GPL
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

if (!function_exists('xy_user_register_newsletter')) {
  function xy_user_register_newsletter() {
    $mail = $_POST['mail'];

    if (class_exists('wpMail')) {
      $wpMail = new wpMail();
      global $Subscriber;
      $data = array('email' => $$mail, 'list_id' => array(1,2));

      if ($Subscriber->optin($data, false)) {
        echo json_encode(array('success' => 1, 'err' => ''));
      } else {
        echo json_encode(array('success' => 0, 'err' => $Subscriber->errors));
      }
    }


    wp_die();
  }
}

class XyNewsletter {
  public function __construct() {
    add_action('wp_ajax_user_register_newsletter', 'xy_user_register_newsletter');
  }
}

$xynewsletter = new XyNewsletter();
