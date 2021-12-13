<?php
/*
Plugin Name: Custom Taxonomies for SurrealismToday.com
Description: This plugin adds a custom taxonomy called medium for the art site surrealismtoday.com
*/
/* Start Adding Functions Below this Line */



//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );

function create_topics_nonhierarchical_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Genres', 'taxonomy general name' ),
    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genres' ),
    'popular_items' => __( 'Popular Genres' ),
    'all_items' => __( 'All Genres' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre Name' ),
    'separate_items_with_commas' => __( 'Separate genres with commas' ),
    'add_or_remove_items' => __( 'Add or remove genres' ),
    'choose_from_most_used' => __( 'Choose from the most used genres' ),
    'menu_name' => __( 'Genres' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('genres','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
	'show_in_rest'      => true, // Needed for tax to appear in Gutenberg editor.
    'query_var' => true,
    'rewrite' => array( 'slug' => 'genre' ),
  ));
}


    // Rename Post Tags to Themes. 
    // http://wordpress.stackexchange.com/questions/4182/can-the-default-post-tags-taxonomy-be-renamed


add_action( 'init', 'wpa4182_init');
function wpa4182_init()
{
    global $wp_taxonomies;

    // The list of labels we can modify comes from
    //  http://codex.wordpress.org/Function_Reference/register_taxonomy
    //  http://core.trac.wordpress.org/browser/branches/3.0/wp-includes/taxonomy.php#L350
    $wp_taxonomies['post_tag']->labels = (object)array(
        'name' => 'Themes',
        'menu_name' => 'Themes',
        'singular_name' => 'Theme',
        'search_items' => 'Search Themes',
        'popular_items' => 'Popular Themes',
        'all_items' => 'All Themes',
        'parent_item' => null, // Tags aren't hierarchical
        'parent_item_colon' => null,
        'edit_item' => 'Edit Theme',
        'update_item' => 'Update Theme',
        'add_new_item' => 'Add new Theme',
        'new_item_name' => 'New Theme Name',
        'separate_items_with_commas' => 'Separata Themes with commas',
        'add_or_remove_items' => 'Add or remove Themes',
        'choose_from_most_used' => 'Choose from the most used Themes',
    );

    $wp_taxonomies['post_tag']->label = 'Themes';
}


/* Stop Adding Functions Below this Line */
?>
