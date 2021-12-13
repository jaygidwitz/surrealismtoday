<?php
/*
Plugin Name: Artists Custom Post Type for for SurrealismToday.com
Description: Adds Artists Post Type for SurrealismToday.com
*/
/* Start Adding Functions Below this Line */


/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Artists', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Artist', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Artists', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Movie', 'twentythirteen' ),
		'all_items'           => __( 'All Artists', 'twentythirteen' ),
		'view_item'           => __( 'View Artist', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Artist', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Artist', 'twentythirteen' ),
		'update_item'         => __( 'Update Artist', 'twentythirteen' ),
		'search_items'        => __( 'Search Artist', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'artists', 'twentythirteen' ),
		'description'         => __( 'Artist news and reviews', 'twentythirteen' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'taxonomies', 'genesis-layouts','genesis-cpt-archives-settings' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres', 'category', 'theme' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'artists', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 1 );









?>
