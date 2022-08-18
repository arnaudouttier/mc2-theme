<?php
/**
 * View: Top Bar - Date Picker
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/photo/top-bar/datepicker.php
 *
 * See more documentation about our views templating system.
 *
 * @link    https://evnt.is/1aiy
 *
 * @version 5.2.0
 *
 * @var bool   $is_now                     Whether the date selected in the datepicker is "now" or not.
 * @var bool   $show_now                   Whether to show the "Now" label as range start or not.
 * @var string $now_label                  The "Now" text label.
 * @var string $now_label_mobile           The "Now" text label for mobile.
 * @var bool   $show_end                   Whether to show the end part of the range or not.
 * @var string $selected_start_datetime    The selected start date and time in the localized `Y-m-d` format.
 * @var string $selected_start_date_mobile The formatted date that will show in the datepicker mobile version.
 * @var string $selected_start_date_label  The label of the datepicker interval start.
 * @var string $selected_end_datetime      The selected end date and time in the localized `Y-m-d` format.
 * @var string $selected_end_date_mobile   The formatted date that will show in the datepicker mobile version.
 * @var string $selected_end_date_label    The label of the datepicker interval end.
 * @var string $datepicker_date            The datepicker selected date, in the `Y-m-d` format.
 */

?>
<div class="tribe-events-c-top-bar__datepicker">
    <p class="choix-date-agenda">Choisir une date</p>
	<button
		class="tribe-common-h3 tribe-common-h--alt tribe-events-c-top-bar__datepicker-button"
		data-js="tribe-events-top-bar-datepicker-button"
		type="button"
		aria-label="<?php esc_attr_e( 'Click to toggle datepicker', 'tribe-events-calendar-pro' ); ?>"
		title="<?php esc_attr_e( 'Click to toggle datepicker', 'tribe-events-calendar-pro' ); ?>"
	>
		<svg class="datepicker-button-icon-calendar" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M18 3H16V0H14V3H6V0H4V3H2C0.897 3 0 3.898 0 5V18C0 19.103 0.897 20 2 20H18C19.103 20 20 19.103 20 18V5C20 3.898 19.103 3 18 3ZM2 8V5H18V8H2Z" fill="white"/>
		</svg>
		<div class="datepicker-date-time">
			<time
				datetime="<?php echo esc_attr( $selected_start_datetime ); ?>"
				class="tribe-events-c-top-bar__datepicker-time"
			>
				<?php if ( $show_now ) : 
					?>
					<span class="tribe-events-c-top-bar__datepicker-mobile">
						À partir du <?php echo esc_html( $now_label_mobile ); ?>
					</span>
					<span class="tribe-events-c-top-bar__datepicker-desktop tribe-common-a11y-hidden">
						À partir du <?php echo esc_html( $now_label ); ?>
					</span>
				<?php else : ?>
					<span class="tribe-events-c-top-bar__datepicker-mobile">
						A partir du <?php echo esc_html( $selected_start_date_mobile ); ?>
					</span>
					<span class="tribe-events-c-top-bar__datepicker-desktop tribe-common-a11y-hidden">
						A partir du<?php echo esc_html( $selected_start_date_label ); ?>
					</span>
				<?php endif; ?>
			</time>
			<!-- <?php if ( $show_end ) : ?>
				<span class="tribe-events-c-top-bar__datepicker-separator"> - </span>
				<time
					datetime="<?php echo esc_attr( $selected_end_datetime ); ?>"
					class="tribe-events-c-top-bar__datepicker-time"
				>
					<span class="tribe-events-c-top-bar__datepicker-mobile">
						<?php echo esc_html( $selected_end_date_mobile ); ?>
					</span>
					<span class="tribe-events-c-top-bar__datepicker-desktop tribe-common-a11y-hidden">
						<?php echo esc_html( $selected_end_date_label ); ?>
					</span>
				</time>
			<?php endif; ?> -->
		</div>
		<?php $this->template( 'components/icons/caret-down', [ 'classes' => [ 'tribe-events-c-top-bar__datepicker-button-icon-svg' ] ] ); ?>
	</button>
	
	<label
		class="tribe-events-c-top-bar__datepicker-label tribe-common-a11y-visual-hide"
		for="tribe-events-top-bar-date"
	>
		<?php esc_html_e( 'Select date.', 'tribe-events-calendar-pro' ); ?>
	</label>
	<input
		type="text"
		class="tribe-events-c-top-bar__datepicker-input tribe-common-a11y-visual-hide"
		data-js="tribe-events-top-bar-date"
		id="tribe-events-top-bar-date"
		name="tribe-events-views[tribe-bar-date]"
		value="<?php echo esc_attr( $datepicker_date ); ?>"
		tabindex="-1"
		autocomplete="off"
		readonly="readonly"
	/>
	<div class="tribe-events-c-top-bar__datepicker-container" data-js="tribe-events-top-bar-datepicker-container"></div>
	<template class="tribe-events-c-top-bar__datepicker-template-prev-icon">
		<?php $this->template( 'components/icons/caret-left', [ 'classes' => [ 'tribe-events-c-top-bar__datepicker-nav-icon-svg' ] ] ); ?>
	</template>
	<template class="tribe-events-c-top-bar__datepicker-template-next-icon">
		<?php $this->template( 'components/icons/caret-right', [ 'classes' => [ 'tribe-events-c-top-bar__datepicker-nav-icon-svg' ] ] ); ?>
	</template>
</div>
