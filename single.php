<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BWS_Hotels
 */

get_header();
?>

	<main class="main-content">
		<?php
		if( get_field('show_hero') ) {
			get_template_part( 'template-parts/hero');
		} ?>
		<div class="content-wrapper">
			<div class="content-single wow animate__animated animate__fadeInLeft">
				<?php
				while ( have_posts() ) :
					the_post();

					the_content();

				endwhile; // End of the loop.
				?>
			</div>
			<?php
			get_sidebar();
			?>
			
		</div>

		<?php 
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'bws-hotels' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'bws-hotels' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
		?>
		

	</main>



<?php
get_footer();
