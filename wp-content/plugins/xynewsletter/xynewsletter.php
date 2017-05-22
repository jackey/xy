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
if ( ! defined( 'ABSPATH' ) ) 
  exit;

if (!function_exists('xy_user_register_newsletter')) {
  function xy_user_register_newsletter() {
    $mail = $_POST['mail'];

    require_once NEWSLETTER_INCLUDES_DIR . '/controls.php';
    $controls = new NewsletterControls();
    $module = NewsletterUsers::instance();

    $error = "";
    $success = 1;

    $controls->data['status'] = 'C';
    $controls->data['sex'] = 'n';
    $controls->data['email'] = $mail;

    $user = $module->save_user($controls->data);
    if ($user === false) {
        $error = '您填写的邮箱已经订阅了Newsletter';
        $success = 0;
    }

    echo json_encode(array('error' => $error, 'success' => $success));


    wp_die();
  }
}

class XyNewsletter {
  public function __construct() {
    add_action('wp_ajax_user_register_newsletter', 'xy_user_register_newsletter');
  }
}

$xynewsletter = new XyNewsletter();
