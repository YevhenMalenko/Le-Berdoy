<?php
/**
 * Template part for displaying About Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

$section_title = get_sub_field('section_title');
$section_text = get_sub_field('section_text');
$link = get_sub_field('section_button');
$section_image = get_sub_field('section_image');
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$imageLocation = get_sub_field( 'image_location' );

$sectionClassName = 'about';
$animateClassContent = 'fadeInLeft';
$animateClassImage = 'fadeInRight';

if( $imageLocation == 'left' ) {
    $sectionClassName = 'about about_inverse';
    $animateClassContent = 'fadeInRight';
    $animateClassImage = 'fadeInLeft';
}

$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;

?>

<section class="<?php echo $sectionClassName; echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
    <div class="container">

        <div class="<?php echo 'about-content wow animate__animated animate__'. $animateClassContent; ?>">
            <div class="about-content__wrapper">
                <?php if ($section_title) { ?>
                    <h2 class="about__title h3-title">
                        <?php echo $section_title; ?>
                    </h2>
                <?php } ?>

                <?php if ($section_text) { ?>
                    <div class="about__text">
                        <?php echo $section_text; ?>
                    </div>
                <?php } ?>


                <?php if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a 
                        class="button button-default" 
                        href="<?php echo esc_url( $link_url ); ?>" 
                        target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if( !empty( $section_image ) ): ?>
        <img 
            class="<?php echo 'about__image wow animate__animated animate__'. $animateClassImage; ?>" 
            src="<?php echo esc_url($section_image['url']); ?>" 
            alt="<?php echo esc_attr($section_image['alt']); ?>" 
        >
        <?php endif; ?>

    </div>
</section>