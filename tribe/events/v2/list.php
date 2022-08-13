<?php
/**
 * View: List View
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.2.1
 *
 * @var array    $events               The array containing the events.
 * @var string   $rest_url             The REST URL.
 * @var string   $rest_method          The HTTP method, either `POST` or `GET`, the View will use to make requests.
 * @var string   $rest_nonce           The REST nonce.
 * @var int      $should_manage_url    int containing if it should manage the URL.
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
    <?php $this->template( 'components/loader', [ 'text' => __( 'Loading...', 'the-events-calendar' ) ] ); ?>

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

        <?php $this->template( 'components/filter-bar' ); ?>

    </div>

    <!-- Listing Events -->
    <div class="tribe-events-calendar-list affiche">

        <?php foreach ( $events as $event ) : ?>

            <div class="tribe-event-calendar-list-group">

                <?php $this->setup_postdata( $event ); ?>
                    
                <?php $this->template( 'list/month-separator', [ 'event' => $event ] ); ?>

                <div class="tribe-event-calendar-list-group-main">

                    <?php $this->template( 'list/event', [ 'event' => $event ] ); ?>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <?php // $this->template( 'list/nav' ); ?>

    <?php // $this->template( 'components/ical-link' ); ?>

    <?php $this->template( 'components/after' ); ?>
</div>

<?php $this->template( 'components/breakpoints' ); ?>