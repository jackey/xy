<?php $id = get_query_var('cat'); ?>

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
      <div class="col-2"><a href="<?php echo get_category_link(3)?>" class="fontXY <?php if ($id == 3) echo "actPro"?>">All</a></div>
      <div class="col-2"><a href="<?php echo get_category_link(5)?>" class="<?php if ($id == 5) echo "actPro"?>">留学报告</a></div>
      <div class="col-2"><a href="<?php echo get_category_link(1)?>" class="<?php if ($id == 1) echo "actPro"?>">我们的活动</a></div>
      <div class="col-2"><a href="<?php echo get_category_link(6)?>" class="<?php if ($id == 6) echo "actPro"?>">成功案例</a></div>
      <div class="col-2"></div>
    </div>
  </div>
</div>
 

 