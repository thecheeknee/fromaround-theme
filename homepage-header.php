<div class="header-wrapper full-width expanded">
    <header>
        <div class="logo-wrapper left">
            <a href="#"><img class="responsive" src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png"></a>
        </div>
        <div class="page-wrapper full-width rel-div div-center">
            <div class="row no-margin" id="header-large">
                <div class="col l12 m12 s12 outerwrapper">
                <div class="logo-inner abs-div white">
                    <a href="#"><img class="responsive" src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png"></a>
                </div>
                    <div class="row no-margin header-nav">
                        <div class="col l12 right-align hide-on-med-and-down">
                            <a href="#subscribeModal" class="menu-item center-align uppercase modal-trigger">Subscribe</a>
                        </div>
                        <div class="line clearfix grey lighter-2 hide-on-med-and-down"></div>
                        <div class="col l12 right-align hide-on-med-and-down">
						<?php $menu_name = 'primary';
							$locations = get_nav_menu_locations();
							$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
							$menuitems = wp_get_nav_menu_items( $menu->term_id );
							foreach( $menuitems as $menu_item ) {
								echo '<a href="' . $menu_item->url . '" class="menu-item center-align uppercase">' . $menu_item->title . '</a>';
							}
						?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-margin">
                <?php get_template_part( 'featured-content' ); ?>
            </div>
        </div>
        <div class="counter-wrapper abs-div">
            <div class="shift-down carousel-height full-width valign-wrapper">
                <div class="div-center" id="nav-wrapper">
                    <a id="prev" class="full-width prev black-text"><i class="material-icons black-text">arrow_back</i></a>
                    <a id="next" class="full-width next black-text"><i class="material-icons black-text">arrow_forward</i></a>
                </div>
            </div>
        </div>
    </header>
</div>