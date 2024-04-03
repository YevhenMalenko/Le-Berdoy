<?php
/**
 * Template part for displaying Houses section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

$countries = get_sub_field('countries');
$type = get_sub_field('type');
$teasers_position = get_sub_field('teasers_position');
$show_separator = get_sub_field('show_separator');

$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";

/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;


if ( $countries ) : ?>
    <section class="houses <?php echo $type; ?>" <?php echo $section_anchor; ?>>
        <?php foreach( $countries as $country ): 
        
            $format = 'country_' . $country->term_id;
            $highlighting_colour = get_field('highlighting_colour', $format);
            $custom_colour = get_field('custom_colour', $format);
            $accent_colour = $highlighting_colour === 'custom' ? $custom_colour : $highlighting_colour;


            $args = array(
                'numberposts' => -1,
                'post_type'   => 'locations',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'country',
                        'field'    => 'slug',
                        'terms'    => $country->slug
                    )
                )
            );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) : 
                $houses_num = $query->found_posts;
                $odd_class = $houses_num % 2 === 0 ? ' odd' : '';

                ?>
                <style>
                    <?php echo '.houses-' .$country->slug.' .houses-title-wrapper::before'; ?> {
                        background-color: <?php echo $accent_colour; ?>;
                    }

                    <?php echo '.houses-' .$country->slug.' .button-default:hover'; ?> {
                        background-color: <?php echo $accent_colour; ?>;
                        border-color: <?php echo $accent_colour; ?>;
                    }

                    <?php echo '.houses-' .$country->slug.' .button-primary'; ?> {
                        background-color: <?php echo $accent_colour; ?>;
                        border-color: <?php echo $accent_colour; ?>;
                        color: #fff;
                    }

                    <?php echo '.houses-' .$country->slug.' .button-primary:hover'; ?> {
                        background-color: #fff;
                        border-color: #0D2E1A;
                        color: #0D2E1A;
                    }
                </style>
                <div class="houses-wrapper<?php echo $padding_classes; ?> houses-<?php echo $country->slug; ?>">

                    <?php if ($show_separator) : ?>
                        <div class="houses-title-wrapper">
                            <h2 class="houses-title">
                                <?php echo $country->name; ?>
                            </h2>
                        </div>
                    <?php endif; ?>
                    
                    <div class="houses-list <?php echo $teasers_position; echo $odd_class; ?>">

                        <?php while($query->have_posts()): 
                        
                            $query->the_post();

                            get_template_part( 'template-parts/content-house' );
                    
                        endwhile; ?>
                    </div>
                </div>
            <?php endif;
            wp_reset_query();

        endforeach; ?>
    </section>
<?php endif; ?>
