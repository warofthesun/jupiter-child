<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/assets/stylesheet/core-styles.css' );
   wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
   wp_enqueue_script('jquery-ui-dialog');
}

add_image_size( 'header-image', 1200, 500, true );
?>
