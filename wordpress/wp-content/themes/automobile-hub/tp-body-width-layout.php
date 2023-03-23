<?php

	$automobile_hub_theme_lay = get_theme_mod( 'automobile_hub_tp_body_layout_settings','Full');
    if($automobile_hub_theme_lay == 'Container'){
		$automobile_hub_tp_theme_css .='body{';
			$automobile_hub_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$automobile_hub_tp_theme_css .='}';
		$automobile_hub_tp_theme_css .='.scrolled{';
			$automobile_hub_tp_theme_css .='width: auto; left:0; right:0;';
		$automobile_hub_tp_theme_css .='}';
	}else if($automobile_hub_theme_lay == 'Container Fluid'){
		$automobile_hub_tp_theme_css .='body{';
			$automobile_hub_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$automobile_hub_tp_theme_css .='}';
		$automobile_hub_tp_theme_css .='.scrolled{';
			$automobile_hub_tp_theme_css .='width: auto; left:0; right:0;';
		$automobile_hub_tp_theme_css .='}';
	}else if($automobile_hub_theme_lay == 'Full'){
		$automobile_hub_tp_theme_css .='body{';
			$automobile_hub_tp_theme_css .='max-width: 100%;';
		$automobile_hub_tp_theme_css .='}';
	}

    $automobile_hub_scroll_position = get_theme_mod( 'automobile_hub_scroll_top_position','Right');
    if($automobile_hub_scroll_position == 'Right'){
        $automobile_hub_tp_theme_css .='#return-to-top{';
            $automobile_hub_tp_theme_css .='right: 20px;';
        $automobile_hub_tp_theme_css .='}';
    }else if($automobile_hub_scroll_position == 'Left'){
        $automobile_hub_tp_theme_css .='#return-to-top{';
            $automobile_hub_tp_theme_css .='left: 20px;';
        $automobile_hub_tp_theme_css .='}';
    }else if($automobile_hub_scroll_position == 'Center'){
        $automobile_hub_tp_theme_css .='#return-to-top{';
            $automobile_hub_tp_theme_css .='right: 50%;left: 50%;';
        $automobile_hub_tp_theme_css .='}';
    }

			//Social icon Font size
	 $automobile_hub_social_icon_fontsize = get_theme_mod('automobile_hub_social_icon_fontsize');
	$automobile_hub_tp_theme_css .='.social-media a i{';
		$automobile_hub_tp_theme_css .='font-size: '.esc_attr($automobile_hub_social_icon_fontsize).'px;';
	$automobile_hub_tp_theme_css .='}';

	// site title and tagline font size option
	$automobile_hub_site_title_font_size = get_theme_mod('automobile_hub_site_title_font_size', 30);{
	$automobile_hub_tp_theme_css .='.logo h1 a, .logo p a{';
	$automobile_hub_tp_theme_css .='font-size: '.esc_attr($automobile_hub_site_title_font_size).'px !important;';
		$automobile_hub_tp_theme_css .='}';
	}

	$automobile_hub_site_tagline_font_size = get_theme_mod('automobile_hub_site_tagline_font_size', 15);{
	$automobile_hub_tp_theme_css .='.logo p{';
	$automobile_hub_tp_theme_css .='font-size: '.esc_attr($automobile_hub_site_tagline_font_size).'px;';
		$automobile_hub_tp_theme_css .='}';
	}
