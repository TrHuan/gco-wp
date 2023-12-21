<?php 
get_header();
get_template_part('sections/specia','breadcrumb'); ?>

<!-- Blog & Sidebar Section -->
<section class="page-wrapper">
	<div class="background-overlay">
		<div class="container">
			<div class="row content-single-post">
				<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7 content-posts">
					<?php if( have_posts() ): ?>
					<?php while( have_posts() ): the_post(); ?>
						<?php $link_video_posts = get_field('link_video_posts');?>
						<div class="featured-posts-thumbnail">
							<?php if ($link_video_posts == ""): ?>
								<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
								<?php else: ?>  
						          <a href="<?php echo $link_video_posts;?>" class="swipebox popup-youtube">
						            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
						            <span class="play"></span>
						            <div class="ovrly"></div>
						         </a>
							<?php endif ?>
						</div>
						<div class="meta-posts"> 
					          <div class="time-posts">
					            <span><?php the_author_posts_link(); ?></span>
            					<span><?php the_time('d, M, Y') ?></span>
					          </div>
					          <ul class="list-social-share">
					            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-square"></i></a></li>     
					            <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a></li>
					            <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google"></i></a></li>
					            <li><a href="https://www.instagram.com/sharer.php?u=<?php the_permalink();?>"><i class="fab fa-instagram"></i></a></li>
					          </ul>
					    </div>
						<!-- <div class="entry-meta">
	                        <span class="post-time"><i class="far fa-calendar-alt"></i> <?php the_time('g:i a d/m/Y') ?></span>
	                        <span class="post-view"><i class="fas fa-eye"></i> <?php postview_set( get_the_ID() );?><?php echo postview_get( get_the_ID() );?></span>
	                    </div> -->
						<div class="entry-content">
							<h2 class="title-single"><?php the_title();?></h2>
					       <?php
								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Read More', 'specia' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'specia' ),
									'after'  => '</div>',
								) );
							?>
					    </div><!-- .entry-content -->
				
					<?php endwhile; ?>
					<div class="shareposts-social">
						<!-- Your like facebook button code -->
						<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					</div>
						<!-- fb-comments. -->
					
				<?php else: ?>
					
					<?php get_template_part('template-parts/content','none'); ?>
					
				<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5">
				<div class="sidebar" role="complementary">
					<?php dynamic_sidebar('sidebar_single_posts'); ?>
				</div><!-- #secondary -->
			</div>
			</div>
		</div>
	</div>
	<div class="related-post">
		<div class="container">
		<?php if( have_posts() ): ?>
		<h3 class="tit-section-carousel">Bài viết liên quan</h3>
		<!-- Hiển thị bài viết theo category -->
		<?php
			$categories = get_the_category($post->ID);
			if ($categories) 
			{
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		 
				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>6, // Số bài viết bạn muốn hiển thị.
				);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) 
				{
					echo '<div id="relatedposts-carousel" class="owl-carousel owl-theme">';
					while ($my_query->have_posts())
					{
						$my_query->the_post();
						?>
						<?php $link_video_posts = get_field('link_video_posts');?>
						<div class="items-posts">
						    <div class="box-posts">
						      <div class="img-posts">
						        <?php if ($link_video_posts == ""): ?>
						          <a href="<?php the_permalink() ;?>"> 
						             <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
						          </a>
						          <div class="ovrly"></div>
						          <p class="details-posts"><a href="<?php the_permalink() ;?>">Xem chi tiết</a></p>
						          <?php else: ?>  
						          <a href="<?php echo $link_video_posts;?>" class="swipebox popup-youtube">
						            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
						            <span class="play"></span>
						            <div class="ovrly"></div>
						          </a>
						        <?php endif ?>
						      </div>
						      <div class="info-posts">
						          <div class="meta-posts"> 
						              <div class="time-posts">
						                <span><?php the_author_posts_link(); ?></span>
            							<span><?php the_time('d, M, Y') ?></span>
						              </div>
						          </div> 
						          <a class="name-posts" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
						          <div class="excerpt-posts"><?php the_excerpt_max_charlength(100);?></div>
						        <!-- <p class="readmore-posts"><a href="<?php the_permalink() ;?>">Đọc thêm</a></p> -->
						      </div>
						    </div>
						</div>
						<?php
					}
					echo '</div>';
				}
			}
		?>
		<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>

