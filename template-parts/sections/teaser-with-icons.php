<?php
/**
 * Template part for displaying Teaser With Icons Section
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
    <div class="teaser-icons<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="container">
            <div class="teaser-icons-list">
            <?php while( have_rows('teasers') ): the_row(); 
                $color_theme = get_sub_field('color_theme');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $icon = get_sub_field('icon');
                $link = get_sub_field('link');
                $link_class = $link ? ' has-link' : ''; 
                ?>
                <div class="teaser-item wow animate__animated animate__fadeInUp theme-<?php echo $color_theme; echo $link_class; ?>">
                    <?php if( $link ): 
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="teaser-item__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"></a>
                    <?php endif; ?>
                    
                    <div class="teaser-item__icon">
                        <?php if( !empty( $icon ) ): ?>
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="teaser-item__info">
                        <?php if ($title) { ?>
                            <h4 class="teaser-item__title">
                                <?php echo $title; ?>
                            </h4>
                        <?php } ?>
                        <?php if ($description) { ?>
                            <div class="teaser-item__description">
                                <?php echo $description; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>


    

