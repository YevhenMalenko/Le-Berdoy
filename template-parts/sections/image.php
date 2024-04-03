<?php
/**
 * Template part for displaying Image section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$images = get_sub_field('image');
$image_size = get_sub_field('image_size');

$subtitle = get_sub_field('subtitle');

$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;


if( $images ): 
    $count = count($images); ?>
    <div class="image-section <?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="image-row <?php echo $image_size; ?> show-<?php echo $count; ?>">
        <?php foreach( $images as $image_id ): ?>
            
            <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
            
        <?php endforeach; ?>
        </div>
        <?php if ($subtitle): ?>
            <div class="image-subtitles">
                <?php echo $subtitle; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>