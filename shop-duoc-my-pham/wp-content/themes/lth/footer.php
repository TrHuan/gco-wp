<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>

        <footer>
            <section class="footers">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="groups-footers">
                                <div class="navs-footers fs-20s titles-transform__alls">
                                    <?php
                                        if (is_active_sidebar('footer_01')) {
                                            dynamic_sidebar('footer_01');
                                        }
                                    ?>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="groups-footers">
                                <div class="app-footers titles-monter__italic">
                                    <?php
                                        if (is_active_sidebar('footer_02')) {
                                            dynamic_sidebar('footer_02');
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-4 col-12">
                            <div class="groups-footers">
                                 <?php
                                    if (is_active_sidebar('footer_03')) {
                                        dynamic_sidebar('footer_03');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>

        <?php wp_footer(); ?>
        
    </body>
</html>
