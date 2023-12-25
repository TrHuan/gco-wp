<?php 
global $houzez_local;
$agency_licenses = get_field('investor_licen');

if( !empty( $agency_licenses ) ) { ?>
	<li>
		<strong><?php echo $houzez_local['licenses']; ?>:</strong> 
		<?php echo esc_attr( $agency_licenses ); ?>
	</li>
<?php } ?>