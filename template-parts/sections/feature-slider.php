<?php
/**
 * Template part for displaying Feature Slider Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */




$margin_top = get_sub_field('margin_top');
$margin_bottom = get_sub_field('margin_bottom');
$margin_classes = " mt-{$margin_top} mb-{$margin_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;
?>


<?php if( have_rows('slider') ): ?>
    <section class="feature-slider-section<?php echo $margin_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="feature-slider">
            <?php while ( have_rows( 'slider' ) ) : the_row(); ?>
                <?php 
                $image = get_sub_field('image');
                $description = get_sub_field('description');
                $add_overlay = get_sub_field('add_overlay');
                $overlay_color = get_sub_field('overlay_background_color');
                $overlay_styles = $overlay_color ? 'style="background-color: '. $overlay_color .'"' : '';

                if( !empty( $image ) ): ?>
                    <div class="feature-slide" style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                    <?php if ($add_overlay) { ?>
                        <div class="overlay" <?php echo $overlay_styles; ?>></div>
                    <?php } ?>
                    <?php if ($description) { ?>
                        <div class="feature-slide-description">
                            <h2><?php echo $description; ?></h2>
                        </div>
                    <?php } ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <button class="slick-round-angle round-angle-prev" type="button" title="prev slide">
            <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="30px" viewBox="0 0 608 1280"><path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
        </button>
        <button class="slick-round-angle round-angle-next" type="button" title="next slide">
            <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="30px" viewBox="0 0 608 1280"><g transform="translate(608 0) scale(-1 1)"><path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></g></svg>
        </button>
    </section>
<?php endif; ?>

