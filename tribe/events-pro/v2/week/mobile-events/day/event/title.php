<?php
/**
 * View: Week View - Mobile Event Title
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/mobile-events/day/event/title.php
 *
 * See more documentation about our views templating system.
 *
 * @link https://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 */
$event_id = $event->ID;
$catEvent = get_the_terms($event_id , 'tribe_events_cat');

// echo $event_id;
?>

<!-- Event Tax -->
<p class="event-cat-widget-week"><?php echo $catEvent[0]->name; ?></p>

<!-- Event Title -->
<h3 class="tribe-events-pro-week-mobile-events__event-title tribe-common-h6 tribe-common-h5--min-medium">
	<a
		href="<?php echo esc_url( $event->permalink ); ?>"
		title="<?php the_title_attribute( $event_id ); ?>"
		rel="bookmark"
		class="tribe-events-pro-week-mobile-events__event-title-link tribe-common-anchor-thin"
	>
		<?php echo wp_kses_post( get_the_title( $event_id ) ); ?>
    </a>
</h3>

<!-- Event Excerpt or Trim Content -->
<?php
    // Event Excerpt 
    if(get_the_excerpt( $event_id) ){
        echo '<p class="event-content-widget-week">' . get_the_excerpt( $event_id ) . '</p>';
    } else {
        echo '<p class="event-content-widget-week">' . wp_trim_words( get_the_content( $event_id ) , 15 , '...' ) . '</p>';
    } 
?>