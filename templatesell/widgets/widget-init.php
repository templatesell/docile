<?php

if ( ! function_exists( 'docile_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function docile_load_widgets() {

        // Recent Post.
        register_widget( 'Docile_Recent_Post_Sidebar' );

        // Author Widget.
        register_widget( 'Docile_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Docile_Social_Widget' );

        //Post Slider
        register_widget( 'Docile_Post_Slider' );

        //Tabbed Widget
        register_widget( 'Docile_Tabbed' );

        //Grid Widget
        register_widget( 'Docile_Post_Grid' );

        //Featured Widget
        register_widget( 'Docile_Featured_Post_Content');

        //Featured Widget Slider
        register_widget( 'Docile_Featured_Post_Slider');

        //Post Column Widget
        register_widget( 'Docile_Post_Column');

        //Post Column Widget
        register_widget( 'Docile_Latest_Post');
    }
endif;
add_action( 'widgets_init', 'docile_load_widgets' );


