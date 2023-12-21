<?php global $vz_options;?>
<section id="section-furniture" class="fadeInUp wow" data-wow-delay="0.2s">
    <div class="background-overlay">
        <div class="container">
        	<?php $terms = get_term($vz_options['opt-select-furniture']);?>
            <div class="headding-section">
	          <h2 class="title-section"><?php echo $vz_options['opt-title-furniture'];?></h2>
	          <div class="readmore-section"><a href="<?php echo $terms->slug;?>">Xem thêm</a></div>
	       </div>
          <p class="des-section"><?php echo $vz_options['opt-des-furniture'];?></p>
			<div class="row content-furniture">
				<?php
				$furniture = new WP_Query(array(
				'post_type'=>'post',
				'post_status'=>'publish',
				'cat' => $vz_options['opt-select-furniture'],
				'orderby' => 'Date',
				'order' => 'DESC',
				'posts_per_page'=> 6));
				?>
				<?php while ($furniture->have_posts()) : $furniture->the_post(); ?>
		    	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 colums-furniture">
				    <div class="box-furniture">
				      <div class="img-furniture">
				          <a href="<?php the_permalink() ;?>"> 
				             <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
				          </a>
				          <div class="ovrly"></div>
				          <p class="details-furniture"><a href="<?php the_permalink() ;?>">Xem chi tiết</a></p>
				      </div>
				      <div class="info-furniture">
				          <div class="meta-furniture"> 
				              <div class="time-furniture">
				                <span><i class="fal fa-calendar"></i><?php the_time('M d, Y') ?></span>/
				                <span><i class="fal fa-user"></i><?php the_author_posts_link(); ?></span>
				              </div>
				              <ul class="list-social-share">
				                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-square"></i></a></li>     
				                <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a></li>
				                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google"></i></a></li>
				                <li><a href="https://www.instagram.com/sharer.php?u=<?php the_permalink();?>"><i class="fab fa-instagram"></i></a></li>
				              </ul>
				          </div> 
				          <a class="name-furniture" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
				          <div class="excerpt-furniture"><?php the_excerpt_max_charlength(120);?></div>
				        <!-- <p class="readmore-furniture"><a href="<?php the_permalink() ;?>">Đọc thêm</a></p> -->
				      </div>
				    </div>
				</div>
				<?php endwhile; wp_reset_query();?>
			</div>
        </div>
    </div>
</section>