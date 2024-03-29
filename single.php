<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Docile
 */
get_header();
?>
<section id="content" class="site-content posts-container">
    <div class="container">
        <div class="row">
        	<div class="col-lg-12">
				<div class="breadcrumbs-wrap">
					<?php 
					// Breadcrumb hook
					do_action('docile_breadcrumb_options_hook'); ?> 
				</div>
			</div>
		</div>
		<div class="row">
			<div id="primary" class="col-lg-8 col-md-8 col-sm-12 content-area">
				<main id="main" class="site-main">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'single' );
						
						// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;						   
			            endwhile; // End of the loop.
			        ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<aside id="secondary" class="col-lg-4 col-md-4 col-sm-12 widget-area side-right">
				<?php get_sidebar(); ?>
			</aside><!-- #secondary -->
		</div>
	</div>
</section>
<?php  get_footer();

