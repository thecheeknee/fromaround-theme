<?php
if ( ! function_exists( 'theme_setup' ) ) :
function theme_setup() {
    if ( ! isset ( $content_width) )
    $content_width = 980;
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'fromaround', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'regular', 250, 400 );
    add_image_size( 'square', 500, 500, array( 'center', 'center' ) );
    add_image_size( 'large', 450, 600 );
    add_image_size( 'tiny', 150, 250 );
    add_image_size( 'tiny-thumb', 150, 100, array( 'center','center' ) );
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'fromaround' ),
        'secondary' => __('Secondary Menu', 'fromaround' ),
        'subscribe' => __('Subscribe Menu', 'fromaround' ),
        'followus' => __('Follow Menu', 'fromaround' )
    ) );

    /**
     * Add excerpt support for Pages
     */
    add_post_type_support( 'page', 'excerpt' );
}
endif; // theme_setup
// add tag and category support to pages
function tags_categories_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');  
}

// ensure all tags and categories are included in queries
function tags_categories_support_query($wp_query) {
    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
    if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
}

//remove related posts from the content page
function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );

// tag and category hooks
add_action('init', 'tags_categories_support_all');
add_action('pre_get_posts', 'tags_categories_support_query');
add_action( 'after_setup_theme', 'theme_setup' );
?>