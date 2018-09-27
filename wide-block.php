<section>
    <?php
        $args = array(
            'name' => 'quick-intro',
            'post_type' => 'page'
        );
        $site_intro = get_posts( $args );
        if ( $site_intro ) {
            $bck_image = get_the_post_thumbnail_url($site_intro[0]->ID,'full');
    ?>
    <div class="full-width valign-wrapper screen-height scrollspace" style="background-image:url(<?php echo $bck_image; ?>">
        <div class="content-block scrollblock">
            <article>
                <header>
                    <h4 class="white-text uppercase"><?php echo $site_intro[0]->post_title; ?></h4>
                </header>
                <div class="white-text container mgblock margin-top">
                    <p><?php echo $site_intro[0]->post_excerpt; ?></p>
                </div>
                <div class="spacer"></div>
            </article>
        </div>
    </div>
    <?php
        }
    ?>
</section>
<div class="spacer"></div>