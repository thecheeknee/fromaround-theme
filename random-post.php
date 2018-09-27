<?php
    //Create WordPress Query with 'orderby' set to 'rand' (Random)
    $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '1' ) );
    // output the random post
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    Check out : 
    <?php the_title(); ?>
    <a href="<?php the_permalink(); ?>">View Post</a>
<?php
    endwhile;

    // Reset Post Data
    wp_reset_postdata();
?>