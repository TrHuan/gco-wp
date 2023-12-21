<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php global $vz_options;?>
	<meta property="fb:app_id" content="<?php echo $vz_options['opt-id-appfb'];?>"/>
	<meta property="fb:admins" content="<?php echo $vz_options['opt-id-adminfb'];?>"/>
	<?php echo $vz_options['opt-textarea-header'];?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-wrapper" class="woocommerce">
	
	<?php get_template_part('sections/specia','navigation'); ?>

	<div id="content" class="site-content" role="main">
		