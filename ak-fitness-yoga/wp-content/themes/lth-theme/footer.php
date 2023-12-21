<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>
    		<footer class="footer">
                <?php if (is_active_sidebar('widget_footer_top')) {
                    dynamic_sidebar('widget_footer_top');
                } ?>

                <div class="footer-area dark-blue-bg mtm-80">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row mt-80">
                                <!-- Single Footer Start Here -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="footer-content">
                                        <?php if (is_active_sidebar('widget_footer_1')) {
                                            dynamic_sidebar('widget_footer_1');
                                        } ?>
                                    </div>
                                </div>
                                <!-- Single Footer End Here -->
                                <!-- Single Footer Start Here -->
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="footer-list">
                                        <?php if (is_active_sidebar('widget_footer_2')) {
                                            dynamic_sidebar('widget_footer_2');
                                        } ?>
                                    </div>
                                </div>
                                <!-- Single Footer End Here -->
                                <!-- Single Footer Start Here -->
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="footer-list">
                                        <?php if (is_active_sidebar('widget_footer_3')) {
                                            dynamic_sidebar('widget_footer_3');
                                        } ?>
                                    </div>
                                </div>
                                <!-- Single Footer End Here -->
                                <!-- Single Footer Start Here -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <?php if (is_active_sidebar('widget_footer_4')) {
                                        dynamic_sidebar('widget_footer_4');
                                    } ?>
                                </div>
                                <!-- Single Footer End Here -->
                            </div>
                            <!-- Row End -->
                        </div>
                    </div>
                    <!-- Footer Top End -->
                    <div class="footer-bottom">
                        <div class="copyright pt-50 text-center copyright-text copyright-text-two">
                            <?php if (is_active_sidebar('widget_footer_bottom')) {
                                dynamic_sidebar('widget_footer_bottom');
                            } ?>
                        </div>
                    </div>
                    <!-- Footer Bottom End -->
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
                    <?php if ($phone) { ?>
                        <li class="chat-box chat-phone-box">
                            <a href="tel:<?php echo $phone; ?>" target="_blank" title="">
                                <span class="icon-phone">
                                    <i class="fas fa-phone-alt icon"></i>
                                </span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($zalo) { ?>
                        <li class="chat-box chat-zalo-box">
                            <a href="<?php echo $zalo; ?>" target="_blank" title="">
                                <span class="icon-zalo">
                                    <i class="icofont-phone icon"></i>
                                </span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($facebook) { ?>
                        <li class="chat-box chat-facebook-box">
                            <a href="<?php echo $facebook; ?>" target="_blank" title="">
                                <span class="icon-facebook">
                                    <i class="fab fa-facebook-square icon"></i>
                                </span>
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

                    <!-- <li>
                        <div class="back-to-top">
                            <i class="far fa-chevron-up icon" aria-hidden="true"></i>
                        </div>
                    </li> -->
                </ul>
            </div>

            <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                <div class="notification-product">
                    <span class="remove-product"><?php echo __('Xóa sản phẩm thành công.'); ?></span>
                    <span class="add-product"><?php echo __('Thêm vào giỏ hàng thành công.'); ?></span>
                </div>
            <?php } ?>
        </div>
    </body>
</html>
