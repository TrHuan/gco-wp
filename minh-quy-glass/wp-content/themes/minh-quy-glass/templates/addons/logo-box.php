<div class="logo-box">
	<?php $logo = get_field('logo', 'option'); ?>

	<?php if ($logo) { ?>
		<a href="<?php echo HOME_URI; ?>">
			<img src="<?php echo $logo; ?>" alt="Logo" width="130" height="90">
		</a>
	<?php } else { ?>
		<h1 class="logo-box">
	        <a href="<?php echo HOME_URI; ?>"><?php bloginfo('title'); ?></a>
	        <p><?php bloginfo('description'); ?></p>
	    </h1>
	<?php } ?>
</div>