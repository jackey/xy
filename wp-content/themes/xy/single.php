<?php
/**
 * Template Name: Static Home
 */
?>

<?php get_header(); ?>

<?php
$cat = array_shift(get_the_category());
$post = get_post();
setup_postdata($post);
?>

<div id="main" data-scroll-header>
    <div id="content">
        <div class="container">
            <div class="row">
                <?php if ($cat): ?>
                    <?php get_template_part('content', $cat->slug)?>
                <?php else: ?>
                    <?php get_template_part('content')?>
                <?php endif;?>
            </div>
        </div>
    </div>

<?php get_sidebar(); ?>

<?php get_footer() ?>