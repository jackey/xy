

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
    <h2 class="post-title"><?php the_title(); ?></h2>
    <div class="entry-content">
        <?php the_content()?>
    </div>
</article>