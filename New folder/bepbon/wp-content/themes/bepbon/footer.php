<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>

        <?php
            if (is_active_sidebar('footer_top')) {
                dynamic_sidebar('footer_top');
            }
        ?>

		<footer class="footer footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="address-box">
                            <?php
                                if (is_active_sidebar('footer_01')) {
                                    dynamic_sidebar('footer_01');
                                }
                            ?>
                        </div>
                    </div> <!-- end -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <?php
                            if (is_active_sidebar('footer_02')) {
                                dynamic_sidebar('footer_02');
                            }
                        ?>
                    </div> <!-- end -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <?php
                            if (is_active_sidebar('footer_03')) {
                                dynamic_sidebar('footer_03');
                            }
                        ?>
                    </div> <!-- end -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="showroom-box">
                            <?php
                                if (is_active_sidebar('footer_04')) {
                                    dynamic_sidebar('footer_04');
                                }
                            ?>
                        </div>
                    </div> <!-- end -->

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="width: 100%;">
                        <div class="footer-bottom">
                            <?php
                                if (is_active_sidebar('footer_bottom')) {
                                    dynamic_sidebar('footer_bottom');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>

        <div class="footer-fixed">
            <?php
                $chats = get_field('chats', 'option');
                $phone = $chats['phone'];
                $zalo = $chats['zalo'];
                $facebook = $chats['facebook'];
                $email = $chats['email'];
            ?>

            <ul>

                <?php if ($facebook) { ?>
                    <li class="chat-box chat-facebook-box">
                        <a href="<?php echo $facebook; ?>" target="_blank" title="">
                           <!--  <span class="icon-facebook">
                                <i class="fab fa-facebook-square icon"></i>
                            </span> -->

                            <img src="<?php echo ASSETS_URI; ?>/images/icon-12.png" alt="Icon">                           
                        </a>
                    </li>
                <?php } ?>

                <?php if ($phone) { ?>
                    <li class="chat-box chat-phone-box">
                        <a href="tel:<?php echo $phone; ?>" target="_blank" title="">
                            <!-- <span class="icon-phone">
                                <i class="fas fa-phone-alt icon"></i>
                            </span> -->

                            <img src="<?php echo ASSETS_URI; ?>/images/icon-13.png" alt="Icon" width="80" height="80">
                        </a>
                    </li>
                <?php } ?>

                <?php if ($zalo) { ?>
                    <li class="chat-box chat-zalo-box">
                        <a href="<?php echo $zalo; ?>" target="_blank" title="">
                            <!-- <span class="icon-zalo">
                                <i class="icofont-phone icon"></i>
                            </span> -->
                            
                            <img src="<?php echo ASSETS_URI; ?>/images/icon-12.png" alt="Icon">
                        </a>
                    </li>
                <?php } ?>

                <?php if ($email) { ?>
                    <li class="chat-box chat-email-box">
                        <a href="mailto:<?php echo $email; ?>" target="_blank" title="">
                            <span class="icon-email">
                                <i class="fas fa-envelope icon"></i>
                            </span>
                        </a>
                    </li>
                <?php } ?>

                <li>
                    <div class="back-to-top">
                        <i class="far fa-chevron-up icon" aria-hidden="true"></i>
                    </div>
                </li>

            </ul>
        </div>

        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
            <div class="notification-product">
                <span class="remove-product"><?php echo __('Xóa sản phẩm thành công.'); ?></span>
                <span class="add-product"><?php echo __('Thêm vào giỏ hàng thành công.'); ?></span>
            </div>
        <?php } ?>

        <div class="lth-popups registration">
            <div class="popups-box">
                <div class="popups-content">
                    <a href="#" class="close-box"><i class="fal fa-times icon"></i></a>

                    <div class="popup-content">
                        <div class="content">
                            <div class="entry-header">
                                <h2 class="title"><?php echo __('Đăng ký thông tin tư vấn'); ?></h2>
                            </div>

                            <div class="entry-content">
                                <?php echo do_shortcode('[contact-form-7 id="10022069" title="Đăng ký thông tin tư vấn"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
