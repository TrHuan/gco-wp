<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>

        <?php if (is_active_sidebar('footer_top')) {
            dynamic_sidebar('footer_top');
        } ?>

        <footer>
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="item item-1">
                            <?php
                                if (is_active_sidebar('footer_01')) {
                                    dynamic_sidebar('footer_01');
                                }
                            ?>
                        </div>
                        <div class="item item-2">
                            <?php
                                if (is_active_sidebar('footer_02')) {
                                    dynamic_sidebar('footer_02');
                                }
                            ?>
                        </div>
                        <div class="item item-3">
                            <?php
                                if (is_active_sidebar('footer_03')) {
                                    dynamic_sidebar('footer_03');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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

         <?php $i; if( have_rows('popup', 'option') ): ?>
            <div class="popups">
                <div class="popups-box">
                    <?php while( have_rows('popup', 'option') ) : the_row(); $i++; ?>
                        <div class="popup-box popup-<?php echo $i; ?> <?php if ($i == 2) {echo 'show';} ?>">
                            <div class="content-box">
                                <?php if ($i == 1) { ?>
                                    <div class="module_header title-box">
                                        <h2 class="title">
                                            <?php echo __('Đăng ký ngay'); ?>
                                        </h2>
                                    </div>                                
                                <?php } elseif ($i == 2) { ?>
                                    <!-- <div class="module_header title-box">
                                        <h2 class="title">
                                            <?php //echo __('Chỉ còn 1 tuần duy nhất! Giảm ngay 30%'); ?>
                                        </h2>
                                    </div>   --> 
                                <?php } ?>

                                <div class="popup-content">
                                    <?php echo do_shortcode(get_sub_field('content')); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>                
                </div>
            </div>
        <?php endif; ?>
        
    </body>
</html>
