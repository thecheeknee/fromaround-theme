<?php get_header(); ?>
<?php get_template_part( 'header-nav' ); ?>
<!-- add condition to check if front page. Else show post content -->
<?php if( is_home() && !is_front_page() ){ 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); ?>

<?php
        endwhile;
    endif;
} 
?>
<!-- call site footer -->
<?php get_footer(); ?>
