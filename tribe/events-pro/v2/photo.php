<?php
/**
 * View: Photo View
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/photo.php
 *
 * See more documentation about our views templating system.
 *
 * @link https://evnt.is/1aiy
 *
 * @version  5.1.6
 *
 * @var string   $rest_url             The REST URL.
 * @var string   $rest_method          The HTTP method, either `POST` or `GET`, the View will use to make requests.
 * @var string   $rest_nonce           The REST nonce.
 * @var int      $should_manage_url    int containing if it should manage the URL.
 * @var string   $placeholder_url      The url for the placeholder image if a featured image does not exist.
 * @var array    $events               The array containing the events.
 * @var string   $today_url            URL pointing to the today link for this view.
 * @var string   $prev_url             URL pointing to the prev page link for this view.
 * @var string   $next_url             URL pointing to the next page link for this view.
 * @var bool     $disable_event_search Boolean on whether to disable the event search.
 * @var string[] $container_classes    Classes used for the container of the view.
 * @var array    $container_data       An additional set of container `data` attributes.
 * @var string   $breakpoint_pointer   String we use as pointer to the current view we are setting up with breakpoints.
 */

$header_classes = [ 'tribe-events-header' ];
if ( empty( $disable_event_search ) ) {
	$header_classes[] = 'tribe-events-header--has-event-search';
}
?>
<div
	<?php tribe_classes( $container_classes ); ?>
	data-js="tribe-events-view"
	data-view-rest-nonce="<?php echo esc_attr( $rest_nonce ); ?>"
	data-view-rest-url="<?php echo esc_url( $rest_url ); ?>"
	data-view-rest-method="<?php echo esc_attr( $rest_method ); ?>"
	data-view-manage-url="<?php echo esc_attr( $should_manage_url ); ?>"
	<?php foreach ( $container_data as $key => $value ) : ?>
		data-view-<?php echo esc_attr( $key ) ?>="<?php echo esc_attr( $value ) ?>"
	<?php endforeach; ?>
	<?php if ( ! empty( $breakpoint_pointer ) ) : ?>
		data-view-breakpoint-pointer="<?php echo esc_attr( $breakpoint_pointer ); ?>"
	<?php endif; ?>
>

<?php $this->template( 'components/loader', [ 'text' => __( 'Loading...', 'tribe-events-calendar-pro' ) ] ); ?>

<?php $this->template( 'components/json-ld-data' ); ?>

<?php $this->template( 'components/data' ); ?>

<?php $this->template( 'components/before' ); ?>

<?php // Nouveau Header pour la page d'archive des agendas ?>

<div id="agenda-list-header">

	<div class="cover-details">
		<h1 class="cover-title">
			Agenda :
		</h1>

		<header <?php tribe_classes( $header_classes ); ?>>
			<?php $this->template( 'components/messages' ); ?>
			
			<?php //$this->template( 'components/breadcrumbs' ); ?>
			
			<?php 
			// Boutons pour filtrer les vues : photo ou liste
			$this->template( 'components/events-bar' ); ?>

			<?php $this->template( 'photo/top-bar' ); ?>

		</header>

	</div>

	<div id="agenda-filters">
		<div class="container">
			<?php $this->template( 'components/filter-bar' ); ?>
		</div>
	</div>


</div>


	<div id="agenda-list" class="tribe-common-l-container tribe-events-l-container">

		<!-- Sidebar Left Listing Events -->

		<div class="sidebar-left-listing-events">
			<h2>DATE</h2>
		</div>

		<!-- Listing Events -->
		<div class="tribe-events-pro-photo affiche">

			<div class="tribe-common-g-row tribe-common-g-row--gutters affiche-list">

				<?php foreach ( $events as $event ) : ?>
					<?php $this->setup_postdata( $event ); ?>

					<?php $this->template( 'photo/event', [ 'event' => $event ] ); ?>

				<?php endforeach; ?>

			</div>

		</div>
	</div>
</div>

<?php $this->template( 'components/breakpoints' ); ?>
