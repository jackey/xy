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

// ajax callback
add_action('wp_ajax_nopriv_team_member', 'ajax_action_return_team_members');
add_action('wp_ajax_team_member', 'ajax_action_return_team_members');

// 联系我们表单
add_action('wp_ajax_submit_contact_form', 'ajax_action_submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'ajax_action_submit_contact_form');

// 博客
add_action('wp_ajax_blog_list', 'ajax_action_blog_list');
add_action('wp_ajax_nopriv_blog_list', 'ajax_action_blog_list');

// 顾问
function ajax_action_return_team_members() {
    $queryString = array(
        'post_type' => 'post',
        'post_per_page' => -1,
        'category__and' => array(4),
        'meta_key' => 'weight',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    );
    $members = array();
    $the_query = new WP_Query($queryString);
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $members[] = array(
            'first_name' => get_field('first_name'),
            'last_name' => get_field('last_name'),
            'position_title' => get_field('position_title'),
            'college' => get_field('college'),
            'avatar' => get_field('avatar'),
            'permalink' => get_permalink(),
            'desc' => get_the_content()
        );
    }
	echo json_encode($members);

    die();
}

function ajax_action_submit_contact_form() {
    $content = file_get_contents("php://input");
    if ($content) {
        $contactData = json_decode($content, true);
        $data = array(
            'title' => '联系我们',
            'posted_data' => $contactData
        );

        $data = (object)$data;

        require_once(ABSPATH . 'wp-content/plugins/contact-form-7-to-database-extension/CF7DBPlugin.php');

        $plugin = new CF7DBPlugin();
        $plugin->saveFormData($data);
    }

    die();
}

function ajax_action_blog_list() {
    // 获取所有博客
    $args = array(
        'post_type' => 'post',
        'post_per_page' => -1,
        'category__and' => array(3),
        'orderby' => 'post_date',
        'order' => 'DESC'
    );
    $blogs = array();
    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) {
        $the_query->the_post();
        $blog = array(
            'title' => get_the_title(),
            'content' => get_the_content(),
            'teaser' => get_the_content(null, true),
            'like' => get_field('like_count'),
            'comment' => get_field('comment_count'),
            'author' => get_field('author'),
            'permalink' => get_permalink(),
        );
        $author = get_field('author');
        $blog['author'] = array(
            'name' => get_the_title($author->ID),
            'avatar'=> get_field('avatar', $author->ID),
        );
        $blogs[] = $blog;
    }

    echo json_encode($blogs);

    die();
}

function get_attachment_image_thumbnail($postID, $fieldName, $size = array()) {
  $poster = get_post_meta($postID, $fieldName, true);
  if (!$poster) return get_bloginfo('template_url').'/images/blog-list_1.jpg';
  $image = wp_get_attachment_metadata($poster);
  $srcImage = $image['file'];
  $uploadDir = wp_upload_dir();
  $editor = wp_get_image_editor($uploadDir['basedir'].'/'.$srcImage);
  $editor->resize(270, 135, true);
  $baseName = pathinfo($srcImage, PATHINFO_DIRNAME);
  $fileName = pathinfo($srcImage, PATHINFO_FILENAME);
  $extName = pathinfo($srcImage, PATHINFO_EXTENSION);
  $distImage = $editor->save($uploadDir['basedir']."/{$baseName}/270x135-{$fileName}.{$extName}");
  $baseUrl = str_replace($uploadDir['basedir'], "", $distImage['path']);
  return $uploadDir['baseurl'].'/'.$baseUrl;
}