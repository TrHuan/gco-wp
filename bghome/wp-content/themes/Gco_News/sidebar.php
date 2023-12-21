<?php 
if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
	<div class="sidebar" role="complementary">
		<?php dynamic_sidebar('sidebar-primary'); ?>
	</div><!-- #secondary -->
</div>