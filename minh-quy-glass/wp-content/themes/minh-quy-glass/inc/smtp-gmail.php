<?php

// add file smtp-gmail.php vào file functions.php

// Ghi chú: email phải bật xác minh 2 lớp

$smtp = get_field('mail_smtp', 'option');

$email_shop = $smtp['email_shop']; // trhuan177@gmail.com
$email_pass = $smtp['email_pass']; // tgzihtpcadfxqksz
$email_name = $smtp['email_name']; // LTH

add_action( 'phpmailer_init', function( $phpmailer ) {
    if ( !is_object( $phpmailer ) )
    $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = $email_shop;
    $phpmailer->Password   = $email_pass;
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = $email;
    $phpmailer->FromName   = $email_name;
});