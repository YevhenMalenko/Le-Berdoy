<?php
/**
 * Template part for displaying Button section
 *
 * @button https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$button_type = get_sub_field('button_type');
$button_align = get_sub_field('button_align');
$button = get_sub_field('button');

$button_class = $button_type === 'primary' ? 'button-primary' : 'button-default';

$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

?>

<div class="button-wraapper text-<?php echo $button_align; echo $padding_classes; ?>">
    <div class="container">
    <?php if( $button ):
        $button_url = $button['url'];
        $button_title = $button['title'];
        $button_target = $button['target'] ? $button['target'] : '_self';
        ?>
        <a 
            class="button <?php echo $button_class; ?>" 
            href="<?php echo esc_url( $button_url ); ?>" 
            target="<?php echo esc_attr( $button_target ); ?>">
            <?php echo esc_html( $button_title ); ?>
        </a>
    <?php endif; ?>
    </div>
</div>