<?php if ( is_active_sidebar( 'sidebar-categories' )  ) : ?>
<!--Sidebar-->
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 woocommerce-sidebar">
	<div class="woo-sidebar">
		<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
	</div>
</div>
<!--/Sidebar-->
<?php endif; ?>