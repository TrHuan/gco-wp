<?php
    //field
    $h_logo = get_field('h_logo', 'option');
?>


    <a href="<?php echo get_option('home');?>" 
    	title="<?php echo get_option('blogname'); ?> - <?php echo get_option('blogdescription'); ?>">

        <img src="<?php echo $h_logo; ?>" 
        alt="<?php echo get_option('blogname'); ?> - <?php echo get_option('blogdescription'); ?>" class="logo" width="70" height="38">

    </a>
