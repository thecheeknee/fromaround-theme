<?php /* Template Name: Featured-Content */ ?>
<img src="https://loremflickr.com/1200/900/fashion" class="hide-on-load" id="loaderImg">
<div class="full-width innerwrapper">
<?php 
$args = array(
    'category_name' => 'featured',
    'post_type' => 'post',
    'posts_per_page'=> 4
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
    $featured_counter = 1;
?>
    <div class="carousel-wrapper full-width carousel-height" id="herosliderwrapper">
        <div class="abs-div show-on-medium-and-down white-text" id="swipeblock">
            <span><i class="material-icons white-text">arrow_forward</i> Swipe to slide</span>
        </div>
        <div class="carousel carousel-height carousel-slider" id="heroslider">
            <?php
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
            ?>
            <div class="carousel-item black" href="#<?php echo $featured_counter; ?>!" data-counter="<?php echo $featured_counter; ?>">
                <div class="valign-wrapper full-width carousel-height">
                    <div class="text-content caption center-align white-text">
                        <h2 class="white-text uppercase wide thicker"><?php the_title(); ?></h2>
                        <div class="divider grey"><div class="track white"></div></div>
                        <a href="<?php the_permalink(); ?>" class="btn-flat spacing text-block white-text uppercase">read more</a>
                    </div>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/transparent.png" class="full-width carousel-height" style="background-image:url(<?php echo $featured_img_url; ?>);">
            </div>
            <?php 
                    $featured_counter++;
                    }
            ?>
        </div>
    </div>
</div>
<?php
}
wp_reset_postdata();
?>