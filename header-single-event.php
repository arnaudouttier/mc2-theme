<?php
/**
 * The header for our theme : USE IT FOR EVENT SINGLE PAGE
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

<?php 
  // Message flash
  get_template_part('template-parts/message-flash'); ?>

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

    <?php
      // Navigation
      get_template_part('template-parts/navigation');

      // Mega Menus
      get_template_part( 'template-parts/megamenu-1');
      get_template_part( 'template-parts/megamenu-2');
      get_template_part( 'template-parts/megamenu-3');
      get_template_part( 'template-parts/megamenu-4');
      get_template_part( 'template-parts/megamenu-5');
      get_template_part( 'template-parts/megamenu-6');

      // EVENT DATA
      $id = get_the_ID();

      // Cat : first
      $catEnCours = get_terms('tribe_events_cat');

      // Thumbnail(s)
      $bigThumbnailDesk = get_field('event_image_couverture_desktop');
      $bigThumbnailDeskLegend = get_field('event_legende_couverture');
      $img_alt_thumbnail = get_post_meta($id, '_wp_attachment_image_alt', TRUE); // alt
      $img_title_thumbnail = get_the_title($id); // title
      
      // Salle / lieu
      $venue_id = tribe_get_venue_id();
      $lieu = tribe_get_venue_object( $venue_id );

      // Dates
      $dates = get_post_meta($id , '_EventSiriusSchedule');

      // À partir de 
      $aPartirDe = get_field('event_a_partir_de');
    ?>

<div class="cover-details">
      <h1 class="cover-title"><?php the_title(); ?></h1>
      <!-- .cover-title -->

      <div class="cover-date-category">
        <h2 class="cover-category"><?php echo $catEnCours[0]->name; ?></h2>

        <?php
          // Start date & end Date
          $startDate = tribe_get_start_date(null, false, 'd' , null);
          $monthStartDate = tribe_get_start_date(null, false, 'F' , null);
          $endDate = tribe_get_end_date(null, false, 'd' , null);
          $monthEndDate = tribe_get_end_date(null, false, 'F' , null);

        ?>
        <div class="cover-date">
          <div class="cover-ellipse"></div>
          <div class="cover-day-month">
            
            <?php 
            // Début et fin sur le même mois OU fin sur mois supérieur
            if($monthEndDate == $monthStartDate) { ?>
              <div class="cover-day-month-box">
                <?php 
                  echo $startDate;

                  if($endDate > $startDate) { 
                    echo ' - ' . $endDate . '<span>' . $monthStartDate . '</span>';
                  }
                ?>
              </div>
            <?php } else if(strtotime($monthEndDate) >= strtotime($monthStartDate)) { ?>
              <div class="cover-day-month-box">
                <?php echo $startDate . '<span>' . $monthStartDate . '</span>'; ?>
              </div>
              <div class="cover-day-month-box">
                -
              </div>
              <div class="cover-day-month-box">
                <?php echo $endDate . '<span>' . $monthEndDate . '</span>'; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- cover-date-category -->
      
      <div class="cover-thumbnail">
        <img src="<?php echo $bigThumbnailDesk; ?>" alt="<?= $img_alt_thumbnail ?>" title="<?= $img_title_thumbnail ?>" />
        <?php if($bigThumbnailDeskLegend) : ?>
          <div class="cover-thumbnail-custom-legend"><?= $bigThumbnailDeskLegend ?></div>
        <?php endif; ?>
      </div>
      <!-- .cover-thumbnail -->
      
      <div class="cover-piece-date-prix">
        <ul>
          <li class="cover-piece-date-prix-item ouverture">
            <?php 
              // Schedule events
              $allEvents = get_post_meta($id , '_EventRecurrence' );

              foreach($allEvents as $nextEvent){
                foreach($nextEvent['rules'] as $event){

                  // Day + start hour
                  $eventDay = strtotime($event['custom']['date']['date']);

                  // Start hour : can be a custom hour
                  if($event['custom']['same-time'] == 'no'){
                    $eventStartHour = strtotime($event['custom']['start-time']);
                  } else {
                    $eventStartHour = strtotime($event['EventStartDate']);
                  }
                
                  echo '<p>';
                    // date_i18n => native WP function ^^
                    echo date_i18n("<b>D j F</b>" , $eventDay) . ' ' . date('H\hi' , $eventStartHour);
                  echo '</p>';
                }
              }
              
              // Native function
              // echo tribe_events_event_schedule_details(null , '<p>' , '</p>' , true) 
            ?>
          </li>
          <!-- cover-piece-date-prix-item  -->

          <li class="cover-piece-date-prix-item salle">
            <p>salle <span><?php echo $lieu->post_title; ?></span></p>
          </li>
          <!-- cover-piece-date-prix-item  -->

          <?php
            // Durée event : si champ ACF "event_duree_manuelle" on le met
            // Sinon on calcule avec les champs du plugin

            // Doc : https://docs.theeventscalendar.com/reference/functions/tribe_get_end_time/
            // Doc : https://docs.theeventscalendar.com/reference/functions/tribe_get_start_time/
            // Stack help : https://stackoverflow.com/questions/29664870/calculate-difference-in-hours-between-two-times-in-php#:~:text=php%20%24time1%20%3D%20strtotime(',above%20will%20round%20to%20minutes.
            $startTime = strtotime(tribe_get_start_time(null, 'h:i' , null));
            $endTime = strtotime(tribe_get_end_time(null, 'h:i' , null));
            $dureeTotale = $endTime - $startTime;

            if(get_field('event_duree_manuelle')) {
              $duree = get_field('event_duree_manuelle');
            } else {
              $duree = date('h\hi' , $dureeTotale);
            }
          ?>

          <?php if($aPartirDe) : ?>
            <!-- À partir de -->
            <li>
              <p>à partir de <b><?= $aPartirDe ?></b></p>
            </li>
          <?php endif; ?>

          <!-- Durée -->
          <li class="cover-piece-date-prix-item duree">
            <p>durée <span><?php echo $duree; ?></span></p>
          </li>
          <!-- cover-piece-date-prix-item  -->

          <li class="cover-piece-date-prix-item tarifs">
            <p class="tarifs">
              tarifs
              <br />
              <span>
                <?php 
                  
                  // Prices : all or default
                  $allPrices = get_post_meta($id , '_EventSiriusPrices');
                  $defaultPrice = get_post_meta($id , '_EventCost');
                  $dernierPrix = count($allPrices[0]);
                  $i = 1;

                  if(!empty($allPrices[0])){

                    foreach($allPrices[0] as $price){
                      if($i == $dernierPrix){
                        echo $price . ' €';
                      } else {
                        echo $price . ' € • ';
                      }
                      
                      $i++;
                    }
                  } else {
                    // Function from plugin author if needed
                    // echo tribe_get_cost( null, true ); 
                    echo $defaultPrice[0] . ' €';

                  }
                ?>
              </span>
            </p>
          </li>
          <!-- cover-piece-date-prix-item  -->
        </ul>

      <?php 

        // Lien Billetterie

        // Old spectacle ? alors on supprime le lien
        $provenance = get_post_meta($id, '_EventOrigin');

        // Billetterie : identifiant unique ou générique (theme options)
        if(get_field('event_identifiant_billetterie')){
          $identifiantBilletterie = get_field('event_identifiant_billetterie');
        } else {
          $identifiantBilletterie = get_field('identifiant_billetterie' , 'option');
        }

        // Billetterie : ID de l'event
        $idEventBilletterie = get_post_meta($id , '_EventSiriusId');
      ?>

      <?php if($provenance[0] != 'old-spectacle') { ?>
        <a href="https://mc2grenoble.notre-billetterie.fr/billets?spec=<?php echo $idEventBilletterie[0]; ?>&site=<?php echo $identifiantBilletterie; ?>" target="blank"><button class="btn btn-primary btn-yellow btn-reservation">Réserver votre place</button></a>
      <?php } else { ?>
        <button class="btn btn-primary btn-yellow btn-reservation">Ce spectacle est terminé</button>
      <?php }?>

      </div>
      <!-- .cover-piece-date-price -->
    </div>
    <!-- .cover-details -->
		
	</header><!-- #masthead -->
