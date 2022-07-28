<div id="megamenu6" class="mega-menu">
    <div class="mega-menu-container">
        <div class="mega-menu-title">
            <p>Vous êtes</p>
        </div>
        <div class="mega-menu-content">
            <div class="mega-menu-items">
                <?php
                    if ( has_nav_menu( 'megamenu-6' ) ) {
                        wp_nav_menu( array( 
                            'theme_location' => 'megamenu-6', 
                            'container_class' => 'megamenu-menu' ) 
                        ); 
                    }
                ?>
            </div>

            <div class="mega-menu-footer">
                <!-- Col 1 -->
                <div class="mega-menu-footer-col-1">
                    <!-- Mega Menu Footer 1 -->
                    <?php if ( is_active_sidebar( 'megamenu-zone-1' ) ) : ?>
                        <div id="footer-sidebar-5" class="megamenu-widget">
                            <?php dynamic_sidebar( 'megamenu-zone-1' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Col 2 -->
                <div class="mega-menu-footer-col-2">
                    <!-- Mega Menu Footer 2 -->
                    <?php if ( is_active_sidebar( 'megamenu-zone-2' ) ) : ?>
                        <div id="footer-sidebar-5" class="megamenu-widget">
                            <?php dynamic_sidebar( 'megamenu-zone-2' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>
