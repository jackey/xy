<?php
/**
 * Template Name: Blogs Page
 */
?>
<?php
  get_header('nosidebar');
?>

<?php

  $tag = $_GET['tag'];

  
  $args = array(
    'post_type' => 'post',
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => 'cases',
      ),
    ),
  );

  if ($tag) {
    $args['tax_query'][] = array(
      'taxonomy' => 'post_tag',
      'field' => 'slug',
      'terms' => $tag
    );
  }

  $keyword = $_GET['keyword'];
  if ($keyword) {
    $args['s'] = $keyword;
  }

  $blogs = new WP_Query($args);

?>


<div class="body-wrap body-static service-body-wrap">

    <div class="body-inner">
      <div class="tabs blogs-tabs">
        <ul class="clearfix">
          <li><a href="">部落格</a></li>
          <li class="sperator"><a>/</a></li>
          <li><a href="">
              <?php if ($tag) $tag_object = get_term_by('slug', $tag, 'post_tag'); echo $tag_object->name; ?>
              <?php if (!$tag) {
                if ($_SERVER['REQUEST_URI'] == 'blogs') {
                  echo '全部文章';
                } else {
                  echo '全部案例文章';
                }
              }?>
          </a></li>
        </ul>
      </div>
        
      <div class="wrap two-column">
        <div class="content">
          <div class="blogs-list">
            <ul class="clearfix">
              
              <?php 
                
                if ($blogs->have_posts()): 

                    while ($blogs->have_posts()): 
                      $blogs->the_post(); ?>

                        <li>
                          <div class="article-meta">
                            <div class="wrap">
                              <div class="time"><?php the_date('Y/m/d')?></div>
                              <div class="tags">
                                <ul class="clearfix">
                                  <li><span>最新</span></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          
                          <a href="<?php the_permalink()?>">
                            <h3><?php the_title()?></h3>
                            <p>
                              <?php 
                                $content = get_the_content(); 
                                $simple_content = wp_strip_all_tags($content); 
                                echo mb_substr($simple_content, 0, 100)?>...
                            </p>
                          </a>
                        </li>
                  <?php     
                     endwhile;

                    wp_reset_query();

                else:
                  
                  echo '<p class="no-result">暂无内容</p>';

                endif;
          
              ?>

              
            </ul>

            <?php 

              the_posts_pagination( array(
                'prev_text'          => ( '<' ),
                'next_text'          => ('>'),
              ) );
            ?>

          </div>
        </div>
        
        <div class="sidebar">
          <div class="search-wrap sidebar-element">
            <div class="form-box">
              <form action="" method="GET">
                <input type="text" name="keyword" value="<?php echo $_GET['keyword']?>" placeholder="搜寻" />
                <button class="btn btn-blue" type="submit">确认</button>
              </form>
            </div>
            <div class="tips">
              <span>热门搜索: </span>
              <span class="tip-tag">热搜词,</span>
              <span class="tip-tag">热搜词,</span>
              <span class="tip-tag">热搜词,</span>
            </div>
          </div>
      
          <?php $tags = get_tags(); ?>
          <?php if (count($tags)): ?>
            <div class="sidebar-element tags-box">
              <h3>标签</h3>
              <ul class="clearfix">
                <?php for ($i = 0; $i < count($tags) ; $i++ ) { ?>
                  <?php $tag = $tags[$i];?>
                  <li><a href="?tag=<?php echo urlencode($tag->slug)?>" href=""><?php echo $tag->name;?></a></li>
                <?php } ?>
              </ul>
            </div>

        <?php endif;?>

          <div class="sidebar-element newsletter-box">
            <h3>Always first?</h3>
            <p>订阅电子报,抢先得到携隐最新资讯</p>
            <div class="form-box">
              <input type="text" placeholder="填入电子邮箱" />
              <button class="btn btn-blue">确认</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>