<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mc2_theme_widgets_init() {
	// DEFAULT SIDEBAR
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mc2-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);

	// HOME SIDEBAR : WEEKLY EVENTS
	register_sidebar(
		array(
			'name'          => esc_html__( 'Agenda semaine accueil', 'mc2-theme' ),
			'id'            => 'agenda-semaine-home',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);

	// FOOTER Zone 1
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Zone 1', 'mc2-theme' ),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// FOOTER Zone 2
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Zone 2', 'mc2-theme' ),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="footer-title">',
			'after_title'   => '</h5>',
		)
	);

	// FOOTER Zone 3
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Zone 3', 'mc2-theme' ),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="footer-title">',
			'after_title'   => '</h5>',
		)
	);

	// FOOTER Zone 4
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Zone 4', 'mc2-theme' ),
			'id'            => 'footer-sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="footer-title">',
			'after_title'   => '</h5>',
		)
	);

	// FOOTER Zone 5
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Zone 5', 'mc2-theme' ),
			'id'            => 'footer-sidebar-5',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="footer-title">',
			'after_title'   => '</h5>',
		)
	);

	// FOOTER Zone 6
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Zone 6', 'mc2-theme' ),
			'id'            => 'footer-sidebar-6',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="footer-title">',
			'after_title'   => '</h5>',
		)
	);

    // MEGA MENU FOOTER Zone 1
	register_sidebar(
		array(
			'name'          => esc_html__( 'Mega Menu Zone 1', 'mc2-theme' ),
			'id'            => 'megamenu-zone-1',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="megamenu-widget-title">',
			'after_title'   => '</h5>',
		)
	);

    // MEGA MENU FOOTER Zone 2
	register_sidebar(
		array(
			'name'          => esc_html__( 'Mega Menu Zone 2', 'mc2-theme' ),
			'id'            => 'megamenu-zone-2',
			'description'   => esc_html__( 'Add widgets here.', 'mc2-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="megamenu-widget-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'mc2_theme_widgets_init' );