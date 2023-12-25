<?php
/**
 * Footer
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>
		<?php
            $options = get_field('footer_options', 'option');
            if( $options ):
            	$color = $options['color'];
            	$bg_color = $options['background_color'];
            endif; 
        ?>

		<style type="text/css">
			footer {
				background-color: <?php echo $bg_color; ?>;
				color:  <?php echo $color; ?>;
			}
			
			footer .title,
			footer a {
				color:  <?php echo $color; ?>;
			}
		</style>

        <footer>

            <?php get_template_part('templates/footers/footer', 'main'); ?>

            <?php get_template_part('templates/footers/footer', 'bottom'); ?>
           
        </footer> <!-- end footer -->

        <?php wp_footer(); ?>

        <?php get_template_part('templates/addons/menu-mobile', 'box'); ?>

        <div class="back-to-top">
            <i class="icofont-simple-up icon" aria-hidden="true"></i>
        </div>

        <?php get_template_part('templates/addons/chat', 'zalo'); ?>

        <div class="lth-popups">
            <div class="popups-box">          
                <div class="popups-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="popup-content">
                                    <?php if( have_rows('popups', 'option') ): $i; ?> 
                                        <?php while( have_rows('popups', 'option') ): the_row(); $i++; ?>
                                            <?php
                                                $title = get_sub_field('title', 'option');
                                                $description = get_sub_field('description', 'option');
                                                $content = get_sub_field('content', 'option');
                                            ?>
                                            
                                            <div class="popup-box popup-box-<?php echo $i; ?>">
                                                <div class="title-box">
                                                    <h3 class="title"><?php echo __($title); ?></h3>
                                                    <p><?php echo __($description); ?></p>
                                                </div>

                                                <div class="content-box">               
                                                    <?php echo __($content); ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div> 
        
    </body>
</html>
