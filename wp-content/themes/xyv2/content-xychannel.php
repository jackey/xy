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
    <li><a href="/xychannel">XYC hannel</a></li>
    <li class="sperator"><a>/</a></li>
    <li><a href="/xychannel">全部视频</a></li>
    <li class="sperator"><a href="">/</a></li>
    <li><a href=""> <?php the_title()?></a></li>
  </ul>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <div class="wrap one-column">
    <div class="content">
      <div class="blog-node">
        
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
              <div class="tags tags-video">
                <ul class="clearfix">
                  <li><span>热门</span></li>
                </ul>
              </div>
              <div class="time"><?php the_date('Y/m/d')?></div>
              <div class="time">携隐咨询</div>
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

          <div class="share-icons view-mobile clearfix">
            <div class="icon-wrap">
              <i class="fa fa-weixin" aria-hidden="true"></i>
            </div>
            <div class="icon-wrap">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </div>
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
                  'terms' => 'xychannel',
                ),
              ),
            );

            $similar_posts = new WP_Query($args);
          ?>

          <?php if ($similar_posts->have_posts()): ?>
            <div class="channel-list channel-teaser-list">
              <ul class="clearfix">
                <?php while ($similar_posts->have_posts()): ?>
                  <?php $similar_posts->the_post(); ?>
                    <?php 
                        $poster = get_field('poster', get_the_ID());
                    ?>
                    <li>
                      <div class="video-list-item">
                        <div class="video-teaser">
                          <img src="<?php echo $poster['url']?>" alt="">
                          <div class="video-play-btn">
                            <i class="fa fa-play" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="video-text">
                          <h3><?php echo get_the_title()?></h3>
                          <p class="time"><?php echo get_the_date('Y/M/d')?></p>
                        </div>
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
        
        <div class="share-icons view-pc">
          <p>分享</p>
          <div class="icon-wrap">
            <i class="fa fa-weixin" aria-hidden="true"></i>
          </div>
          <div class="icon-wrap">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </div>
        </div>

      </div>
    </div>

  </div>

</article><!-- #post-## -->
