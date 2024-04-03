<?php
/**
 * Template part for displaying Image section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$form_id = get_sub_field('contact_form');


$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;
?>


<?php if ($form_id) : ?>
    <div class="contact-form<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
        <?php echo do_shortcode( '[contact-form-7 id="'.$form_id.'"]' ); ?>
    </div>
<?php endif; ?>