<div id="megamenu3" class="mega-menu">
    <div class="mega-menu-container">
        <div class="mega-menu-title">
            <p>MC2, Maison de la culture</p>
        </div>
        <div class="mega-menu-content">
            <div class="mega-menu-items">
                <?php
                    if ( has_nav_menu( 'megamenu-3' ) ) {
                        wp_nav_menu( array( 
                            'theme_location' => 'megamenu-3', 
                            'container_class' => 'megamenu-menu' ) 
                        ); 
                    }
                ?>
            </div>
            <div class="mega-menu-actus brdr-left">
                <?php             
                // Get last news
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1
                );
                $lastNew = new WP_Query($args);

                if($lastNew->have_posts()) : $lastNew->the_post(); 
                    $category = get_the_category();
                ?>
                <p>Dernière actualité</p>
                    <div class="news-text-type-item">
                        <h4 class="news-category"><?php echo $category[0]->name; ?></h4>
                        <a href="#">
                            <h4 class="news-title"><?php echo get_the_title(); ?></h4>
                        </a>
                        <p class="news-image-type-resume news-content">
                            <?php echo wp_trim_words( get_the_content(), 15, '...' ) ?>
                        </p>
                    </div>
                
                <?php 
                    endif; 
                    wp_reset_postdata();
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
