<?php


// Flush rewrite rules for Card types
add_action( 'after_switch_theme', 'formats_flush_rewrite_rules' );

// Flush your rewrite rules
function formats_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the Card
function custom_post_example() { 
	// creating (registering) the Card 
	register_post_type( 'custom_card', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this Card
		array( 'labels' => array(
			'name' => __( 'Cards', 'formatstheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Card', 'formatstheme' ), /* This is the individual type */
			'all_items' => __( 'All Cards', 'formatstheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'formatstheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Card', 'formatstheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'formatstheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Cards', 'formatstheme' ), /* Edit Display Title */
			'new_item' => __( 'New Card', 'formatstheme' ), /* New Display Title */
			'view_item' => __( 'View Card', 'formatstheme' ), /* View Display Title */
			'search_items' => __( 'Search Card', 'formatstheme' ), /* Search Card Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'formatstheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'formatstheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example Card type', 'formatstheme' ), /* Card Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-format-gallery', /* the icon for the Card type menu */
			'rewrite'	=> array( 'slug' => 'custom_card', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'custom_card', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'author', 'custom-fields', 'revisions')
		) /* end of options */
	); /* end of register Card */
	
	/* this adds your post categories to your Card type */
	// register_taxonomy_for_object_type( 'category', 'custom_card' );
	/* this adds your post tags to your Card type */
	// register_taxonomy_for_object_type( 'post_tag', 'custom_card' );
	
}

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_example');

// let's create the function for the Card
function custom_post_frame() { 
	// creating (registering) the Card 
	register_post_type( 'custom_frame', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this Card
		array( 'labels' => array(
			'name' => __( 'iFrames', 'formatstheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'iFrame', 'formatstheme' ), /* This is the individual type */
			'all_items' => __( 'All iFrames', 'formatstheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'formatstheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New iFrame', 'formatstheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'formatstheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit iFrames', 'formatstheme' ), /* Edit Display Title */
			'new_item' => __( 'New iFrame', 'formatstheme' ), /* New Display Title */
			'view_item' => __( 'View iFrame', 'formatstheme' ), /* View Display Title */
			'search_items' => __( 'Search iFrame', 'formatstheme' ), /* Search Card Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'formatstheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'formatstheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example iFrame type', 'formatstheme' ), /* Card Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-media-code', /* the icon for the Card type menu */
			'rewrite'	=> array( 'slug' => 'iframe', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'custom_frame', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'custom-fields', 'revisions')
		) /* end of options */
	); /* end of register Card */	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_frame');

?>