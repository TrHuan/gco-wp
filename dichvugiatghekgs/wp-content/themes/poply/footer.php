</main>

<?php
    //field
	$customer_slogan	= get_field('customer_slogan', 'option');
	$customer_address	= get_field('customer_address', 'option');
	$customer_phone		= get_field('customer_phone', 'option');
	$customer_email		= get_field('customer_email', 'option');

	$f_info_title = get_field('f_info_title', 'option');
	$f_mxh_title  = get_field('f_mxh_title', 'option');

	$f_socical_facebook    	= get_field('f_socical_facebook', 'option');
	$f_socical_linkedin     = get_field('f_socical_linkedin', 'option');
	$f_socical_googleplush	= get_field('f_socical_googleplush', 'option');
	$f_socical_twitter    	= get_field('f_socical_twitter', 'option');

    $f_form_title	= get_field('f_form_title', 'option');
    $f_form_id  	= get_field('f_form', 'option');
    $f_form     	= do_shortcode('[contact-form-7 id="'.$f_form_id.'"]');

    $f_bottom_copyright   = get_field('f_bottom_copyright', 'option');
?>

<footer class="s13 text-white ft">
    <div class="container">
        <div class="ft-header">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="text-sm-left text-center logoft">

			            <!-- logo -->
			            <?php get_template_part("resources/views/logo-footer"); ?>
                    	
                    </div>
                    <div class="ft-content">
                        <p><?php echo $customer_slogan; ?></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <label class="f2 bold s15 ft-tit"><?php echo wp_get_nav_menu_name("f_service" ); ?></label>
				    <?php
				        if(function_exists('wp_nav_menu')){
				            $args = array(
				                'theme_location'    =>  'f_service',
				                'container'         =>  '',
				                'container_class'   =>  '',
				                'container_id'      =>  '',
				                'menu_class'        =>  'list-unstyled ft-list',
				            );
				            wp_nav_menu( $args );
				        }
				    ?>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <label class="f2 bold s15 ft-tit"><?php echo wp_get_nav_menu_name("f_useful" ); ?></label>
				    <?php
				        if(function_exists('wp_nav_menu')){
				            $args = array(
				                'theme_location'    =>  'f_useful',
				                'container'         =>  '',
				                'container_class'   =>  '',
				                'container_id'      =>  '',
				                'menu_class'        =>  'list-unstyled ft-list',
				            );
				            wp_nav_menu( $args );
				        }
				    ?>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label class="f2 bold s15 ft-tit"><?php echo $f_info_title; ?></label>
                    <ul class="list-unstyled ft-list">
                        <li>
                        	<strong>Địa chỉ:</strong> 
                        	<?php echo $customer_address; ?>
                        </li>
                        <li>
                        	<strong>Email:</strong> 
                        	<a href="mailto:<?php echo $customer_email; ?>" title=""><?php echo $customer_email; ?></a>
                        </li>
                        <li>
                        	<strong>Số điện thoại:</strong> 
                        	<a href="tel:<?php echo str_replace(' ','',$customer_phone);?>" title=""> <?php echo $customer_phone; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-between ft-mid">
            <div class="col-lg-5 col-md-6">
                <div class="d-flex align-items-center ft-social-wrap">
                    <strong class="s16 ft-mid-tit"><?php echo $f_mxh_title; ?></strong>
                    <ul class="text-center list-unstyled team-social">
                        <li>
                            <a title="" target="_blank" href="<?php echo $f_socical_facebook; ?>">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a title="" target="_blank" href="<?php echo $f_socical_linkedin; ?>">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li>
                            <a title="" target="_blank" href="<?php echo $f_socical_googleplush; ?>">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li>
                            <a title="" target="_blank" href="<?php echo $f_socical_twitter; ?>">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 d-flex align-items-center ft-frm-wrap">
                <strong class="s16 mr-4 ft-mid-tit"><?php echo $f_form_title; ?></strong>

                <?php if(!empty( $f_form )) { ?>
                	<div class="d-flex align-items-center position-relative ft-frm">
                    	<?php echo $f_form; ?>
                	</div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="ft-last b3">
        <div class="container">
            <p class="text-white text-center s13"><?php echo $f_bottom_copyright; ?></p>
        </div>
    </div>
</footer>

</div>

<?php get_template_part("resources/views/socical-footer"); ?>

<?php wp_footer(); ?>

<?php echo get_field('insert_code_footer', 'option'); ?>
</body>
</html>