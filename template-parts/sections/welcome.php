<?php
/**
 * Template part for displaying Welcome (Intro) Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

$welcome_title = get_sub_field('welcome_title');
$welcome_text = get_sub_field('welcome_text');


$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;

?>

<section class="welcome<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
    <div class="container">
        <?php if ($welcome_title) { ?>
            <h2 class="h2-title wow animate__animated animate__fadeInUp">
                <?php echo $welcome_title; ?>
            </h2>
        <?php } ?>

        <?php if ($welcome_text) { ?>
            <div class="welcome__text wow animate__animated animate__fadeInUp">
                <?php echo $welcome_text; ?>
            </div>
        <?php } ?>

        <?php if( have_rows('welcome_gallery') ): ?>
            <div class="welcome-gallery">
                <?php while( have_rows('welcome_gallery') ): the_row(); ?>
                <div class="room wow animate__animated animate__fadeInUp">
                    <?php 
                    $link = get_sub_field('link');
                    if( $link ):
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a  class="room__link" 
                        href="<?php echo esc_url( $link_url ); ?>" 
                        target="<?php echo esc_attr( $link_target ); ?>">
                    </a>
                    <?php endif; ?>
                    <div class="overlay"></div>
                    <?php
                    $image = get_sub_field('image');
                    if( !empty( $image ) ): ?>
                    <img 
                        class="room__image" 
                        src="<?php echo esc_url($image['url']); ?>" 
                        alt="<?php echo esc_attr($image['alt']); ?>" 
                    >
                    <?php endif; ?>
                    <div class="room__info">
                        <h3 class="room__title">
                            <?php the_sub_field('title') ?>
                        </h3>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>