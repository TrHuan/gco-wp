<?php
/**
 * Template Name: Contact Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */
 
get_header(); ?>

<?php global $vz_options;?>
<section id="banner-featured_page" class="fadeIn wow" data-wow-delay="0.2s">
	<?php if( have_posts() ): ?>
   <!--  <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full');?>" alt=""> -->
   <img src="<?php echo $vz_options['opt-banner-page_contact']['url'];?>" alt="">
  	<div class="background-overlay">
  		<div class="container">	
    		<!-- <h2 class="title-page"><?php the_title();?></h2> -->
    		<div class="page-breadcrumb">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p>','</p>' );
                }
                ?>
            </div>
  		</div>
  	</div>
    <?php endif;?>	
</section>
<section id="wrapper_contact_forms">
	<?php if( have_posts()) :  the_post();?>
	    <div class="background-overlay">
			<div class="box__contact_forms">
				<div class="form-contact_page">
		    		<h2 class="title-alls__mains"><?php echo $vz_options['opt-title-form_contact'];?></h2>	
		    		<p class="text-pagecontact">Hãy gửi những mong muốn về một không gian đẹp cho chúng tôi, BGHOME sẽ hiện thực hóa những mong muốn của bạn!</p>
	    			<?php echo do_shortcode('[contact-form-7 id="6" title="Form liên hệ"]');?> 
	    		</div>
	    		<div class="image-form_contact"><img src="<?php echo $vz_options['opt-image-form_contact']['url'];?>" alt=""></div>
			</div>
	    </div>
    <?php endif;?>		
</section>

<?php get_template_part('sections/specia','contact'); ?>

<?php get_footer(); ?>

