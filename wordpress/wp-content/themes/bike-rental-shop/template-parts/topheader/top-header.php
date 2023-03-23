<?php
/**
 * Displays main header
 *
 * @package Bike Rental Shop
 */
?>

<div class="main-header text-center text-md-left">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
                <div class="navbar-brand text-center text-md-left">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $bike_rental_shop_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $bike_rental_shop_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                              <?php if( get_theme_mod('bike_rental_shop_logo_title_text',true) != ''){ ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                              <?php }?>
                            <?php else : ?>
                              <?php if( get_theme_mod('bike_rental_shop_logo_title_text',true) != ''){ ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                              <?php }?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $bike_rental_shop_description = get_bloginfo( 'description', 'display' );
                            if ( $bike_rental_shop_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('bike_rental_shop_theme_description',false) != ''){ ?>
                          <p class="site-description"><?php echo esc_html($bike_rental_shop_description); ?></p>
                        <?php }?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 align-self-center phone-box text-md-right">
                <?php if(get_theme_mod('bike_rental_shop_phone') != '' ){ ?>
                    <p class="mb-0"><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('bike_rental_shop_phone','')); ?></p>
                <?php }?>
            </div>
            <div class="col-lg-5 col-md-1 col-sm-1 col-4 align-self-center">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 col-8 align-self-center text-center text-md-right">
                <div class="social-link text-center text-md-right">
                    <?php if(get_theme_mod('bike_rental_shop_facebook_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('bike_rental_shop_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('bike_rental_shop_twitter_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('bike_rental_shop_twitter_url','')); ?>"><i class="fab fa-twitter"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('bike_rental_shop_intagram_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('bike_rental_shop_intagram_url','')); ?>"><i class="fab fa-instagram"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('bike_rental_shop_linkedin_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('bike_rental_shop_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('bike_rental_shop_youtube_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('bike_rental_shop_youtube_url','')); ?>"><i class="fab fa-youtube"></i></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
