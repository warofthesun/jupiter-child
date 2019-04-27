<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'starter_flush_rewrite_rules' );

// Flush your rewrite rules
function starter_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post() {
	// creating (registering) the custom type
	register_post_type( 'news_resources', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'News & Resources', 'wellview' ), /* This is the Title of the Group */
			'singular_name' => __( 'News Item', 'wellview' ), /* This is the individual type */
			'all_items' => __( 'All News Items', 'wellview' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'wellview' ), /* The add new menu item */
			'add_new_item' => __( 'Add New News Item', 'wellview' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'wellview' ), /* Edit Dialog */
			'edit_item' => __( 'Edit News Items', 'wellview' ), /* Edit Display Title */
			'new_item' => __( 'New News Item', 'wellview' ), /* New Display Title */
			'view_item' => __( 'View News Item', 'wellview' ), /* View Display Title */
			'search_items' => __( 'Search News Item', 'wellview' ), /* Search News Item Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'wellview' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'wellview' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'News and Resources posts', 'wellview' ), /* News Item Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-analytics', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'news-and-resources', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'news-and-resources', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'news_resources' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'news_resources' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat',
		array('news_resources'), /* if you change the name of register_post_type( 'news_resources', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'News Categories', 'wellview' ), /* name of the custom taxonomy */
				'singular_name' => __( 'News Category', 'wellview' ), /* single taxonomy name */
				'search_items' =>  __( 'Search News Categories', 'wellview' ), /* search title for taxomony */
				'all_items' => __( 'All News Categories', 'wellview' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent News Category', 'wellview' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent News Category:', 'wellview' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit News Category', 'wellview' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update News Category', 'wellview' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New News Category', 'wellview' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New News Category Name', 'wellview' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);

	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag',
		array('news_resources'), /* if you change the name of register_post_type( 'news_resources', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'News Tags', 'wellview' ), /* name of the custom taxonomy */
				'singular_name' => __( 'News Tag', 'wellview' ), /* single taxonomy name */
				'search_items' =>  __( 'Search News Tags', 'wellview' ), /* search title for taxomony */
				'all_items' => __( 'All News Tags', 'wellview' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent News Tag', 'wellview' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent News Tag:', 'wellview' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit News Tag', 'wellview' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update News Tag', 'wellview' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New News Tag', 'wellview' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New News Tag Name', 'wellview' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);




?>
