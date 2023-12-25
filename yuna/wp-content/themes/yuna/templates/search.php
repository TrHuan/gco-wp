<?php
/**
 * Template Name: Trang Tìm kiếm
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-search">
    <section class="lth-search">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_posts module-search-form"> 
                        <div class="module_title">
                            <h1 class="title">
                                <?php echo __('Bạn đang tìm kiếm gì?'); ?>
                            </h1>
                        </div>

                        <div class="module_content">
                            <div class="search-content">
                                <!-- <div class="search-close">
                                    <a href="#" title="" class="close-icon" data_toggle="search-content">
                                        <i class="icofont-close"></i>
                                    </a>
                                </div> -->

                                <form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
                                    <div class="form-content">
                                        <div class="form-group">
                                            <input type="text" name="s" placeholder="<?php echo __('Nhập từ khóa tìm kiếm') ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-search"><i class="icofont-search-1"></i></button>
                                            <input type="hidden" name="post_type" value="product||post">
                                        </div>
                                    </div>    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
