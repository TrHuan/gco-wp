<?php 
global $houzez_local;
$agency_mobile = get_field('investor_hotline');
$agency_mobile_call = str_replace(array('(',')',' ','-'),'', $agency_mobile);
if( !empty( $agency_mobile ) ) { ?>
	<li>
		<strong><?php echo $houzez_local['mobile_colon']; ?></strong> 
		<a href="tel:<?php echo esc_attr($agency_mobile_call); ?>">
			<span class="agent-phone <?php houzez_show_phone(); ?>"><?php echo esc_attr( $agency_mobile ); ?></span>
		</a>
	</li>
<?php } ?>