<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="<?php echo get_template_directory_uri(); ?>/js/lib/scrollreveal.js"></script>
        <title><?php wp_title( '-', true, 'right' ); ?></title>
        <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/siteicon.png"/>
        <meta name="Description" content="<?php bloginfo( 'description' ); ?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="screen-width screen-height valign-wrapper white fade" id="loader">
            <div class="full-width center-align">
                <div class="logo-wrapper div-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png" class="responsive">
                </div>
            </div>
        </div>
        <!--?php if(!is_front_page() && !is_singular() && !is_single()){ ?>
        <div class="top-alert full-width lime lighten-5 center-align hide-on-med-and-down">
            <span><--?php get_template_part( 'random-post' ); ?></span>
        </div>
        <--?php } ?-->