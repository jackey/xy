<?php
/**
 * Template Name: Cart Page
 */
?>
<?php

get_header('nonav'); ?>

<div class="body-wrap body-static">
  <div class="cart-page">
    <div class="top-bar">
      <h2>支付详情</h2>
      <img src="<?php echo bloginfo('template_url')?>/misc/logo.png" alt="">
    </div>
    <div class="breadthumb">
      <a href="/" class="back"><&nbsp;返回</a>
    </div>

    <div class="inner clearfix">
      <div class="cart-form-wrap">
        <?php while (have_posts()): ?>
          <?php the_post();?>
          <?php the_content();?>
        <?php endwhile ?>
      </div>
      <div class="checkout-wrap">
        <?php echo do_shortcode('[woocommerce_checkout]');?>
      </div>
    </div>
    
  </div>
</div>

<?php get_footer(); ?>