<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url')?>/css/375.css">
  <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url')?>/css/320.css">

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">


  <div id="content" class="site-content">

    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">
        <div class="body-wrap body-static <?php echo is_front_page() ? 'home-body': ''?>">

          <?php 
            wp_nav_menu(array(
              'menu' => 'main-nav',
              'container_class' => 'menu main-menu view-pc '. ( is_front_page() ? 'bottom': 'top'),
              'container' => 'div',
              'menu_class' => 'menu-item',
            ));
          ?>

          <div class="open-icon view-mobile"></div>
          <div class="logo-small view-mobile"></div>
          <div class="mobile-menu-wrap view-mobile">
            <div class="close-icon"></div>
            <?php
              wp_nav_menu(array(
                'menu' => 'main-nav',
                'container_class' => 'menu main-mobile-menu view-mobile '. ( is_front_page() ? 'bottom': 'top'),
                'container' => 'div',
                'menu_class' => 'menu-item',
              ));
            ?>
          </div>
