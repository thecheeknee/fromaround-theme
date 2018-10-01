<?php
/**
 * Template Name: special article
 * Template Post Type: post
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
    <div class="page-wrapper full-width rel-div div-center">
        <nav class="no-shadow white">
            <div class="full-width">
                <ul class="brdcrumb">
                    <li>
                        <a href="<?php echo get_site_url(); ?>" class="grey-text tiny">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url() . '/category/' . $category->slug; ?>" class="grey-text tiny"><?php echo $category->name; ?></a>
                    </li>
                    <li>
                        <a class="black-text tiny"><span class="hide-on-med-and-down"><?php the_title(); ?></span><span class="show-on-med-and-down hide-on-large-only">Post</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <img src="<?php echo $post_image; ?>" class="hide-on-load" id="loaderImg">
    <div class="clearfix">&nbsp;</div>
    <div class="article-wrapper">
        <div class="post-content margin-top center-align grey-text text-darken-4">
            <div class="scrollblock text-wrapper">
                <div class="center mgblock page-wrapper div-center">
                    <div class="row full-width">
                        <div class="col s12 m4">
                            <h1 class="thicker no-margin left-align"><?php the_title(); ?></h1>
                            <div id="textbyBlock" class="left-align"></div>
                            <p class="black-text uppercase left-align"><i class="material-icons">access_time</i> <?php echo get_the_date( 'M j Y' ); ?></p>
                        </div>
                        <div class="col s12 m8">
                            <div class="justify-align" id="introsection"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-wrapper full-width rel-div div-center">
                <div class="row">
                    <div class="col l8 s12 shift-left">
                        <h2 class="uppercase special thicker left-align no-margin"><?php the_subtitle(); ?></h2>
                        <div class="clearfix">&nbsp;</div>
                        <div class="slider black" id="content_slider">
                            <ul class="slides">
                                <?php
                                    $attachments = get_attached_media( 'image' );
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
                        
                    </div>
                    <div class="col l4 s12 left-align shift-right">
                        <div class="full-width">
                        <?php
                            $attachments = get_attached_media( 'image' );
                            foreach($attachments as $attachment) {
                                if(strtolower($attachment->post_excerpt)=='artist'){
                                    echo '<figure class="no-margin">
                                            <img src="' .$attachment->guid. '" title="About the artist" alt="' .get_post_meta($attachment->ID , '_wp_attachment_image_alt', true). '" class="full-width">
                                        </figure>';
                                    echo '<p class="uppercase thicker left-align">About the artist</p>';
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
						<div class="spacer"></div>
                        <div class="scrollblock">
                            <div class="center mgblock page-wrapper div-center" id="blockWrapper">
                                <div class="center-align start-quote div-center clearfix"></div>
                                <div class="content container intro-block div-center"></div>
                                <div class="center-align end-quote div-center clearfix"></div>
                            </div>
                        </div>
						<div class="spacer"></div>
                        <div class="scrollblock">
                            <div class="mgblock container div-center">
                                <p>To find out more about the work we do, the artisans we collaborate with and the crafts and cultures we explore,<br>please email Warren Menezes at <a href="mailto:partners@fromaround.co.uk">partners@fromaround.co.uk</a> </p>
                            </div>
                        </div>
                        <div class="spacer"></div>
                        <div class="scrollblock">
                            <div class="center mgblock page-wrapper div-center">
                                <div class="content container div-center">
                                    <ul class="collapsible z-depth-0">
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons">filter_drama</i>References</div>
                                            <div class="collapsible-body" id="referencesBlock"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                            if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
                        ?>
                        <div class="spacer"></div>
                        <div class="scrollblock">
                            <div class="center mgblock page-wrapper div-center">
                                <h1 class="left-align black-text">Related Posts</h1>
                            <?php
                                echo do_shortcode( '[jetpack-related-posts]' );
                            ?>
                            </div>
                        </div>
                        <?php } ?>
                        
                        
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