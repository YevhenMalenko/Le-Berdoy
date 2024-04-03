<?php
/**
 * Template part for displaying CTA Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$ctaBg = get_sub_field('cta_background');

$margin_top = get_sub_field('margin_top');
$margin_bottom = get_sub_field('margin_bottom');
$margin_classes = " mt-{$margin_top} mb-{$margin_bottom}";
?>

<section 
    class="banner wow animate__animated animate__fadeInUp<?php echo $margin_classes; ?>" 
    style="background-image: url(<?php echo esc_url($ctaBg['url']); ?>);"
    <?php echo $section_anchor; ?>>
    <div class="overlay"></div>
    <div class="banner__content">
        <h2 class="banner__title h2-title">
            <?php the_sub_field('cta_text'); ?>
        </h2>
        <?php $link = get_sub_field('cta_button');
        if( $link ):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a 
                class="button button-light" 
                href="<?php echo esc_url( $link_url ); ?>" 
                target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo esc_html( $link_title ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
