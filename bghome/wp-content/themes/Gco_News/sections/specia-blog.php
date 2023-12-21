<?php global $vz_options;?>
<section id="section-blog" class="fadeIn wow" data-wow-delay="0.2s">
	<div class="background-overlay">
		<div class="container">
			<h2 class="title-section"><a href="<?php echo $vz_options['opt-url-blog'];?>"><?php echo $vz_options['opt-title-blog'];?></a></h2>
			<p class="des-section"><?php echo $vz_options['opt-des-blog'];?></p>
			<div id="blog-carousel" class="owl-carousel owl-theme">
				<?php
				$blog = new WP_Query(array(
				'post_type'=>'post',
				'post_status'=>'publish',
				'cat' => $vz_options['opt-select-blog'],
				'orderby' => 'Date',
				'order' => 'DESC',
				'posts_per_page'=> 6));
				?>
				<?php while ($blog->have_posts()) : $blog->the_post(); ?>
		    	<div class="colums-blog">
		    		<div class="box-blog">
					    <div class="img-blog">
					        <a href="<?php the_permalink() ;?>"> 
					           <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
					        </a>
					        <div class="ovrly"></div>
					        <a class="name-blog" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
					        <p class="date-blog"><span class="days"><?php the_time('d') ?></span><span>Tháng <?php the_time('n') ?></span></p>
					    </div>
				    </div>
				</div>
				<?php endwhile; wp_reset_query();?>
			</div>
			<div class="readmore-section"><a href="<?php echo $vz_options['opt-url-blog'];?>">Xem chi tiết <i class="far fa-chevron-right"></i></a></div>
		</div>
	</div>
</section>
