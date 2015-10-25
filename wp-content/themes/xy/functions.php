<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 10/18/15
 * Time: 2:54 AM
 */

function register_my_menus() {
    register_nav_menus(
        array('main-nav' => __('导航'))
    );
}
add_action('init', 'register_my_menus');

function xy_theme_setup() {

    add_post_type_support('post', 'post-formats');

    add_theme_support('post-formats', array('aside', 'gallery'));
}
add_action('after_setup_theme', 'xy_theme_setup');