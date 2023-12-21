<?php 
if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
?>
<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5">
	<div class="sidebar" role="complementary">
		<?php dynamic_sidebar('sidebar-primary'); ?>
	</div><!-- #secondary -->
</div>