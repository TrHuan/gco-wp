<?php get_header(); ?>

<h1 style="display: none;"><?php echo get_option('blogname'); ?> - <?php echo get_option('blogdescription'); ?></h1>

<?php
	//field
	$home_slide = get_field('home_slide');

	$home_intro_image	= get_field('home_intro_image');
	$home_intro_title 	= get_field('home_intro_title');
	$home_intro_desc 	= get_field('home_intro_desc');
	$home_intro_pdca	= get_field('home_intro_pdca');

	$home_service_title			= get_field('home_service_title');
	$home_service_select_post 	= get_field('home_service_select_post');

	$home_inspiration_title		= get_field('home_inspiration_title');
	$home_inspiration_gallery	= get_field('home_inspiration_gallery');

	$home_process_title 	  	= get_field('home_process_title');
	$home_process_content 	  	= get_field('home_process_content');
	
	$home_news_title		= get_field('home_news_title');
	$home_news_select_post	= get_field('home_news_select_post');

	$home_team_title	= get_field('home_team_title');
	$home_team_content	= get_field('home_team_content');

	$home_testimonial_title		= get_field('home_testimonial_title');
	$home_testimonial_content	= get_field('home_testimonial_content');

	$home_appointment_form_id	= get_field('home_appointment_form');
    $home_appointment_form		= do_shortcode('[contact-form-7 id="'.$home_appointment_form_id.'"]');
	$home_appointment_form_bg	= get_field('home_appointment_form_bg');
?>

<?php if(!empty( $home_slide )) { ?>
<section class="slider">
    <div class="index-slider">

		<?php
		    foreach ($home_slide as $foreach_kq) {

		    $post_image = $foreach_kq["image"];
		    $post_link  = $foreach_kq["url"];
		?>
	        <div class="index-slider-item">
	            <a href="<?php echo $post_link; ?>">
	                <img src="<?php echo $post_image; ?>" alt="Slider" width="1920" height="614">
	            </a>
	        </div>
		<?php } ?>

    </div>
</section>
<?php } ?>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="f2 bold s30 mb-5 about-tit"><?php echo $home_intro_title; ?></h2>
                <div class="about-content">
                    <p><?php echo $home_intro_desc; ?></p>
                </div>
                <div class="about-wrap">
                    <div class="row">

						<?php if(!empty( $home_intro_pdca )) { ?>
						<?php
						    foreach ($home_intro_pdca as $foreach_kq) {

						    $post_image = $foreach_kq["image"];
						    $post_title = $foreach_kq["title"];
						?>
	                        <div class="col-6">
	                            <div class="d-flex align-items-center about-item">
	                                <img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>" class="lazy" width="44" height="44">
	                                <span class="medium about-item-stit s14"><?php echo $post_title; ?></span>
	                            </div>
	                        </div>
						<?php } ?>
						<?php } ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-center about-r">
                	<img src="<?php echo $home_intro_image; ?>" alt="About" class="lazy" width="420" height="315">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="b2 service">
    <h2 class="f2 bold s30 mb-5 text-center about-tit"><?php echo $home_service_title; ?></h2>

	<?php if(!empty( $home_service_select_post )) { ?>
	<?php
		$i=1;
	    foreach ($home_service_select_post as $foreach_kq) {

	    $post_id 			= $foreach_kq->ID;
	    $post_title 		= get_the_title($post_id);
	    $post_date 			= get_the_date('d/m/Y',$post_id);
	    $post_link 			= get_permalink($post_id);
	    $post_image 		= getPostImage($post_id,"full");
	    $post_excerpt 		= cut_string(get_the_excerpt($post_id),200,'...');
	?>
	    <div class="container-flush service-item">
	        <div class="text-lg-right text-center ser-img">
	            <img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>" class="lazy" width="780" height="451">
	        </div>
	        <div class="b1 mt-110  ser-content">
	            <div class="w-lg-35">
	                <h3 class="f2 s24 bold service-tit">
	                	<span class="t1 bold s30"><?php echo $i; ?>.</span> <?php echo $post_title; ?>
	                </h3>
	                <div class="my-4 service-content">
	                    <p><?php echo $post_excerpt; ?></p>
	                </div>
	                <div class="text-lg-left text-center">
	                    <a href="<?php echo $post_link; ?>" title="" class="btn read-btn">Đọc Thêm</a>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php $i++; } ?>
	<?php } ?>

