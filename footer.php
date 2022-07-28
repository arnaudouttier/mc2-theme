<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MC2-theme
 */

?>
  <footer id="site-footer" class="site-footer">
    <div class="to-top">
      <a href="#page">
        <button class="btn btn-to-top">
          <img src="/wp-content/themes/mc2-theme/assets/img/icons/icon-to-top.svg" alt="icone vers le haut" />
          RETOUR HAUT DE PAGE
        </button>
      </a>
    </div>
    <!-- .top-top -->

    <div class="footer-grid">

	 	<!-- Footer aside 1 : logo -->
		<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
			<div id="footer-sidebar-1" class="footer-zone-1 footer-logo footer-item">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div>
		<?php endif; ?>
		<!-- .footer-logo -->

		<!-- Footer aside 2 : contacts etc -->
		<div class="grid-column-left">
			<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
				<div id="footer-sidebar-1" class="footer-zone-2 footer-item">
					<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
				</div>
			<?php endif; ?>
		</div>
      	<!-- .grid-column-left -->

		<div class="grid-column-middle">
			<!-- Footer aside 3 : Prog + MC2 -->
			<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
				<div id="footer-sidebar-3" class="footer-zone-3 footer-item">
					<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- .grid-column-middle-->

      	<div class="grid-column-right">
			<!-- Footer aside 4 : other menus -->
			<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
				<div id="footer-sidebar-4" class="footer-zone-4 footer-item">
					<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- .grid-column-right -->

		<!-- Footer aside 5 : other menus -->
		<?php if ( is_active_sidebar( 'footer-sidebar-5' ) ) : ?>
			<div id="footer-sidebar-5" class="footer-zone-5 cgv footer-item">
				<?php dynamic_sidebar( 'footer-sidebar-5' ); ?>
			</div>
		<?php endif; ?>

		<!-- Footer aside 6 : other menus -->
		<?php if ( is_active_sidebar( 'footer-sidebar-6' ) ) : ?>
			<div id="footer-sidebar-5" class="footer-zone-6 mentions-legales footer-item">
				<?php dynamic_sidebar( 'footer-sidebar-6' ); ?>
			</div>
		<?php endif; ?>
		
    </div>
    <!-- .footer-grid -->
  </footer>
  <!-- #site-footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
