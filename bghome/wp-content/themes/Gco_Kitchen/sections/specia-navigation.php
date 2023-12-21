<?php global $vz_options;?>
<header role="banner">
	<nav class='navbar navbar-default sticky-nav' role='navigation'>
		<div class="container">
			<!-- Mobile Display -->
			<div class="row navbar-header-top">
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<a class="navbar-brand" href="/">
						<?php specia_logo();?>
					</a>
					<?php $description = get_bloginfo( 'description');
					if ($description) : ?>
						<h1 class="site-description"><?php echo esc_html($description); ?></h1>
					<?php endif; ?>
					<!-- /End Contact Info -->	
				</div>
				<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
					<div class="box-infor-header">
						<!-- Menu Toggle -->
						<div class="collapse navbar-collapse" id="navbar_primary">
							<?php 
							wp_nav_menu( 
								array(  
									'theme_location' => 'primary_menu',
									'container'  => '',
									'menu_class' => 'nav navbar-nav',
									'fallback_cb' => 'specia_fallback_page_menu',
									'walker' => new specia_nav_walker()
								) 
							);
							?>
						</div>
						<div class="box-header-search">
							<div class="header-search-wrap">
							    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle"><i class="fal  fa-search"></i></button>
							    <div class="dropdown-search dropdown-menu">
							      <?php //echo get_product_search_form();?> 
								  <?php echo do_shortcode('[wpdreams_ajaxsearchlite]');?>
							    </div>
							</div>
							<div class="form-header-search">
							    <?php //echo get_product_search_form();?> 
								<?php echo do_shortcode('[wpdreams_ajaxsearchlite]');?>
							</div>
							<div class="shopping_cart">
								<button type="button" data-toggle="dropdown" class="btn dropdown-toggle">
								    <p class="cart-contents" title="<?php _e( 'Giỏ hàng ' ); ?>">
										<span class="quanlity-minicart">0</span><i class="fal fa-shopping-bag"></i>
									</p>
									<span class="txt-minicart">Giỏ hàng</span>
								</button>
							    <div class="woocommerce-minicart dropdown-menu">
							      	<div class="minicart-quickcart">Chưa có sản phẩm trong giỏ hàng</div>
							    </div>
							</div>
							<a id="showmenu">
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
	</nav>
	<div id="mobilenav">
		<div class="mobilenav__inner">
			<div class="toplg">
				<div class="logo-mobilenav">
					<a href="/">
						<?php specia_logo();?>
					</a>
	        	</div>
				<h3><?php echo __( 'MENU', 'shtheme' )?></h3>
			</div>
			<?php 
			wp_nav_menu( array(
				'theme_location'    => 'primary_menu', 
				'menu_id'           => 'menu-main', 
				'menu_class'        => 'mobile-menu',
			) );
			?>
			<a class="menu_close"><i class="fas fa-angle-left"></i></a>
		</div>
	</div>
</header>
<div class="clearfix"></div>