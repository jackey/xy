<?php $post = get_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
    <h2 class="post-title"><?php the_title(); ?></h2>
    <div class="entry-content clearfix">
        <div class="avatar">
            <img src="<?php echo (get_field('avatar')['url'])?>" alt=""/>
        </div>
        <?php the_content()?>
    </div>
    <div class="l3"></div>
    <div class="the-blogs">
        <div class="container blog-list">
            <h2>顾问博客</h2>
            <div ng-repeat="blog in blogs" class="row blog-item" data-sr="enter bottom, move 100px, over 1s">
                <a ng-href="{{blog['permalink']}}"="">
                <div class="row" >
                    <div class="col-md-2">
                        <div class="img"><img ng-src="{{blog['author']['avatar']['url']}}" alt=""/></div>
                    </div>
                    <div class="col-md-10 blog-item-content">
                        <div class="row">
                            <h3 class="title">{{blog['title']}}</h3>
                            <p class="teaser">“{{blog['teaser']}}”</p>
                            <span class="author"><i>by&nbsp;&nbsp;<span>{{blog['author']['name']}}</span></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-3 blog-item-action">
                        <span class="like"><i class="fa fa-thumbs-up"></i>{{blog['like']}}</span>
                        <span class="comments"><i class="fa fa-commenting-o"></i>{{blog['comment']}}</span>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</article>