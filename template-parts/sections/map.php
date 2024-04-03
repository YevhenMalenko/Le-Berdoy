<?php
/**
 * Template part for displaying Teaser Grid Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

$map_shortcode = get_sub_field('map_shortcode');
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;

?>

<?php if ($map_shortcode) { ?>
    <div class="map-section<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="container">
            <?php echo do_shortcode( $map_shortcode ); ?>
        </div>
    </div>
<?php } ?>