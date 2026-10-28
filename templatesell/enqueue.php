<?php
/**
 * Enqueue scripts and styles.
 */
function docile_scripts() {

	/*google font  */
	global $docile_theme_options;
    /* Arimo, Heebo and Monsieur La Doulaise, served from the theme. */
    wp_enqueue_style( 'docile-fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', array(), DOCILE_VERSION );
    
	//*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/grid.css', array(), DOCILE_VERSION );
    
    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.8.0' );

   /*Main CSS*/
    wp_enqueue_style( 'docile-style', get_stylesheet_uri(), array(), DOCILE_VERSION );

	/*RTL CSS*/
	wp_style_add_data( 'docile-style', 'rtl', 'replace' );

    $docile_pagination_option =  esc_attr($docile_theme_options['docile-pagination-options']);
    
    if( 'ajax' == $docile_pagination_option )  {
    	
    	wp_enqueue_script( 'docile-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), DOCILE_VERSION, true );
    }

	wp_enqueue_script( 'docile-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.8.0', true  );
    
    $offcanvas =  absint($docile_theme_options['docile_enable_offcanvas']);
    if( 1  == $offcanvas )  {
        wp_enqueue_script( 'offcanvas-custom', get_template_directory_uri() . '/assets/js/canvas-custom.js', array('jquery'), DOCILE_VERSION, true );
    }
    /*marquee Scripts*/
    wp_enqueue_script( 'docile-marquee', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );
    
    
    /*Custom Script JS*/
	wp_enqueue_script( 'docile-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20200412', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'docile-custom', get_template_directory_uri() . '/assets/js/jquery.marquee.min.js', array(), '20200412', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'docile-custom', 'docile_ajax', array(
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'paged'     => absint($paged),
        'max_num_pages'      => absint($max_num_pages),
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'View More', 'docile' ),
        'no_more_posts'        => __( 'No More', 'docile' ),
    ));

	wp_enqueue_script( 'docile-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $docile_theme_options;
	if( 1 == absint($docile_theme_options['docile-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'docile-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'docile_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function docile_block_styles() {
    wp_enqueue_style( 'docile-fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', array(), DOCILE_VERSION );
    wp_enqueue_style( 'docile-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ), array( 'docile-fonts' ), DOCILE_VERSION );
}

add_action( 'enqueue_block_editor_assets', 'docile_block_styles' );

