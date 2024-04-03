<?php 

$location = get_field('location');
$description = get_field('description');
$features = get_field('features');
$url = get_field('location_url');
$button_text = get_field('button_text');
?>

<div class="house-teaser wow animate__animated animate__fadeInUp">
    <div class="house-teaser-image">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="house-teaser-content">
        <?php if ($location) : ?>
            <p class="house-teaser__location">
                <?php echo $location; ?>
            </p>
        <?php endif; ?>
        <h3 class="house-teaser__title">
            <?php the_title() ?>
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
        endif ?>
        <?php if ($description) : ?>
            <p class="house-teaser__description">
                <?php echo $description; ?>
            </p>
        <?php endif; ?>
        

        <?php if ($url) : ?>
            <a class="button button-default" href="<?php echo esc_url($url); ?>" target="_blank">
                <?php echo $button_text; ?>
            </a>
        <?php endif; ?>
    </div>

</div>