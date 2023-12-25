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

		<?php
            if ( wp_is_mobile() ) {
                include 'templates/footer.php';
            } else {
                include 'templates/desktop/footer.php';
            }
        ?>        

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
