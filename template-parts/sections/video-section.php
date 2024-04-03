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


<?php if( get_sub_field('video_link') ): ?>
    <div class="video-section<?php echo $padding_classes; ?>" <?php echo $section_anchor; ?>>
        <div class="container">
            <figure class="video-wrapper wow animate__animated animate__fadeInUp">
                <button class="play-btn"></button>
                <img class="poster" src="<?php the_sub_field('video_poster'); ?>">
                <video 
                    controls="" 
                    src="<?php the_sub_field('video_link'); ?>">
                </video>
            </figure>
        </div>
    </div>
<?php endif; ?>