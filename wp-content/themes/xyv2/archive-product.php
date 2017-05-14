<?php  get_header('nosidebar'); ?>


<div class="service-page">

  <div class="section clearfix" >
    <div class="content-wrap ">
      <h1 class="service-name">申<br />请</h1>
      <!-- 浮动菜单 -->
      <div class="float-menu">
        <a href="###">< 返回</a>
        <ul>
          <?php 

            $crt_query = get_queried_object();
            $args = array(
              'post_type' => 'product',
              'post_status' => 'publish',
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
              <li><?php echo $product->name; ?></li>
           <?php  }
            wp_reset_query();

          ?>
        </ul>
      </div>
      
      <?php 
        // Start the Loop.
        while ( have_posts() ) : the_post();

          /*
           * Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'content', 'product' );

        // End the loop.
        endwhile;
      ?>


    </div>
  </div>
</div>



<?php get_footer(); ?>
