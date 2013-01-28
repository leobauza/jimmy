<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), false);
		wp_enqueue_script('jquery');

		wp_register_script('isotope', get_bloginfo('template_directory') . "/js/jquery.isotope.js");
		wp_enqueue_script('isotope');

		wp_register_script('history', get_bloginfo('template_directory') . "/js/jquery.history.js");
		wp_enqueue_script('history');

		wp_register_script('validation', get_bloginfo('template_directory') . "/js/liveValidation.js");
		wp_enqueue_script('validation');

		// wp_register_script('myscript', get_bloginfo('template_directory') . "/js/script.js");
		// wp_enqueue_script('myscript');
	
	}
	
	//custom image size
	//name if not reset, width, height, crop
	//set_post_thumbnail_size(150, 150, false);
	add_image_size('sorter-size' , 180, 244, true); //feed thumbnails
	
	//navigation rewrite
	class description_walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth, $args) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';

			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

			$attributes	= ! empty( $item->attr_title ) ? ' title="'	 . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )		 ? ' target="' . esc_attr( $item->target		 ) .'"' : '';
			$attributes .= ! empty( $item->xfn )				 ? ' rel="'		 . esc_attr( $item->xfn				 ) .'"' : '';
			$attributes .= ! empty( $item->url )				 ? ' href="'	 . esc_attr( $item->url				 ) .'"' : '';

			$prepend = '';
			$append = '';
			$description	 = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

			if($depth != 0) {
				$description = $append = $prepend = "";
			}
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= $description.$args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	//add first and last
	function wpb_first_and_last_menu_class($items) {
		$items[1]->classes[] = 'first';
		$items[count($items)]->classes[] = 'last';
		return $items;
	}
	add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');
	
	//register navigation
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'main_nav' => 'Main Navigation Menu' 
			)
		);
	}
	
	
	// Clean up the <head>
	function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'removeHeadLinks');
	remove_action('wp_head', 'wp_generator');
	
	// Declare sidebar widget zone
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Sidebar Widgets',
			'id'   => 'sidebar-widgets',
			'description'	=> 'These are widgets for the sidebar.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h2>',
			'after_title'	=> '</h2>'
		));
	}
	
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'main_nav' => 'Main Navigation Menu' 
			)
		);
	}
	
	register_post_type('blocks', array(	'label' => 'Site Blocks','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','custom-fields','revisions',),'labels' => array (
	  'name' => 'Site Blocks',
	  'singular_name' => '',
	  'menu_name' => 'Site Blocks',
	  'add_new' => 'Add Site Blocks',
	  'add_new_item' => 'Add New Site Blocks',
	  'edit' => 'Edit',
	  'edit_item' => 'Edit Site Blocks',
	  'new_item' => 'New Site Blocks',
	  'view' => 'View Site Blocks',
	  'view_item' => 'View Site Blocks',
	  'search_items' => 'Search Site Blocks',
	  'not_found' => 'No Site Blocks Found',
	  'not_found_in_trash' => 'No Site Blocks Found in Trash',
	  'parent' => 'Parent Site Blocks',
	),) );
	
	
?>