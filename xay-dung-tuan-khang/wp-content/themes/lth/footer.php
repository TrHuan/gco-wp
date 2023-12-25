<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>
		<?php
            $options = get_field('footer_options', 'option');
            if( $options ):
            	$color = $options['color'];
            	$bg_color = $options['background_color'];
            	$logo = $options['logo_footer'];
            endif; 
        ?>

		<style type="text/css">
			footer {
				background-color: <?php echo $bg_color; ?>;
				color:  <?php echo $color; ?>;
			}
			
			footer .title,
			footer a {
				color:  <?php echo $color; ?>;
			}
		</style>

        <!--Start footer area-->  
		<footer class="footer-area">
		    <div class="container">
		        <div class="row">
		            <!--Start single footer widget-->
		            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		                <div class="single-footer-widget pd-bottom">
		                    <div class="footer-logo">
		                        <a href="index-2.html">
		                            <img src="<?php echo $logo; ?>" alt="Awesome Footer Logo" width="120" height="117" style="max-width: 100px;">
		                        </a>
		                    </div>

		                    <?php
		                		if( have_rows('footer', 'option') ) { $i;
		                			while( have_rows('footer', 'option') ) { $i++; 
		                				the_row(); ?>
					                    <div class="interrio-info">
					                        <p><?php the_sub_field('mo_ta'); ?></p>
					                    </div>
					                    <ul class="footer-contact-info">
					                        <li>
					                            <div class="icon-holder">
					                                <span class="flaticon-building"></span>
					                            </div>
					                            <div class="text-holder">
					                                <p><?php the_sub_field('dia_chi'); ?></p>
					                            </div>
					                        </li>
					                        <li>
					                            <div class="icon-holder">
					                                <span class="flaticon-technology"></span>
					                            </div>
					                            <div class="text-holder">
					                                <p><?php the_sub_field('dien_thoai'); ?></p>
					                            </div>
					                        </li>
					                        <li>
					                            <div class="icon-holder">
					                                <span class="flaticon-e-mail-envelope"></span>
					                            </div>
					                            <div class="text-holder">
					                                <p><?php the_sub_field('email'); ?></p>
					                            </div>
					                        </li>
					                        <li>
					                            <div class="icon-holder time">
					                                <span class="flaticon-clock"></span>
					                            </div>
					                            <div class="text-holder">
					                                <p><?php the_sub_field('gio_lam_viec'); ?></p>
					                            </div>
					                        </li>
					                    </ul>
					                <?php }
					            }
					        ?>
		                </div>
		            </div>
		            <!--End single footer widget-->
		            <!--Start single footer widget-->
		            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		                <div class="google-map">
		                	<?php the_field('google_map', 'option'); ?>
		                </div>

		                <div class="fanpage">
		                	<?php the_field('fanpage', 'option'); ?>
		                </div>
		            </div>
		            <!--End single footer widget-->
		            <!--Start single footer widget-->
		            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		                <div class="single-footer-widget pd-bottom">
		                	<?php
	                        	$newsletter = get_field('newsletter_2', 'option');

	                        	if ($newsletter) {
	                        ?> 
			                    <div class="title">
			                        <h2><?php echo $newsletter['tieu_de'] ?></h2>
			                    </div>
			                    <div class="subscribe-form">
			                        <p><?php echo $newsletter['mo_ta_1'] ?></p>


			                        <?php echo do_shortcode($newsletter['newsletter']); ?>

			                        <h4><?php echo $newsletter['mo_ta_2'] ?></h4>
			                    </div>
			                <?php } ?>
		                    <!--Start latest project-->
		                    <div class="latest-project">
		                        <div class="title">
		                            <h2><?php echo __('Dự án nổi bật'); ?></h2>
		                        </div>
		                        <ul class="latest-project-items">
		                        	<?php 
			                            $args = [
			                                'post_type' => 'thiet-ke',
			                                'post_status' => 'publish',
			                                // 'order_by' => 'rand',
			                                'order' => 'DESC',
			                                'posts_per_page' => 4,
			                            ];
			                            $serv = new WP_Query($args);
			                            if ($serv->have_posts()) { ?>
			                                <?php while ($serv->have_posts()) {
			                                    $serv-> the_post(); ?>
			                                    
			                                    <li>
					                                <div class="img-holder">
					                                    <?php if (has_post_thumbnail()) { ?>
													        <img src="<?php echo lth_custom_img('full', 180, 180);?>" alt="Awesome Image">
													    <?php } ?>
					                                    <div class="overlay">
					                                        <div class="box">
					                                            <div class="content">
					                                                <a href="<?php the_permalink(); ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </li>
			                                <?php } ?>                                  
			                            <?php } else {
			                                get_template_part('template-parts/content', 'none');
			                            }
			                            // reset post data
			                            wp_reset_postdata();
			                        ?>
		                        </ul>
		                    </div>
		                    <!--End latest project-->
		                </div>
		            </div>
		            <!--End single footer widget-->
		        </div>
		    </div>
		</footer>   
		<!--End footer area--> 

		<section class="footer-bottom-area">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
		                <div class="copyright-text">
		                    <?php the_field('copyright', 'option'); ?>
		                </div>
		            </div>
		            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
		                <div class="footer-menu">
		                    <?php get_template_part('templates/addons/socials', 'box'); ?>
		                </div>
		            </div>
		        </div>    
		    </div>
		</section>

		<div class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>

        <?php wp_footer(); ?>

        <?php
			$chat_zalo = get_field('chat_zalo', 'option');

			if ($chat_zalo) {
		?>
			<div class="chat-box chat-zalo-box">
				<div class="zalo-chat-widget" data-oaid="<?php echo $chat_zalo; ?>" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
			</div>

			<script src="https://sp.zalo.me/plugins/sdk.js"></script>
		<?php } ?>
    </body>
</html>
