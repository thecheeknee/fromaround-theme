<?php get_header(); ?>
<?php get_template_part( 'header-nav' ); ?>
<section>
    <div class="full-width screen-height">
        <?php get_template_part( 'homepage-header' ); ?>
    </div>
</section>
<div class="spacer"></div>
<section>
    <div class="full-width screen-height valign-wrapper">
        <?php
            $args = array(
                'name' => 'about',
                'post_type' => 'page'
            );
            $about_page = get_posts( $args );
            if ( $about_page ) {
        ?>
        <article class="full-width scrollblock">
            <div class="page-wrapper full-width rel-div div-center">
                <div class="full-width center-align">
                    <header>
                        <h3 class="uppercase"><?php echo $about_page[0]->post_title; ?></h3>
                        <div class="underline">
                            <span class="expand"></span>
                        </div>
                    </header>
                </div>
                <div class="container intro-block mgblock margin-top">
                    <p><?php echo $about_page[0]->post_excerpt; ?></p>
                </div>
                <div class="full-width center-align">
                    <a href="<?php echo get_site_url() . '/' . $args['name']; ?>" class="btn-flat border uppercase">Read More</a>
                </div>
            </div>
        </article>
        <?php
            }
        ?>
    </div>
</section>
<div class="spacer"></div>
<?php get_template_part( 'wrapper-category' ); ?>
<div class="spacer"></div>
<?php get_footer(); ?>