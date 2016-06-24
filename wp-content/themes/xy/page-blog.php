<?php
/**
 * Template Name: Static Home
 */
?>

<?php get_header(); ?>

  <div class="blogDeSlide">
    <div class="container tc">
      <div class="blogDeSlideLogo"><img src="<?php echo bloginfo('template_url')?>/images/logoSmall.png" alt=""></div>
      <div class="blogDeSlidetitle1">BLOG</div>
      <p class="blogDeSlidetitle2">携隐博客</p>
    </div>
  </div>

  <div class="insideNav">
    <div class="container">
      <div class="row">
        <div class="col-2"></div>
        <div class="col-2"><a href="###" class="fontXY actPro">All</a></div>
        <div class="col-2"><a href="###">留学报告</a></div>
        <div class="col-2"><a href="###">我们的活动</a></div>
        <div class="col-2"><a href="###">成功案例</a></div>
        <div class="col-2"></div>
      </div>
    </div>
  </div>

  <?php
    global $post;
    $args = array(
      'posts_per_page' => 10,
      'offset' => 0,
      'category__in' => array(3, 6, 1, 5),
      'orderby' => 'post_date',
      'order' => 'DESC',
      'post_status' => 'publish',
    );

    $blog_posts = get_posts($args);
  ?>

<div class="container blogList commonRow">
  <?php foreach ($blog_posts as $post): ?>
    <div class="row">
      <div class="col-bL1">
        <p class="bDSDate"><?php echo date("jS M Y", strtotime(get_post_meta(get_the_ID(), 'publish_date', true)))?></p>
        <span class="blogListReport"><?php the_category()?></span>
      </div>
      <div class="col-bL2">
        <h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
        <p><?php echo get_post_meta(get_the_ID(), 'summary', true)?></p>
        <div class="bDSIcon"><i class="bDSIcon1"></i><i class="bDSIcon2"></i></div>
      </div>
      <div class="col-bL3">
        <img src="<?php echo bloginfo('template_url')?>/images/blog-list_1.jpg" alt="">
      </div>
    </div>
  <?php endforeach;?>
  <div class="row page">
    <ul>
      <li class="actPage">1</li>
      <li>2</li>
      <li>3</li>
      <li>4</li>
      <li>5</li>
      <li>下一页</li>
      <li>末页</li>
    </ul>
  </div>
</div>




<?php get_sidebar(); ?>

<?php get_footer() ?>