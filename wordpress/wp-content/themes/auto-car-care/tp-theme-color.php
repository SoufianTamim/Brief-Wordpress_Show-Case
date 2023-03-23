<?php

	$automobile_hub_tp_color_option = get_theme_mod('automobile_hub_tp_color_option');
	$automobile_hub_tp_color_option_link = get_theme_mod('automobile_hub_tp_color_option_link');

	$automobile_hub_tp_theme_css = '';

	if($automobile_hub_tp_color_option != false){
		$automobile_hub_tp_theme_css .='#theme-sidebar button[type="submit"], #footer button[type="submit"], .prev.page-numbers, .next.page-numbers, .page-numbers, #theme-sidebar .tagcloud a:hover, span.meta-nav, #comments input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, button[type="submit"],.more-btn a:hover,.center1 .ring::before,span.cart-value.simplep{';
			$automobile_hub_tp_theme_css .='background-color: '.esc_attr($automobile_hub_tp_color_option).';';
		$automobile_hub_tp_theme_css .='}';
	}
	if($automobile_hub_tp_color_option != false){
		$automobile_hub_tp_theme_css .='a, .search-box i, .main-navigation a:hover, .headerbox i, .box-content a, #theme-sidebar .textwidget a, #footer .textwidget a, .comment-body a, .entry-content a, .entry-summary a, a.page-numbers:hover, #theme-sidebar h3, #theme-sidebar a:hover, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .headerbox i:hover, .headerbox i:hover:after, #about h3, #about p i,#theme-sidebar button[type="submit"]:hover, #comments input[type="submit"]:hover, span.meta-nav:hover{';
			$automobile_hub_tp_theme_css .='color: '.esc_attr($automobile_hub_tp_color_option).';';
		$automobile_hub_tp_theme_css .='}';
	}
	if($automobile_hub_tp_color_option != false){
		$automobile_hub_tp_theme_css .='.more-btn a,.wp-block-pullquote blockquote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote,#footer .tagcloud a:hover, .search_inner form.search-form{';
			$automobile_hub_tp_theme_css .='border-color: '.esc_attr($automobile_hub_tp_color_option).';';
		$automobile_hub_tp_theme_css .='}';
	}

	if($automobile_hub_tp_color_option_link != false){
		$automobile_hub_tp_theme_css .='a:hover,#theme-sidebar a:hover{';
			$automobile_hub_tp_theme_css .='color: '.esc_attr($automobile_hub_tp_color_option_link).';';
		$automobile_hub_tp_theme_css .='}';
	}
	