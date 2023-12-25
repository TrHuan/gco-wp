<address>
<?php 
$agency_address = get_field('investor_address');
if(!empty($agency_address)) {
	echo '<i class="houzez-icon icon-pin"></i> '.$agency_address;
}
?>
</address>