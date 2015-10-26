<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width /">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/styles/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/styles/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_url')?>"/>
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/scripts/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <title>携隱咨询</title>

    <script type="text/ng-template" id="contactSocialTpl">
        <div class="ngdialog-message social-dialog-message">
            <img src="<?php bloginfo('template_url')?>/misc/wechat.jpg" alt=""/>
            <p class="wechat">(微信扫描加关注)</p>
            <ul class="social-links">
                <li><p><a href="mailto:xieyin.studio@gmail.com?title=&body=">邮箱(点击联系我们)</a></p></li>
                <li><p><a href="http://weibo.com/u/5112716368">微博(携隐咨询)</a></p></li>
            </ul>
        </div>
    </script>

</head>
<body <?php body_class(); ?> ng-controller="XYController" ng-init="init()">
<div id="wrapper">
    <div id="header">
        <div class="container" data-sr="wait 0s, over 1s">
            <div class="row header-bar" ng-click="showContactSocialPopup()">
                <p class="gmail icon"><i class="fa fa-paper-plane-o"></i></p>
                <p class="wechat icon"><i class="fa fa-wechat"></i></p>
                <p class="weibo icon"><i class="fa fa-weibo"></i></p>
                <p class="phone icon"><i class="fa fa-phone"></i><span>1582112173</span></p>
            </div>
            <div class="row" data-sr="wait 0s, over 1s">
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