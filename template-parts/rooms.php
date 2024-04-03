<?php
/**
 * Template part for displaying rooms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BWS_Hotels
 */

?>
    <div class="rooms">
        <div class="rooms-list">
        <?php
        $args = array(
            'numberposts' => -1,
            'post_type'   => 'Rooms',
            'orderby'     => 'date',
            'order'       => 'ASC',
        );
        $loop = new WP_Query($args);
        
        while($loop->have_posts()): 
            $loop->the_post(); ?>

        <div class="room">
            <a class="room__link" href="<?php the_permalink() ?>"></a>
            <div class="overlay"></div>
            <img class="room__image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <div class="room__info">
                <h3 class="room__title">
                    <?php the_title() ?>
                </h3>
                <a href="<?php the_permalink() ?>" class="button-link">
                    <?php esc_html_e( 'Read more', 'bws-hotels' ) ?>
                </a>
            </div>
        </div>
        
        <?php
        endwhile;
        wp_reset_query();
        ?>

        </div>
    </div>