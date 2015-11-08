<?php $post = get_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="post-title"><?php the_title(); ?></h2>
    <span class="time"><i class="fa fa-calendar-times-o"></i><?php echo date('Y-m-d', strtotime(get_the_date()))?></span>

    <div class="entry-content clearfix">
        <div class="cc">
            <?php the_content()?>
        </div>
        <div class="authors clearfix">
            <div class="byname clearfix">
                <?php $author = get_field('author');?>
                <span class="avatar"><img src="<?php echo (get_field('avatar', $author->ID)['url'])?>" alt=""/></span>
                <span class="name"><i>by</i> <?php echo get_the_title($author->ID)?></span>
            </div>
        </div>
    </div>

    <div class="fcomment-form" data-sr="wait 0s, ease-in-out 50px, over 1s">
        <?php comment_form(); ?>
    </div>

    <div class="comments" data-sr="wait 0s, ease-in-out 50px, over 1s">
        <ol class="commentList">
            <?php comments_template(); ?>
        </ol>
    </div>

</article>