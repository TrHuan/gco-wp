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
            	$summary = $options['summary'];
            endif; 
        ?>

		<style type="text/css">
			footer {
				background-color: <?php echo $bg_color; ?>;
				color:  <?php echo $color; ?>;
			}
			
			footer *,
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
		                	<div class="groups-box">
		                		<?php if ($logo_footer || $summary) { ?>
			                		<div class="footer-box">
			                			<?php if ($logo_footer) { ?>
				                			<div class="footer-logo">
			                                    <a href="index.html"><img src="<?php echo $logo_footer; ?>" alt="logo-image"></a>
			                                </div>
			                            <?php } ?>

		                				<?php if ($summary) { ?>
		                					<div class="footer-content">
			                                    <p><?php echo $summary; ?></p>
			                                    
								            	<?php get_template_part('templates/addons/socials-box', ''); ?>
			                                </div>
			                            <?php } ?>
			                		</div>
			                	<?php } ?>

			                	<?php
		                            if (is_active_sidebar('widget_footer')) {
		                                dynamic_sidebar('widget_footer');
		                            }
		                        ?>
			                </div>             	
				        </div>
				    </div>
				</div>
			</div>

			<div class="footer-bottom">
                <div class="copyright pt-50 text-center copyright-text copyright-text-two">
                    <?php echo get_field('copyright', 'options'); ?>
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

		<?php
            $other = get_field('other', 'option');
            $footer = $other['footer'];
        ?>

        <?php if ($footer) { ?>
            <?php echo $footer; ?>
        <?php } ?>
    </body>
</html>
