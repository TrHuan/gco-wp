<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>
            <footer class="vk-footer">
                <div class="vk-footer__top">
                    <?php if (is_active_sidebar('widget_footer_top')) {
                        dynamic_sidebar('widget_footer_top');
                    } ?>
                </div> <!--./top-->

                <div class="vk-footer__mid">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="vk-footer__item">
                                    <?php if (is_active_sidebar('widget_footer_1')) {
                                        dynamic_sidebar('widget_footer_1');
                                    } ?>
                                </div>
                            </div> <!--./item-->


                            <div class="col-lg-3">
                                <div class="vk-footer__item">
                                    <?php if (is_active_sidebar('widget_footer_2')) {
                                        dynamic_sidebar('widget_footer_2');
                                    } ?>
                                </div>
                            </div> <!--./item-->

                            <div class="col-lg-3">
                                <div class="vk-footer__item">
                                    <?php if (is_active_sidebar('widget_footer_3')) {
                                        dynamic_sidebar('widget_footer_3');
                                    } ?>
                                </div>
                            </div> <!--./item-->

                            <div class="col-lg-3">
                                <div class="vk-footer__item">
                                    <?php if (is_active_sidebar('widget_footer_4')) {
                                        dynamic_sidebar('widget_footer_4');
                                    } ?>
                                </div>
                            </div> <!--./item-->

                        </div>
                    </div>
                </div> <!--./mid-->


                <div class="vk-footer__bot">
                    <div class="container">
                        <?php if (is_active_sidebar('widget_footer_bottom')) {
                            dynamic_sidebar('widget_footer_bottom');
                        } ?>                        
                    </div>
                </div> <!--./vk-footer__bot-->
            </footer><!--./vk-footer-->

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