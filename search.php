<?php
/*
Template Name: Search Page
*/
get_header();
get_template_part( 'header-nav' );

?>
<div class="cleared">&nbsp;</div>
    <section class="full-width full-height">
        <header class="scrollblock">
            <h4 id="searchterm">You Searched For: <strong><?php echo get_search_query(); ?></strong></h4>
        </header>
        <div class="cleared">&nbsp;</div>
        <div class="search-results scrollblock">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="container result-item mgblock margin-top">
    <article>
        <div class="card horizontal black full-width hide-on-small-only">
            <div class="card-image waves-effect waves-block waves-light">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">
            </div>
            <div class="card-stacked white">
                <div class="card-content white">
                    <h4 class="grey-text text-darken-4"><?php the_title(); ?></h4>
                    <div class="cleared">&nbsp;</div>
                    <p><?php the_excerpt(); ?></p>
                    <div class="cleared">&nbsp;</div>
                </div>
                <div class="card-action">
                    <a href="<?php the_permalink(); ?>" class="black-text btn-flat">Go to Post</a>
                </div>
            </div>
        </div>
        <div class="card black full-width hide-on-med-and-up">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>">
                <span class="card-title"><?php the_title(); ?></span>
            </div>
            <div class="card-content white hide-on-med-and-up">
                <p><?php the_excerpt(); ?></p>
            </div>
            <div class="card-action white">
                <a href="<?php the_permalink(); ?>" class="black-text btn-flat">Go to Post</a>
            </div>
        </div>
    </article>
</div>
<?php endwhile; ?>
<?php else : ?>
    <?php get_template_part( '404','searchfailed' ); ?>
<?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>