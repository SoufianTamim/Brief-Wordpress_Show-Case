<?php
/**
 * Bike Rental Shop Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Bike Rental Shop
 */

use WPTRT\Customize\Section\Bike_Rental_Shop_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Bike_Rental_Shop_Button::class );

    $manager->add_section(
        new Bike_Rental_Shop_Button( $manager, 'bike_rental_shop_pro', [
            'title'       => __( 'Bike Rental Shop Pro', 'bike-rental-shop' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'bike-rental-shop' ),
            'button_url'  => 'https://www.themagnifico.net/themes/bike-rental-wordpress-theme/'
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'bike-rental-shop-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'bike-rental-shop-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bike_rental_shop_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('bike_rental_shop_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'bike_rental_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'bike_rental_shop_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'bike-rental-shop' ),
        'section'        => 'title_tagline',
        'settings'       => 'bike_rental_shop_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('bike_rental_shop_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'bike_rental_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'bike_rental_shop_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'bike-rental-shop' ),
        'section'        => 'title_tagline',
        'settings'       => 'bike_rental_shop_theme_description',
        'type'           => 'checkbox',
    )));

    // General Settings
     $wp_customize->add_section('bike_rental_shop_general_settings',array(
        'title' => esc_html__('General Settings','bike-rental-shop'),
        'description' => esc_html__('General settings of our theme.','bike-rental-shop'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('bike_rental_shop_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'bike_rental_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'bike_rental_shop_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'bike-rental-shop' ),
        'section'        => 'bike_rental_shop_general_settings',
        'settings'       => 'bike_rental_shop_scroll_hide',
        'type'           => 'checkbox',
    )));

    //Header
    $wp_customize->add_section('bike_rental_shop_header',array(
        'title' => esc_html__('Header Option','bike-rental-shop')
    ));

    $wp_customize->add_setting('bike_rental_shop_phone',array(
        'default' => '',
        'sanitize_callback' => 'bike_rental_shop_sanitize_phone_number'
    ));
    $wp_customize->add_control('bike_rental_shop_phone',array(
        'label' => esc_html__('Phone Number','bike-rental-shop'),
        'section' => 'bike_rental_shop_header',
        'setting' => 'bike_rental_shop_phone',
        'type'  => 'text'
    ));

    // Social Link
    $wp_customize->add_section('bike_rental_shop_social_link',array(
        'title' => esc_html__('Social Links','bike-rental-shop'),
    ));

    $wp_customize->add_setting('bike_rental_shop_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('bike_rental_shop_facebook_url',array(
        'label' => esc_html__('Facebook Link','bike-rental-shop'),
        'section' => 'bike_rental_shop_social_link',
        'setting' => 'bike_rental_shop_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('bike_rental_shop_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('bike_rental_shop_twitter_url',array(
        'label' => esc_html__('Twitter Link','bike-rental-shop'),
        'section' => 'bike_rental_shop_social_link',
        'setting' => 'bike_rental_shop_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('bike_rental_shop_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('bike_rental_shop_intagram_url',array(
        'label' => esc_html__('Intagram Link','bike-rental-shop'),
        'section' => 'bike_rental_shop_social_link',
        'setting' => 'bike_rental_shop_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('bike_rental_shop_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('bike_rental_shop_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','bike-rental-shop'),
        'section' => 'bike_rental_shop_social_link',
        'setting' => 'bike_rental_shop_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('bike_rental_shop_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('bike_rental_shop_youtube_url',array(
        'label' => esc_html__('YouTube Link','bike-rental-shop'),
        'section' => 'bike_rental_shop_social_link',
        'setting' => 'bike_rental_shop_pintrest_url',
        'type'  => 'url'
    ));

    // Slider
    $wp_customize->add_section('bike_rental_shop_top_slider',array(
        'title' => esc_html__('Slider Option','bike-rental-shop')
    ));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'bike_rental_shop_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'bike_rental_shop_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'bike_rental_shop_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'bike-rental-shop' ),
            'section'  => 'bike_rental_shop_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    // Slider Product
    $wp_customize->add_section('bike_rental_shop_slider_product',array(
        'title' => esc_html__('Slider Porduct Option','bike-rental-shop')
    ));

    $wp_customize->add_setting('bike_rental_shop_new_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('bike_rental_shop_new_product_number',array(
        'label' => esc_html__('No of Product','bike-rental-shop'),
        'section' => 'bike_rental_shop_slider_product',
        'setting' => 'bike_rental_shop_new_product_number',
        'type'  => 'number'
    ));

    $bike_rental_shop_args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $bike_rental_shop_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('bike_rental_shop_new_product_category',array(
        'sanitize_callback' => 'bike_rental_shop_sanitize_select',
    ));
    $wp_customize->add_control('bike_rental_shop_new_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','bike-rental-shop'),
        'section' => 'bike_rental_shop_slider_product',
    ));

    // Recent Product
    $wp_customize->add_section('bike_rental_shop_recent_product',array(
        'title' => esc_html__('Recent Product Option','bike-rental-shop')
    ));

    $wp_customize->add_setting('bike_rental_shop_recent_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('bike_rental_shop_recent_product_number',array(
        'label' => esc_html__('No of Product','bike-rental-shop'),
        'section' => 'bike_rental_shop_recent_product',
        'setting' => 'bike_rental_shop_recent_product_number',
        'type'  => 'number'
    ));

    $bike_rental_shop_args = array(
        'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $bike_rental_shop_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('bike_rental_shop_recent_product_category',array(
        'sanitize_callback' => 'bike_rental_shop_sanitize_select',
    ));
    $wp_customize->add_control('bike_rental_shop_recent_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','bike-rental-shop'),
        'section' => 'bike_rental_shop_recent_product',
    ));

    // Footer
    $wp_customize->add_section('bike_rental_shop_site_footer_section', array(
        'title' => esc_html__('Footer', 'bike-rental-shop'),
    ));

    $wp_customize->add_setting('bike_rental_shop_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bike_rental_shop_footer_text_setting', array(
        'label' => __('Replace the footer text', 'bike-rental-shop'),
        'section' => 'bike_rental_shop_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'bike_rental_shop_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bike_rental_shop_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bike_rental_shop_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bike_rental_shop_customize_preview_js(){
    wp_enqueue_script('bike-rental-shop-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'bike_rental_shop_customize_preview_js');
