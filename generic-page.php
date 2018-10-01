<?php
/**
 * Template Name: legal
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Fromaround
 * @since Fromaround 1.0
 */
 
get_header();
get_template_part( 'header-nav' ); ?>
<?php if( is_singular() ){
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            $cats = get_the_category(get_the_ID());
            $category = '';
            $exclude = 0;
            foreach($cats as $cat){
                if($cat->slug == 'featured'){
                    $exclude = $cat->cat_ID;
                    continue;
                }
                else{
                    $category = $cat;
                }
            }
            $post_image = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<article>
    <div class="clearfix">&nbsp;</div>
    <div class="article-wrapper">
        <div class="post-content margin-top center-align grey-text text-darken-4">
            <div class="scrollblock text-wrapper">
                <div class="center mgblock page-wrapper div-center">
                    <h1 class="center thicker"><?php the_title(); ?></h1>
					<div id="textbyBlock">
                    </div>
					<p class="black-text sentence center-align"><i class="material-icons">access_time</i> <?php echo get_the_date( 'M j, Y' ); ?></p>
                </div>
            </div>
            <div class="page-wrapper full-width rel-div div-center">
                <div class="row">
                    <div class="col s12">
                        <div class="scrollblock">
                            <div class="mgblock page-wrapper div-center">
                                <div class="content container intro-block div-center" id="postContent">
                                    <div class="justify-align full-width">
										<?php the_content(); ?>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="scrollblock">
                            <div class="center mgblock page-wrapper div-center" id="shareBlocks">
                                <div class="content container intro-block div-center">
                                    <?php
                                    if ( function_exists( 'sharing_display' ) ) {
                                        sharing_display( '', true );
                                    }
                                    
                                    if ( class_exists( 'Jetpack_Likes' ) ) {
                                        $custom_likes = new Jetpack_Likes;
                                        echo $custom_likes->post_likes( '' );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php get_template_part( 'contact-us-foot' ); ?>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
        </div>
    </div>
</article>
<?php
$prev_post = get_previous_post(false, $exclude);
if (!empty( $prev_post )): ?>
<div class="hide-on-med-and-down controls hidden fix-div prev half-height push-half" id="prev">
    <div class="left-align full-width">
        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="text-block black-text"><i class="material-icons">arrow_back</i></a>
    </div>
    <div class="nav-content white">
        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
            <p><i class="material-icons">arrow_back</i> Previous Post</p>
        </a>
    </div>
</div>
<div class="hide-on-large-only rel-div controls left-align black-text">
    <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
        <p><i class="material-icons">arrow_back</i> Previous Post</p>
    </a>
</div>
<?php endif; ?>
<?php
$next_post = get_next_post(false, $exclude);
if (!empty( $next_post )): ?>
<div class="hide-on-med-and-down controls hidden fix-div next half-height push-half" id="next">
    <div class="right-align full-width">
        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="text-block black-text"><i class="material-icons">arrow_forward</i></a>
    </div>
    <div class="nav-content white">
        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
            <p>Next Post <i class="material-icons">arrow_forward</i></p>
        </a>
    </div>
</div>
<div class="hide-on-large-only rel-div controls right-align black-text">
    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
        <p>Next Post <i class="material-icons">arrow_forward</i></p>
    </a>
</div>
<?php endif; ?>
<?php 
        endwhile;
    endif;
}?>
<?php get_footer(); ?>