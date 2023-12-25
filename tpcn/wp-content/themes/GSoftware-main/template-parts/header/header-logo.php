<?php
/**
 * Template for Logo Header
 *
 * @package SH_Theme
 */

global $sh_option;
?>

<div class="search-box">
	<div class="content-box">
		<a href="#" class="close-title">
			<i class="typo-icon typo-icon-close-1"></i>
		</a>

		<div class="search-container">
			<form role="search" metho="get" class="forms search-form" action="<?php esc_url(home_url('/')); ?>">
				<div class="form-content">
					<div class="form-group">
						<input type="text" name="s" placeholder="<?php echo __('Tìm kiếm...'); ?>" class="form-control">
					</div>

					<div class="form-group">
						<button class="btn btn-search" aria-label="Search">
							<i class="typo-icon typo-icon-search-1 icon"></i>
						</button>
						<input type="hidden" name="post_type" value="product||post">
					</div>
				</div> 
			</form>
		</div>
	</div>
</div>

<!-- <header class="headers"> -->
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-column column-1">
					<div class="header-top-box groups-box">
						<div class="top-left">
							<ul>
								<li>
									<i class="typo-icon typo-icon-email-2 icon"></i>
									<a href="mailto: <?php echo $sh_option['information-email']; ?>" title=""><?php echo $sh_option['information-email']; ?></a>
								</li>
								<li>
									<i class="typo-icon typo-icon-phone icon"></i>
									<a href="tel:<?php echo $sh_option['information-phone']; ?>" title=""><?php echo $sh_option['information-phone']; ?></a>
								</li>
							</ul>
						</div>						

						<div class="top-right">
							<ul>
								<li>
									<a href="#" title="" class="search-icon">
										<i class="icofont-search-1 icon"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header-main">
		<div class="header-stick">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-column column-1">
						<div class="header-main-box">
							<div class="logo-box">
								<?php display_logo();?>
							</div>

							<div class="megamenu d-none d-xl-block">
								<?php if ( has_nav_menu( 'menu-1' ) ) { ?>
									<nav id="site-navigation" class="" itemscope itemtype="https://schema.org/SiteNavigationElement">
										<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'menu clearfix' ) );?>
									</nav>
								<?php } // end check menu ?>
							</div>

							<div class="megamenu megamenu-mobile d-xl-none">
								<a id="showmenu" class="">
									<span class="hamburger hamburger--collapse">
										<span class="hamburger-box">
											<span class="hamburger-inner"></span>
										</span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- </header> -->