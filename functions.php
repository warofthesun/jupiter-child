<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/assets/stylesheet/core-styles.css' );
   wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
   wp_enqueue_script('jquery-ui-dialog');
}

add_image_size( 'header-image', 1200, 500, true );

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf/';

    // return
    return $path;

}


// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';

    // return
    return $dir;

}


// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );

include( get_stylesheet_directory() . '/acf/acf-fields.php');

require_once( 'library/custom-post-type.php' );

// shortcode to get News items
add_shortcode( 'wellview_news', 'wellview_news' );
function wellview_news() {
  $args = array (
  	'post_type'              => array( 'news_resources' ),
  	'post_status'            => array( 'publish' ),
  	'order'                  => 'DSC',
  	'orderby'                => 'post_order',
    'posts_per_page'         => 4
  );
    echo "<ul class='news_resources__loop'>";
    $loop = new WP_Query($args);

    while ($loop->have_posts()) {
        $loop->the_post();

        echo "<li>";
        echo "<a href='";
        echo get_permalink();
        echo "'>";
        the_post_thumbnail('photo-album-thumbnail-square');
        echo "</a><a href='";
        echo get_permalink();
        echo "' class='news_resources__title'>";
        the_title();
        echo "</a></li>";

    }
    echo "</ul>";
    wp_reset_postdata();
}


?>
