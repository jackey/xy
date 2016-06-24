<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/styles/reset.css"/>
  <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/styles/swiper.min.css"/>
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/styles/style.css"/>
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/scripts/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <script>
        window.ajaxurl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>

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

    <script type="text/ng-template" id="alert">
        <div class="ngdialog-message social-dialog-message">
            <p>{{message}}</p>
        </div>
    </script>
</head>
<body ng-controller="XYController" data-image-preload style="opacity: 0">


<div class="<?php if (get_the_ID() == 2) echo "header";?> commonNav">
  <div class="container">
    <div class="row nav">
      <div class="navPc">
        <ul>
          <li><a href="<?php echo get_page_link(2);?>">首页</a></li>
          <li><a href="/#/service">服务</a></li>
          <li><a href="/#/consulting-team">顾问团队</a></li>
        </ul>
        <ul class=" right">
          <li><a href="<?php echo get_page_link(7)?>">Blogs</a></li>
          <li><a href="<?php echo get_category_link(1)?>">近期活动</a></li>
          <li class="margin0"><a href="">联系我们</a></li>
        </ul>
      </div>
      <div class="navMobile">
        <div><i></i><i></i><i></i></div>
        <ul>
          <li><a href="<?php echo get_page_link(2);?>">首页</a></li>
          <li><a href="/#/service">服务</a></li>
          <li><a href="/#/consulting-team">顾问团队</a></li>
          <li><a href="<?php echo get_page_link(7)?>">Blogs</a></li>
          <li><a ng-click="comingSoon($event)">近期活动</a></li>
          <li><a href="">联系我们</a></li>
        </ul>
      </div>
    </div>

    <?php if (get_the_ID() == 2): ?>
      <div class="row headerContent tc">
        <div class="logo"><img src="<?php echo bloginfo('template_url')?>/images/logo.jpg" alt=""></div>
        <div class="word_1">
          <p class="word_1_1">说出属于你的，独一无二的故事</p>
          <p class="word_1_1 word_1_1_1">说出属于你的<br />独一无二的故事</p>
          <p class="word_1_2">所有关于留学考试，留学申请，职业发展的问题，你都可以在这里找到答案</p>
        </div>

        <div class="iconBtn cur"></div>
      </div>
    <?php endif;?>
  </div>
</div>

<?php if (get_the_ID() <> 2) :?>

<?php endif;?>