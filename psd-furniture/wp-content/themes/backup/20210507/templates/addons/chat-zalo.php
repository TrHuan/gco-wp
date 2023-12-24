<?php
	$chat_zalo = get_field('chat_zalo', 'option');

	if ($chat_zalo) {
?>
	<div class="chat-box chat-zalo-box">
		<div class="zalo-chat-widget" data-oaid="<?php echo $chat_zalo; ?>" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
	</div>

	<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<?php } ?>