</section>

<section class="color">
    <div class="container-flush">
        <div class="color-slider color-row">

            <?php
                $query = query_post_by_custompost_paged('service', -1);
                $max_num_pages = $query->max_num_pages;

                if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();
            ?>

                <?php get_template_part('resources/views/content/home-service', get_post_format()); ?>

            <?php endwhile; wp_reset_postdata(); else: echo ''; endif; ?>

        </div>
    </div>
</section>

<section class="ins">
    <div class="container">
        <h3 class="ins-tit f2 s30 bold text-center pb-5"><?php echo $home_inspiration_title; ?></h3>
        <div class="ins-wrap">
            <div class="grid-sizer"></div>

			<?php if(!empty( $home_inspiration_gallery )) { ?>
			<?php
			    foreach ($home_inspiration_gallery as $foreach_kq) {

			    $post_image = $foreach_kq;
			?>
            	<div class="ins-img">
            		<a data-fancybox="gallery" href="<?php echo $post_image; ?>">
            			<img src="<?php echo $post_image; ?>" alt="Ins" width="300" height="300">
            		</a>
            	</div>
			<?php } ?>
			<?php } ?>

        </div>
    </div>
</section>

<section class="process">
    <div class="container">
        <h2 class="f2 bold s30 text-center text-white pb-5 process-tit"><?php echo $home_process_title; ?></h2>
        <div class="row no-gutters process-row">

			<?php if(!empty( $home_process_content )) { ?>
			<?php
			    foreach ($home_process_content as $foreach_kq) {

			    $post_image = $foreach_kq["image"];
			    $post_title = $foreach_kq["title"];
			?>
	            <div class="col">
	                <article class="text-white process-item">
	                    <h3 class="f2 bold s18 process-stit"><?php echo $post_title; ?></h3>
	                    <img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>" width="300" height="300">
	                </article>
	            </div>
			<?php } ?>
			<?php } ?>

        </div>
    </div>
</section>

