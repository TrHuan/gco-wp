<?php
/**
 * Template Name: About us
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
    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full');?>" alt="<?php the_title();?>">
<!--     <img src="<?php echo $vz_options['opt-banner-page_aboutus']['url'];?>" alt=""> -->
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

<section id="videos_aboutus">
	<?php $videos_aboutus = get_field('videos_aboutus');?>
	<?php if( $videos_aboutus ): ?>
	<div class="background-overlay">
		<div class="container">
			<div class="row main-videos_aboutus">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				    <div class="text-videos_aboutus fadeInLeft wow" data-wow-delay="0.2s">
				        <?php echo $videos_aboutus['content_videos_aboutus'];?>
				    </div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				    <div class="box-videos_aboutus fadeInRight wow" data-wow-delay="0.2s">
					    <img src="<?php echo $videos_aboutus['featured_videos_aboutus']['url'];?>" alt="Videos">
					    <a href="<?php echo $videos_aboutus['link_videos_aboutus'];?>" class="swipebox popup-youtube"><span class="play"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>	
</section>

<section id="orientation_aboutus">
	<?php $orientation_aboutus = get_field('orientation_aboutus');?>
	<?php if( $orientation_aboutus ): ?>
	<div class="background-overlay">
		<div class="container">
			<div class="row main-orientation_aboutus">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
				    <div class="box-orientation_aboutus fadeInLeft wow" data-wow-delay="0.2s">
					    <img src="<?php echo $orientation_aboutus['picture_orientation_aboutus']['url'];?>" alt="xu hướng">
					</div>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
				    <div class="text-orientation_aboutus fadeInRight wow" data-wow-delay="0.2s">
				    	<h2 class="headding-orientation_aboutus">Bghome</h2>
				    	<h3 class="title-orientation_aboutus"> <?php echo $orientation_aboutus['title_orientation_aboutus'];?></h3>
				        <?php echo $orientation_aboutus['content_orientation_aboutus'];?>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>	
</section>

<section id="generality_aboutus">
	<?php $background_generality_aboutus = get_field('background_generality_aboutus');?>
	<?php if( have_rows('generality_aboutus') ): ?>
	<div class="background-overlay" style="background: url('<?php echo $background_generality_aboutus['url'];?>') center bottom no-repeat;">
		<div class="container">
		    <div class="row main-generality_aboutus">
		    <?php while( have_rows('generality_aboutus') ): the_row(); 
		        $caption_generality_aboutus = get_sub_field('caption_generality_aboutus');
		        $number_generality_aboutus = get_sub_field('number_generality_aboutus');
		        ?>
		        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 item-generality_aboutus">
	              <div class="box-item-generality_aboutus">
	                  <div class="numberup"><span class="counter-value" data-count="<?php echo $number_generality_aboutus;?>">0</span></div>
	                  <p class="txtcounter"><?php echo $caption_generality_aboutus;?></p>
	              </div>
	            </div>
		    <?php endwhile; ?>
		    </div>
	    </div>
	</div>
	<script>
	/* counter Number---------------------------------------------------------------*/
	  jQuery(window).scroll(function() {
		var a = 0;
	    var oTop = jQuery('#generality_aboutus').offset().top - window.innerHeight;
	    if (a == 0 && jQuery(window).scrollTop() > oTop) {
	    jQuery('.counter-value').each(function() {
	      var $this = jQuery(this),
	      countTo = $this.attr('data-count');
	      jQuery({
	      countNum: $this.text()
	      }).animate({
	        countNum: countTo
	      },
	      {
	        duration: 3000,
	        easing: 'swing',
	        step: function() {
	        $this.text(Math.floor(this.countNum));
	        },
	        complete: function() {
	        $this.text(this.countNum);
	        //alert('finished');
	        }
	      });
	    });
	    a = 1;
	    }
		});
	</script>
	<?php endif; ?>
</section>

<section id="commitment_aboutus">
	<?php $commitment_aboutus = get_field('commitment_aboutus');?>
	<?php if( $commitment_aboutus ): ?>
	<div class="background-overlay">
		<div class="container">
			<div class="row main-commitment_aboutus">
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
				    <div class="text-commitment_aboutus fadeInRight wow" data-wow-delay="0.2s">
				    	<h2 class="headding-commitment_aboutus">Bghome</h2>
				    	<h3 class="title-commitment_aboutus"> <?php echo $commitment_aboutus['title_commitment_aboutus'];?></h3>
				        <?php echo $commitment_aboutus['content_commitment_aboutus'];?>
				    </div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
				    <div class="box-commitment_aboutus fadeInLeft wow" data-wow-delay="0.2s">
					    <img src="<?php echo $commitment_aboutus['picture_commitment_aboutus']['url'];?>" alt="Cam kết">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>	
</section>

<section id="team_aboutus">
	<div class="background-overlay">
		<div class="container">
			<h2 class="title-alls__mains">ĐỘI NGŨ NHÂN VIÊN</h2>
	        <?php if( have_rows('team_aboutus') ): ?>
	          <div id="team_aboutus-carousel" class="owl-carousel owl-theme">
	            <?php while( have_rows('team_aboutus') ): the_row(); 
			        $avatar_member = get_sub_field('avatar_member');
			        $name_member = get_sub_field('name_member');
			        $position_member = get_sub_field('position_member');
			        $facebook_member = get_sub_field('facebook_member');
			        $zalo_member = get_sub_field('zalo_member');
		        ?>      
	            <div class="items-team_aboutus"> 
	              <div class="avatar-team_aboutus">         
	               	<img src="<?php echo $avatar_member['url'];?>" alt="<?php echo $name_member;?>"/>  
	              </div>
	              <div class="intros-team_aboutus">
		              <ul class="social-team_aboutus">
		              	<li>
		              		<a href="<?php echo $facebook_member;?>"><img src="<?php bloginfo('template_directory');?>/images/icon-apps-staff-1.png" alt=""></a>
		              	</li>
		              	<li>
		              		<a href="https://zalo.me/<?php echo $zalo_member;?>"><img src="<?php bloginfo('template_directory');?>/images/icon-apps-staff-2.png" alt=""></a>
		              	</li>
		              </ul>
		              <h3 class="name-team_aboutus"><?php echo $name_member;?></h3>
		              <p class="position-team_aboutus"><?php echo $position_member;?></p> 
	              </div>    
	            </div>
	            <?php endwhile; ?>
	          </div>
	        <?php endif;?>
		</div>
	</div>
</section>

<?php get_template_part('sections/specia','contact'); ?>

<?php get_template_part('sections/specia','partner'); ?>

<?php get_footer(); ?>

