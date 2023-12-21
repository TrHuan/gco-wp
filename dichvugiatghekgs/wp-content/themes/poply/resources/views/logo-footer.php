<?php
    //field
    $f_logo = get_field('f_logo', 'option');
?>


    <a href="<?php echo get_option('home');?>" 
    	title="<?php echo get_option('blogname'); ?> - <?php echo get_option('blogdescription'); ?>">

        <img src="<?php echo $f_logo; ?>" 
        alt="<?php echo get_option('blogname'); ?> - <?php echo get_option('blogdescription'); ?>" width="200" height="194">

    </a>
