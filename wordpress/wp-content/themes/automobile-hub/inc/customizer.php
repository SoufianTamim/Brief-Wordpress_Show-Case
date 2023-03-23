<?php
/**
 * Automobile Hub: Customizer
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function automobile_hub_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'automobile_hub_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'automobile-hub' ),
	    'description' => __( 'Description of what this panel does.', 'automobile-hub' ),
	) );

	//TP Color Option
	$wp_customize->add_section('automobile_hub_color_option',array(
     'title'         => __('TP Color Option', 'automobile-hub'),
     'priority' => 10,
     'panel' => 'automobile_hub_panel_id'
    ) );

	$wp_customize->add_setting( 'automobile_hub_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_hub_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'automobile-hub'),
	    'section' => 'automobile_hub_color_option',
	    'settings' => 'automobile_hub_tp_color_option',
  	)));

  	$wp_customize->add_setting( 'automobile_hub_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_hub_tp_color_option_link', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'automobile-hub'),
	    'section' => 'automobile_hub_color_option',
	    'settings' => 'automobile_hub_tp_color_option_link',
  	)));

	//Sidebar Position
	$wp_customize->add_section('automobile_hub_tp_general_settings',array(
        'title' => __('TP General Option', 'automobile-hub'),
        'priority' => 2,
        'panel' => 'automobile_hub_panel_id'
    ) );

   $wp_customize->add_setting('automobile_hub_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'automobile_hub_sanitize_choices'
	));
   $wp_customize->add_control('automobile_hub_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'automobile-hub'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'automobile-hub'),
        'section' => 'automobile_hub_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','automobile-hub'),
            'Container' => __('Container','automobile-hub'),
            'Container Fluid' => __('Container Fluid','automobile-hub')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('automobile_hub_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'automobile_hub_sanitize_choices'
	));
	$wp_customize->add_control('automobile_hub_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'automobile-hub'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'automobile-hub'),
        'section' => 'automobile_hub_tp_general_settings',
        'choices' => array(
            'full' => __('Full','automobile-hub'),
            'left' => __('Left','automobile-hub'),
            'right' => __('Right','automobile-hub'),
            'three-column' => __('Three Columns','automobile-hub'),
            'four-column' => __('Four Columns','automobile-hub'),
            'grid' => __('Grid Layout','automobile-hub')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('automobile_hub_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'automobile_hub_sanitize_choices'
	));
	$wp_customize->add_control('automobile_hub_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'automobile-hub'),
        'description'   => __('This option work for pages.', 'automobile-hub'),
        'section' => 'automobile_hub_tp_general_settings',
        'choices' => array(
            'full' => __('Full','automobile-hub'),
            'left' => __('Left','automobile-hub'),
            'right' => __('Right','automobile-hub')
        ),
	) );

	$wp_customize->add_setting('automobile_hub_sticky',array(
		'default' => false,
		'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('automobile_hub_sticky',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Sticky Header','automobile-hub'),
		'section' => 'automobile_hub_tp_general_settings',
	));

	//TP Blog Option
	$wp_customize->add_section('automobile_hub_blog_option',array(
        'title' => __('TP Blog Option', 'automobile-hub'),
        'priority' => 1,
        'panel' => 'automobile_hub_panel_id'
    ) );

    $wp_customize->add_setting('automobile_hub_remove_date',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_remove_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date Option','automobile-hub'),
       'section' => 'automobile_hub_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'automobile_hub_remove_date', array(
		'selector' => '.entry-date',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_remove_date',
	 ) );

    $wp_customize->add_setting('automobile_hub_remove_author',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_remove_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author Option','automobile-hub'),
       'section' => 'automobile_hub_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'automobile_hub_remove_author', array(
		'selector' => '.entry-author',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_remove_author',
	 ) );

    $wp_customize->add_setting('automobile_hub_remove_comments',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_remove_comments',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comment Option','automobile-hub'),
       'section' => 'automobile_hub_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'automobile_hub_remove_comments', array(
		'selector' => '.entry-comments',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_remove_comments',
	 ) );

    $wp_customize->add_setting('automobile_hub_remove_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_remove_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tags Option','automobile-hub'),
       'section' => 'automobile_hub_blog_option',
    ));

    $wp_customize->add_setting('automobile_hub_remove_read_button',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_remove_read_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Read More Button','automobile-hub'),
       'section' => 'automobile_hub_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'automobile_hub_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_remove_read_button',
	 ) );

    $wp_customize->add_setting('automobile_hub_read_more_text',array(
		'default'=> __('Read More','automobile-hub'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_hub_read_more_text',array(
		'label'	=> __('Edit Button Text','automobile-hub'),
		'section'=> 'automobile_hub_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'automobile_hub_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'automobile_hub_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'automobile_hub_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','automobile-hub' ),
		'section'     => 'automobile_hub_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//TP Preloader Option
	$wp_customize->add_section('automobile_hub_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'automobile-hub'),
		'priority' => 3,
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('automobile_hub_preloader_show_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
	));
 	$wp_customize->add_control('automobile_hub_preloader_show_hide',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Preloader Option','automobile-hub'),
		'section' => 'automobile_hub_prelaoder_option',
	));

	$wp_customize->add_setting( 'automobile_hub_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_hub_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'automobile-hub'),
	    'section' => 'automobile_hub_prelaoder_option',
	    'settings' => 'automobile_hub_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'automobile_hub_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_hub_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'automobile-hub'),
	    'section' => 'automobile_hub_prelaoder_option',
	    'settings' => 'automobile_hub_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'automobile_hub_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_hub_tp_preloader_bg_color_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'automobile-hub'),
	    'section' => 'automobile_hub_prelaoder_option',
	    'settings' => 'automobile_hub_tp_preloader_bg_color_option',
  	)));

	// Top Bar
	$wp_customize->add_section( 'automobile_hub_topbar', array(
    	'title'      => __( 'Contact Details', 'automobile-hub' ),
    	'priority' => 4,
    	'description' => __( 'Add your contact details', 'automobile-hub' ),
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('automobile_hub_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_hub_mail_text',array(
		'label'	=> __('Add Email Text','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('automobile_hub_mail',array(
		'label'	=> __('Add Mail Address','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_hub_call_text',array(
		'label'	=> __('Add Call Text','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'automobile_hub_call_text', array(
		'selector' => '.headerbox .call',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_call_text',
	) );

	$wp_customize->add_setting('automobile_hub_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'automobile_hub_sanitize_phone_number'
	));
	$wp_customize->add_control('automobile_hub_call',array(
		'label'	=> __('Add Phone Number','automobile-hub'),
		'section'=> 'automobile_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_search_icon',array(
		'default' => true,
		'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
	));
 	$wp_customize->add_control('automobile_hub_search_icon',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Search Option','automobile-hub'),
		'section' => 'automobile_hub_topbar',
	));

	$wp_customize->selective_refresh->add_partial( 'automobile_hub_search_icon', array(
		'selector' => '.search_btn i',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_search_icon',
	) );

	//Social Media
	$wp_customize->add_section( 'automobile_hub_social_media', array(
    	'title'      => __( 'Social Media Links', 'automobile-hub' ),
    	'priority' => 5,
    	'description' => __( 'Add your Social Links', 'automobile-hub' ),
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial( 'automobile_hub_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_facebook_url',
	) );

	$wp_customize->add_setting('automobile_hub_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_hub_facebook_url',array(
		'label'	=> __('Facebook Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_hub_twitter_url',array(
		'label'	=> __('Twitter Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_hub_instagram_url',array(
		'label'	=> __('Instagram Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_hub_youtube_url',array(
		'label'	=> __('YouTube Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('automobile_hub_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_hub_pint_url',array(
		'label'	=> __('Pinterest Link','automobile-hub'),
		'section'=> 'automobile_hub_social_media',
		'type'=> 'url'
	));
	
	$wp_customize->add_setting('automobile_hub_social_icon_fontsize',array(
		'default'=> '14',
		'sanitize_callback'	=> 'automobile_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('automobile_hub_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','automobile-hub'),
		'type'=> 'number',
		'section'=> 'automobile_hub_social_media',
		'input_attrs' => array(
      'step' => 1,
			'min'  => 0,
			'max'  => 100,
        ),
	));

	//home page slider
	$wp_customize->add_section( 'automobile_hub_slider_section' , array(
    	'title'      => __( 'Slider Section', 'automobile-hub' ),
    	'priority' => 6,
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('automobile_hub_slider_arrows',array(
       'default' => false,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
   $wp_customize->add_control('automobile_hub_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','automobile-hub'),
       'section' => 'automobile_hub_slider_section',
    ));

 	$wp_customize->selective_refresh->add_partial( 'automobile_hub_slider_arrows', array(
		'selector' => '#slider .carousel-caption',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_slider_arrows',
	) );


	for ( $automobile_hub_count = 1; $automobile_hub_count <= 4; $automobile_hub_count++ ) {

		$wp_customize->add_setting( 'automobile_hub_slider_page' . $automobile_hub_count, array(
			'default'           => '',
			'sanitize_callback' => 'automobile_hub_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'automobile_hub_slider_page' . $automobile_hub_count, array(
			'label'    => __( 'Select Slide Image Page', 'automobile-hub' ),
			'section'  => 'automobile_hub_slider_section',
			'type'     => 'dropdown-pages'
		) );

	}

	//About Section
	$wp_customize->add_section('automobile_hub_about_section',array(
		'title'	=> __('About Section','automobile-hub'),
		'panel' => 'automobile_hub_panel_id',
	));

	$wp_customize->add_setting('automobile_hub_about_tittle',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_hub_about_tittle',array(
		'label'	=> __('About Title','automobile-hub'),
		'section'	=> 'automobile_hub_about_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'automobile_hub_about_tittle', array(
		'selector' => '#about h3',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_about_tittle',
	) );

	$wp_customize->add_setting( 'automobile_hub_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'automobile_hub_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'automobile_hub_about_page', array(
		'label'    => __( 'Select About Page', 'automobile-hub' ),
		'section'  => 'automobile_hub_about_section',
		'type'     => 'dropdown-pages'
	) );

	//footer
	$wp_customize->add_section('automobile_hub_footer_section',array(
		'title'	=> __('Footer Text','automobile-hub'),
		'description'	=> __('Add copyright text.','automobile-hub'),
		'panel' => 'automobile_hub_panel_id'
	));

	$wp_customize->add_setting('automobile_hub_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_hub_footer_text',array(
		'label'	=> __('Copyright Text','automobile-hub'),
		'section'	=> 'automobile_hub_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'automobile_hub_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'automobile_hub_customize_partial_automobile_hub_footer_text',
	) );

    $wp_customize->add_setting('automobile_hub_return_to_header',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_return_to_header',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Return to header','automobile-hub'),
       'section' => 'automobile_hub_footer_section',
    ));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('automobile_hub_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'automobile_hub_sanitize_choices'
	));
	$wp_customize->add_control('automobile_hub_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'automobile-hub'),
        'description'   => __('This option work for scroll to top', 'automobile-hub'),
        'section' => 'automobile_hub_footer_section',
        'choices' => array(
            'Right' => __('Right','automobile-hub'),
            'Left' => __('Left','automobile-hub'),
            'Center' => __('Center','automobile-hub')
        ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'automobile_hub_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'automobile_hub_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('automobile_hub_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','automobile-hub'),
       'section' => 'title_tagline',
    ));

		// logo site title size
		$wp_customize->add_setting('automobile_hub_site_title_font_size',array(
			'default'	=> 30,
			'sanitize_callback'	=> 'automobile_hub_sanitize_number_absint'
		));
		$wp_customize->add_control('automobile_hub_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','automobile-hub'),
			'section'	=> 'title_tagline',
			'setting'	=> 'automobile_hub_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 100,
			),
		));

    $wp_customize->add_setting('automobile_hub_site_tagline',array(
       'default' => false,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_site_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tagline','automobile-hub'),
       'section' => 'title_tagline',
    ));

		// logo site tagline size
	$wp_customize->add_setting('automobile_hub_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'automobile_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('automobile_hub_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','automobile-hub'),
		'section'	=> 'title_tagline',
		'setting'	=> 'automobile_hub_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

    $wp_customize->add_setting('automobile_hub_logo_width',array(
		'default' => 80,
		'sanitize_callback'	=> 'automobile_hub_sanitize_number_absint'
	));
	 $wp_customize->add_control('automobile_hub_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','automobile-hub'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('automobile_hub_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'automobile_hub_sanitize_choices'
	));
    $wp_customize->add_control('automobile_hub_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'automobile-hub'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'automobile-hub'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','automobile-hub'),
            'Same Line' => __('Same Line','automobile-hub')
        ),
	) );

	$wp_customize->add_setting('automobile_hub_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'automobile_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('automobile_hub_per_columns',array(
		'label'	=> __('Product Per Row','automobile-hub'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('automobile_hub_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'automobile_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('automobile_hub_product_per_page',array(
		'label'	=> __('Product Per Page','automobile-hub'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    $wp_customize->add_setting('automobile_hub_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Shop page sidebar','automobile-hub'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting('automobile_hub_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_hub_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product page sidebar','automobile-hub'),
       'section' => 'woocommerce_product_catalog',
    ));
}
add_action( 'customize_register', 'automobile_hub_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Automobile Hub 1.0
 * @see automobile_hub_customize_register()
 *
 * @return void
 */
