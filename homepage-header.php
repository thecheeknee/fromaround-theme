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
                            <a href="" class="menu-item center-align uppercase">Subscribe</a>
                        </div>
                        <div class="line clearfix grey lighter-2 hide-on-med-and-down"></div>
                        <div class="col l12 right-align hide-on-med-and-down">
                            <a href="<?php echo get_site_url() . '/category/textiles'; ?>" class="menu-item center-align uppercase">Textiles</a>
                            <a href="<?php echo get_site_url() . '/category/tableware'; ?>" class="menu-item center-align uppercase">Tableware</a>
                            <a href="<?php echo get_site_url() . '/category/furniture'; ?>" class="menu-item center-align uppercase">Furniture</a>
                            <a href="<?php echo get_site_url() . '/category/objects'; ?>" class="menu-item center-align uppercase">Objects</a>
                            <a href="<?php echo get_site_url() . '/category/travel'; ?>" class="menu-item center-align uppercase">Travel</a>
                            <a href="<?php echo get_site_url() . '/category/journal'; ?>" class="menu-item center-align uppercase">Journal</a>
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