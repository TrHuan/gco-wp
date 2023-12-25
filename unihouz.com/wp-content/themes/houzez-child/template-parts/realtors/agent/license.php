<?php 
global $houzez_local;
$agent_licenses = get_post_meta( get_the_ID(), 'fave_agent_license', true );

if( !empty( $agent_licenses ) ) { ?>
	<li>
		<strong>Giấy phép đại lý<?php //echo $houzez_local['agent_license']; ?>:</strong> 
		<?php echo esc_attr( $agent_licenses ); ?>
	</li>
<?php } ?>