<?php
/**
 * Template Name: Page Payment success
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */
 
get_header();
get_template_part('sections/specia','breadcrumb'); ?>

<?php global $vz_options;?>

<section id="page-success" class="page-wrapper">
	<?php if( have_posts()) :  the_post();?>
	    <div class="background-overlay">
	    	<div class="headding-page-success">
		    	<div class="icon-check"><i class="fa fa-check-circle"></i></div>
		    	<h2 class="title-section"><?php the_title();?></h2>	
		    	<p>Trở về trang chủ sau <span id="counter_backhome">5</span>s</p>
		    	<div class="go_back_home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Quay về trang chủ</a></div>
	    	</div>
	    </div>
    <?php endif;?>		
</section>
<script>
    setInterval(function() {
        var number = document.querySelector("#counter_backhome");
        var count = number.textContent * 1 - 1;
        number.textContent = count;
        if (count <= 0) {
            window.location.replace("<?php echo esc_url( home_url( '/' ) ); ?>");
        }
    }, 1000);
</script>
<?php get_footer(); ?>

