<?php
/**
 * The template for displaying all pages
 *
 * @package WordPress
 * @subpackage Fromaround
 * @since Fromaround 1.0
 */
 
get_header();
get_template_part( 'header-nav' ); ?>
<?php if( is_page() ){
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
?>
<article>
    <nav class="no-shadow white">
        <div class="nav-wrapper white">
            <div class="col s12">
                <a href="<?php echo get_site_url(); ?>" class="breadcrumb">Home</a>
                <a href="<?php echo get_site_url() . '/category/' . $category->slug; ?>" class="breadcrumb"><?php echo $category->name; ?></a>
                <a class="breadcrumb"><?php the_title(); ?></a>
            </div>
        </div>
    </nav>
    <div class="spacer"></div>
    <header>
        <h1 class="center-align thicker wide uppercase"><?php the_title(); ?></h1>
    </header>
    <div class="spacer"></div>
    <div class="article-wrapper scrollblock page-container div-center">
        <div class="post-content mgblock margin-top container intro-block div-center grey-text text-darken-4">
            <div class="justify-align">
				<?php the_content(); ?>
			</div>
        </div>
    </div>
    <div class="spacer"></div>
    <div class="spacer"></div>
</article>
<?php 
        endwhile;
    endif;
}?>
<?php get_footer(); ?>