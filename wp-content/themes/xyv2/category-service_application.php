<?php  get_header('nosidebar'); ?>


<div class="body-wrap body-static service-page">

  <div class="section clearfix" >
    <div class="content-wrap ">
      <h1 class="service-name">申<br />请</h1>
      <!-- 浮动菜单 -->
      <div class="float-menu">
        <a href="###">< 返回</a>
        <ul>
          <li class="active">全套服务</li>
          <li>一对一</li>
          <li>单项</li>
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
          get_template_part( 'content', get_post_format() );

        // End the loop.
        endwhile;
      ?>


    </div>
  </div>
</div>



<?php get_footer(); ?>
