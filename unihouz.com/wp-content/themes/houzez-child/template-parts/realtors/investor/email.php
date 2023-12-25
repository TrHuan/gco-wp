<?php 
global $houzez_local;
$agency_email = get_field('investor_email');

if( !empty( $agency_email ) ) { ?>
    <li class="email">
    	<strong><?php echo $houzez_local['email_colon']; ?></strong> 
    	<a href="mailto:<?php echo esc_attr( $agency_email ); ?>"><?php echo esc_attr( $agency_email ); ?></a>
    </li>
<?php } ?>