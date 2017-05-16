<?php
/**
 * Template Name: Home Page
 */
?>
<?php  get_header('nosidebar'); ?>

<style>
    
    .loading {
      position: fixed;
      z-index: 4;
      width: 195px;
      height: 199px;
      left: 50%;
      margin-left: -97px;
      top: 20%;
      animation: loading-animate 4s linear 0s infinite normal;
    }

    .loading-bg {
      position: fixed;
      z-index: 3;
      width: 100%;
      height:100%;
      left: 0px;
      top: 0px;
      background: #eee;
    }

    .animate-pause {
      -webkit-animation-play-state: paused;
      animation-play-state: paused;
    }

    @-webkit-keyframes loading-animate {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes loading-animate {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

  </style>

    <div class="section-wrap">
      <div class="section home-section" fullscreen>
        <div class="inner">
          <div class="conwrap">
            <div class="home-content">
              <img src="<?php echo bloginfo('template_url')?>/misc/bg-logo.png" alt="">
              <h1>说出属于你的，独一无二的故事</h1>
              <p>所有关于留学考试，留学申请，职业发展问题的问题</p>
              <p>你都可以在这里找到答案</p>
            </div>
          </div>
        </div>
        <i class="cloud cloud1"></i>
        <i class="cloud cloud2"></i>
        <i class="cloud cloud3"></i>
        <i class="cloud cloud4"></i>
        <i class="cloud cloud5"></i>
      </div>

      <div class="section section-service">
        <div class="bg-line"></div>
        <div class="inner">
          <h2><span class="cn">服务</span><span class="en">SERVICES</span></h2>
          <div class="sevices">
            <ul class="clearfix">
              <li class="item item-1">
                <div class="service-item service-item-1">
                  <a href="/product-category/service_application/"><div class="inner">
                    <img src="<?php echo bloginfo("template_url")?>/misc/2_Service_icon_apply.png" alt="">
                    <h4>申请</h4>
                    <p>全套服务<br>一对一 <br>单项</p>
                  </div></a>
                </div>
              </li>
              <li class="item item-2">
                <div class="service-item service-item-2">
                  <a href="/product-category/service_exam/"><div class="inner">
                    <img src="<?php echo bloginfo("template_url")?>/misc/2_Service_icon_exam.png" alt="">
                    <h4>考试</h4>
                    <p>GMAT <br>一对一</p>
                  </div></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <?php 
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'cases',
            ),
          ),
        );

        $blogs = new WP_Query($args);
      ?>
      
      <?php if ($blogs->have_posts()): ?>
        <div class="section section-case">
          <h2><span class="cn">成功案例</span><span class="en">CASE STUDY</span></h2>
          <div class="case-items list-items">
            <ul class="clearfix">
              <?php while ($blogs->have_posts()): ?>
              <?php $blogs->the_post();?>
                <li>
                  <div class="case-item case-item-1">
                    <div class="inner">
                      <div class="case-avatar">
                        <?php $avatar = get_field('student_avatar', get_the_ID());?>
                        <img src="<?php echo $avatar['url'];?>" alt="" class="avatar">
                        <div class="people">
                          <b class="pname"><?php $name = get_field('student_name', get_the_ID()); echo $name?></b>
                          <p>学员故事</p>
                        </div>
                      </div>
                      <div class="case-text">
                        <h4><?php the_title()?></h4>
                        <p><?php 
                          $content = get_the_content();
                          $simple_content = wp_strip_all_tags($content);
                          echo mb_substr($simple_content, 0, 100).'...';
                        ?></p>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endwhile;?>
              <?php wp_reset_query();?>
              
            </ul>
            <div class="view-more"><a href="/cases/" class="btn btn-view-more">查看全部</a></div>
          </div>
        </div>
      <?php endif;?>

      <?php 
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'cases',
            ),
          ),
        );

        $blogs = new WP_Query($args);
      ?>
      
      
      <?php if ($blogs->have_posts()): ?>

        <div class="section section-blog">
          <h2><span class="cn">部落格</span><span class="en">BLOG</span></h2>
          
          <div class="blog-list-items list-items">
            <ul class="clearfix">
              <?php while ($blogs->have_posts()):  ?>
                <?php $blogs->the_post();?>
                <li>
                  <div class="blog-list-item list-item">
                    <div class="date-flag">
                      <div class="date-wrap">
                        <div class="blog-date">
                          <p>20 <br> DEC </p>
                        </div>
                      </div>
                    </div>
                    <div class="blog-item item-wrap">
                      <img src="<?php echo bloginfo("template_url")?>/misc/blog1.png" alt="" class="item-image">
                      <div class="blog-item-text item-text">
                        <h4><?php the_title()?></h4>
                        <p><?php 
                          $content = get_the_content();
                          $simple_content = wp_strip_all_tags($content);
                          echo mb_substr($simple_content, 0, 500).'...';
                        ?></p>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endwhile;?>

              <?php wp_reset_query();?>
              
              <li>
                <div class="newletter-form-wrap blog-list-item list-item">
                  <div class="date-flag">
                    <div class="date-wrap">
                      <div class="blog-date">
                        <p></p>
                      </div>
                    </div>
                  </div>
                  <div class="item-wrap blog-item ">
                    <p>Always first ?</p>
                    <p>订略电子报,抢先得到携隐最新资讯</p>
                    <div class="form form-wrap form-newsleter">
                      <input type="text" placeholder="填入电子信箱" />
                      <button class="btn btn-confirm btn-blue">提交</button>
                    </div>
                    <a href="/blogs" class="view-more-link">查看全部文章</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>

      <?php endif;?>

      <?php 
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'xychannel',
            ),
          ),
        );

        $channels = new WP_Query($args);
      ?>
      
      <?php if ($channels->have_posts()): ?>
        <div class="section section-video">
          <h2>XY CHANNEL</h2>
          <div class="list-items video-items">
            <ul class="clearfix">
              <?php while($channels->have_posts()): ?>
                <?php $channels->the_post();?>
                <li>
                  <div class="list-video-item">
                    <div class="inner">
                      <?php 
                          $poster = get_field('poster', get_the_ID());
                      ?>
                      <img src="<?php echo $poster['url']?>" alt="">
                      <div class="desc">
                        <p><?php the_title()?></p>
                        <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endwhile;?>
              
            </ul>
            <button href="/xychannel" class="btn btn-confirm btn-blue">查看全部</button>
          </div>
        </div>
      <?php endif;?>

    </div>

    <div class="loading animate-pause">
      <img src="<?php echo bloginfo("template_url")?>/misc/loading-bg.png" alt="">
      <div class="loading-plane">
        <img class="plane" src="<?php echo bloginfo("template_url")?>/misc/plane.png" alt="">
        <img class="plane-line" src="<?php echo bloginfo("template_url")?>/misc/planeline.png" alt="">
      </div>
    </div>
    <div class="loading-bg"></div>

<?php get_footer(); ?>