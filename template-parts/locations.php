<?php
/**
 * Template part for displaying rooms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

?>
    <div class="locations">
        <div class="locations-list">
        <?php
        $args = array(
            'numberposts' => -1,
            'post_type'   => 'Locations',
            'orderby'     => 'date',
            'order'       => 'DESC',
        );
        $loop = new WP_Query($args);
        
        while($loop->have_posts()): 
            $loop->the_post(); ?>

        <div class="location wow animate__animated animate__fadeInUp">
            <a class="location__link" href="<?php the_field('location_url'); ?>"></a>
            <div class="location__image">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </div>
            <div class="location__info">
                <h3 class="location__title">
                    <?php the_title() ?>
                </h3>
            </div>
        </div>
        
        <?php
        endwhile;
        wp_reset_query();
        ?>

        </div>
    </div>