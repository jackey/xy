<?php  get_header('nosidebar'); ?>


<div class="service-page">

  <div class="section clearfix" >
    <div class="content-wrap ">
      <h1 class="service-name view-pc">申<br />请</h1>
      <h1 class="service-name view-mobile">申请</h1>
      <!-- 浮动菜单 -->
      <div class="float-menu view-mobile">
        <a href="javascript:void(0)" data-back>< 返回</a>
        <ul>
          <?php 

            $crt_query = get_queried_object();
            $args = array(
              'post_type' => 'product',
              'post_status' => 'publish',
              'orderby' => 'title',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'field' => 'term_id',
                  'terms' => $crt_query->term_id,
                  'operator' => 'IN',
                ),
              ),
            );
            $products = new WP_Query($args);

            while ($products->have_posts()) {
              $products->the_post();
              global $product; ?>
              <li data-id="<?php echo $product->id ?>"><?php echo $product->name; ?></li>
           <?php  }
            wp_reset_query();
          ?>
        </ul>
      </div>

      <div class="float-menu view-pc">
        <a href="javascript:void(0)" data-back>< 返回</a>
        <ul>
          <?php 

            $crt_query = get_queried_object();
            $args = array(
              'post_type' => 'product',
              'post_status' => 'publish',
              'orderby' => 'title',
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'field' => 'term_id',
                  'terms' => $crt_query->term_id,
                  'operator' => 'IN',
                ),
              ),
            );
            $products = new WP_Query($args);

            while ($products->have_posts()) {
              $products->the_post();
              global $product; ?>
              <li data-id="<?php echo $product->id ?>"><?php echo $product->name; ?></li>
           <?php  }
            wp_reset_query();
          ?>
        </ul>
      </div>
      
      <?php 
        global $wp_query;
        while ( have_posts() ) : 
          the_post();

          global $product;

          get_template_part( 'content', 'product' );

        endwhile;
      ?>
      
      <div class="view-mobile">
        <?php the_dropdown_cart_widget();?>
      </div>


    </div>
  </div>
</div>



<?php get_footer(); ?>
