<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BWS_Hotels
 */

$highlighting_colour = get_field('highlighting_colour', 'option');
$custom_colour = get_field('custom_colour', 'option');

$accent_colour = $highlighting_colour === 'custom' ? $custom_colour : $highlighting_colour;
$encode_accent_colour = str_replace('#', '%23', $accent_colour);
$btn_text_color = $highlighting_colour === '#FFF523' ? '#0D2E1A' : '#FFFFFF';

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<style>
		:root {
			--accent-color: <?php echo $accent_colour; ?>; 
			--btn-text-color: <?php echo $btn_text_color; ?>; 
		}
		.testimonials-slider::before {
        	background-image: url("data:image/svg+xml,%3Csvg width='72' height='50' viewBox='0 0 72 50' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M55.4913 49.136C49.5153 49.136 45.1439 47.0887 42.3773 42.994C41.1599 41.334 40.1639 39.1207 39.3893 36.354C38.6146 33.5873 38.2273 30.544 38.2273 27.224C38.2273 21.4693 39.7213 16.1573 42.7093 11.288C45.6973 6.41866 50.0686 2.656 55.8233 0L57.3173 2.988C54.4399 4.316 51.8393 6.25266 49.5153 8.798C47.3019 11.2327 45.7526 13.8333 44.8672 16.6C44.3139 18.1493 44.0373 19.9753 44.0373 22.078C44.0373 23.738 44.1479 24.9553 44.3693 25.73C47.2466 22.2993 51.2859 20.584 56.4872 20.584C60.9139 20.584 64.4553 21.8567 67.1113 24.402C69.7673 26.8367 71.0953 30.3227 71.0953 34.86C71.0953 39.176 69.6566 42.662 66.7793 45.318C63.902 47.8633 60.1393 49.136 55.4913 49.136ZM17.3113 49.136C11.3353 49.136 6.96393 47.0887 4.19727 42.994C2.97993 41.334 1.98396 39.1207 1.20929 36.354C0.434623 33.5873 0.0473022 30.544 0.0473022 27.224C0.0473022 21.4693 1.5413 16.1573 4.5293 11.288C7.5173 6.41866 11.8886 2.656 17.6432 0L19.1373 2.988C16.2599 4.316 13.6593 6.25266 11.3353 8.798C9.12193 11.2327 7.57259 13.8333 6.68726 16.6C6.13392 18.1493 5.8573 19.9753 5.8573 22.078C5.8573 23.738 5.96794 24.9553 6.18927 25.73C9.0666 22.2993 13.1059 20.584 18.3073 20.584C22.7339 20.584 26.2753 21.8567 28.9313 24.402C31.5873 26.8367 32.9153 30.3227 32.9153 34.86C32.9153 39.176 31.4766 42.662 28.5993 45.318C25.722 47.8633 21.9593 49.136 17.3113 49.136Z' fill='<?php echo $encode_accent_colour; ?>'/%3E%3C/svg%3E%0A");
		}
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="header">
		<div class="header-wrapper">
			<?php
			if (get_custom_logo()) {
				the_custom_logo();
			} else {
			?>
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
			<?php } ?>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-main',
				'menu_id'        => 'primary',
				'container'       => 'nav',
				'container_class' => 'menu',
				'menu_class'      => 'menu__list', 
			) );
			?>
			<button class="menu-btn">
				<span></span>
			</button>
		</div>
		<div class="overlay-main"></div>
	</header>