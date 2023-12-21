<?php get_header();?>

<?php global $vz_options;?>
<section id="banner-featured_page" class="fadeIn wow" data-wow-delay="0.2s" style="background: url(<?php echo $vz_options['opt-banner-posts']['url'];?>) center bottom no-repeat;">
	<?php if( have_posts() ): ?>
		<?php $name_project = get_field('name_project');?>
		<?php $address_project = get_field('address_project');?>
		<?php $investor_project = get_field('investor_project');?>
		<?php $acreage_project = get_field('acreage_project');?>
		<?php $year_project = get_field('year_project');?>
		<?php $description_project = get_field('description_project');?>
  	<div class="background-overlay">
  		<div class="container infor-single_posts">	
    		<div class="row">
    			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    				<ul class="overview_infor_posts">
    					<li>
    						<p class="capt__overview">Tên công trình</p>
    						<p class="txt__overview"><?php echo $name_project;?></p>
    					</li>
    					<li>
    						<p class="capt__overview">Địa chỉ</p>
    						<p class="txt__overview"><?php echo $address_project;?></p>
    					</li>
    					<li>
    						<p class="capt__overview">Chủ đầu tư</p>
    						<p class="txt__overview"><?php echo $investor_project;?></p>
    					</li>
    					<li>
    						<p class="capt__overview">Diện tích mặt bằng</p>
    						<p class="txt__overview"><?php echo $acreage_project;?></p>
    					</li>
    					<li>
    						<p class="capt__overview">Năm thực hiện</p>
    						<p class="txt__overview"><?php echo $year_project;?></p>
    					</li>
    				</ul>
    			</div>
    			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    				<div class="desc_infor_posts">
    					<?php echo $description_project;?>
    				</div>
    			</div>
    			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs">
    				<div class="thumb_infor_posts">
    					<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium');?>" alt="">
    				</div>
    			</div>
    		</div>
  		</div>
  	</div>
    <?php endif;?>	
</section>
<?php get_template_part('sections/specia','breadcrumb');?>
<!-- Blog & Sidebar Section -->
<section class="page-wrapper">
	<div class="background-overlay">
		<div class="container">
			<div class="content-single_posts">
				<?php if( have_posts() ): ?>
					<?php while( have_posts() ): the_post(); ?>
						<h2 class="title-single"><?php the_title();?></h2>
						<!-- <div class="entry-meta">
	                        <span class="post-time"><i class="far fa-calendar-alt"></i> <?php the_time('g:i a d/m/Y') ?></span>
	                        <span class="post-view"><i class="fas fa-eye"></i> <?php postview_set( get_the_ID() );?><?php echo postview_get( get_the_ID() );?></span>
	                    </div> -->
						<div class="entry-content">
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
			<div class="box_form__contact">
				<h2 class="title-section">Liên hệ với chúng tôi để được tư vấn miễn phí</h3>
				<?php echo do_shortcode('[contact-form-7 id="4" title="Liên hệ"]');?> 
			</div>
		</div>
	</div>
	<div class="related-post">
		<div class="container">
		<?php if( have_posts() ): ?>
		<h2 class="title-section">Dự án liên quan</h2>
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
						<div class="items-posts">
						    <div class="box-posts">
						      <div class="img-posts">
						          <a href="<?php the_permalink() ;?>"> 
						             <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
						          </a>
						          <div class="ovrly"></div>
						          <p class="details-posts"><a href="<?php the_permalink() ;?>">Xem chi tiết</a></p>
						      </div>
						      <div class="info-posts">
						          <div class="meta-posts"> 
						              <div class="time-posts">
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
						          <a class="name-posts" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
						          <div class="excerpt-posts"><?php the_excerpt_max_charlength(120);?></div>
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

