<?php
/**
 * Template part for displaying Contact section
 *
 * @package Auto Car Care
 * @subpackage auto_car_care
 */
?>

<?php if( get_theme_mod('auto_car_care_contact_form_shortcode') != ''){ ?>
<section id="contact">
  <div class="container">
    <div class="contact-box">      
      <?php echo do_shortcode( get_theme_mod('auto_car_care_contact_form_shortcode') ); ?>      
    </div>
  </div>
</section>
<?php }?>