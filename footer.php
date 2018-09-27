<?php wp_footer(); // Crucial core hook! ?>
<footer class="page-footer grey lighten-4" id="pagefooter">

    <div class="footer-wrapper page-wrapper full-width rel-div div-center">
        <div class="row">
            <div class="col l6 s12">
                <div class="row">
                    <div class="col l4 hide-on-med-and-down">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png" class="center responsive" id="footer-logo">
                    </div>
                    <div class="col m8 s12">
                        <?php
                            $args = array(
                                'name' => 'footer-content',
                                'post_type' => 'page'
                            );
                            $about_page = get_posts( $args );
                            if ( $about_page ) {
                        ?>
                            <p class="black-text tiny"><?php echo $about_page[0]->post_excerpt; ?></p>
                        <?php
                            }
                        ?>
                        <div class="clearfix">&nbsp;</div>
                        <ul id="social-media" class="full-width">
                            <li><a href="https://www.facebook.com/frmarnd/"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></a></li>
                            <li><a href="https://www.instagram.com/frmarnd/"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.png"></a></li>
                            <li><a href="https://www.youtube.com/channel/UCZ34-dvBnr90U9Bu-tdroCg?view_as=subscriber"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.png"></a></li>
                            <!-- <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/gmail.png"></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col l3 s12 hide-on-med-and-up">
                <div class="row">
                    <div class="full-width">&nbsp;</div>
                    <form class="col s12 black-text searchform" action="<?php echo get_site_url(); ?>" method="get" role="search">
                        <div class="input-field row">
                            <i class="material-icons prefix">search</i>
                            <input name="s" id="search" type="text" class="validate black-text" value="<?php the_search_query(); ?>">
                            <label for="search">Search</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col l2 s12">
                <h6 class="uppercase black-text">Latest Posts</h6>
                <ul class="posts-list">
                    <?php
                    $args = array(
                    'numberposts' => 4,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'suppress_filters' => true
                    );

                    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
                    foreach( $recent_posts as $recent ){
                    ?>
                        <li><a class="grey-text text-darken-3 tiny" href="<?php echo get_permalink($recent["ID"]); ?>"><?php echo $recent["post_title"]; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
			<div class="col l2 s12">
				<h6 class="uppercase black-text">Quick links</h6>
				<ul class="posts-list">
                    <li><a class="black-text tiny" href="#">Contact Us</a></li>
                    <li><a class="black-text tiny modal-trigger" href="#subscribeModal">Subscribe</a></li>
                    <li><a class="black-text tiny" href="https://fromaround.com/credits-licenses/">Licenses</a></li>
					<li><a class="black-text tiny" href="https://fromaround.com/privacy-policy/">Privacy Policy</a></li>
                </ul>
			</div>
            <div class="col l2 s12">
                <form class="col s12 hide-on-small-only searchform" action="<?php echo get_site_url(); ?>" method="get" role="search">
                    <div class="input-field row black-text">
                        <i class="material-icons prefix">search</i>
                        <input name="s" id="search" type="text" class="validate black-text" value="<?php the_search_query(); ?>">
                        <label for="search">Search</label>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
</footer>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/home-page.js"></script>
</body>
</html>