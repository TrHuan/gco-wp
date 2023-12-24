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

        <div class="back-to-top">
            <i class="icofont-simple-up icon" aria-hidden="true"></i>
        </div>    

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
</br>
        <div class="footer-additional">
            <?php
                $hotline = get_field('hotline', 'option');
                $messenger = get_field('messenger', 'option');
                $link_khoahoc = get_field('link_khoahoc', 'option');
            ?>
            <ul>
                <li class="mobile">
                    <a href="tel:<?php echo $hotline;?>" rel="nofollow">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/ic-phone.png" width="390" height="46" alt="tel">
                        <span>Hotline<br> <?php echo $hotline;?></span>
                    </a>
                </li>
                <li>
                    <a href="/lien-he/" rel="nofollow">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/ic-table.png" width="195" height="15" alt="Liên hệ">
                        <span>Bạn muốn<br> Tăng doanh thu từ SEO</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $link_khoahoc;?>" rel="nofollow">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/ic-userbook.png" width="155" height="34" alt="Dịch vụ SEO">
                        <span>Dịch vụ<br> SEO</span>
                    </a>
                </li>
                <li class="desktop">
                    <a href="<?php echo $messenger;?>" rel="nofollow">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/ic-messenger.png" width="192" height="34" alt="Chát SEO Plus">
                        <span>Hỗ trợ<br> Chat SEOPLUS</span>
                    </a>
                </li>
            </ul>
        </div>       
    </body>
</html>
