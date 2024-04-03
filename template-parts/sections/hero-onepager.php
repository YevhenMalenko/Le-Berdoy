<?php
/**
 * Template part for displaying hero section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$show_booking_widget = get_sub_field('show_booking_widget');
$show_review_widget = get_sub_field('show_review_widget');
$has_dots_class = $show_booking_widget || $show_review_widget ? '' : ' has-dots';
$margin_bottom = get_sub_field('margin_bottom');
$margin_classes = " mb-{$margin_bottom}";
?>

<section class="hero<?php echo $margin_classes; ?>">
    <div class="hero-slider-wrapper">
        <div class="hero-slider<?php echo $has_dots_class; ?>">
            <?php while ( have_rows( 'hero_slider' ) ) : the_row(); ?>
                <?php 
                $headline = get_sub_field('headline');
                $subline = get_sub_field('subline');
                $button = get_sub_field('button');
                $image = get_sub_field('image');
                $add_overlay = get_sub_field('add_overlay');
                $overlay_color = get_sub_field('overlay_background_color');
                $overlay_styles = $overlay_color ? 'style="background-color: '. $overlay_color .'"' : '';

                if( !empty( $image ) ): ?>
                    <div class="hero-slide" style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                    <?php if ($add_overlay) { ?>
                        <div class="overlay" <?php echo $overlay_styles; ?>></div>
                    <?php } ?>
                        <div class="hero-content">
                            <?php if ($headline) { ?>
                                <h1 class="hero__title h1-title">
                                    <?php echo $headline; ?>
                                </h1>
                            <?php } ?>
                            <?php if ($subline) { ?>
                                <h2 class="hero__subtitle">
                                    <?php echo $subline; ?>
                                </h2>
                            <?php } ?>
                            <?php if( $button ) { 
                                $button_url = $button['url'];
                                $button_title = $button['title'];
                                $button_target = $button['target'] ? $button['target'] : '_self';
                                ?>
                                <a class="button button-light" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>">
                                    <?php echo esc_html( $button_title ); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
    <?php if( $show_review_widget ) { ?>
        <div class="reviews-widget">
            <?php echo do_shortcode( get_field('reviews_shortcode', 'option') ); ?>
        </div>
    <?php } ?>

    <?php if( $show_booking_widget ) { ?>
        <div class="booking-form">
            <?php echo do_shortcode( get_field('booking_shortcode', 'option') ); ?>
        </div>
    <?php } ?>

</section>