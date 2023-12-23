<?php
/**
 * Header Style Twelve Template
 *
 * @package apexclinic
 */

?>

<!-- wraper_header -->
<?php if ( true == apexclinic_global_var( 'header_twelve_floating', '', false ) ) { ?>
	<header class="wraper_header style-twelve floating-header">
<?php } else { ?>
	<header class="wraper_header style-twelve static-header">
<?php } ?>
	<!-- wraper_header_top -->
	<div class="wraper_header_top">
		<div class="container">
			<!-- row -->
			<div class="row header_top">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 text-left">
					<!-- header_top_item -->
					<div class="header_top_item">
						<?php if ( apexclinic_global_var( 'header_twelve_logo', 'url', true ) ) { ?>
							<!-- brand-logo -->
							<div class="brand-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( apexclinic_global_var( 'header_twelve_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( apexclinic_global_var( 'header_twelve_logo', 'alt', true ) ); ?>"></a>
							</div>
							<!-- brand-logo -->
						<?php } ?>
					</div>
					<!-- header_top_item -->
				</div>
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 text-right hidden-xs">
					<!-- header_top_item -->
					<div class="header_top_item">
						<!-- contact -->
						<ul class="contact">
							<?php if ( ! empty( apexclinic_global_var( 'header_twelve_header_top_contact_phone', '', false ) ) ) : ?>
								<li class="phone"><?php echo esc_html( apexclinic_global_var( 'header_twelve_header_top_contact_phone_text', '', false ) ); ?> <strong><?php echo wp_kses_post( apexclinic_global_var( 'header_twelve_header_top_contact_phone', '', false ) ); ?></strong></li>
							<?php endif; ?>
							<?php if ( ! empty( apexclinic_global_var( 'header_twelve_header_top_contact_address', '', false ) ) ) : ?>
								<li class="address hidden-sm">
									<div class="has-icon">
										<div class="icon"><i class="fa fa-map-marker"></i></div>
										<?php echo wp_kses_post( apexclinic_global_var( 'header_twelve_header_top_contact_address', '', false ) ); ?>
									</div>
								</li>
							<?php endif; ?>
							<?php if ( ! empty( apexclinic_global_var( 'header_twelve_header_top_contact_timing', '', false ) ) ) : ?>
								<li class="timing hidden-sm">
									<div class="has-icon">
										<div class="icon"><i class="fa fa-clock-o"></i></div>
										<?php echo wp_kses_post( apexclinic_global_var( 'header_twelve_header_top_contact_timing', '', false ) ); ?>
									</div>
								</li>
							<?php endif; ?>
						</ul>
						<!-- contact -->
					</div>
					<!-- header_top_item -->
				</div>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_header_top -->
	<!-- wraper_header_main -->
	<!-- wraper_header_main -->
	<?php if ( true == apexclinic_global_var( 'header_twelve_sticky', '', false ) ) { ?>
		<div class="wraper_header_main i-am-sticky">
	<?php } else { ?>
		<div class="wraper_header_main">
	<?php } ?>
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<!-- nav -->
				<nav class="nav visible-lg visible-md hidden-sm hidden-xs">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'top',
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
				<!-- nav -->
				<?php if ( true == apexclinic_global_var( 'header_twelve_mobile_menu_display', '', false ) ) : ?>
					<!-- responsive-nav -->
					<div class="responsive-nav hidden-lg hidden-md visible-sm visible-xs">
						<i class="fa fa-bars"></i>
					</div>
					<!-- responsive-nav -->
				<?php endif; ?>
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( ( class_exists( 'WooCommerce' ) ) && ( true == apexclinic_global_var( 'header_cart_display', '', false ) ) ) : ?>
							<li class="header-cart-bar">
								<a class="header-cart-bar-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
									<i class="fa fa-shopping-cart"></i>
									<span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php if ( true == apexclinic_global_var( 'header_twelve_search_display', '', false ) ) : ?>
							<?php if ( 'floating-search' == apexclinic_global_var( 'header_twelve_search_style', '', false ) ) { ?>
								<li class="floating-searchbar">
									<i class="fa fa-search"></i>
									<i class="fa fa-times"></i>
									<!-- floating-search-bar -->
									<div class="floating-search-bar">
										<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<div class="form-row">
											<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'apexclinic' ); ?>" value="" name="s" required>
											<button type="submit"><i class="fa fa-search"></i></button>
										</div>
										</form>
									</div>
									<!-- floating-search-bar -->
								</li>
							<?php } elseif ( 'flyout-search' == apexclinic_global_var( 'header_twelve_search_style', '', false ) ) { ?>
								<li class="flyout-searchbar-toggle">
									<i class="fa fa-search"></i>
									<i class="fa fa-times"></i>
								</li>
							<?php } ?>
						<?php endif; ?>
						<?php if ( true == apexclinic_global_var( 'header_twelve_hamburger_display', '', false ) ) : ?>
							<?php if ( true == apexclinic_global_var( 'header_twelve_hamburger_mobile', '', false ) ) { ?>
								<li class="header-hamburger">
							<?php } else { ?>
								<li class="header-hamburger hidden-sm hidden-xs">
							<?php } ?>
								<?php if ( 'ellipsis' == apexclinic_global_var( 'header_twelve_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-ellipsis-v"></i>
								<?php } elseif ( 'three-bars' == apexclinic_global_var( 'header_twelve_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-bars"></i>
								<?php } elseif ( 'four-bars' == apexclinic_global_var( 'header_twelve_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-align-justify"></i>
								<?php } elseif ( 'four-bars-left' == apexclinic_global_var( 'header_twelve_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-align-left"></i>
								<?php } elseif ( 'four-bars-right' == apexclinic_global_var( 'header_twelve_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-align-right"></i>
								<?php } ?>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<!-- header_main_action -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<?php if ( true == apexclinic_global_var( 'header_twelve_mobile_menu_display', '', false ) ) : ?>
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
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'top',
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
			<!-- mobile-menu-nav -->
		</div>
		<!-- mobile-menu-main -->
	</div>
	<!-- mobile-menu -->
<?php endif; ?>

<?php if ( true == apexclinic_global_var( 'header_twelve_search_display', '', false ) ) : ?>
	<?php if ( 'flyout-search' == apexclinic_global_var( 'header_twelve_search_style', '', false ) ) : ?>
		<!-- wraper_flyout_search -->
		<div class="wraper_flyout_search header-style-one">
			<div class="table">
				<div class="table-cell">
					<!-- flyout-search-close -->
					<div class="flyout-search-close">
						<i class="fa fa-times"></i>
					</div>
					<!-- flyout-search-close -->
					<!-- flyout_search -->
					<div class="flyout_search">
						<!-- search-form -->
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="form-row">
							<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'apexclinic' ); ?>" value="" name="s" required>
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
						</form>
						<!-- search-form -->
					</div>
					<!-- flyout_search -->
				</div>
			</div>
		</div>
		<!-- wraper_flyout_search -->
	<?php endif; ?>
<?php endif; ?>
