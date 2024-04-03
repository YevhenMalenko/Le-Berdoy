<?php
/**
 * Template part for displaying Teaser + Image Slider Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

$title = get_sub_field('title');
$text = get_sub_field('text');
$slides = get_sub_field('slider');
$slider_position = get_sub_field('slider_position');

$margin_top = get_sub_field('margin_top');
$margin_bottom = get_sub_field('margin_bottom');
$margin_classes = " mt-{$margin_top} mb-{$margin_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;

?>

<section class="teaser-slider-section <?php echo $margin_classes; ?>" <?php echo $section_anchor; ?>>
    <div class="container">
        <div class="teaser-slider-row slider-<?php echo $slider_position; ?>">
            <div class="content-col">
                <?php if ($title) { ?>
                    <h2 class="h3-title">
                        <?php echo $title; ?>
                    </h2>
                <?php } ?>

                <?php if( have_rows('info_line') ): ?>
                    <ul class="info-line">
                    <?php while( have_rows('info_line') ): the_row(); ?>
                        <li>
                            <?php the_sub_field('info_item'); ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($text) { ?>
                    <div class="text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>

            </div>
            <div class="slider-col">
                <?php if( $slides ): ?>
                    <div class="teaser-slider" data-slider-count="<?php echo get_row_index(); ?>">
                    <?php foreach( $slides as $slide ): ?>
                        <a class="teaser-slide" href="<?php echo esc_url($slide['url']); ?>" data-fancybox="image-teaser-gallery-<?php echo get_row_index(); ?>">
                            <img class="teaser-slide-image" loading=lazy src="<?php echo esc_url($slide['url']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />
                        </a>
                    <?php endforeach; ?>
                    </div>
                    <button class="slick-round-angle round-angle-prev" type="button" title="prev slide">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="30px" viewBox="0 0 608 1280"><path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
                    </button>
                    <button class="slick-round-angle round-angle-next" type="button" title="next slide">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="30px" viewBox="0 0 608 1280"><g transform="translate(608 0) scale(-1 1)"><path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></g></svg>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>