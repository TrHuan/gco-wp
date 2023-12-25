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
							<?php
	                            if (is_active_sidebar('widget_footer_slogan')) {
	                                dynamic_sidebar('widget_footer_slogan');
	                            }
	                        ?>
						</div>

						<div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 col-12 footer-address">
							<?php
	                            if (is_active_sidebar('widget_footer_1')) {
	                                dynamic_sidebar('widget_footer_1');
	                            }
	                        ?>
						</div>

						<div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="groups-box">
								<?php
		                            if (is_active_sidebar('widget_footer_2')) {
		                                dynamic_sidebar('widget_footer_2');
		                            }
		                        ?>
							</div>

							<div class="footer-bottom">								
								<?php
		                            if (is_active_sidebar('widget_footer_3')) {
		                                dynamic_sidebar('widget_footer_3');
		                            }
		                        ?>
							</div>
						</div>
					</div>
				</div>
			</div>
        </footer> <!—end footer -->

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
    </body>
</html>
