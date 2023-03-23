<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'auto_car_care_after_setup_theme' );
function auto_car_care_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'auto-car-care-featured-image', 2000, 1200, true );
    add_image_size( 'auto-car-care-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register custom fonts.
 */
function auto_car_care_fonts_url(){
    $font_url = '';
    $font_family = array();
    $font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

    $automobile_hub_query_args = array(
        'family'    => rawurlencode(implode('|',$font_family)),
    );
    $font_url = add_query_arg($automobile_hub_query_args,'//fonts.googleapis.com/css');
    return $font_url;
}

/**
 * Register widget area.
 */
function auto_car_care_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'auto-car-care' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'auto-car-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'auto-car-care' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'auto-car-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'auto-car-care' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'auto-car-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'auto-car-care' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-car-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'auto-car-care' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-car-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'auto-car-care' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-car-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'auto-car-care' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-car-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'auto_car_care_widgets_init' );

// enqueue styles for child theme
function auto_car_care_enqueue_styles() {

    wp_enqueue_style( 'auto-car-care-fonts', auto_car_care_fonts_url(), array(), null );

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'auto-car-care-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'auto-car-care-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('automobile-hub-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('auto-car-care-child-style', get_stylesheet_directory_uri() .'/style.css', array('automobile-hub-style'));

    require get_theme_file_path( '/tp-theme-color.php' );
    wp_add_inline_style( 'auto-car-care-child-style',$automobile_hub_tp_theme_css );

    wp_style_add_data('auto-car-care-child-style', 'rtl', 'replace');

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'auto_car_care_enqueue_styles');

function auto_car_care_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'auto-car-care-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'auto_car_care_admin_scripts' );

define('AUTO_CAR_CARE_CREDIT',__('https://www.themespride.com/themes/free-auto-car-care-wordpress-theme/','auto-car-care') );
if ( ! function_exists( 'auto_car_care_credit' ) ) {
    function auto_car_care_credit(){
        echo "<a href=".esc_url(AUTO_CAR_CARE_CREDIT)." target='_blank'>".esc_html__('Auto Car Care WordPress Theme','auto-car-care')."</a>";
    }
}

function auto_car_care_header_style() {
    if ( get_header_image() ) :
    $auto_car_care_custom_header = "
        .menubar{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'auto-car-care-child-style', $auto_car_care_custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'auto_car_care_header_style' );

if ( ! defined( 'AUTOMOBILE_HUB_FREE_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_FREE_THEME_URL', 'https://www.themespride.com/themes/free-auto-car-care-wordpress-theme/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_RATE_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_RATE_THEME_URL', 'https://wordpress.org/support/theme/auto-car-care/reviews/#new-post' );
}
if ( ! defined( 'AUTOMOBILE_HUB_CHANGELOG_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}
if ( ! defined( 'AUTOMOBILE_HUB_SUPPORT_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/auto-car-care/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_DOCS_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DOCS_THEME_URL', esc_url('https://www.themespride.com/demo/docs/auto-car-care-lite/'));
}
if ( ! defined( 'AUTOMOBILE_HUB_DOCS_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/auto-car-care-lite/'));
}
