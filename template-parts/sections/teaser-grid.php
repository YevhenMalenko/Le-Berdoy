<?php
/**
 * Template part for displaying Teaser Grid Section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;
?>

<?php if( have_rows('teasers') ): ?>
    <div class="teaser-grid<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="container">
            <div class="teasers-list">
            <?php while( have_rows('teasers') ): the_row(); 
                $title = get_sub_field('title');
                $image = get_sub_field('image');
                $link = get_sub_field('link');;
                ?>
                <div class="teaser wow animate__animated animate__fadeInUp">
                    <?php if( $link ): 
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="teaser__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"></a>
                    <?php endif; ?>
                    
                    <div class="teaser__image">
                        <?php if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="teaser__info">
                        <?php if ($title) { ?>
                            <h4 class="teaser__title">
                                <?php echo $title; ?>
                            </h4>
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>


    

