<?php get_header(); ?>
<?php global $vz_options;?>
<section id="error_page">
  	<div class="background-overlay">
  		<div class="container">	
  			<div class="box-error_page">
	  			<div class="heading-error_page">
		    		<h1><img src="<?php bloginfo('template_directory');?>/images/logogroup.png" alt="">404</h1>
		    		<h2>Page Not Found</h2>
		    		<div class="go_back_home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Quay về trang chủ</a></div>
	    		</div>
    		</div>
  		</div>
  	</div>	
 </section>

<?php get_footer();
