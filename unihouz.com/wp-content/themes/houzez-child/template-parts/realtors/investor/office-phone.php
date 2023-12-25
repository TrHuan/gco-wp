<?php 
global $houzez_local;
$agency_phone = get_field('investor_phone');
$agency_office_call = str_replace(array('(',')',' ','-'),'', $agency_phone);

if( !empty($agency_phone) ) { ?>
    <li>
    	<strong><?php echo $houzez_local['office_colon']; ?></strong> 
    	<a href="tel:<?php echo esc_attr($agency_office_call); ?>">
	    	<span class="agent-phone <?php houzez_show_phone(); ?>"><?php echo esc_attr( $agency_phone ); ?></span>
	    </a>
    </li>
<?php } ?>