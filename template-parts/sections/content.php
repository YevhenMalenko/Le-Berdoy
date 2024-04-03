<?php
/**
 * Template part for displaying Content section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$type = get_sub_field('type');
$title = get_sub_field('title');

$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;

?>

<section class="content <?php echo $type; echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
    <?php if ( $title ) : ?>
        <h2 class="content__title">
            <?php echo $title; ?>
        </h2>
    <?php endif; ?>

    <?php if ( $type === 'one-column' ) : 
        $content = get_sub_field('content'); ?>
        <div class="content-wrapper">
            <?php echo $content; ?>
        </div>
    <?php elseif ( $type === 'two-column' ): 
        $left_column = get_sub_field('left_column');
        $right_column = get_sub_field('right_column');
        ?>
        <div class="content-wrapper">
            <div class="content-column">
                <?php echo $left_column; ?>
            </div>
            <div class="content-column">
                <?php echo $right_column; ?>
            </div>
        </div>
    <?php elseif ( $type === 'box' ):
        $box_title = get_sub_field('box_title');
        $box_content = get_sub_field('box_content'); ?>
        <div class="info-box">
            <h4 class="info-box__title">
                <?php echo $box_title; ?>
            </h4>
            <div class="info-box__content">
                <?php echo $box_content; ?>
            </div>
        </div>
    <?php elseif ( $type === 'left-text' ):
        $content = get_sub_field('content'); 
        $box_title = get_sub_field('box_title');
        $box_content = get_sub_field('box_content');
        ?>
        <div class="content-wrapper">
            <div class="left-column">
                <?php echo $content; ?>
            </div>
            <div class="right-column">
            <div class="info-box">
                <h4 class="info-box__title">
                    <?php echo $box_title; ?>
                </h4>
                <div class="info-box__content">
                    <?php echo $box_content; ?>
                </div>
            </div>
            </div>
        </div>
    <?php endif; ?>
    
</section>