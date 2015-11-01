<?php
/**
 * Template Name: Static Home
 */
?>

<?php get_header(); ?>

<div id="main" data-scroll-header>
    <div id="content">
        <div class="container blog-list">
            <h2>携隱博客</h2>
            <p>"每篇博客都是我们的态度"</p>

            <div ng-repeat="blog in blogs" class="row blog-item" data-sr="enter bottom, move 100px, over 1s">
                <div class="row">
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
                        <span class="pull-right"><a href="">快速评论</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_sidebar(); ?>

<?php get_footer() ?>