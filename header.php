<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MC2-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php // Top Bar Message Flash : only home page
	if( get_field('afficher_message_flash' , 'option') === 'true' && is_null($_COOKIE['messageFlash']) ) : ?>
	  <div id="bandeau" class="bandeau">
    <div class="bandeau-inner">
      <div class="bandeau-left">
        <h4><?php the_field('message_flash' , 'option'); ?></h4>
        <p><?php the_field('precisions_message_flash' , 'option'); ?></p>
      </div>
      <!-- .bandeau-left -->

      <div id="closeTopBar" class="bandeau-right">
        <img src="/wp-content/themes/mc2-theme/assets/img/bandeau/icon-cross.svg" alt="icone fermer" />
        <button class="btn">Fermer</button>
      </div>
      <!-- .bandeau-right -->
    </div>
    <!-- .bandeau-inner -->
  </div>
  <!-- bandeau-->
<?php endif; ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mc2-theme' ); ?></a>

	<?php
		// CSS Class for styling header

		if(is_home() || is_front_page()) {
			$headerClass = 'homepage';
		}

		if(is_archive()){
			$headerClass = 'edito page-list';
		}

		if(is_page() && !is_home() && !is_front_page()){
			$headerClass = 'edito';
		}

		if(is_singular('tribe_events')){
			$headerClass = 'spectacles';
		}

	?>

	<header id="site-header" class="<?php echo $headerClass; ?>">

	<div id="navigation-container">
		<div class="site-navigation">

			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<div class="site-navigation-button">
					<h2>Menu & Billetterie</h2>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'B', 'mc2-theme' ); ?></button>
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

	<?php 
		// Mega Menus
		get_template_part( 'template-parts/megamenu-1');
		get_template_part( 'template-parts/megamenu-2');
		get_template_part( 'template-parts/megamenu-3');
		get_template_part( 'template-parts/megamenu-4');
		get_template_part( 'template-parts/megamenu-5');
		get_template_part( 'template-parts/megamenu-6');

		// Header Home and maybe more ?
		if(is_home() || is_front_page()) :
			get_template_part('template-parts/header-home');
		endif;
	?>

		<!-- Page Title -->
		<?php if(!is_home() || !is_front_page()) : ?>

			<?php if(!is_post_type_archive('tribe_events')) : ?>

				<div class="cover-details">
					<h1 class="cover-title">
						<?php 
						if(is_archive()){
							post_type_archive_title();
						} else {
							the_title(); 
						} ?>
					</h1>
				</div>

		<?php endif; endif;?>
		
	</header><!-- #masthead -->
