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
            	$logo_footer = $options['logo_footer'];
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

        <footer>
			<div class="footer-main">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">	
							<div class="footer-main-box groups-box">
								<div class="item item-contact">
									<div class="footer-logo">
										<div class="logo-box">
											<a href="<?php echo HOME_URI; ?>">
												<img src="<?php echo $logo_footer; ?>" alt="Logo" width="130" height="90">
											</a>
										</div>
									</div>

									<div class="footer-box footer-contact-box">
										<?php
											$footer_1 = get_field('footer_1', 'option');
											$title = $footer_1['title'];
											$dia_chi = $footer_1['dia_chi'];
											$hotline = $footer_1['hotline'];
											$email = $footer_1['email'];
										?>
										<h2><?php echo $title; ?></h2>

										<div class="content">
											<ul>
												<li>
													<i class="icofont-google-map icon"></i>
													<?php echo __('Địa chỉ: '); ?><?php echo $dia_chi; ?>
												</li>
												<li>
													<img src="<?php echo ASSETS_URI ?>/images/icon-11.png" alt="Icon">
													<a href="tel: <?php echo $hotline; ?>" title="<?php echo $hotline; ?>">
														<!-- <i class="icofont-ui-call icon"></i> -->
														<?php echo __('Hotline: '); ?><?php echo $hotline; ?>
													</a>
												</li>
												<li>
													<i class="icofont-envelope icon"></i>
													<a href="mailto: <?php echo $email; ?>" title="<?php echo $email; ?>">
														<?php echo __('Email: '); ?><?php echo $email; ?>
													</a>
												</li>
											</ul>
										</div>
									</div>						
								</div>

								<div class="item">
									<div class="footer-box footer-hotline-box">
										<h2>TRUNG TÂM CHĂM SÓC KHÁCH HÀNG</h2>

										<div class="content">
											<ul>
												<?php 
												if( have_rows('footer_2', 'option') ): while( have_rows('footer_2', 'option') ): the_row();
												if( have_rows('hotline') ): while( have_rows('hotline') ): the_row();
												?>
												<li>
													<img src="<?php echo ASSETS_URI ?>/images/icon-11.png" alt="Icon">
													<a href="tel: <?php the_sub_field('content'); ?>" title="<?php the_sub_field('content'); ?>">
														<!-- <i class="icofont-ui-call icon"></i> -->
														<?php echo __('Hotline: '); ?><?php the_sub_field('content'); ?>
													</a>
												</li>
												<?php 
												endwhile; endif; 
												endwhile; endif; 
												?>
											</ul>
										</div>
									</div>	

									<div class="footer-box social-box">
										<h3><?php echo __('KẾT NỐI VỚI CHÚNG TÔI'); ?></h3>

										<div class="content">
											<?php get_template_part('templates/addons/socials-box', ''); ?>
										</div>
									</div>
								</div>

								<div class="item item-google-maps">
									<div class="footer-box">
										<div class="content">
											<div class="google-maps">
												<?php the_field('google_map', 'option'); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">	
							<div class="footer-bottom-box">
								<div class="copyright">
									<?php echo the_field('copyright', 'option'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </footer> <!—end footer -->

        <div class="back-to-top">
		    <i class="icofont-simple-up icon" aria-hidden="true"></i>
		</div>

		<?php
			$chats = get_field('chats', 'option');
			if ($chats) {
		?>
			<div class="chat-box">			
				<ul>
					<?php
						$zalo = $chats['chat_zalo'];
						if ($zalo) {
							$url_zalo = $zalo['url'];
						    $target_zalo = $zalo['target'] ? $zalo['target'] : '_self';
					?>
					<li>
						<a href="<?php echo esc_url( $url_zalo ); ?>" target="<?php echo esc_attr( $target_zalo ); ?>" title="">
							<img src="<?php echo ASSETS_URI; ?>/images/icon-08.png" alt="Icon" width="60" height="60">
						</a>
					</li>
					<?php } ?>

					<?php
						$facebook = $chats['facebook'];
						if ($facebook) {
							$url_facebook = $facebook['url'];
						    $target_facebook = $facebook['target'] ? $facebook['target'] : '_self';
					?>
					<li>
						<a href="<?php echo esc_url( $url_facebook ); ?>" target="<?php echo esc_attr( $target_facebook ); ?>" title="">
							<img src="<?php echo ASSETS_URI; ?>/images/icon-09.png" alt="Icon" width="60" height="60">
						</a>
					</li>
					<?php } ?>

					<?php
						$phone = $chats['phone_chat'];
						if ($phone) {
					?>
					<li>
						<a href="tell:<?php echo $phone; ?>" title="">
							<img src="<?php echo ASSETS_URI; ?>/images/icon-10.png" alt="Icon" width="60" height="60">
						</a>
					</li>
					<?php } ?>
				</ul>			
			</div>
		<?php } ?>

        <?php wp_footer(); ?>
    </body>
</html>
