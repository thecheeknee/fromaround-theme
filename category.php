<?php
/**
 * The template for displaying all category pages
 *
 * @package WordPress
 * @subpackage Fromaround
 * @since Fromaround 1.0
 */
 
get_header();
get_template_part( 'header-nav' ); ?>
<?php if( is_category() ){
    $featured_image = '';
    $cat_terms = get_term( get_query_var('cat'), 'category' ); 
    $args = array ( 'category_name' => $cat_terms->slug, 'orderby' => 'rand', 'posts_per_page' => '1', 'posts_type' => 'post' );
    $the_query = new WP_Query($args);
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $featured_image = get_the_post_thumbnail_url(get_the_ID(),'full');?>
    <?php
    endwhile;
    wp_reset_postdata();
?>
<section>
    <img src="<?php echo $featured_image; ?>" class="hide-on-load" id="loaderImg">
    <div class="page-wrapper full-width rel-div div-center">
        <div class="full-width valign-wrapper header-height grey rel-div">
            <div class="full-width abs-div header-height scrollspace" style="background-image: url(<?php echo $featured_image; ?>);"></div>
            <div class="full-width valign-wrapper header-height content-block abs-div">
                <article class="rel-div full-width">
                    <header>
                        <h1 class="white-text uppercase full-width center-align thicker no-margin wide larger"><?php single_cat_title(); ?></h1>
                    </header>
                </article>
            </div>
        </div>
    </div>
</section>
<div class="spacer"></div>
<section class="page-wrapper full-width rel-div div-center full-height">
    <div class="scrollblock">
        <header>
            <div class="center-align container intro-block mgblock margin-top black-text">
                <span class="special"></span>
                <?php echo category_description(); ?>
                <span class="special"></span>
            </div>
        </header>
        <div class="spacer"></div>
    </div>
    <div class="row scrollblock">
        <?php 
            global $query_string;
            query_posts($query_string . '&posts_type=post&paged=1');
            if (have_posts()) : while ( have_posts() ) : the_post(); ?>
        <div class="col s12 m6 l4 mgblock margin-top margin-below">
            <article>
                <div class="card black full-width">
                    <div class="card-hover hide-on-med-and-down">
                        <span class="white-text full-width left-align"><?php the_title(); ?></span>
                        <div class="cleared"></div><a class="activator">Preview <i class="material-icons">expand_less</i></a><div class="cleared"></div>
                    </div>
                    <div class="card-image waves-effect waves-block waves-light">
                        <a href="<?php the_permalink(); ?>"><img class="full-width" src="<?php echo get_template_directory_uri(); ?>/img/transparent.png" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"></a>
                        <span class="card-title"><?php the_title(); ?></span>
                    </div>
                    <div class="card-content white hide-on-med-and-up">
                        <p><a class="btn-flat border activator">Preview Post</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php the_title(); ?><i class="material-icons right">close</i></span>
                        <?php 
                            $len = (strlen(get_the_excerpt())<200)?strlen(get_the_excerpt()):200;
                            $pos = ($len<200)?$len:strpos(get_the_excerpt(), ' ', $len);
                        ?>
                        <p><?php echo substr(get_the_excerpt(),0,$pos ) .' ...'; ?></p>
                        <p><a href="<?php the_permalink(); ?>" class="btn-flat border">Go to Post</a></p>
                    </div>
                </div>
            </article>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row scrollblock">
        <div class="col l2 s6"><?php next_posts_link( 'Older' ); ?></div>
        <div class="col l2 s6"><?php previous_posts_link( 'Newer' ); ?></div>
    </div>
    <?php else : ?>
    <?php _e('Sorry, no posts matched your criteria.'); ?>
    <?php endif; ?>
    </div>
</section>
<?php
}
?>
<div class="spacer"></div>
<?php get_footer(); ?>