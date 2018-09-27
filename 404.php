<?php
/*
Template Name: 404 Page
*/
get_header();
get_template_part( 'header-nav' );

?>
<div class="cleared">&nbsp;</div>
<section>
    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png" class="hide-on-load" id="loaderImg">
    <div class="full-width valign-wrapper screen-height scrollspace">
        <div class="content-block scrollblock">
            <article>
                <header>
                    <h4 class="white-text uppercase">Oops! We don't have that here!</h4>
                </header>
                <div class="white-text container mgblock margin-top">
                    <p>But that's not the end of it! If you feel we're missing something interesting, feel free to contact us and tell us about it!</p>
                </div>
                <div class="spacer"></div>
            </article>
        </div>
    </div>
</section>
<div class="cleared">&nbsp;</div>
<?php get_footer(); ?>