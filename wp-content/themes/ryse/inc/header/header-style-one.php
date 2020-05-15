<?php
/**
 * Header Style One Template
 *
 * @package ryse
 */

?>

<!-- wraper_header -->
<?php if ( true == ryse_global_var( 'header_one_floating', '', false ) ) { ?>
	<header class="wraper_header style-one floating-header">
<?php } else { ?>
	<header class="wraper_header style-one static-header">
<?php } ?>
	<!-- wraper_header_main -->
	<?php if ( true == ryse_global_var( 'header_one_sticky', '', false ) ) { ?>
	    <div data-delay="<?php echo esc_attr( ryse_global_var( 'header_one_sticky_delay', '', false ) ); ?>" class="wraper_header_main radiantthemes-sticky-style-<?php echo esc_attr( ryse_global_var( 'header_one_sticky_style', '', false ) ); ?>">
	<?php } else { ?>
		<div class="wraper_header_main">
	<?php } ?>
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<?php if ( ryse_global_var( 'header_one_logo', 'url', true ) ) { ?>
					<!-- brand-logo -->
					<div class="brand-logo radiantthemes-retina">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( ryse_global_var( 'header_one_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( ryse_global_var( 'header_one_logo', 'alt', true ) ); ?>"></a>
					</div>
					<!-- brand-logo -->
				<?php } ?>
				<?php if ( true == ryse_global_var( 'header_one_mobile_menu_display', '', false ) ) : ?>
					<!-- header-responsive-nav -->
					<div class="header-responsive-nav hidden-lg hidden-md visible-sm visible-xs">
						<i class="fa fa-bars"></i>
					</div>
					<!-- header-responsive-nav -->
				<?php endif; ?>
				<?php if ( true == ryse_global_var( 'header_one_hamburger_display', '', false ) ) : ?>
				    <!-- header-hamburger-menu -->
					<?php if ( true == ryse_global_var( 'header_one_hamburger_mobile', '', false ) ) { ?>
						<div class="header-hamburger-menu">
					<?php } else { ?>
						<div class="header-hamburger-menu hidden-sm hidden-xs">
					<?php } ?>
					    <i class="fa fa-bars"></i>
					</div>
					<!-- header-hamburger-menu -->
				<?php endif; ?>
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( ( class_exists( 'WooCommerce' ) ) && ( true == ryse_global_var( 'header_one_cart_display', '', false ) ) ) : ?>
							<li class="header-cart-bar">
								<a class="header-cart-bar-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
									<i class="fa fa-shopping-basket"></i>
									<span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php if ( true == ryse_global_var( 'header_one_search_display', '', false ) ) : ?>
							<li class="header-flyout-searchbar">
								<span class="ti-close"></span>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<!-- header_main_action -->
				<!-- nav -->
				<nav class="nav visible-lg visible-md hidden-sm hidden-xs">
					<?php
					if ( true == ryse_global_var( 'header_one_menu_singlepagemode', '', false ) ) {
        				wp_nav_menu(
                            array(
                                'theme_location' => 'top',
                                'fallback_cb'    => false,
                                'items_wrap'     => '<ul id="%1$s" class="%2$s single-page-mode">%3$s</ul>',
                                'walker'         => ( class_exists( 'Radiantthemes_Menu_Walker' ) ) ? new Radiantthemes_Menu_Walker() : '',
                            )
                        );
        			} else {
        			     wp_nav_menu(
                			array(
                        		'theme_location' => 'top',
                        		'fallback_cb'    => false,
                        		'walker'         => ( class_exists( 'Radiantthemes_Menu_Walker' ) ) ? new Radiantthemes_Menu_Walker() : '',
            			    )
            		    );
        			} ?>
				</nav>
				<!-- nav -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<?php if ( true == ryse_global_var( 'header_one_mobile_menu_display', '', false ) ) : ?>
	<!-- mobile-menu -->
	<div class="mobile-menu hidden">
		<!-- mobile-menu-main -->
		<div class="mobile-menu-main">
			<!-- mobile-menu-close -->
			<div class="mobile-menu-close">
				<i class="fa fa-times"></i>
			</div>
			<!-- mobile-menu-close -->
			<!-- mobile-menu-nav -->
			<nav class="mobile-menu-nav">
				<?php if ( true == ryse_global_var( 'header_one_menu_singlepagemode', '', false ) || $currentUrl == '/plumbers/') {
    				wp_nav_menu(
                        array(
                            'menu'        => 'Plumbers Header Menu',
                            'fallback_cb' => false,
                            'items_wrap'  => '<ul id="%1$s" class="%2$s single-page-mode">%3$s</ul>',
                            'walker'      => ( class_exists( 'Radiantthemes_Menu_Walker' ) ) ? new Radiantthemes_Menu_Walker() : '',
                        )
                    );
    			} else {
    			    wp_nav_menu(
                        array(
                            'theme_location' => 'top',
                            'fallback_cb'    => false,
                            'walker'         => ( class_exists( 'Radiantthemes_Menu_Walker' ) ) ? new Radiantthemes_Menu_Walker() : '',
                        )
                    );
    		    } ?>
			</nav>
			<!-- mobile-menu-nav -->
		</div>
		<!-- mobile-menu-main -->
	</div>
	<!-- mobile-menu -->
<?php endif; ?>

<?php if ( true == ryse_global_var( 'header_one_search_display', '', false ) ) : ?>
	<!-- wraper_flyout_search -->
	<div class="wraper_flyout_search header-style-one">
		<div class="table">
			<div class="table-cell">
			    <!-- flyout-search-layer -->
    		    <div class="flyout-search-layer"></div>
    		    <!-- flyout-search-layer -->
    		    <!-- flyout-search-layer -->
    		    <div class="flyout-search-layer"></div>
    		    <!-- flyout-search-layer -->
    		    <!-- flyout-search-layer -->
    		    <div class="flyout-search-layer"></div>
    		    <!-- flyout-search-layer -->
    		    <!-- flyout-search-close -->
    			<div class="flyout-search-close">
    				<span class="flyout-search-close-line"></span>
    				<span class="flyout-search-close-line"></span>
    			</div>
    			<!-- flyout-search-close -->
			    <!-- flyout_search -->
			    <div class="flyout_search">
			        <!-- flyout-search-title -->
					<div class="flyout-search-title">
						<h4><?php echo esc_attr__( 'Search', 'ryse' ); ?></h4>
					</div>
					<!-- flyout-search-title -->
					<!-- flyout-search-bar -->
					<div class="flyout-search-bar">
						<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="form-row">
							<input type="search" placeholder="<?php echo esc_attr__( 'Type to search...', 'ryse' ); ?>" value="" name="s" required>
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
						</form>
					</div>
					<!-- flyout-search-bar -->
			    </div>
			    <!-- flyout_search -->
			</div>
		</div>
	</div>
	<!-- wraper_flyout_search -->
<?php endif; ?>
