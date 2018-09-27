<?php /* Template Name: wrapper-category */ ?>
<section class="full-width full-height">
    <header class="page-wrapper full-width rel-div div-center scrollblock">
        <h2 class="uppercase special thicker">DISCOVER</h2>
    </header>
    <div class="page-wrapper full-width rel-div div-center">
        <div class="row scrollblock">
            <?php
                $args = array(
                    'orderby' => 'ID',
                    'order'   => 'ASC'
                );
                $categories = get_categories($args);
                foreach ( $categories as $category ) {
                    if( $category->slug == 'featured' || $category->slug == 'uncategorized' ){continue;}
            ?>
            <div class="col s12 m6 l4 mgblock margin-top margin-below">
                <article>
                    <div class="card grey darken-4 full-width">
                        <div class="card-hover hide-on-med-and-down">
                            <span class="white-text full-width left-align uppercase thicker"><?php echo $category->cat_name; ?></span>
                            <div class="cleared"></div>
                            <a class="activator">Read More</a>
                            <a href="<?php echo get_site_url() . '/category/' . $category->slug; ?>">View Posts <i class="material-icons">chevron_right</i></a>
                            <div class="cleared"></div>
                        </div>
                        <div class="card-image waves-effect waves-block waves-light">
                            <?php
                                $the_query = new WP_Query( array ( 'category_name' => $category->slug, 'orderby' => 'rand', 'posts_per_page' => '1' ) );
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'square');?>
                                    <a href="<?php echo get_site_url() . '/category/' . $category->slug; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/transparent.png" class="activator category-img" style="background-image:url(<?php echo $featured_img_url; ?>);" /></a>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                            <span class="card-title uppercase thicker"><?php echo $category->cat_name; ?></span>
                        </div>
                        <div class="card-content white hide-on-large-only">
                            <p><a class="btn-flat activator border">Read More</a></p>
                        </div>
                        <div class="card-reveal">
                            <?php 
                                $len = strlen($category->category_description);
                                $pos = ($len<190)?$len:strpos($category->category_description, '<!--more-->', 0);
                            ?>
                            <span class="card-title grey-text text-darken-4 uppercase thicker"><?php echo $category->cat_name; ?><i class="material-icons right">close</i></span>
                            <p><?php echo substr($category->category_description,0,$pos ); ?></p>
                            <p><a href="<?php echo get_site_url() . '/category/' . $category->slug; ?>" class="btn-flat border">Show Posts</a></p>
                        </div>
                    </div>
                </article>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>