<?php
/**
 * Template Name: Static Home
 */
?>

<?php get_header(); ?>

<?php echo get_template_part('blog_header')?>

<?php
global $post;
$cat = get_query_var('cat');
if ($cat == 3) {
  $id = array(
    'category__in' => array(3, 6, 1,5),
  );
}
else {
  $id = array('category' => $cat);
}
$page = get_query_var('page');
$itemOnePage = 1;
$offset = ( $page -1 )* $itemOnePage;
$args = array(
  'posts_per_page' => $itemOnePage,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'offset' => $offset,
  'post_status' => 'publish',
);
$the_query = new WP_Query();
$args = array_merge($args, $id);
$blog_posts = $the_query->query($args);

$colors = array(
  3 => 'color-1',
  6 => 'color-2',
  1 => 'color-3',
  5 => 'color-5',
);
?>

  <div class="container blogList commonRow">
    <?php foreach ($blog_posts as $post): ?>
      <div class="row">
        <div class="col-bL1">
          <p class="bDSDate"><?php echo date("jS M Y", strtotime(get_post_meta(get_the_ID(), 'publish_date', true)))?></p>
          <span class="blogListReport <?php  $cats = get_the_category(); $cat = array_shift($cats); echo $colors[$cat->cat_ID];?>"><?php echo $cat->name?></span>
        </div>
        <div class="col-bL2">
          <h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
          <p><?php echo get_post_meta(get_the_ID(), 'summary', true)?></p>
          <div class="bDSIcon"><i class="bDSIcon1"></i><i class="bDSIcon2"></i></div>
        </div>
        <div class="col-bL3">
          <?php
            $image = get_attachment_image_thumbnail(get_the_ID(), 'poster', array(270, 135));
          ?>
          <img src="<?php echo $image?>" alt="">
        </div>
      </div>
    <?php endforeach;?>
    <?php $total_page = $the_query->max_num_pages;?>
    <?php if ($total_page > 1 ): ?>
      <div class="row page">
        <?php
        $big = 1<<64;
        echo paginate_links(array(
          'format' => '?page=%#%',
          'total' => $total_page,
          'show_all' => TRUE,
          'prev_next' => true,
          'prev_text' => '上一页',
          'next_text' => '下一页',
          'type' => 'list',
          'current' => max(1, get_query_var('page')),
        ));
        ?>
      </div>
    <?php endif;?>
  </div>




<?php get_sidebar(); ?>

<?php get_footer() ?>