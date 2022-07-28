<?php
/**
 * Menu ACF Fields
 */

function add_menu_atts( $atts, $item, $args ) {

	if(get_field('sous_menu_cible' , $item)){
		$cible = get_field('sous_menu_cible' , $item);
		$atts['data-sub'] = $cible; // add data-hover attribute
	}

	if($cible){
		$atts['class'] = 'submenu';
	}

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );

/**
 * Menus zones
 */

function custom_zones_menus() {
    register_nav_menus(
      array(
        'megamenu-1' => __( 'Megamenu 1' ),
        'megamenu-2' => __( 'Megamenu 2' ),
        'megamenu-3' => __( 'Megamenu 3' ),
        'megamenu-4' => __( 'Megamenu 4' ),
        'megamenu-5' => __( 'Megamenu 5' ),
        'megamenu-6' => __( 'Megamenu 6' ),
      )
    );
  }
  add_action( 'init', 'custom_zones_menus' );