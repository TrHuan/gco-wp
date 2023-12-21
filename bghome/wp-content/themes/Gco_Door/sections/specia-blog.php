<?php global $vz_options;?>
<section id="section-blog" class="fadeIn wow" data-wow-delay="0.2s">
	<div class="background-overlay">
		<div class="container">
			<h2 class="title-section"><?php echo $vz_options['opt-title-blog'];?></h2>
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
				          <p class="details-blog"><a href="<?php the_permalink() ;?>">Xem chi tiết</a></p>
				      </div>
				      <div class="info-blog">
				          <div class="meta-blog"> 
				              <div class="time-blog">
				                <span><?php the_author_posts_link(); ?></span>
            					<span><?php the_time('d, M, Y') ?></span>
				              </div>
				          </div> 
				          <a class="name-blog" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
				          <div class="excerpt-blog"><?php the_excerpt_max_charlength(100);?></div>
				      </div>
				    </div>
				</div>
				<?php endwhile; wp_reset_query();?>
			</div>
		</div>
	</div>
</section>
