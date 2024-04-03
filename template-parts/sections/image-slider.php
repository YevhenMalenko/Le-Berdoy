<?php
/**
 * Template part for displaying Image Slider Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$slides = get_sub_field('slider');

$margin_top = get_sub_field('margin_top');
$margin_bottom = get_sub_field('margin_bottom');
$margin_classes = " mt-{$margin_top} mb-{$margin_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;


if( $slides ): ?>
    <div class="image-slider-section<?php echo $margin_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="image-slider" data-slider-count="<?php echo get_row_index(); ?>">
        <?php foreach( $slides as $slide ): ?>
            <a class="image-slide" href="<?php echo esc_url($slide['url']); ?>" data-fancybox="image-slider-gallery-<?php echo get_row_index(); ?>">
                <img loading=lazy src="<?php echo esc_url($slide['url']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />
            </a>
        <?php endforeach; ?>
        </div>
        <button class="image-slider-button image-slider-prev" type="button" title="prev slide">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="30px" viewBox="0 0 608 1280"><path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
            </span>
        </button>
        <button class="image-slider-button image-slider-next" type="button" title="next slide">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="30px" viewBox="0 0 608 1280"><g transform="translate(608 0) scale(-1 1)"><path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></g></svg>
            </span>
        </button>
    </div>
<?php endif; ?>
