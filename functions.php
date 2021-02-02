<?php
/**
 * cavatina functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cavatina
 */

if ( ! defined( 'CAVATINA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CAVATINA_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cavatina_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cavatina_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cavatina, use a find and replace
		 * to change 'cavatina' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cavatina', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cavatina' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wp_cavatina_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'cavatina_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_cavatina_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_cavatina_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_cavatina_content_width', 0 );



/**
 * Register widget area for contact page.
 *
 * @link https://codex.wordpress.org/Widgetizing_Themes
 */
function contact_widget_init() {
 
    register_sidebar( array(
        'name'          => 'Contact Page Sidebar Area',
        'id'            => 'custom-contact-widget',
        'before_widget' => '<div class="c-widget__content">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="c-widget__title">',
        'after_title'   => '</h6>',
    ) );
 
}
add_action( 'widgets_init', 'contact_widget_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_cavatina_scripts() {
	wp_enqueue_style( 'wp-cavatina-style', get_stylesheet_uri(), array(), CAVATINA_VERSION );
	wp_style_add_data( 'wp-cavatina-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wp-cavatina-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CAVATINA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_cavatina_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';




/**
 * Enqueue scripts and styles.
 */
function cavatina_scripts() {

	wp_enqueue_style( 'cavatina-style', get_template_directory_uri() . '/assets/css/main.css', array(), CAVATINA_VERSION );

	wp_enqueue_script( 'cavatina-main-scripts', get_template_directory_uri() . '/assets/js/main.js', array( ), CAVATINA_VERSION, true );

}

add_action( 'wp_enqueue_scripts', 'cavatina_scripts' );



/**
 * Custom Post type
 */

function cavatina_projects() {

// Set UI labels for Custom Post Type
$labels = array(
    'name'                => _x( 'Projects', 'Post Type General Name', 'cavatina' ),
    'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'cavatina' ),
    'menu_name'           => __( 'Projects', 'cavatina' ),
    'parent_item_colon'   => __( 'Parent Project', 'cavatina' ),
    'all_items'           => __( 'All Projects', 'cavatina' ),
    'view_item'           => __( 'View Project', 'cavatina' ),
    'add_new_item'        => __( 'Add New Project', 'cavatina' ),
    'add_new'             => __( 'Add New', 'cavatina' ),
    'edit_item'           => __( 'Edit Project', 'cavatina' ),
    'update_item'         => __( 'Update Project', 'cavatina' ),
    'search_items'        => __( 'Search Project', 'cavatina' ),
    'not_found'           => __( 'Not Found', 'cavatina' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'cavatina' ),
);

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'projects', 'cavatina' ),
        'description'         => __( 'Project news and reviews', 'cavatina' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type( 'projects', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'cavatina_projects', 0 );



/**
 * change submit button text in WordPress comment form
 */
function cavatina_change_submit_button_text( $defaults ) {
    $defaults['label_submit'] = 'Send';
    return $defaults;
}
add_filter( 'comment_form_defaults', 'cavatina_change_submit_button_text' );



/**
 * change comment date format
 */
function cavatina_change_comment_date_format( $d ) {
    $d = date("F j.Y");
    return $d;
}
add_filter( 'get_comment_date', 'cavatina_change_comment_date_format' );

/**
 * count number of posts in a page
 */
function cavatina_total_posts() {
	$total = wp_count_posts()->publish;
	echo  esc_html($total);
}

/**
 * count number of posts in a page
 */
function cavatina_post_type_name() {
	echo esc_html( get_post_type( get_the_ID() ));
}

/**
 * count number of posts types (project) in a page
 */
function cavatina_total_post_types() {
	printf(esc_html($count_posts = wp_count_posts( 'projects' )->publish));
}


/**
 * Change comment form textarea placeholder
 */
function cavatina_change_textarea_placeholder( $args ) {
	$args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="Your Comment*"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'cavatina_change_textarea_placeholder' );

/**
 * change Comment Form Fields Placeholder
 *
 */
function cavatina_comments_placeholders( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'cavatina_comments_placeholders' );



/**
 * change excerpt length
 */
function cavatina_custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'cavatina_custom_excerpt_length', 999 );


/**
 * Add numerical pagination
 */

$args = array(
    'base'               => '%_%',
    'format'             => '?paged=%#%',
    'total'              => 1,
    'current'            => 0,
    'show_all'           => false,
    'end_size'           => 1,
    'mid_size'           => 2,
    'add_args'           => false,
    'add_fragment'       => '',
    'before_page_number' => '',
    'after_page_number'  => '');


/**
 * Enable Dashicons
 */
function cavatina_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'cavatina_dashicons', 999);


/**
 * Auto increment number per posts ( in pages like archives... )
 */
function cavatina_get_post_number(){
    global $wp_query;
    $posts_per_page = get_option('posts_per_page');
    $paged          = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $offset         = ($paged - 1) * $posts_per_page;
    $loop           = $wp_query->current_post + 1;
    return $offset + $loop;
}


/**
 * Handle Description
 */
function cavatina_handle_description(){
    echo '<span class="c-header__text">'. esc_html(get_bloginfo('description')) .'</span>';
}


/**
 *Add your custom logo to the login page
 */
function cavatina_filter_login_head() {

    if ( has_custom_logo() ) :

        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
<style type="text/css">
.login h1 a {
    background-image: url(<?php echo esc_url($image[0]);
    ?>);
    -webkit-background-size: <?php echo absint($image[1]) ?>px;
    background-size: <?php echo absint($image[1]) ?>px;
    height: <?php echo absint($image[2]) ?>px;
    width: <?php echo absint($image[1]) ?>px;
}
</style>
<?php
    endif;
}

add_action( 'login_head', 'cavatina_filter_login_head', 100 );


/**
 *	Load More
 */
function my_load_more_scripts() {
 
	global $wp_query; 
	wp_enqueue_script('jquery');
	
	wp_localize_script( 'cavatina-main-scripts', 'loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', 
		'posts' => json_encode( $wp_query->query_vars ), 
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 	wp_enqueue_script( 'cavatina-main-scripts' );
}
add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );


/* Handle Load more loop  */
function loadmore_ajax_handler(){
	
	$argsquery = filter_input( INPUT_POST, 'query', FILTER_SANITIZE_STRING );

	if ( !empty( $_POST['query'] ||  $_POST['page'] )) {
		
		$args = json_decode( sanitize_text_field( wp_unslash( $_POST['query'] ) ) , true );
		$args['paged'] = sanitize_text_field( wp_unslash( $_POST['page'] )) + 1; 
		$args['post_status'] = 'publish';
		
		query_posts( $args );

		if( have_posts() ) :

			// run the loop
			while( have_posts() ) : the_post();
			
			get_template_part( 'template-parts/content', 'project' );
			
			endwhile;

		endif;
		die; 
	}
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


/**
 * Gallery meta box 
 */
function gallery_metabox_enqueue($hook) {
    if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
      wp_enqueue_script('gallery-metabox', get_template_directory_uri() . '/assets/js/gallery-metabox.js', array('jquery', 'jquery-ui-sortable'));
      wp_enqueue_style('gallery-metabox', get_template_directory_uri() . '/assets/css/metabox.css');
    }
}
add_action('admin_enqueue_scripts', 'gallery_metabox_enqueue');

/* Add Gallery meta box */
function add_gallery_metabox($post_type) {
	$types = array('projects');
	
    if (in_array($post_type, $types)) {
      add_meta_box(
        'gallery-metabox',
        'Gallery',
        'gallery_meta_callback',
        $post_type,
        'normal',
        'high'
      );
    }
  }
add_action('add_meta_boxes', 'add_gallery_metabox');