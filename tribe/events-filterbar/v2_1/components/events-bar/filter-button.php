<?php
/**
 * View: Filter Button Component
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-filterbar/v2_1/components/events-bar/filter-button.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @var string $breakpoint_pointer String we use as pointer to the current view we are setting up with breakpoints.
 * @var string $filterbar_state    Current state of the entire Filter Bar, either `open` or `closed`.
 *
 * @version 5.0.0
 *
 */

$button_classes = [ 'tribe-events-c-events-bar__filter-button' ];
$button_text   = __( 'Filtres', 'tribe-events-filter-view' );

// if ( empty( $filterbar_state ) || 'closed' === $filterbar_state ) {
// 	$button_text   = __( 'Show filters', 'tribe-events-filter-view' );
// 	$aria_expanded = 'false';
// } else {
// 	$button_classes[] = 'tribe-events-c-events-bar__filter-button--active';
// 	$button_text      = __( 'Hide Filters', 'tribe-events-filter-view' );
// 	$aria_expanded    = 'true';
// }
// ?>
<div class="tribe-events-c-events-bar__filter-button-container">

	<button
		<?php tribe_classes( $button_classes ); ?>
			aria-controls="tribe-filter-bar--<?php echo esc_attr( $breakpoint_pointer ); ?>"
			aria-expanded="<?php echo esc_attr( $aria_expanded ); ?>"
			data-js="tribe-events-filter-button"
	>

		<?php 
		// TO DO : icone à changer par celle de Simon
		$this->template( 'components/icons/icon-filtre', [ 'classes' => [ 'tribe-events-c-events-bar__filter-button-icon' ] ] ); ?>

		<?php echo esc_html( $button_text ); ?>
			
		<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M7 12H11V10H7V12ZM0 0V2H18V0H0ZM3 7H15V5H3V7Z" fill="white"/>
		</svg>
			
	</button>
</div>
