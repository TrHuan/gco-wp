<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>

            <!-- Footer Area Start Here -->
            <footer class="pb-35">
                <div class="container">
                    <!-- Footer Middle Start -->
                    <div class="footer-middle ptb-90">
                        <div class="row">
                            <!-- Single Footer Start -->
                            <div class="col-lg-4 col-md-6 mb-all-30">
                                <div class="footer-contact">
                                    <?php if (is_active_sidebar('widget_footer_1')) {
                                        dynamic_sidebar('widget_footer_1');
                                    } ?>
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                            <!-- Single Footer Start -->
                            <div class="col-lg-2 col-md-6 mb-all-30">
                                <div class="single-footer">
                                    <?php if (is_active_sidebar('widget_footer_2')) {
                                        dynamic_sidebar('widget_footer_2');
                                    } ?>
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                            <!-- Single Footer Start -->
                            <div class="col-lg-2 col-md-6 mb-sm-30">
                                <div class="single-footer">
                                    <?php if (is_active_sidebar('widget_footer_3')) {
                                        dynamic_sidebar('widget_footer_3');
                                    } ?>
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                            <!-- Single Footer Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-footer">
                                    <?php if (is_active_sidebar('widget_footer_4')) {
                                        dynamic_sidebar('widget_footer_4');
                                    } ?>
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Footer Middle End -->
                   <!-- Footer Bottom Start -->
                    <div class="footer-bottom pt-35">
                        <div class="col-md-12">                            
                            <?php if (is_active_sidebar('widget_footer_bottom')) {
                                dynamic_sidebar('widget_footer_bottom');
                            } ?>
                        </div>
                    </div>
                    <!-- Footer Bottom End -->
                </div>
            </footer>
            <!-- Footer Area End Here -->

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
                                    <i class=" icon"></i>
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

                    <li>
                        <div class="back-to-top">
                            <i class="fa fa-angle-double-up icon" aria-hidden="true"></i>
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
        </div>

        <script>
            var loadDeferredStyles = function() {
                var addStylesNode = document.getElementById("deferred-styles");
                var replacement = document.createElement("div");
                replacement.innerHTML = addStylesNode.textContent;
                document.body.appendChild(replacement)
                addStylesNode.parentElement.removeChild(addStylesNode);
            };
            var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
            if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
            else window.addEventListener('load', loadDeferredStyles);
        </script>

        <?php
            $other = get_field('other', 'option');
            $footer = $other['code_footer'];
            echo $footer; 
        ?>
    </body>
</html>