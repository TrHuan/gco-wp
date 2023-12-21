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

        <footer class="footer-main">
	    	<div class="container">
	            <div class="row">
	            	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        				<div class="groups-box">
        					<?php
	                            if (is_active_sidebar('widget_footer')) {
	                                dynamic_sidebar('widget_footer');
	                            }
	                        ?>
	            		</div>
				    </div>
				</div>
			</div>

        </footer> <!—end footer -->

        <?php wp_footer(); ?>

        <div class="back-to-top">
			<i class="icofont-simple-up icon" aria-hidden="true"></i>
		</div>

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
