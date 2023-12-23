<?php
/**
 * Template Name: Trang Chủ
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<style type="text/css">
    .lth-breadcrumbs {
        display: none;
    }

    .breadcrumbs-404 .lth-breadcrumbs {
        display: block;
    }
</style>

<div class="breadcrumbs-404">
    <div class="lth-breadcrumbs">
        <div class="nav-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php if (!is_home()) : ?>
                            <div class="content-box">
                                <?php                       
                                    // breadcrumb
                                    echo '<nav class="woocommerce-breadcrumb">';
                                    if (!is_home()) {
                                        echo '<a href="';
                                        echo get_option('home');
                                        echo '">';
                                        echo __('Trang chủ');
                                        echo "</a>";
                                        // echo " / ";

                                        echo __('404');
                                    }

                                    echo '</nav>';
                                    // end breadcrumb
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="main-site main-page main-404">
    <div class="main-container">
        <div class="main-content">
            <section class="lth-404">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="404-box">
                                <div class="content-box" style="height: 100%; color: #000; text-align: center;">
                                    <div class="code" style="font-size: calc(25px + (35 - 25) * ((100vw - 320px) / (1920 - 320))); padding: 0 15px; text-align: center; margin-bottom: 60px;"><?php echo __('Oooppp!'); ?></div>

                                    <div class="button-404">
                                        <a href="<?php echo HOME_URI; ?>" title="" class="btn" style="color: #000; padding: 12px 24px;"><?php echo __('Trang chủ'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
    
<?php get_footer(); ?>