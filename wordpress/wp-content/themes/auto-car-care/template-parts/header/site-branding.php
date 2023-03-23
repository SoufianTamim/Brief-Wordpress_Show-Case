<?php 
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-3 align-self-center">
        <?php if( get_theme_mod( 'automobile_hub_call' ) != '') { ?>
          <p class="mb-0"><i class="fas fa-phone mr-2"></i> <?php echo esc_html( get_theme_mod('automobile_hub_call','') ); ?></p>
        <?php } ?>
      </div>
      <div class="col-lg-3 col-md-3 align-self-center">
        <?php if( get_theme_mod( 'automobile_hub_mail' ) != '') { ?>
          <p class="mb-0"><i class="fas fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('automobile_hub_mail','') ); ?></p>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-3 align-self-center">
        <?php if( get_theme_mod( 'automobile_hub_address' ) != '') { ?>
          <p class="mb-0"><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html( get_theme_mod('automobile_hub_address','') ); ?></p>
        <?php } ?>
      </div>
      <div class="col-lg-3 col-md-3 social-media align-self-center">
        <?php if( get_theme_mod( 'automobile_hub_facebook_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'automobile_hub_twitter_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'automobile_hub_instagram_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'automobile_hub_youtube_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'automobile_hub_pint_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i></a>
        <?php } ?>
      </div>  
    </div>
  </div> 
</div>