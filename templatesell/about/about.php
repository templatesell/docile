<?php
/**
 * Added docile Page.
*/

/**
 * Add a new page under Appearance
 */
function docile_menu() {
	add_menu_page( __( 'Docile Theme Options', 'docile' ), __( 'Docile Theme Options', 'docile' ), 'edit_theme_options', 'docile-theme', 'docile_page');
}
add_action( 'admin_menu', 'docile_menu');

/**
 * Enqueue styles for the help page.
 */
function docile_admin_scripts() {
	if(is_admin()){
		wp_enqueue_style( 'docile-admin-style', get_template_directory_uri() . '/templatesell/about/about.css', array(), '' );
 }
} 
add_action( 'admin_enqueue_scripts', 'docile_admin_scripts' );

/**
 * Add the theme page
 */
function docile_page() {
	?>
	<div class="das-wrap">
		<div class="docile-panel">
			<div class="docile-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/templatesell/about/images/docile-logo.png' ); ?>">
			</div>
			<a href="https://www.templatesell.com/item/docile-plus/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade Pro $59', 'docile' ); ?></a>
			<p>
			<?php esc_html_e( 'A perfect theme for news and magazine site. With grid layout, multiple custom widgets, demo importer, it is the best theme for you. It has multiple home page multiple blog page layout, this theme is the awesome and minimal theme.', 'docile' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'docile' ); ?></a>
		</div>

		<div class="docile-panel">
			<div class="docile-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'docile' ); ?></h3>
				</div>
				<a href="http://www.docs.templatesell.net/docile" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Documentation - Click Here', 'docile' ); ?></a>
			</div>
		</div>
		<div class="docile-panel">
			<div class="docile-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'docile' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/docile/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'docile' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
