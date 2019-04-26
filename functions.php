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


// shortcode to get News items
add_shortcode( 'wellview_news', 'wellview_news' );
function wellview_news() {
    $q = new WP_Query('pagename=news-and-resources');
    while ($q->have_posts()) {
        $q->the_post();
        if( have_rows('news_items') ):
          echo '<ul class="news__items">';
        while ( have_rows('news_items') ) : the_row();
        echo '<li class="news__items-item">';
        $image = get_sub_field('thumbnail_image');
        $size = 'image-size-550x550'; // (or thumbnail, or medium, or custom, the Image ID sizes are your oyster)
        if( $image ) {
        	echo wp_get_attachment_image( $image, $size );
        }
        $title = get_sub_field('title');
        echo
        "<div class='news__items-title'>" . $title . "</div>
        </li>";
        endwhile;
        echo '</ul>';
        else :
        // no rows found
        endif;
    }
    wp_reset_postdata();
}


?>
