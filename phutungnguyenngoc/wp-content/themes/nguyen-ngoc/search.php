<?php
/**
 * The template for displaying search results pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<div class="breadcrumbs-search">
    <?php //if (have_posts()) { ?>
        <?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    <?php //} else { ?>
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

                                        echo __('Tìm kiếm');
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
    <?php //} ?>
</div>

<main class="main main-page page-searchs">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if (have_posts()) { ?>
                    <section class="module module_posts searchs-list">
                        <div class="module_title">
                            <h1 class="title">
                                <?php echo __('Kết quả tìm kiếm: "') . get_search_query() . '"'; ?>
                            </h1>
                        </div>                   

                        <div class="module_products module_products_list" style="margin-bottom: 30px;">
                            <?php
                                $s = get_search_query();

                                $args = [
                                    'post_type' => 'product',
                                    'posts_per_page' => 9999999999,
                                    'orderby' => 'post_date',
                                    's' => $s,
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="module_content">
                                        <h3 style="margin-bottom: 15px;">
                                            <?php echo __('Sản phẩm'); ?>
                                        </h3>

                                        <div class="groups-box">                         
                                            <?php //get_template_part('template-parts/post/content', ''); ?>

                                            <?php while ($wp_query->have_posts()) {
                                                $wp_query-> the_post();

                                                get_template_part('woocommerce/product-box/product-box', '');
                                            } ?>
                                        </div>
                                    </div>                                            
                                <?php } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata();
                            ?>
                        </div>

                        <div class="module_blogs">
                            <?php
                                $s = get_search_query();

                                $args = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 9999999999,
                                    'orderby' => 'post_date',
                                    's' => $s,
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="module_content">
                                        <h3 style="margin-bottom: 15px;">
                                            <?php echo __('Tin tức'); ?>
                                        </h3>

                                        <div class="groups-box">  
                                            <?php while ($wp_query->have_posts()) {
                                                $wp_query-> the_post();

                                                get_template_part('template-parts/post/content', ''); 
                                            } ?>
                                        </div>
                                    </div>                                            
                                <?php } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata();
                            ?>
                        </div>
                    </section>  
                <?php } else { ?>
                    <section class="module module_posts module-search-form">
                        <div class="module_title">
                            <h1 class="title">
                                <?php echo __('Bạn đang tìm kiếm gì?'); ?>
                            </h1>
                        </div>                   

                        <div class="module_content">
                            <div class="search-content">
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

                                <p class="notification-error"> <?php echo __('Không có kết quả tìm kiếm nào.'); ?> </p>
                            </div>
                        </div>
                    </section>  
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
