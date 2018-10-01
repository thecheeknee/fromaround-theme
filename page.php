<?php
/**
 * Template Name: Default
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
    <!--img src="<?php echo $post_image; ?>" class="hide-on-load" id="loaderImg"-->
    <div class="clearfix">&nbsp;</div>
    <div class="article-wrapper">
        <div class="post-content margin-top center-align grey-text text-darken-4">
            <div class="scrollblock text-wrapper">
                <div class="center mgblock page-wrapper div-center">
                    <h1 class="center thicker"><?php the_title(); ?></h1>
					<div id="textbyBlock">
                    </div>
					<p class="black-text sentence center-align"><?php echo $category->slug; ?> | <i class="material-icons">access_time</i> <?php echo get_the_date( 'M j Y' ); ?></p>
                    <div class="container intropost-block div-center">
						<div class="justify-align" id="introsection"></div>
					</div>
                </div>
            </div>
            <div class="page-wrapper full-width rel-div div-center">
                <?php $attachments = get_attached_media( 'image' );
                if($attachments){ ?>
                <div class="row">
                    <div class="col l8 s12 shift-left">
                        <h2 class="uppercase special thicker left-align no-margin"><?php the_subtitle(); ?></h2>
                        <div class="clearfix">&nbsp;</div>
                        <div class="slider black" id="content_slider">
                            <ul class="slides">
                                <?php
                                    $counter = 0;
                                    foreach($attachments as $attachment) {
                                        if(strtolower($attachment->post_excerpt)=='artist' || strtolower($attachment->post_content)=='inline'){
                                            continue;
                                        }
                                        $counter++;
                                        echo '<li><img src="' .$attachment->guid . '" class="full-width" data-id="slide_' .$counter. '" '
                                            . 'title="' . $attachment->post_content . '">';
                                        echo '<div class="caption center-align" data-id="slide_'. $ctr .'">';
                                        echo '<p class="no-margin thicker black-text">' . $attachment->post_title . '</p>';
                                        echo '<p class="no-margin black-text">' . $attachment->post_content . '</p>';
                                        echo '</div>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="slider-control full-width rel-div">
                            <div class="row">
                                <div class="col s6 left-align">
                                    <a class="black-text btn-large white z-depth-0" id="slidePrev"><i class="material-icons">chevron_left</i></a>
                                </div>
                                <div class="col s6 right-align">
                                    <a class="black-text btn-large white z-depth-0" id="slideNext"><i class="material-icons">chevron_right</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 s12 left-align shift-right">
                        <div class="full-width">
                        <?php
                            foreach($attachments as $attachment) {
                                if(strtolower($attachment->post_excerpt)=='artist'){
                                    echo '<figure class="no-margin">
                                            <img src="' .$attachment->guid. '" title="About Us" alt="' .get_post_meta($attachment->ID , '_wp_attachment_image_alt', true). '" class="full-width">
                                        </figure>';
                                    echo '<p class="uppercase thicker left-align">About Us</p>';
                                    echo '<p class="left-align">' .$attachment->post_title. '</p>';
                                    echo '<p class="left-align">' .$attachment->post_content. '</p>';
                                } else {
                                    continue;
                                }
                            }
                        ?>
                        </div>
                        <div class="spacer"></div>
                    </div>
                </div>
                <?php } ?>
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
                            <div class="center mgblock page-wrapper div-center" id="blockWrapper">
                                <div class="center-align start-quote div-center clearfix"></div>
                                <div class="content container intro-block div-center"></div>
                                <div class="center-align end-quote div-center clearfix"></div>
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