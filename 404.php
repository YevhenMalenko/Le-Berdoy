<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BWS_Hotels
 */

get_header();
?>

	<main class="main-content">
		<div class="error-404">
			<h1>404</h1>
			<h3><?php _e('Page not Found'); ?></h3>
			<div>
				<p><?php esc_html_e('Oops. Fail. The page cannot be found.' , 'bws-hotels'); ?></p>
				<p><?php esc_html_e('Please check your URL.', 'bws-hotels' ); ?></p>
			</div>
		</div>
	</main>

<?php
get_footer();
