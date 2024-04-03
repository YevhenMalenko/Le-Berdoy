<?php
/**
 * Template part for displaying gallery section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

$images = get_sub_field('gallery_main');
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;

if( $images ): ?>
    <div class="gallery<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
    <?php foreach( $images as $image ): ?>
        <a class="gallery-item wow animate__animated animate__fadeInUp" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery">
            <img loading=lazy src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        </a>
    <?php endforeach; ?>
    </div>
<?php endif; ?>