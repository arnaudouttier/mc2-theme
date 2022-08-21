<?php // Main navigation ?>
<div id="navigation-container">
    <div class="site-navigation">

        <div class="site-branding">
            <?php the_custom_logo(); ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <div class="site-navigation-button">
                <h2>Menu & Billetterie</h2>
                <h2>Fermer</h2>
                <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><span><?php esc_html_e( '', 'mc2-theme' ); ?></span></button>
            </div>
            <?php
        wp_nav_menu(
        array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
        )
        );
        ?>
        </nav><!-- #site-navigation -->
    </div>
</div>