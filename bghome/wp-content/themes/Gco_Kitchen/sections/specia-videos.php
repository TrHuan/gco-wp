<?php global $vz_options;?>
<section id="section-video_homepage" class="fadeIn wow" data-wow-delay="0.2s">
	<div class="background-overlay">
		<div class="container">
			<?php if( have_rows('video_homepage') ): ?>
			    <?php while( have_rows('video_homepage') ): the_row(); 
		        // Get sub field values.
		        $title_video_homepage = get_sub_field('title_video_homepage');
		        $name_video_homepage = get_sub_field('name_video_homepage');
		        $image_video_homepage = get_sub_field('image_video_homepage');
		        $link_video_homepage = get_sub_field('link_video_homepage');
			    ?>
			    
				<h2 class="title-alls__mains"><?php echo $title_video_homepage;?></h2>
				<div id="content-videos_homepage">
	                  <div class="box-videos_homepage">
	                        <a href="<?php echo $link_video_homepage;?>" class="swipebox popup-youtube">
	                          <img src="<?php echo $image_video_homepage['url'];?>" alt="">
	                          <span class="play"></span>
	                          <div class="ovrly"></div>
	                       </a>
	                       <h3 class="name-videos_homepage"><?php echo $name_video_homepage;?></h3>
	                  </div>
				</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
