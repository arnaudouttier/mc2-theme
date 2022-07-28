<?php
/**
 * Enqueue scripts and styles.
 */

function mc2_theme_scripts() {

	// CSS

	// Native style for Underscores
	//wp_enqueue_style( 'mc2-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mc2-theme-style', 'rtl', 'replace' );

	// Arnaud CSS for MC2
	wp_enqueue_style( 'mc2-main-style', get_stylesheet_directory_uri() . '/assets/css/style.css' );

	// Custom CSS for MC2 => dev only => not for prod
	wp_enqueue_style( 'mc2-theme-style-custom', get_stylesheet_directory_uri() . '/assets/css/custom-style.css' );

	// JS

	// Native scripts from Underscores
	wp_enqueue_script( 'mc2-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	// Script video background from YouTube
	if(is_home() || is_front_page()){
		wp_enqueue_script( 'mc2-yt-video' , get_template_directory_uri() . '/assets/js/video-youtube/jquery.mb.YTPlayer.min.js');
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Custom JS Scripts for MC2
	wp_enqueue_script( 'mc2-custom-js', get_stylesheet_directory_uri() . '/assets/js/mc2-custom.js');
}
add_action( 'wp_enqueue_scripts', 'mc2_theme_scripts' );