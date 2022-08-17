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

if ( empty( $filterbar_state ) || 'closed' === $filterbar_state ) {
	$button_text   = __( 'Show filters', 'tribe-events-filter-view' );
	$aria_expanded = 'false';
} else {
	$button_classes[] = 'tribe-events-c-events-bar__filter-button--active';
	$button_text      = __( 'Hide filters', 'tribe-events-filter-view' );
	$aria_expanded    = 'true';
}
?>
<div class="tribe-events-c-events-bar__filter-button-container">
    <p class="open-filter-agenda">Filtres</p>
	<button
		<?php tribe_classes( $button_classes ); ?>
		aria-controls="tribe-filter-bar--<?php echo esc_attr( $breakpoint_pointer ); ?>"
		aria-expanded="<?php echo esc_attr( $aria_expanded ); ?>"
		data-js="tribe-events-filter-button"
	>
		<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M11 0L7 0V2L11 2L11 0ZM18 12V10L0 10V12L18 12ZM15 5L3 5V7L15 7V5Z" fill="#ffffff"/>
		</svg>
		<?php 
        // TO DO : icone à changer par celle de Simon
        $this->template( 'components/icons/icon-filtre', [ 'classes' => [ 'tribe-events-c-events-bar__filter-button-icon' ] ] ); ?>
		<span class="tribe-events-c-events-bar__filter-button-text tribe-common-b2 tribe-common-a11y-visual-hide">
			<?php echo esc_html( $button_text ); ?>
		</span>
	</button>
</div>
