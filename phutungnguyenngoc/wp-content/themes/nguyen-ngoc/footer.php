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
                <div class="footer-top pt-80 pb-98 theme-bg">
                    <div class="container">
                       <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <?php
		                            if (is_active_sidebar('widget_footer')) {
		                                dynamic_sidebar('widget_footer');
		                            }
		                        ?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <?php
		                            if (is_active_sidebar('widget_footer_2')) {
		                                dynamic_sidebar('widget_footer_2');
		                            }
		                        ?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <?php
		                            if (is_active_sidebar('widget_footer_3')) {
		                                dynamic_sidebar('widget_footer_3');
		                            }
		                        ?>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <?php
		                            if (is_active_sidebar('widget_footer_4')) {
		                                dynamic_sidebar('widget_footer_4');
		                            }
		                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom ptb-35 black-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php
		                            if (is_active_sidebar('widget_footer_5')) {
		                                dynamic_sidebar('widget_footer_5');
		                            }
		                        ?>
                            </div>
                        </div>
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

		<?php
            $other = get_field('other', 'option');
            $footer = $other['footer'];
        ?>

        <?php if ($footer) { ?>
            <?php echo $footer; ?>
        <?php } ?>
    </body>
</html>
