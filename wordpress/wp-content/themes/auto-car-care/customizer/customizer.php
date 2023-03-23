<?php

function auto_car_care_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_setting( 'automobile_hub_mail_text' );
    $wp_customize->remove_control( 'automobile_hub_mail_text' );
   	$wp_customize->remove_setting( 'automobile_hub_call_text' );
    $wp_customize->remove_control( 'automobile_hub_call_text' );
}
add_action( 'customize_register', 'auto_car_care_remove_customize_register', 11 );

function auto_car_care_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'auto_car_care_topbar_section' , array(
    	'title'      => __( 'Topbar Settings', 'auto-car-care' ),
    	'priority' => 3,
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('auto_car_care_my_account_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('auto_car_care_my_account_link',array(
		'label'	=> __('My Account Page Link','auto-car-care'),
		'section'	=> 'auto_car_care_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('auto_car_care_my_account_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_car_care_my_account_text',array(
		'label'	=> __('My Account Text','auto-car-care'),
		'section'	=> 'auto_car_care_topbar_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'auto_car_care_my_account_text', array(
		'selector' => '.topbarbox a',
		'render_callback' => 'auto_car_care_customize_partial_auto_car_care_my_account_text',
	) );

	$wp_customize->add_setting('auto_car_care_wishlist_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('auto_car_care_wishlist_link',array(
		'label'	=> __('My Wishlist Page Link','auto-car-care'),
		'section'	=> 'auto_car_care_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('auto_car_care_wishlist_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_car_care_wishlist_text',array(
		'label'	=> __('My Wishlist Text','auto-car-care'),
		'section'	=> 'auto_car_care_topbar_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('auto_car_care_compare_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('auto_car_care_compare_link',array(
		'label'	=> __('My Compare Page Link','auto-car-care'),
		'section'	=> 'auto_car_care_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('auto_car_care_compare_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_car_care_compare_text',array(
		'label'	=> __('My Wishlist Text','auto-car-care'),
		'section'	=> 'auto_car_care_topbar_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_hub_address',array(
		'label'	=> __('Add Location','auto-car-care'),
		'section'	=> 'automobile_hub_topbar',
		'type'		=> 'text'
	));

	// Abouts us
	$wp_customize->add_setting('auto_car_care_about_points',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_car_care_about_points',array(
		'label'	=> __('Add number of points','auto-car-care'),
		'section'	=> 'automobile_hub_about_section',
		'type'		=> 'number'
	));

	$auto_car_care_about_point = get_theme_mod('auto_car_care_about_points','');
   	for ( $m = 1; $m <= $auto_car_care_about_point; $m++ ){

		$wp_customize->add_setting('auto_car_care_about_points_text'.$m,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('auto_car_care_about_points_text'.$m,array(
			'label'	=> __('Add Text ','auto-car-care').$m,
			'section'	=> 'automobile_hub_about_section',
			'type'		=> 'text'
		));
	}

	// Contact Form
	$wp_customize->add_section( 'auto_car_care_contact_section' , array(
    	'title'      => __( 'Contact Form Settings', 'auto-car-care' ),
    	'priority' => 10,
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('auto_car_care_contact_form_shortcode',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_car_care_contact_form_shortcode',array(
		'label'	=> __('Add Contact Form 7 Shortcode','auto-car-care'),
		'section'	=> 'auto_car_care_contact_section',
		'type'		=> 'text'
	));
}
add_action( 'customize_register', 'auto_car_care_customize_register' );
