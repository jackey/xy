<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width /">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/styles/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/styles/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_url')?>"/>
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/scripts/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <title>携隱咨询</title>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
    <div id="header">
        <div class="container">
            <div class="row header-bar">
                <p class="gmail icon"><i class="fa fa-paper-plane-o"></i></p>
                <p class="wechat icon"><i class="fa fa-wechat"></i></p>
                <p class="weibo icon"><i class="fa fa-weibo"></i></p>
                <p class="phone icon"><i class="fa fa-phone"></i></p>
            </div>
            <div class="row">
                <div class="top">
                    <div class="delimiter"></div>
                    <a class="logo" href="">
                        <img src="<?php echo esc_url(get_template_directory_uri())?>/misc/logo.png" alt=""/>
                    </a>
                </div>
                <?php wp_nav_menu(array('theme_location' => 'main-nav', 'container_class' => 'main-nav'))?>
            </div>
        </div>
    </div>