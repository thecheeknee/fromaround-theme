<?php if(!is_front_page()){ ?>
<div class="full-width white hide-on-med-and-down">
    <header>
        <div class="navbar-fixed" id="page-navigation">
            <nav class="white z-depth-0 border-black">
                <div class="nav-wrapper white">
                    <a href="<?php echo get_site_url(); ?>" class="brand-logo left"><img class="responsive" src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png"></a>
                    <div class="page-wrapper div-center full-width rel-div">
                        <ul class="right hide-on-med-and-down">
						<?php $menu_name = 'primary';
						   $locations = get_nav_menu_locations();
						   $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
						   $menuitems = wp_get_nav_menu_items( $menu->term_id );
						   foreach( $menuitems as $menu_item ) {
							   echo '<li>';
							   echo '<a href="' . $menu_item->url . '" class="black-text menu-inner uppercase">' . $menu_item->title . '</a>';
							   echo '</li>';
						   }
						?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
<?php } ?>
<div class="show-on-medium-and-down hide-on-large-only">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white">
                <a href="#" data-target="mobile-menu" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-menu">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="http://via.placeholder.com/450x350/ffffff">
                    </div>
                    <a href="<?php echo get_site_url(); ?>"><img class="circle" src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png"></a>
                </div>
            </li>
			<?php $menu_name = 'primary';
				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				$menuitems = wp_get_nav_menu_items( $menu->term_id );
				foreach( $menuitems as $menu_item ) {
					echo '<li>';
					echo '<a href="' . $menu_item->url . '" class="uppercase black-text">' . $menu_item->title . '</a>';
					echo '</li>';
				}
			?>
        </ul>
    </div>
</div>
<div class="fix-div hide-on-med-and-down hidden" id="social-links">
    <div>
        <ul>
			<?php $menu_name = 'subscribe';
				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				$menuitems = wp_get_nav_menu_items( $menu->term_id );
				foreach( $menuitems as $menu_item ) {
					echo '<li>';
					echo '<a class="z-depth-0 modal-trigger" target="_blank" href="' . $menu_item->url . '"><img class="responsive" src="' . get_template_directory_uri() .'/img/' . $menu_item->title . '.png"></a>';
					echo '</li>';
				}
			?>
        </ul>
    </div>
</div>
<div class="fix-div hide-on-med-and-down hidden" id="scroll-down-up">
    <div id="scroll-part-down" class="hide">
        <a class="btn-flat center-align">
            <span>Scroll</span>
            <i class="material-icons">arrow_downward</i>
        </a>
    </div>
    <div id="scroll-part-up" class="hide">
        <a class="btn-flat center-align" onclick="scrollUp();">
            <span>Back</span>
            <i class="material-icons">arrow_upward</i>
        </a>
    </div>
</div>
<div id="subscribeModal" class="modal">
	<div class="modal-content">
		<h3 class="center-align">Subscribe to our updates</h3>
		<div class="clearfix">&nbsp;</div>
		<div class="full-width">
			<?php echo do_shortcode( '[mc4wp_form id="99"]' ); ?>
		</div>
	</div>
</div>