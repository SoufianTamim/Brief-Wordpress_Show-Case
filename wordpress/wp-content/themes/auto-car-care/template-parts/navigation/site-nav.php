<?php
/*
* Display Theme menus
*/
?>
<?php
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
  			<div class="col-lg-3 col-md-6 align-self-center">
		        <?php $automobile_hub_logo_settings = get_theme_mod( 'automobile_hub_logo_settings','Different Line');
		        if($automobile_hub_logo_settings == 'Different Line'){ ?>
		          	<div class="logo">
		            	<?php if( has_custom_logo() ) automobile_hub_the_custom_logo(); ?>
			            <?php if(get_theme_mod('automobile_hub_site_title',true) != ''){ ?>
			              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			            <?php }?>
		            	<?php $automobile_hub_description = get_bloginfo( 'description', 'display' );
			            if ( $automobile_hub_description || is_customize_preview() ) : ?>
			              	<?php if(get_theme_mod('automobile_hub_site_tagline','') != ''){ ?>
	               				<p class="site-description"><?php echo esc_html($automobile_hub_description); ?></p>
			              	<?php }?>
			            <?php endif; ?>
		          	</div>
		        <?php }else if($automobile_hub_logo_settings == 'Same Line'){ ?>
		          	<div class="logo logo-same-line">
			            <div class="row">
		              		<div class="col-lg-5 col-md-5 align-self-center">
			                	<?php if( has_custom_logo() ) automobile_hub_the_custom_logo(); ?>
			              	</div>
				              <div class="col-lg-7 col-md-7 align-self-center">
				                <?php if(get_theme_mod('automobile_hub_site_title',true) != ''){ ?>
				                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				                <?php }?>
				                <?php $automobile_hub_description = get_bloginfo( 'description', 'display' );
				                if ( $automobile_hub_description || is_customize_preview() ) : ?>
			                  		<?php if(get_theme_mod('automobile_hub_site_tagline','') != ''){ ?>
			                    		<p class="site-description"><?php echo esc_html($automobile_hub_description); ?></p>
				                  	<?php }?>
				                <?php endif; ?>
			              	</div>
			            </div>
		          </div>
		        <?php }?>
	      	</div>
	    	<div class="menubox col-lg-7 col-md-3 col-6 align-self-center">
	      		<div class="innermenubox">
	      			<?php if(has_nav_menu('primary-menu')){ ?>
		      			<div class="toggle-nav mobile-menu">
	            			<button onclick="automobile_hub_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','auto-car-care'); ?></span></button>
	          			</div>
	          		<?php }?>
         	 		<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'auto-car-care' ); ?>">
			              	<?php if(has_nav_menu('primary-menu')){
			                  	wp_nav_menu( array(
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	} ?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="automobile_hub_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','auto-car-care'); ?></span></a>
	            		</nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
	    	<div class="search-box col-lg-1 col-md-2 col-6 align-self-center">
		        <?php if(class_exists('woocommerce')){ ?>
			      	<a class="cart_no">
		                <?php global $woocommerce; ?>
		            	<i class="fas fa-shopping-cart"></i><a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','auto-car-care' ); ?>"></a>
		            	<span class="cart-value simplep"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span>
		          	</a>
		        <?php } ?>
	      	</div>
	      	<div class="search-box col-lg-1 col-md-2 col-6 align-self-center">
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
