<?php 
$colorset = ya_options()->getCpanelValue('scheme');
$phone = ya_options() ->getCpanelValue('phone');
$search = ya_options()->getCpanelValue('search');
?>
<header id="header" role="banner" class="header">
	<?php if (is_active_sidebar_YA('banner-style9')){ ?>
	<div class="banner-style9">					
		<?php dynamic_sidebar('banner-style9'); ?>
	</div>
	<?php } ?>
	<div class="header-msg">
		<div class="container">
			<?php if (is_active_sidebar_YA('top')) {?>
			<div id="sidebar-top" class="sidebar-top">
				<?php dynamic_sidebar('top'); ?>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="container">
		<div class="top-header">
			<div class="ya-logo pull-left">
				<a  href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if(ya_options()->getCpanelValue('sitelogo')){ ?>
					<img src="<?php echo esc_attr( ya_options()->getCpanelValue('sitelogo') ); ?>" alt="<?php bloginfo('name'); ?>"/>
					<?php }else{
						if ($colorset){$logo = get_template_directory_uri().'/assets/img/logo-'.$colorset.'.png';}
						else $logo = get_template_directory_uri().'/assets/img/logo-default.png';
						?>
						<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php bloginfo('name'); ?>"/>
						<?php } ?>
					</a>
				</div>
				<div id="sidebar-top-header" class="sidebar-top-header">
					<?php if($search !='') {?>
					<div class="widget ya_top-3 ya_top non-margin">
						<div class="icon-search">
							<i class="fa fa-search"></i>
						</div>
						<?php if( is_active_sidebar( 'search' ) && class_exists( 'sw_woo_search_widget' ) ): ?>
							<?php dynamic_sidebar( 'search' ); ?>
							<?php else : ?>
							<div class="widget-inner">						
								<?php get_template_part( 'widgets/ya_top/searchcate' ); ?>						
							</div>
						<?php endif; ?>

					</div>
					<?php }?>
					<div id="sidebar-top-menu" class="sidebar-top-menu">
						<?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
					</div>
					<?php if($phone != '') {?>
					<div class="box-contact-email-phone">
						<h2><?php esc_html_e('HOTLINE:','maxshop') ;?></h2>
						<a href="#" title="Call: <?php echo esc_attr( $phone ) ?>"><?php echo esc_html( $phone ) ?></a>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</header>
	<?php if ( has_nav_menu('primary_menu') ) {?>
	<!-- Primary navbar -->
	<div id="main-menu" class="main-menu">
		<nav id="primary-menu" class="primary-menu" role="navigation">
			<div class="container">
				<div class="mid-header clearfix">
					<div class="navbar-inner navbar-inverse">
						<?php
						$menu_class 	= 'nav nav-pills';
						if ( 'mega' == ya_options()->getCpanelValue('menu_type') ){
							$menu_class .= ' nav-mega';
						} else $menu_class .= ' nav-css';
						?>
						<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $menu_class)); ?>
					</div>
				</div>
			</div>
		</nav>
	</div>
	<!-- /Primary navbar -->
	<?php 
} 
?>

