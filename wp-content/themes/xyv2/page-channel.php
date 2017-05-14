<?php
/**
 * Template Name: Channel Page
 */
?>
<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php get_header('nosidebar'); ?>

        <div class="body-wrap body-static service-body-wrap">
          <div class="body-inner">
            <div class="tabs blogs-tabs">
              <ul class="clearfix">
                <li><a href="/xychannel">XY Channel</a></li>
                <li class="sperator"><a>/</a></li>
                <li><a href="/xychannel">全部视频</a></li>
              </ul>
            </div>

            <?php 
                $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => '9',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'category',
                      'field' => 'slug',
                      'terms' => 'xychannel',
                    ),
                  ),
                );

                $xychannels = new WP_Query($args);
            ?>
              
            <div class="wrap">
              <div class="content">
                <div class="channel-list">

                  <?php if ($xychannels->have_posts()):?>
                    <ul class="clearfix">
                      <?php while($xychannels->have_posts()): ?>
                        <?php 
                          $xychannels->the_post();
                          $poster = get_field('poster', get_the_ID());
                        ?>
                        <li>
                          <a href="<?php echo the_permalink()?>">
                            <div class="video-list-item">
                              <div class="video-teaser">
                                <img src="<?php echo $poster['url']?>" alt="">
                                <div class="video-play-btn">
                                  <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                              </div>
                              <div class="video-text">
                                <h4>
                                  <span class="tag">热门</span>
                                  <?php the_title()?>
                                </h4>
                                <p>
                                  <?php 
                                    $content = get_the_content(); 
                                    $simple_content = preg_replace("/\[video[^\]]+\]\[\/video\]/i", "", $content);
                                    $simple_content = wp_strip_all_tags($simple_content);
                                    echo mb_substr($simple_content, 0, 50).'...';
                                  ?>
                                </p>
                              </div>
                            </div></a>
                        </li>
                      <?php endwhile;?>
                    </ul>
                  <?php else: ?>
                    <p class="no-resultt">暂无内容</p>
                  <?php endif;?>
                  
                    <?php 
                      the_posts_pagination( array(
                        'prev_text'          => ( '<' ),
                        'next_text'          => ('>'),
                      ));
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php get_footer(); ?>