function automobile_hub_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Automobile Hub 1.0
 * @see automobile_hub_customize_register()
 *
 * @return void
 */
function automobile_hub_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_NAME' ) ) {
	define( 'AUTOMOBILE_HUB_PRO_THEME_NAME', esc_html__( 'Automobile Pro Theme', 'automobile-hub' ));
}
if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_URL' ) ) {
	define( 'AUTOMOBILE_HUB_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/automobile-wordpress-theme/'));
}
if ( ! defined( 'AUTOMOBILE_HUB_DOCS_URL' ) ) {
	define( 'AUTOMOBILE_HUB_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/automobile-hub-lite/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Automobile_Hub_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Automobile_Hub_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Automobile_Hub_Customize_Section_Pro(
				$manager,
				'automobile_hub_section_pro',
				array(
					'priority'   => 9,
					'title'    => AUTOMOBILE_HUB_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'automobile-hub' ),
					'pro_url'  => esc_url( AUTOMOBILE_HUB_PRO_THEME_URL, 'automobile-hub' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Automobile_Hub_Customize_Section_Pro(
				$manager,
				'automobile_hub_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'automobile-hub' ),
					'pro_text' => esc_html__( 'Click Here', 'automobile-hub' ),
					'pro_url'  => esc_url( AUTOMOBILE_HUB_DOCS_URL, 'automobile-hub'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'automobile-hub-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'automobile-hub-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Automobile_Hub_Customize::get_instance();
