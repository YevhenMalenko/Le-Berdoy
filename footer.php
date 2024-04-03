<?php
/**
 * The template for displaying the footer
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BWS_Hotels
 */

?>

<footer class="footer">
    <div class="footer-wrapper">
        <?php
        $image = get_field('footer_logo', 'option');
        if( $image ) : ?>
        <a class="footer__logo-img" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img 
                src="<?php echo esc_url($image['url']); ?>" 
                alt="<?php echo esc_attr($image['alt']); ?>" 
            >
        </a>
        <?php else : ?>
        <a class="footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
        </a>
        <?php endif; ?>

        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-footer',
            'menu_id'        => 'footer-menu',
            'container'       => 'nav',
            'container_class' => 'footer-menu',
            'menu_class'      => 'footer-menu__list', 
        ) );
        ?>
        <?php if ( get_field('footer_text', 'option') ) : ?>
        <div class="footer__text">
            <?php the_field('footer_text', 'option'); ?>
        </div>
        <?php endif; ?>
        <?php if ( has_nav_menu( 'menu-footer-bottom' ) ) :
            wp_nav_menu( array(
                'theme_location' => 'menu-footer-bottom',
                'menu_id'        => 'footer-menu-bottom',
                'container'       => 'nav',
                'container_class' => 'footer-menu-bottom',
                'menu_class'      => 'footer-menu-bottom__list', 
            ) );

        endif; ?>
    </div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