<section class="blog">
    <div class="container">
        <h2 class="f2 s30 bold text-center pb-5 blog-tit"><?php echo $home_news_title; ?></h2>
        <div class="row">
            <div class="col-lg-9">

				<?php if(!empty( $home_news_select_post )) { ?>
				<?php
				    foreach ($home_news_select_post as $foreach_kq) {

				    $post_id 			= $foreach_kq->ID;
				    $post_title 		= get_the_title($post_id);
				    $post_date 			= get_the_date('d/m/Y',$post_id);
				    $post_link 			= get_permalink($post_id);
				    $post_image 		= getPostImage($post_id,"full");
				    $post_excerpt 		= cut_string(get_the_excerpt($post_id),400,'...');
				    $post_author 		= get_the_author_meta( 'nicename', get_the_author_meta( get_the_author() ) );
				?>
	                <article class="blog-item">
	                    <figure class="text-center blog-img">
	                    	<a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
	                    		<img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>" width="865" height="347">
	                    	</a>
	                    </figure>
	                    <figcaption class="bog-info">
	                        <h3 class="f2 bold s24 py-4 blog-item-tit">
	                        	<a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
	                        		<?php echo $post_title; ?>
                        		</a>
                        	</h3>
	                        <div class="blog-item-time t6 s14">
	                            <span><?php echo $post_date; ?></span> | 
	                            <!-- <span class="blog-tags"><a href="#" title="">Painting</a><a href="#" title="">Wall</a></span> | -->
	                            <span><?php echo $post_author; ?></span>
	                        </div>
	                        <div class="blog-item-content">
	                            <p><?php echo $post_excerpt; ?></p>
	                        </div>
	                        <div class="text-lg-left text-center">
	                            <a href="<?php echo $post_link; ?>" class="btn read-btn">Đọc Thêm</a>
	                        </div>
	                    </figcaption>
	                </article>
				<?php } ?>
				<?php } ?>

            </div>

            <div class="col-lg-3">
                <aside class="baside">
                    <h2 class="t6 text-center bold s18 baside-tit">Tin Tức Mới</h2>
                    <div class="baside-wrap">

			            <?php
			                $query = query_post_by_custompost('post', 6);

			                if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();
			            ?>

			                <?php get_template_part('resources/views/content/home-post-new', get_post_format()); ?>

			            <?php endwhile; wp_reset_postdata(); else: echo ''; endif; ?>

                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<section class="team text-white">
    <div class="container">
        <h2 class="f2 s30 bold text-center pb-5 team-tit"><?php echo $home_team_title; ?></h2>
        <div class="team-slider">

			<?php if(!empty( $home_team_content )) { ?>
			<?php
			    foreach ($home_team_content as $foreach_kq) {

			    $post_image = $foreach_kq["image"];
			    $post_name 	= $foreach_kq["name"];
			    $post_job  	= $foreach_kq["job"];
			    $url_facebook  	= $foreach_kq["url_facebook"];
			    $url_linkedin  	= $foreach_kq["url_linkedin"];
			    $url_googleplus	= $foreach_kq["url_googleplus"];
			    $url_twitter  	= $foreach_kq["url_twitter"];
			?>
	            <article class="text-center team-item">
	                <figure class="position-relative team-img">
	                    <img src="<?php echo $post_image; ?>" alt="<?php echo $post_name; ?>"  width="200" height="200">
	                    <div class="team-over">
	                        <ul class="text-center list-unstyled team-social">
	                            <li><a title="" href="<?php echo $url_facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
	                            <li><a title="" href="<?php echo $url_linkedin; ?>"><i class="fab fa-linkedin-in"></i></a></li>
	                            <li><a title="" href="<?php echo $url_googleplus; ?>"><i class="fab fa-google-plus-g"></i></a></li>
	                            <li><a title="" href="<?php echo $url_twitter; ?>"><i class="fab fa-twitter"></i></a></li>
	                        </ul>
	                    </div>
	                </figure>
	                <figcaption class="team-info">
	                    <h3 class="s13 light"><?php echo $post_job; ?></h3>
	                    <h4 class="f2 bold s18 team-stit"><?php echo $post_name; ?></h4>
	                </figcaption>
	            </article>
			<?php } ?>
			<?php } ?>

        </div>
    </div>
</section>

<section class="tes">
    <div class="container">
        <h2 class="f2 s30 bold text-center pb-5 team-tit"><?php echo $home_testimonial_title; ?></h2>
        <div class="tes-slider">

			<?php if(!empty( $home_testimonial_content )) { ?>
			<?php
			    foreach ($home_testimonial_content as $foreach_kq) {

			    $post_image 	= $foreach_kq["image"];
			    $post_name 		= $foreach_kq["name"];
			    $post_job  		= $foreach_kq["job"];
			    $post_comment  	= $foreach_kq["comment"];
			?>
	            <article class="tes-item">
	                <figure class="text-center tes-img">
	                	<img src="<?php echo $post_image; ?>" alt="<?php echo $post_name; ?>" width="200" height="200">
	                </figure>
	                <figcaption class="tes-info">
	                    <div class="tes-content py-3">
	                        <p><?php echo $post_comment; ?></p>
	                    </div>
	                    <h3 class="tes-tit f2 s18 t6 bold"><?php echo $post_name; ?></h3>
	                    <h4 class="s14 light"><?php echo $post_job; ?></h4>
	                </figcaption>
	            </article>
			<?php } ?>
			<?php } ?>

        </div>
    </div>
</section>

<section id="regis" class="request">
    <div class="container">

    	<?php if(!empty( $home_appointment_form )) { ?>
		<div class="request-frm" style="background: url(<?php echo $home_appointment_form_bg; ?>) center top;">
            <?php echo $home_appointment_form; ?>
		</div>
		<?php } ?>
        
    </div>
</section>

<script>
    $(document).ready(function() {
        var $grid = $('.ins-wrap').isotope({
            itemSelector: '.ins-img',
            percentPosition: true,
            /*gutter: 10,*/
            /*layoutMode: 'fitRows'*/
            masonry: {
                // use element for option
                columnWidth: '.grid-sizer'
            }
        });
		$grid.imagesLoaded().progress( function() {
		  $grid.isotope('layout');
		});
    });
</script>

<?php get_footer(); ?>

