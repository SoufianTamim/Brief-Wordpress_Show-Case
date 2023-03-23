<?php
/**
 * The header for our theme
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<?php if(get_theme_mod('automobile_hub_preloader_show_hide','') != ''){ ?>
	<div class="loader">
		<div class="center center1">
		    <div class="ring"></div>
		</div>
		<div class="center center2">
		    <div class="ring"></div>
		</div>
	</div>
<?php }?>

<header role="banner">
	<a class="screen-reader-text skip-link" href="#tp_content"><?php esc_html_e( 'Skip to content', 'automobile-hub' ); ?></a>
	<?php
	  get_template_part( 'template-parts/header/top', 'bar' );
	  get_template_part( 'template-parts/header/site', 'branding' );
	  get_template_part( 'template-parts/navigation/site', 'nav' );
	?>
</header>