<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>
			<?php if( have_rows('features','option') ): ?>  
			    <section class="b1 text-white py-4 intro">
			        <div class="container">
			            <div class="row justify-content-center">
			                <?php get_template_part('templates/addons/features', ''); ?>                
			            </div>
			        </div>
			    </section>
			<?php endif; ?>

			<?php
	            $options = get_field('footer_options', 'option');
	            if( $options ):
	            	$color = $options['color'];
	            	$bg_color = $options['background_color'];
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

	        <footer class="ft">
				<div class="container">
					<div class="ft-1">
						<div class="row">
							<div class="col-lg-4 col-md-6">	
								<?php
		                            if (is_active_sidebar('widget_footer_1')) {
		                                dynamic_sidebar('widget_footer_1');
		                            }
		                        ?>
							</div>

							<div class="col-lg-2 col-md-6">
								<?php
		                            if (is_active_sidebar('widget_footer_2')) {
		                                dynamic_sidebar('widget_footer_2');
		                            }
		                        ?>
							</div>

							<div class="col-lg-3 col-md-6">		
								<?php
		                            if (is_active_sidebar('widget_footer_3')) {
		                                dynamic_sidebar('widget_footer_3');
		                            }
		                        ?>
							</div>
							<div class="col-lg-3 col-md-6">
								<?php
		                            if (is_active_sidebar('widget_footer_4')) {
		                                dynamic_sidebar('widget_footer_4');
		                            }
		                        ?>
							</div>
						</div>
					</div>

					<div class="text-center t6 ft-last">
						© 2018 Ecommerce software by <a href="#" title="">GCO Software</a>
						<?php
	                        if (is_active_sidebar('widget_footer_5')) {
	                            dynamic_sidebar('widget_footer_5');
	                        }
	                    ?>
					</div>
				</div>
			</footer>
		</div>

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

        <div class="footer-fixed">
            <ul>
                <li>
                    <div class="back-to-top">
                        <i class="icofont-simple-up icon" aria-hidden="true"></i>
                    </div>
                </li>
            </ul>
        </div>

		<?php
            $other = get_field('other', 'option');
            $footer = $other['footer'];
        ?>

        <?php if ($footer) { ?>
            <?php echo $footer; ?>
        <?php } ?>

        <script>
			$(".slider-count").countdown("2019/10/31", function(event) {
				$(this).first().html(event.strftime('<li class="d-inline-block b2 count-date"><span class="s60">%D</span></li> <li class="d-inline-block b2 count-hours"><span class="s60">%H</span></li> <li class="d-inline-block b2 count-minute"><span class="s60">%M</span></li> <li class="d-inline-block b2 count-second"><span class="s60">%S</span></li>'));
			});
		</script>
    </body>
</html>
