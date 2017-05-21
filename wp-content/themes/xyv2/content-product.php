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
      
      $product = new WC_Product(get_the_ID());
      
    ?>
    
    <div class="row clearfix">
      <p class="price-text1">单价 <?php echo $product->get_price(); ?>/小时</p>
      <div class="float-style">
        <a class="common-btn service-btn-1" href="<?php echo $product->add_to_cart_url()?>">加入购物车</a>
        <a class="common-btn service-btn-2" href="<?php echo $product->add_to_cart_url()?>">直接购买</a>
      </div>
    </div>

  </div><!-- .entry-content -->

</article><!-- #post-## -->
