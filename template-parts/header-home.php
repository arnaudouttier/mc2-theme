<?php 
    // All BG for Header
    $bg = get_field('image_du_haut_de_page');
    $bgMobile = get_field('image_haut_de_page_mobile');
    $bgVideo = get_field('video_haut_de_page');
?>

<style>
    <?php if($bg) : ?>
        @media(min-width: 768px){
            #headerHome {
                background: url('<?php echo $bg; ?>');
            }
        } 
        
        @media(max-width: 767px){
            #headerHome {
                background: url('<?php echo $bgMobile; ?>');
            }
        }
    <?php endif; ?>
</style>


<!-- Header Home -->
<div id="headerHome" 
    <?php if($bgVideo) : ?>
        data-property="{videoURL:'<?php echo $bgVideo; ?>', containment:'#site-header', autoPlay:true, playOnlyIfVisible:true, useOnMobile:false, mobileFallbackImage: '<?php echo $bgMobile; ?>', optimizeDisplay:true, mute:true, startAt:0, showControls:false, opacity:1}"
    <?php endif; ?>
     class="header-home"
    >
    <div class="cover-details homepage">
        <div class="cover-title">
            <h3 class="cover-category"><?php echo get_field('sous_titre_du_haut_de_page'); ?></h3>
            <h1 class="cover-name"><?php the_field('titre_du_haut_de_page'); ?></h1>
            <a href="<?php echo get_field('lien_du_bouton'); ?>" class="cover-link"><?php echo get_field('texte_du_bouton'); ?></a>
        </div>
        <!-- cover-title -->

        <div class="cover-date-month">
            <div class="cover-elipse"></div>
            <div class="cover-date">
            <h3>
                <?php 
                    the_field('date_de_debut');
                    if(get_field('date_de_fin')){
                        echo '-' . get_field('date_de_fin');
                    }
                ?>
            </h3>
            <h5><?php the_field('mois'); ?></h5>
            </div>
        </div>
        <!-- cover-date-month -->
    </div>
    <!-- cover-details-homepage -->
</div>