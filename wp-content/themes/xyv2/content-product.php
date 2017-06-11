<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="entry-content">
    <?php
      /* translators: %s: Name of current post */
      the_content('', false );
    ?>

    <?php 
      
      global $product;
      //$product = new WC_Product(get_the_ID()); 
      
    ?>
    
    <div class="row clearfix">
      <p class="price-text1">单价 <?php echo $product->get_price(); ?>/小时</p>
      <div class="float-style">
        <a class="common-btn service-btn-1 xyv2-add-to-cart" 
          data-url="<?php echo get_permalink(get_the_ID())?>"
          data-id="<?php echo get_the_ID()?>" 
          href="javascript:void();">添加购物车</a>
        <a class="common-btn service-btn-2 directly-buy" 
          data-url="<?php echo get_permalink(get_the_ID())?>"
          data-id="<?php echo get_the_ID()?>" 
          href="javascript:void();">直接购买</a>
      </div>
    </div>

  </div><!-- .entry-content -->

</article><!-- #post-## -->
