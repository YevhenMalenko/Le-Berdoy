<?php
/**
 * Template part for displaying testimonials
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */


$testimonials_list = get_sub_field('testimonials_list');
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
$padding_classes = " pt-{$padding_top} pb-{$padding_bottom}";


/* Check if anchor fields exist */
$html_anchor = get_sub_field('anchor');
$section_anchor = $html_anchor ? 'id="' .$html_anchor .'"' : null;




if ( $testimonials_list ) : ?>
    <div class="testimonials<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="container">
            <div class="testimonials-slider">
            <?php foreach( $testimonials_list as $post ):  
                setup_postdata($post); ?>

                <div class="testimonial">
                    <div class="testimonial__text">
                        <?php the_content() ?>                           
                    </div>
                    <div class="testimonial__author">
                        <?php the_title() ?>
                    </div>
                </div>
        
            <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_postdata();
?>
