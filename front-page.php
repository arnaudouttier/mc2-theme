<?php
/**
 * Template name: Home Page
 */

get_header(); ?>

<main id="main" class="homepage">

    <!-- Spectacles à l'affiche -->
    <section class="affiche">

      <div class="affiche-header">
        <h3>À voir également</h3>
      </div>

      <div class="affiche-list">

        <?php

          // REF : https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/

          // Get Next Sticky Events
          $argsSticky = array(
            'posts_per_page' => 4,
            'start_date'     => 'now',
            'featured'       => true,
          );
          $nextEventsSticky = tribe_get_events($argsSticky);

          // Count sticky found
          $totalSticky = count($nextEventsSticky);

          // Set other events vs sticky numbers (4 posts by default)
          $totalAutresPosts = 4 - $totalSticky;
          
          // Get Next Events (no sticky)
          $argsEvents = array(
            'posts_per_page' => $totalAutresPosts,
            'start_date'     => 'now',
            'featured'       => false,
          );
          $nextEvents = tribe_get_events($argsEvents);

          $allNextEvents = array_merge($nextEventsSticky , $nextEvents);

          // foreach($allNextEvents as $nextEvent){
          //   echo $nextEvent->post_title;
          // }

            // Display sticky events if exist
            if($allNextEvents) {
              
              foreach($allNextEvents as $nextEvent) : 

                // Event ID
                $eventID = $nextEvent->ID;
                
                // Permalink ^^
                $permalink = get_the_permalink($eventID);

                // Event name
                $name = $nextEvent->post_title;

                // Post thumbnail
                if(get_the_post_thumbnail_url($eventID)){
                  $thumbnail = get_the_post_thumbnail_url($eventID);
                } else {
                  $thumbnail = '/wp-content/themes/mc2-theme/assets/img/actus/placeholder-actus.jpg';
                }

                // Cat
                $cat = get_the_terms($eventID , 'tribe_events_cat');

                // Artistes
                $tetesAffiche = get_field('tete_d_affiche' , $eventID);

                // Date => TODO
              ?>
                
                  <div class="affiche-item">
                    <a href="<?php echo $permalink; ?>">
                      <img src="<?php echo $thumbnail; ?>" alt="affiche image" class="affiche-image" />
                    </a>
                    <div class="affiche-title">
                      <!-- Event name -->
                      <h4><?php echo $name ?></h4>

                      <!-- Event first cat -->
                      <h5 class="affiche-category"><?php echo $cat[0]->name; ?></h5>

                      <!-- Event artist -->
                      <?php 
                        foreach($tetesAffiche as $name) {
                          echo '<p class="affiche-resume">' . $name->post_title . '</p>';
                        } 
                      ?>
                    </div>
                    <div class="affiche-date">
                      <h4>11</h4>
                      <h5>SEPT</h5>
                    </div>
                  </div>

              <?php endforeach; 

            } else {
              echo 'Il n\'y a pas de spectacle prochainement.';
            }
        ?>
      </div>
      <!-- affiche-list -->
    
    </section>
    <!-- .affiche -->

    <!-- Agenda -->
		<?php if ( is_active_sidebar( 'agenda-semaine-home' ) ) : ?>
      <section class="agenda">
			<div id="agenda-semaine-home" class="sidebar-home">
				<?php dynamic_sidebar( 'agenda-semaine-home' ); ?>
			</div>
    </section>
		<?php endif; ?>
    
    <!-- .agenda -->

    <!-- News -->
    <section class="news">
        <div class="news-header">
            <h3 class="news-section-title">Actualités</h3>
            <a href=""><button class="btn">Tout voir</button></a>
        </div>
      <!-- news-header -->

        <?php 
            // Get latest news
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9
            );
            $latestsNews = new WP_Query($args);

            // First Actu
            $catFirstActu = get_the_category($latestsNews->posts[0]->ID);
        ?>

      <div class="news-grid">

        <!-- First actu -->
        <section class="news-thumb">
          <div class="news-thumb-image full-img">
            <?php if(get_the_post_thumbnail_url($latestsNews->posts[0]->ID)){
                echo '<a href="#"><img src="' . get_the_post_thumbnail_url($latestsNews->posts[0]->ID) . '" alt="news thumb image" /></a>';
            } else {
                echo '<a href=" . the_permalink() . "><img src="/wp-content/themes/mc2-theme/assets/img/actus/placeholder-actus.jpg"></a>';
            } ?>
            
          </div>

          <!-- news-thumb-image -->
          <div class="news-thumb-content">
            <div class="news-thumb-details">
              <p class="news-thumb-category"><?php echo $catFirstActu[0]->name; ?></p>
              <h4 class="news-thumb-author"><?php echo $latestsNews->posts[0]->post_title; ?></h4>
            </div>
            <div class="news-thumb-resume">
                <?php echo wp_trim_words($latestsNews->posts[0]->post_content, 100, '...' ); ?>
            </div>
          </div>
          <!-- .news-thumb-content -->
        </section>
        <!-- .news-thumb -->

        <!-- ACTUS : middle section 3 news + thumbnail -->
        <section class="news-image-type">
        <?php for($i=1; $i<=3; $i++) : 
            $catItem = get_the_category($latestsNews->posts[$i]->ID);        
        ?>

            <div class="news-image-type-item">
                <h4 class="news-category"><?php echo $catItem[0]->name; ?></h4>
                <a href="#"><img src="<?php echo get_the_post_thumbnail_url($latestsNews->posts[$i]->ID); ?>" alt="" class="news-image-type-image" /></a>
                <a href="#">
                <h4 class="news-title"><?php echo $latestsNews->posts[$i]->post_title; ?></h4>
                </a>
                <p class="news-image-type-resume news-content">
                <?php echo wp_trim_words( $latestsNews->posts[$i]->post_content, 25, '...' ) ?>
                </p>
            </div>

          <?php endfor; ?>
          <!-- news-image-type-item -->

        </section>
        <!-- .news-image-type -->

        <button class="btn btn-primary btn-blue btn-news-show-all">
          TOUT VOIR
        </button>

        <div class="news-text-type">

            <?php for($i=4; $i<=8; $i++) : 
                $catItem = get_the_category($latestsNews->posts[$i]->ID);    
            ?>

                <div class="news-text-type-item">
                    <h4 class="news-category"><?php echo $catItem[0]->name; ?></h4>
                    <a href="#">
                    <h4 class="news-title"><?php echo $latestsNews->posts[$i]->post_title; ?></h4>
                    </a>
                    <p class="news-image-type-resume news-content">
                        <?php echo wp_trim_words( $latestsNews->posts[$i]->post_content, 25, '...' ) ?>
                    </p>
                </div>

            <?php endfor; ?>
        </div>
        <!-- .news-text-type -->
      </div>
      <!-- .news-grid -->
    </section>
    <!-- .news -->

    <!-- Video -->
    <section class="video-saisons">
      <div class="video-saisons-inner">

        <!-- Logo top left -->
        <img src="<?php echo get_field('logo_video'); ?>" class="vs-logo" alt="site logo" />

        <!-- Video -->
        <div id="video-home" 
          data-property="{videoURL:'<?php the_field('lien_de_la_video'); ?>',containment:'self',autoPlay:false, mute:false, startAt:0, showControls:false, opacity:1}"
          style="background: url('<?php echo get_field("fond_video_home"); ?>');" >
        </div>
        <div id="vs-play" class="vs-play">
          <img src="/wp-content/themes/mc2-theme/assets/img/video-saisons/icon-play.svg" alt="icon play" />
          <p>Lire</p>
        </div>

        <!-- Date bottom right -->
        <div class="vs-date">
          <?php if(get_field('date_de_debut_video')) : ?>
            <h3><?php the_field('date_de_debut_video'); ?></h3>
          <?php endif; ?>
          <?php if(get_field('date_de_fin_video')) : ?>
            <h3><?php the_field('date_de_fin_video'); ?></h3>
          <?php endif; ?>
        </div>
      </div>
      <!-- .video-saisons-inner -->

    </section>
    <!-- .video-saisons -->

    <section id="slider-home" class="slider" style="background:url('<?php echo get_field('image_de_fond_lieu_de_vie'); ?>')">
      <div class="slider-inner">
        <h4><?php the_field('titre_lateral_de_la_section'); ?></h4>

        <div class="slider-main">
        <?php for($i=1; $i<=3; $i++) : 
            if(get_field("colonne_${i}")){ 
            $col = get_field("colonne_${i}");   

            // IMG for section Background
            $imgFondCol = get_field("image_de_fond_colonne_${i}");
        ?>
          <div class="slider-main-item">

            <input type="hidden" value="<?php echo $imgFondCol; ?>" class="bg-col">

            <input type="checkbox" id="<?php echo "colonne_${i}"; ?>" />
            <label for="<?php echo "colonne_${i}"; ?>"><?php echo $col["titre_colonne_${i}"]; ?></label>

            <?php
                echo '<ul class="slider-main-item-sub">';
                
                $liens = $col['ajouter_un_lien'];

                foreach($liens as $lien) {
                    echo '<li><a href="' .  $lien["lien"] . '">' . $lien["titre_du_lien"] . '</a></li>';
                }

                echo '</ul>';
            }
            ?>
          </div>
          <?php endfor; ?>
          <!-- .slider-main-item -->

        </div>
        <!-- .slider-main -->
      </div>
      <!-- .slider-inner -->
      
    </section>
    <!-- .slider -->

</main>

<?php get_footer(); ?>