<?php
/**
 * View: Photo Event
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/photo/event.php
 *
 * See more documentation about our views templating system.
 *
 * @link https://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 * @var string $placeholder_url The url for the placeholder image if a featured image does not exist.
 *
 * @see tribe_get_event() For the format of the event object.
 */

$classes = get_post_class( [ 'tribe-common-g-col', 'tribe-events-pro-photo__event ' , 'affiche-item' ], $event->ID );

// Event first cat
$cat = get_the_terms($event->ID , 'tribe_events_cat');

// Event "tête d'affiche"
$tetesAffiche = get_field('tete_d_affiche' , $event->ID);

if ( ! empty( $event->featured ) ) {
	$classes[] = 'tribe-events-pro-photo__event--featured';
}
?>

<article <?php tribe_classes( $classes ) ?>>

    <!-- Event Thumbnail -->
    <a href="<?php echo $event->permalink; ?>">
        <?php $this->template( 'photo/event/featured-image', [ 'event' => $event ] ); ?>
    </a>

    <div class="affiche-title">
        <!-- Event name -->
        <?php $this->template( 'photo/event/title', [ 'event' => $event ] ); ?>

        <!-- Event first cat -->
        <h5 class="affiche-category"><?php echo $cat[0]->name; ?></h5>

        <!-- Event artist -->
        <?php 
        foreach($tetesAffiche as $name) {
            echo '<p class="affiche-resume">' . $name->post_title . '</p>';
        } 
        ?>
    </div>

    <!-- Event date -->
    <div class="affiche-date">
        <?php $this->template( 'photo/event/date-tag', [ 'event' => $event ] ); ?>
    </div>

</article>
