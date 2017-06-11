<?php  get_header('nosidebar'); ?>


<div class="body-wrap body-static service-page">

  <div class="section clearfix" >
    <div class="content-wrap ">
      <h1 class="service-name">申<br />请111</h1>

      <?php 
        $services = array();
      ?>
      
      <?php 
        // Start the Loop.
        while ( have_posts() ) : the_post();

          $services[] = array('title' => get_the_title(), 'id' => get_the_ID());

          /*
           * Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'content', get_post_format() );

        // End the loop.
        endwhile;

        wp_reset_query();
      ?>

            <!-- 浮动菜单 -->
      <div class="float-menu">
        <a href="/">< 返回</a>
        <ul>
          <?php foreach ($services as $service): ?>
            <li class="active" data-id=<?php echo $service['id']?>><?php echo $service['title']?></li>
          <?php endforeach;?>
        </ul>
      </div>


    </div>
  </div>
</div>



<?php get_footer(); ?>
