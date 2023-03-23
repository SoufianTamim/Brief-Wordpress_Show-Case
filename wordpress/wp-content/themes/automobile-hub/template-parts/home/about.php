<?php
/**
 * Template part for displaying About section
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */
?>

<section id="about">
  <div class="container">
    <?php if( get_theme_mod('automobile_hub_about_tittle') != ''){ ?>
      <h3><?php echo esc_html(get_theme_mod('automobile_hub_about_tittle','')); ?></h3>
    <?php }?>
    <div class="row">
      <?php $automobile_hub_about_page = array();
        $automobile_hub_mod = absint( get_theme_mod( 'automobile_hub_about_page' ));
        if ( 'page-none-selected' != $automobile_hub_mod ) {
          $automobile_hub_about_page[] = $automobile_hub_mod;
        }
      if( !empty($automobile_hub_about_page) ) :
        $automobile_hub_args = array(
          'post_type' => 'page',
          'post__in' => $automobile_hub_about_page,
          'orderby' => 'post__in'
        );
        $automobile_hub_query = new WP_Query( $automobile_hub_args );
        if ( $automobile_hub_query->have_posts() ) :
          while ( $automobile_hub_query->have_posts() ) : $automobile_hub_query->the_post(); ?>
            <div class="col-lg-5 col-md-5">
              <h4><?php the_title(); ?></h4>
              <p><?php the_excerpt(); ?></p>
              <div class="more-btn">
                <i class="fas fa-hand-point-right"></i><a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','automobile-hub'); ?></a>
                </a>
              </div>
            </div>
            <div class="col-lg-7 col-md-7">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;
      wp_reset_postdata()?>
      <div class="clearfix"></div>
    </div>
  </div>
</section>
