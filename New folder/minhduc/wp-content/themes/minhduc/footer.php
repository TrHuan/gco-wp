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
            <section class="tops-footers">
                <div class="container">
                    <div class="logo-footers mb-20s">
                        <?php if (is_active_sidebar('footer_logo')) {
                            dynamic_sidebar('footer_logo');
                        } ?>
                    </div>
                    <div class="row gutter-20">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="group-intros__footers">
                                <?php
                                    if (is_active_sidebar('footer_01')) {
                                        dynamic_sidebar('footer_01');
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                            <div class="group-intros__footers">
                                <?php
                                    if (is_active_sidebar('footer_02')) {
                                        dynamic_sidebar('footer_02');
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 order-4s">
                            <div class="group-intros__footers">
                                <?php
                                    if (is_active_sidebar('footer_03')) {
                                        dynamic_sidebar('footer_03');
                                    }
                                ?>                                
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                            <div class="group-intros__footers">
                                <?php
                                    if (is_active_sidebar('footer_04')) {
                                        dynamic_sidebar('footer_04');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bottom-footers">
                <div class="container">
                    <?php
                        if (is_active_sidebar('footer_bottom')) {
                            dynamic_sidebar('footer_bottom');
                        }
                    ?>
                </div>
            </section>
        </footer>

        <?php wp_footer(); ?>
        
    </body>
</html>
