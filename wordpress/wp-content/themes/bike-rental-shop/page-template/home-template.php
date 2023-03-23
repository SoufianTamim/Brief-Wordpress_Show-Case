<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <div class="group-box">
    <section id="top-slider">
      <?php $bike_rental_shop_slide_pages = array();
        for ( $bike_rental_shop_count = 1; $bike_rental_shop_count <= 3; $bike_rental_shop_count++ ) {
          $bike_rental_shop_mod = intval( get_theme_mod( 'bike_rental_shop_top_slider_page' . $bike_rental_shop_count ));
          if ( 'page-none-selected' != $bike_rental_shop_mod ) {
            $bike_rental_shop_slide_pages[] = $bike_rental_shop_mod;
          }
        }
        if( !empty($bike_rental_shop_slide_pages) ) :
          $bike_rental_shop_args = array(
            'post_type' => 'page',
            'post__in' => $bike_rental_shop_slide_pages,
            'orderby' => 'post__in'
          );
          $bike_rental_shop_query = new WP_Query( $bike_rental_shop_args );
          if ( $bike_rental_shop_query->have_posts() ) :
            $bike_rental_shop_i = 1;
      ?>
      <div class="owl-carousel" role="listbox">
        <?php  while ( $bike_rental_shop_query->have_posts() ) : $bike_rental_shop_query->the_post(); ?>
          <div class="slider-box">
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="slider-inner-box">
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p class="mb-3"><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
              <div class="slider-box-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','bike-rental-shop'); ?></a>
              </div>
            </div>
          </div>
        <?php $bike_rental_shop_i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
    </section>
    <section id="slider-product" class="pt-3 pt-xl-0">
      <div class="row m-0">
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
          <div class="owl-carousel">
            <?php
            if ( class_exists( 'WooCommerce' ) ) {
              $bike_rental_shop_args = array(
                'post_type' => 'product',
                'posts_per_page' => get_theme_mod('bike_rental_shop_new_product_number'),
                'product_cat' => get_theme_mod('bike_rental_shop_new_product_category'),
                'order' => 'ASC'
              );
              $loop = new WP_Query( $bike_rental_shop_args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="product-box">
                  <div class="product-image mb-2">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                  </div>
                  <p class="product-title"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></p>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
          </div>
        </div>
        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
        </div>      
      </div>    
    </section>
  </div>

  <section id="recent-product" class="py-5">
    <div class="container">
      <div class="row">
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
          $bike_rental_shop_args = array(
            'post_type' => 'product',
            'posts_per_page' => get_theme_mod('bike_rental_shop_recent_product_number'),
            'product_cat' => get_theme_mod('bike_rental_shop_recent_product_category'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $bike_rental_shop_args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product-box mb-4">
                <div class="product-image mb-3">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                </div>
                <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></p>
                <p class="product-title"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></p>                
                <div class="addtocart mt-3">
                  <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php } ?>
      </div>
    </div>
  </section>

  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>