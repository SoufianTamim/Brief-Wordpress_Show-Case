<?php
/*
* Display Theme menus
*/

$automobile_hub_sticky = get_theme_mod('automobile_hub_sticky');
    $data_sticky = "false";
    if ($automobile_hub_sticky) {
    $data_sticky = "true";
    }
    global $wp_customize;
?>
<div class="menubar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($data_sticky); ?>">
  	<div class="container right_menu">
  		<div class="row">
	    	<div class="menubox col-lg-8 col-md-2 col-3 align-self-center">
	      		<div class="innermenubox">
	      			<?php if(has_nav_menu('primary-menu')){ ?>
		      			<div class="toggle-nav mobile-menu">
	            			<button onclick="automobile_hub_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','automobile-hub'); ?></span></button>
	          			</div>
	          		<?php }?>
         	 		<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'automobile-hub' ); ?>">
			              	<?php if(has_nav_menu('primary-menu')){
			                  	wp_nav_menu( array(
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	} ?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="automobile_hub_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','automobile-hub'); ?></span></a>
	            		</nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
			<div class="col-lg-3 col-md-8 col-6 social-media align-self-center">
				<?php if( get_theme_mod( 'automobile_hub_facebook_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_twitter_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_instagram_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_youtube_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_pint_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i></a>
				<?php } ?>
			</div>
	    	<div class="search-box col-lg-1 col-md-2 col-3 align-self-center">
	    		<?php if(get_theme_mod('automobile_hub_search_icon',true) != ''){ ?>
		        	<button class="search_btn"><i class="fas fa-search"></i></button>
		        <?php }?>
	      	</div>
	    </div>
	    <div class="search_outer">
	      	<div class="search_inner">
	        	<?php get_search_form(); ?>
	        </div>
      	</div>
  	</div>
</div>
