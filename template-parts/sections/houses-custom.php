<?php
/**
 * Template part for displaying Houses section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

$houses_list = get_sub_field('houses_list');
$type = get_sub_field('type');
$teasers_position = get_sub_field('teasers_position');

$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;


if( have_rows('houses_list') ): ?>
    <section class="houses <?php echo $type; ?>" <?php echo $section_anchor; ?>>
        <?php 
        $houses_num = count($houses_list);
        $odd_class = $houses_num % 2 === 0 ? ' odd' : '';
        ?>

        <div class="houses-wrapper<?php echo $padding_classes; ?>">
            <div class="houses-list <?php echo $teasers_position; echo $odd_class; ?>">
                <?php while( have_rows('houses_list') ) : the_row();
                    $image = get_sub_field('image');
                    $location = get_sub_field('location');
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $features = get_sub_field('features');
                    $link = get_sub_field('link');
                    ?>

                    <div class="house-teaser wow animate__animated animate__fadeInUp">
                        <div class="house-teaser-image">
                        <?php if( $image ) {
                            echo wp_get_attachment_image( $image, 'full' );
                        } ?>
                        </div>
                        <div class="house-teaser-content">
                            <?php if ($location) : ?>
                                <p class="house-teaser__location">
                                    <?php echo $location; ?>
                                </p>
                            <?php endif; ?>
                            <h3 class="house-teaser__title">
                                <?php echo $title; ?>
                            </h3>
                            <?php if( $features ) :
                                echo '<ul class="house-teaser__features">';
                                foreach( $features as $feature ) {
                                    $feature_text = $feature['feature'];
                                    echo '<li>';
                                        echo $feature_text;
                                    echo '</li>';
                                }
                                echo '</ul>';
                            endif; ?>
                            <?php if ($description) : ?>
                                <p class="house-teaser__description">
                                    <?php echo $description; ?>
                                </p>
                            <?php endif; ?>

                            <?php if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button button-default" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>

                    </div>

            
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
