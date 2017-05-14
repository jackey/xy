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

<div class="tabs blogs-tabs">
  <ul class="clearfix">
    <li><a href="/">部落格</a></li>
    <li class="sperator"><a>/</a></li>
    <li><a href="/blogs">全部文章</a></li>
    <li class="sperator"><a href="">/</a></li>
    <li><a href=""> <?php the_title()?></a></li>
  </ul>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <div class="wrap one-column">
    <div class="content">
      <div class="blog-node">
        
        <div class="share-icons">
          <p>分享</p>
          <div class="icon-wrap">
            <i class="fa fa-weixin" aria-hidden="true"></i>
          </div>
          <div class="icon-wrap">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </div>
        </div>
        
        <div class="article-wrap">

          <header class="entry-header">
            <?php
              if ( is_single() ) :
                the_title( '<h2 class="entry-title">', '</h2>' );
              else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
              endif;
            ?>
          </header><!-- .entry-header -->

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

          <div class="entry-content blog-node-content">
            <?php
              /* translators: %s: Name of current post */
              the_content( sprintf(
                __( 'Continue reading %s', 'twentyfifteen' ),
                the_title( '<span class="screen-reader-text">', '</span>', false )
              ) );
            ?>
          </div><!-- .entry-content -->

          <div class="tags-box">
            <ul class="clearfix">
              <?php 
                $tags = get_the_tags();
                for ($i = 0; $i < count($tags); $i++):  ?>
                  <li><a href="/blogs/?tag=<?php echo $tag[i]->slug?>"><?php echo $tags[$i]->name?></a></li>
              <?php  endfor;
              ?>
            </ul>
          </div>

          <?php 
            
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => '6',
              'post__not_in' => array(get_the_ID()),
              'tax_query' => array(
                array(
                  'taxonomy' => 'category',
                  'field' => 'slug',
                  'terms' => 'blog',
                ),
              ),
            );

            if (count($tags)) {
              $tag_names = array();
              for ($i = 0; $i < count($tags); $i++) {
                $tag_names[] = $tags[$i]->slug;
              }
            }
            $args['tax_query'][] = array(
              'taxonomy' => 'post_tag',
              'field' => 'slug',
              'terms' => $tag_names,
              'operator' => 'IN',
            );
            $similar_posts = new WP_Query($args);

          ?>

          <?php if ($similar_posts->have_posts()): ?>
            <div class="blog-teaser-list">
              <ul class="clearfix">
                <?php while ($similar_posts->have_posts()): ?>
                  <?php $similar_posts->the_post(); ?>
                  <li>
                    <div class="blog-teaser-item">
                      <div class="datetime"><?php the_date('Y/M/d')?></div>
                      <h3><?php the_title()?></h3>
                      <p>
                        <?php 
                          $content = get_the_content(); 
                          $simple_content = wp_strip_all_tags($content); 
                          echo mb_substr($simple_content, 0, 100)?>...
                        ?>
                      </p>
                    </div>
                  </li>
                <?php endwhile;?>
                <?php wp_reset_query();?>
              </ul>
            </div>
          <?php endif;?>

          

          <div class="qrcode-wrap">
            <div class="inner">
              <img src="<?php bloginfo('template_url')?>/misc/qrcode.png" alt="">
              <p>扫描QR code 加入微信 <br>携隐咨询微信号: xymelody</p>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>

</article><!-- #post-## -->
