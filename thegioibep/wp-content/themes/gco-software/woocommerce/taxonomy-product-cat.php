<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header( 'shop' ); ?>
<?php $cat = get_queried_object(); ?>
<?php $category_style = get_field('category_style', $cat); ?>
<?php
    if ( wp_is_mobile() ) { ?>        
        <?php
        if ($category_style == 'style_1') { ?>
            <main class="main-site main-page main-products">
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
                <section class="category-prds__pages mb-10s">
                    <div class="container">
                        <?php
                            $cates = [];
                            $i = 0;
                            $categories_product = get_field('category_product', $cat);
                            if( $categories_product ): ?>
                                <h2 class="titles-blues__alls fs-14s mb-5s"><?php echo __('danh mục sản phẩm'); ?></h2>
                                <div class="row gutter-6">
                                    <?php foreach ( $categories_product as $term ) { ?>
                                        <div class="col-6">
                                            <h3>
                                                <?php $term_parent = get_term_by( 'id', $cat->parent, 'product_cat' );
                                                if ( get_query_var('thuong-hieu') ) {
                                                    $thuong_hieu_slug = get_query_var('thuong-hieu'); ?>
                                                    <a href="<?php echo get_term_link( $term ).'?thuong-hieu='.$thuong_hieu_slug; ?>" class="<?php echo $term->slug; ?> names-category__prds fs-14s <?php if ($cat->term_id == $term->term_id) { ?>actives<?php } ?>">
                                                <?php } elseif ($term_parent->slug == 'thuong-hieu') { ?>
                                                    <a href="<?php echo get_term_link( $term ).'?thuong-hieu='.$cat->slug; ?>" class="<?php echo $term->slug; ?> names-category__prds fs-14s <?php if ($cat->term_id == $term->term_id) { ?>actives<?php } ?>">
                                                <?php } else { ?>
                                                    <a href="<?php echo get_term_link( $term ); ?>" class="<?php echo $term->slug; ?> names-category__prds fs-14s <?php if ($cat->term_id == $term->term_id) { ?>actives<?php } ?>">
                                                <?php } ?>
                                                    <?php echo $term->name; ?>
                                                </a>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php endif;
                        ?>
                    </div>
                </section>
                <section class="category-prds__pages mb-20s">
                    <div class="container">             
                        <?php $category_trademark = get_field('category_trademark', $cat);
                        if( $category_trademark ): ?>
                            <h2 class="titles-blues__alls fs-14s mb-5s"><?php echo __('Thương hiệu hàng đầu'); ?></h2>
                            <div class="row gutter-6">
                                <?php foreach( $category_trademark as $trademark ): ?>
                                    <div class="col-4">
                                        <div class="trademark-tops__items">
                                            <?php $term_parent = get_term_by( 'id', $cat->parent, 'product_cat' );
                                            if ($term_parent->slug == 'thuong-hieu') { ?>
                                                <a title="" href="<?php echo get_term_link( $trademark ); ?>" class="img-trademark__tops">
                                            <?php } else { ?>
                                                <a title="" href="<?php echo '?thuong-hieu='.$trademark->slug; ?>" class="img-trademark__tops">
                                            <?php } ?>
                                                <?php $thumbnail_id = get_woocommerce_term_meta( $trademark->term_id, 'thumbnail_id', true );
                                                $image = wp_get_attachment_url( $thumbnail_id );
                                                if ($image) { ?>
                                                    <img src="<?php echo $image; ?>" alt="Trademark" width="170" height="72">
                                                <?php } else {
                                                    echo $trademark->name; 
                                                } ?>
                                            </a>
                                            <!-- <div class="rating-item">
                                                <p class="rating">
                                                    <span class="rating-box">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <span>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </span>
                                                    </span>
                                                </p>
                                            </div>
                                            <p class="turn-evaluate__trademark">56 Đánh giá</p> -->
                                        </div>
                                    </div>
                                <?php endforeach; ?>   
                                </div>                                 
                        <?php endif; ?>                  
                    </div>
                </section>
                <section class="lth-products">        
                    <div class="module module_products posts-list">
                        <?php if ( get_query_var('thuong-hieu') ) {
                        $cat_sulg = $cat->slug;
                        $thuong_hieu_slug = get_query_var('thuong-hieu'); ?>                            
                            <?php
                                if ( woocommerce_product_loop() ) {
                                    /**
                                     * Hook: woocommerce_before_shop_loop.
                                     *
                                     * @hooked woocommerce_output_all_notices - 10
                                     * @hooked woocommerce_result_count - 20
                                     * @hooked woocommerce_catalog_ordering - 30
                                     */
                                    do_action( 'woocommerce_before_shop_loop' );
                                    woocommerce_product_loop_start(); ?>
                                    <!-- if ( wc_get_loop_prop( 'total' ) ) {
                                        while ( have_posts() ) {
                                            the_post();
                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action( 'woocommerce_shop_loop' );
                                            wc_get_template_part( 'content', 'product' );
                                        }
                                    } -->
                                    <?php
                                        $args = array(
                                            'post_type'   => 'product',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(
                                                'relation' => 'AND',
                                                array(
                                                    'taxonomy' => 'product_cat',                //(string) - Tên của taxonomy
                                                    'field' => 'slug',                    //(string) - Loại field cần xác định term của taxonomy, sử dụng 'id' hoặc 'slug'
                                                    'terms' => array( $cat_sulg ),    //(int/string/array) - Slug của các terms bên trong taxonomy cần lấy bài
                                                    'include_children' => true,           //(bool) - Lấy category con, true hoặc false
                                                    'operator' => 'IN'                    //(string) - Toán tử áp dụng cho mảng tham số này. Sử dụng 'IN' hoặc 'NOT IN'
                                                ),
                                                array(
                                                    'taxonomy' => 'product_cat',                //(string) - Tên của taxonomy
                                                    'field' => 'slug',                    //(string) - Loại field cần xác định term của taxonomy, sử dụng 'id' hoặc 'slug'
                                                    'terms' => array( $thuong_hieu_slug ),    //(int/string/array) - Slug của các terms bên trong taxonomy cần lấy bài
                                                    'include_children' => true,           //(bool) - Lấy category con, true hoặc false
                                                    'operator' => 'IN'                    //(string) - Toán tử áp dụng cho mảng tham số này. Sử dụng 'IN' hoặc 'NOT IN'
                                                ),
                                            ),
                                        );
                                        global $wp_query_count;
                                        $the_query = new WP_Query( $args );
                                        $wp_query_count = $the_query->post_count;
                                        if ( $the_query->have_posts() ) {
                                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                                // Get default product template
                                                wc_get_template_part( 'content', 'product' );
                                            endwhile;
                                        } else {
                                            do_action( 'woocommerce_no_products_found' );
                                        } wp_reset_postdata();
                                    ?>
                                    <?php woocommerce_product_loop_end();
                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop' );
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action( 'woocommerce_no_products_found' );
                                }
                            ?>
                        <?php } else { ?>
                            <?php
                                if ( woocommerce_product_loop() ) {
                                    /**
                                     * Hook: woocommerce_before_shop_loop.
                                     *
                                     * @hooked woocommerce_output_all_notices - 10
                                     * @hooked woocommerce_result_count - 20
                                     * @hooked woocommerce_catalog_ordering - 30
                                     */
                                    do_action( 'woocommerce_before_shop_loop' );
                                    woocommerce_product_loop_start();
                                    if ( wc_get_loop_prop( 'total' ) ) {
                                        while ( have_posts() ) {
                                            the_post();
                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action( 'woocommerce_shop_loop' );
                                            wc_get_template_part( 'content', 'product' );
                                        }
                                    } 
                                        woocommerce_product_loop_end();
                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop' );
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action( 'woocommerce_no_products_found' );
                                }
                        } ?>      
                    </div>
                </section>
            </main>
        <?php } elseif ($category_style == 'style_2') { ?>
            <main class="main-site main-page main-products main-products-appliances">
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
                <?php 
                $args = array(
                    'parent' => $cat->term_id,
                    'orderby' => 'ID',
                    'order'   => 'ASC',
                );
                $terms = get_terms( 'product_cat', $args );
                if ( $terms ) { ?>
                    <?php foreach ( $terms as $term ) { ?>
                        <?php $category_banner = get_field('category_banner', $term); ?>
                        <?php if ( !empty($category_banner) ) : ?>
                            <section class="group-prds__alls mb-15s">
                                <div class="container">
                                    <div class="tops-groups__prds mb-5s">
                                        <h2 class="names-groups__prds titles-md__alls fs-16s"><?php echo $term->name; ?></h2>
                                        <div class="viewmore">
                                            <a href="<?php echo get_term_link( $term ); ?>">Xem tất cả &raquo;</a>
                                        </div>
                                        <?php 
                                        $args2 = array(
                                            'parent' => $term->term_id,
                                            'orderby' => 'ID',
                                            'order'   => 'ASC',
                                        );
                                        $terms_child = get_terms( 'product_cat', $args2 );
                                        if ( $terms_child ) { ?>
                                            <ul class="prds-class__groups">
                                                <?php foreach ( $terms_child as $term_child ) { ?>
                                                    <li>
                                                        <a href="" title=""></a>
                                                    </li>
                                                    <li>
                                                        <a title="" href="<?php echo get_term_link( $term_child ); ?>"><?php echo $term_child->name; ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </div>                                
                                    <?php if (!empty($category_banner) ) : ?>
                                        <div class="banner-groups__prds mb-5s">                                    
                                            <a href="<?php echo get_term_link( $term ); ?>" target="" title="" class="image">
                                                <img src="<?php echo $category_banner; ?>" alt="Banner" width="620" height="390">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="slide-prds__groups">
                                        <div class="sl-prds__groups swiper-container">
                                            <div class="swiper-wrapper">
                                                <?php 
                                                $args3 = [
                                                    'post_type' => 'product',
                                                    'post_status' => 'publish',
                                                    'order' => 'DESC',
                                                    'posts_per_page' => 6,
                                                    'orderby' => $orderby,
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'product_cat',
                                                            'field'    => 'term_id',
                                                            'terms'    => $term->term_id,
                                                        ),
                                                    ),
                                                ];
                                                $tets = new WP_Query($args3);
                                                if ($tets->have_posts()) { ?>
                                                    <?php while ($tets->have_posts()) {
                                                        $tets-> the_post(); ?>
                                                        <div class="swiper-slide">
                                                            <?php get_template_part('woocommerce/product-box/product-box', '4'); ?>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                        <div class="group-btns__showss">
                                            <div class="showss-button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                                            <div class="showss-button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php endif; ?>
                    <?php } ?>
                <?php } ?>
            </main>
        <?php } else { ?>
            <main class="main-site main-page main-products main-products-appliances main-products-appliances-cat">
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?> 
                <section class="filter-houseware__prds mb-15s">
                    <div class="container">
                        <?php $categories_classify = get_field('category_classify', $cat);
                        if ( $categories_classify ) { ?>
                            <h2 class="titles-filter__houseware fs-18s mb-15s"><?php echo $cat->name; ?></h2>
                                <div class="checks-groups__houseware mb-25s">
                                    <p class="titles-md__alls mb-10s"><?php echo __('Phân loại:'); ?></p>
                                    <div class="row gutter-6">
                                        <?php foreach ( $categories_classify as $category_classify ) { ?>
                                            <div class="col-3">
                                                <div class="check-classify__houseware ">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        <div class="intro-checks__classify">
                                                            <a href="<?php echo get_term_link( $category_classify ); ?>" class="<?php echo $category_classify->name; ?>">
                                                                <?php $thumbnail_id = get_woocommerce_term_meta( $category_classify->term_id, 'thumbnail_id', true );
                                                                $image = wp_get_attachment_url( $thumbnail_id ); ?>
                                                                <img src="<?php echo $image; ?>" alt="<?php echo $category_classify->name; ?> ">
                                                            </a>
                                                            <div class="bottom-checks__classify">
                                                                <input type="radio" class="form-check-input input-checked" value="option1" id="exampleCheck1" name="exampleRadios" checked="">
                                                                <span class="check-classify__dots">
                                                                </span>
                                                                <p class="names-checks__classify"><?php echo $category_classify->name; ?></p>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>            
                        <?php } ?> 
                        <div class="checks-groups__houseware mb-10s">
                            <p class="titles-md__alls mb-10s"><?php echo __('Hãng sản xuất:'); ?></p>
                             <?php $category_trademark = get_field('category_trademark', $cat);
                            if( $category_trademark ): ?>
                                <ul class="check-producer__list">
                                    <?php foreach( $category_trademark as $trademark ): ?>
                                        <li>
                                            <div class="check-producer__houseware">
                                                <a title="" href="<?php echo get_term_link( $trademark ); ?>" class="img-trademark__tops">
                                                <?php $thumbnail_id = get_woocommerce_term_meta( $trademark->term_id, 'thumbnail_id', true );
                                                $image = wp_get_attachment_url( $thumbnail_id );
                                                if ($image) { ?>
                                                    <img src="<?php echo $image; ?>" alt="Trademark" width="170" height="72">
                                                <?php } else {
                                                    echo $trademark->name; 
                                                } ?>
                                            </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?> 
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="select-housewares lth-products">
                            <?php
                                if (is_active_sidebar('sidebar_shop')) {
                                    dynamic_sidebar('sidebar_shop');
                                }
                            ?>
                        </div>
                    </div>
                </section>          
                <section class="lth-products"> 
                    <div class="container" style="padding: 0 7px;">
                        <div class="tops-groups__prds mb-5s">
                            <h2 class="names-groups__prds titles-md__alls fs-16s"><?php echo $term->name; ?></h2>
                            <?php 
                            $args2 = array(
                                'parent' => $term->term_id,
                                'orderby' => 'ID',
                                'order'   => 'ASC',
                            );
                            $terms_child = get_terms( 'product_cat', $args2 );
                            if ( $terms_child ) { ?>
                                <ul class="prds-class__groups">
                                    <?php foreach ( $terms_child as $term_child ) { ?>
                                        <li>
                                            <a href="" title=""></a>
                                        </li>
                                        <li>
                                            <a title="" href="<?php echo get_term_link( $term_child ); ?>"><?php echo $term_child->name; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="module module_products posts-list">
                        <?php
                            if ( woocommerce_product_loop() ) {
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' );
                                woocommerce_product_loop_start();
                                if ( wc_get_loop_prop( 'total' ) ) {
                                    while ( have_posts() ) {
                                        the_post();
                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action( 'woocommerce_shop_loop' );
                                        wc_get_template_part( 'content', 'product' );
                                    }
                                }
                                woocommerce_product_loop_end();
                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                            } else {
                                /**
                                 * Hook: woocommerce_no_products_found.
                                 *
                                 * @hooked wc_no_products_found - 10
                                 */
                                do_action( 'woocommerce_no_products_found' );
                            }
                        ?>        
                    </div>
                </section>
            </main>
        <?php }?>
    <?php } else { ?>
        <?php
        if ($category_style == 'style_1') { ?>
            <main class="main-site main-page main-products">
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
                <section class="lth-section lth-categories">
                    <div class="container">                   
                        <div class="row"> 
                            <?php //$categories_product = get_field('category_product', $cat); ?>
                            <?php
                                $cates = [];
                                $i = 0;
                                $categories_product = get_field('category_product', $cat);
                                if( $categories_product ): ?>
                                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="categories-box">
                                            <div class="module module__header">
                                                <div class="module_title">
                                                    <h2 class="title">
                                                        <?php echo __('Danh mục sản phẩm'); ?>
                                                    </h2>           
                                                </div>
                                            </div>
                                            <div class="megamenu">
                                                <div class="menu-content">      
                                                    <ul id="menu-main-menu" class="menu">
                                                        <?php foreach ( $categories_product as $term ) { ?>
                                                            <li class="menu-item current-menu-item current_page_item <?php if ($cat->term_id == $term->term_id) {echo 'menu-item-object-page';}?>">
                                                                <?php $term_parent = get_term_by( 'id', $cat->parent, 'product_cat' );
                                                                if ( get_query_var('thuong-hieu') ) {
                                                                    $thuong_hieu_slug = get_query_var('thuong-hieu'); ?>
                                                                    <a href="<?php echo get_term_link( $term ).'?thuong-hieu='.$thuong_hieu_slug; ?>" class="<?php echo $term->slug; ?>">
                                                                <?php } elseif ($term_parent->slug == 'thuong-hieu') { ?>
                                                                    <a href="<?php echo get_term_link( $term ).'?thuong-hieu='.$cat->slug; ?>" class="<?php echo $term->slug; ?>">
                                                                <?php } else { ?>
                                                                    <a href="<?php echo get_term_link( $term ); ?>" class="<?php echo $term->slug; ?>">
                                                                <?php } ?>
                                                                    <?php echo $term->name; ?>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>      
                                        </div>
                                    </div>
                                <?php else :
                                    $args = array(
                                        'parent' => $cat->term_id,
                                    );
                                    $terms = get_terms( 'product_cat', $args );
                                    if ( $terms ) { ?>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="categories-box">
                                                <div class="module module__header">
                                                    <div class="module_title">
                                                        <h2 class="title">
                                                            <?php echo __('Danh mục sản phẩm'); ?>
                                                        </h2>           
                                                    </div>
                                                </div>
                                                <div class="megamenu">
                                                    <div class="menu-content">      
                                                        <ul id="menu-main-menu" class="menu">
                                                            <?php foreach ( $terms as $term ) { ?>
                                                                <li class="menu-item current-menu-item current_page_item  <?php if ($cat->term_id == $term->term_id) {echo 'menu-item-object-page';}?>">
                                                                    <?php $term_parent = get_term_by( 'id', $cat->parent, 'product_cat' );
                                                                    if ( get_query_var('thuong-hieu') ) {
                                                                        $thuong_hieu_slug = get_query_var('thuong-hieu'); ?>
                                                                        <a href="<?php echo get_term_link( $term ).'?thuong-hieu='.$thuong_hieu_slug; ?>" class="<?php echo $term->slug; ?>">
                                                                    <?php } elseif ($term_parent->slug == 'thuong-hieu') { ?>
                                                                        <a href="<?php echo get_term_link( $term ).'?thuong-hieu='.$cat->slug; ?>" class="<?php echo $term->slug; ?>">
                                                                    <?php } else { ?>
                                                                        <a href="<?php echo get_term_link( $term ); ?>" class="<?php echo $term->slug; ?>">
                                                                    <?php } ?>
                                                                        <?php echo $term->name; ?>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>      
                                            </div>
                                        </div>                   
                                    <?php }
                                endif;
                            ?>
                            <?php $category_trademark = get_field('category_trademark', $cat);
                            if( $category_trademark ): ?>
                                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                                    <div class="brands-box">
                                        <div class="module module__header">
                                            <div class="module_title">
                                                <h2 class="title">
                                                    <?php echo __('Thương hiệu hàng đầu'); ?>
                                                </h2>
                                            </div>
                                        </div>                                
                                        <div class="megamenu">
                                            <div class="menu-content">      
                                                <ul id="menu-main-menu" class="menu abc">
                                                    <?php foreach( $category_trademark as $trademark ): ?>
                                                        <li class="menu-item current-menu-item current_page_item menu-item-object-page">
                                                            <?php $term_parent = get_term_by( 'id', $cat->parent, 'product_cat' );
                                                            if ($term_parent->slug == 'thuong-hieu') { ?>
                                                                <a href="<?php echo get_term_link( $trademark ); ?>" class="">
                                                            <?php } else { ?>
                                                                <a href="<?php echo '?thuong-hieu='.$trademark->slug; ?>" class="">
                                                            <?php } ?>
                                                                <?php $thumbnail_id = get_woocommerce_term_meta( $trademark->term_id, 'thumbnail_id', true );
                                                                $image = wp_get_attachment_url( $thumbnail_id );
                                                                if ($image) { ?>
                                                                    <img src="<?php echo $image; ?>" alt="Trademark" width="170" height="72">
                                                                <?php } else {
                                                                    echo $trademark->name; 
                                                                } ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>                              
                                    </div>
                                </div>  
                            <?php else: ?>
                                <?php $term_trademark = get_queried_object();
                                $children = get_terms( $term_trademark->taxonomy, array(
                                    'parent'    => 31,
                                    'hide_empty' => false
                                ) ); ?>
                                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                                    <div class="brands-box">
                                        <div class="module module__header">
                                            <div class="module_title">
                                                <h2 class="title">
                                                    <?php echo __('Thương hiệu hàng đầu'); ?>
                                                </h2>
                                            </div>
                                        </div>                                
                                        <div class="megamenu">
                                            <div class="menu-content">      
                                                <ul id="menu-main-menu" class="menu">
                                                    <?php foreach( $children as $subcat ): ?>
                                                        <li class="menu-item current-menu-item current_page_item menu-item-object-page">
                                                            <?php $term_parent = get_term_by( 'id', $cat->parent, 'product_cat' );
                                                            if ($term_parent->slug == 'thuong-hieu') { ?>
                                                                <a href="<?php echo get_term_link( $subcat ); ?>" class="">
                                                            <?php } else { ?>
                                                                <a href="<?php echo '?thuong-hieu='.$subcat->slug; ?>" class="">
                                                            <?php } ?>
                                                                <?php $thumbnail_id = get_woocommerce_term_meta( $subcat->term_id, 'thumbnail_id', true );
                                                                $image = wp_get_attachment_url( $thumbnail_id );
                                                                if ($image) { ?>
                                                                    <img src="<?php echo $image; ?>" alt="Trademark" width="170" height="72">
                                                                <?php } else {
                                                                    echo $subcat->name; 
                                                                } ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>                              
                                    </div>
                                </div>                                        
                            <?php endif; ?>   
                        </div>
                    </div>
                </section>
                <section class="lth-products">        
                    <div class="module module_products posts-list">
                        <?php if ( get_query_var('thuong-hieu') ) {
                        $cat_sulg = $cat->slug;
                        $thuong_hieu_slug = get_query_var('thuong-hieu'); ?>                      
                            <?php
                                if ( woocommerce_product_loop() ) {
                                    /**
                                     * Hook: woocommerce_before_shop_loop.
                                     *
                                     * @hooked woocommerce_output_all_notices - 10
                                     * @hooked woocommerce_result_count - 20
                                     * @hooked woocommerce_catalog_ordering - 30
                                     */
                                    do_action( 'woocommerce_before_shop_loop' );
                                    woocommerce_product_loop_start(); ?>
                                    <!-- if ( wc_get_loop_prop( 'total' ) ) {
                                        while ( have_posts() ) {
                                            the_post();
                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action( 'woocommerce_shop_loop' );
                                            wc_get_template_part( 'content', 'product' );
                                        }
                                    } -->
                                    <?php
                                        $args = array(
                                            'post_type'   => 'product',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(
                                                'relation' => 'AND',
                                                array(
                                                    'taxonomy' => 'product_cat',                //(string) - Tên của taxonomy
                                                    'field' => 'slug',                    //(string) - Loại field cần xác định term của taxonomy, sử dụng 'id' hoặc 'slug'
                                                    'terms' => array( $cat_sulg ),    //(int/string/array) - Slug của các terms bên trong taxonomy cần lấy bài
                                                    'include_children' => true,           //(bool) - Lấy category con, true hoặc false
                                                    'operator' => 'IN'                    //(string) - Toán tử áp dụng cho mảng tham số này. Sử dụng 'IN' hoặc 'NOT IN'
                                                ),
                                                array(
                                                    'taxonomy' => 'product_cat',                //(string) - Tên của taxonomy
                                                    'field' => 'slug',                    //(string) - Loại field cần xác định term của taxonomy, sử dụng 'id' hoặc 'slug'
                                                    'terms' => array( $thuong_hieu_slug ),    //(int/string/array) - Slug của các terms bên trong taxonomy cần lấy bài
                                                    'include_children' => true,           //(bool) - Lấy category con, true hoặc false
                                                    'operator' => 'IN'                    //(string) - Toán tử áp dụng cho mảng tham số này. Sử dụng 'IN' hoặc 'NOT IN'
                                                ),
                                            ),
                                        );
                                        $the_query = new WP_Query( $args );
                                        if ( $the_query->have_posts() ) {
                                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                                // Get default product template
                                                wc_get_template_part( 'content', 'product' );
                                            endwhile;
                                        } else {
                                            do_action( 'woocommerce_no_products_found' );
                                        } wp_reset_postdata();
                                    ?>
                                    <?php woocommerce_product_loop_end();
                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop' );
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action( 'woocommerce_no_products_found' );
                                }
                            ?>
                        <?php } else { ?>
                            <?php
                                if ( woocommerce_product_loop() ) {
                                    /**
                                     * Hook: woocommerce_before_shop_loop.
                                     *
                                     * @hooked woocommerce_output_all_notices - 10
                                     * @hooked woocommerce_result_count - 20
                                     * @hooked woocommerce_catalog_ordering - 30
                                     */
                                    do_action( 'woocommerce_before_shop_loop' );
                                    woocommerce_product_loop_start();
                                    if ( wc_get_loop_prop( 'total' ) ) {
                                        while ( have_posts() ) {
                                            the_post();
                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action( 'woocommerce_shop_loop' );
                                            wc_get_template_part( 'content', 'product' );
                                        }
                                    } 
                                        woocommerce_product_loop_end();
                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop' );
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action( 'woocommerce_no_products_found' );
                                }
                        } ?>
                        <!-- <div class="container-fluid">                   
                            <div class="row"> 
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="module module_button">
                                        <a href="javascript:0" class="btn product-load-more"><?php echo __('Xem thêm...'); ?></a>
                                    </div>
                                    <script>
                                    jQuery(document).ready(function(){
                                        var offset = 2; // khái báo số lượng bài viết đã hiển thị
                                        jQuery('.product-load-more').click(function(event) {
                                            jQuery.ajax({ // Hàm ajax
                                                type : "post", //Phương thức truyền post hoặc get
                                                dataType : "html", //Dạng dữ liệu trả về xml, json, script, or html
                                                url : '<?php echo admin_url('admin-ajax.php');?>', // Nơi xử lý dữ liệu
                                                data : {
                                                    action: "productloadmore", //Tên action, dữ liệu gởi lên cho server
                                                    offset: offset, // gởi số lượng bài viết đã hiển thị cho server
                                                },
                                                success: function(response) {
                                                    jQuery('.posts-list .products .groups-box').append(response);
                                                    offset = offset + 2; // tăng bài viết đã hiển thị
                                                    if (response == '') {
                                                        jQuery('.product-load-more').hide();
                                                    }
                                                }
                                           });
                                        });
                                    });
                                </script>
                                </div>
                            </div>
                        </div>   -->          
                    </div>
                </section>
            </main>
        <?php } elseif ($category_style == 'style_2') { ?>
            <main class="main-site main-page main-products main-products-appliances main-products-appliances-cat">
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
                <?php 
                $args = array(
                    'parent' => $cat->term_id,
                    'orderby' => 'ID',
                    'order'   => 'ASC',
                    // 'hide_empty'    => 0
                );
                $terms = get_terms( 'product_cat', $args );
                // echo '<pre>';
                // print_r($terms);
                if ( $terms ) { ?>
                    <?php foreach ( $terms as $term ) {  ?>
                        <section class="lth-section lth-products">
                            <div class="container">                   
                                <div class="row"> 
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="module module__header">
                                            <div class="module_title">
                                                <h2 class="title"><?php echo $term->name; ?></h2>
                                                <div class="viewmore">
                                                    <a href="<?php echo get_term_link( $term ); ?>">Xem tất cả &raquo;</a>
                                                </div>
                                            </div>
                                            <?php 
                                            $args2 = array(
                                                'parent' => $term->term_id,
                                                'orderby' => 'ID',
                                                'order'   => 'ASC',
                                            );
                                            $terms_child = get_terms( 'product_cat', $args2 );
                                            if ( $terms_child ) { ?>
                                                <div class="product-cats">
                                                    <ul>
                                                        <?php foreach ( $terms_child as $term_child ) { ?>
                                                            <li>
                                                                <a href="<?php echo get_term_link( $term_child ); ?>" title=""><?php echo $term_child->name; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="module module_products">                        
                                            <?php $category_banner = get_field('category_banner', $term);
                                                  if ( !empty($category_banner) ) : ?>
                                                    <div class="module module__banner">
                                                        <div class="content-image">                                                    
                                                            <a href="<?php echo get_term_link( $term ); ?>" target="" title="" class="image">
                                                                <img src="<?php echo $category_banner; ?>" alt="Banner" width="620" height="390">
                                                            </a>
                                                        </div>
                                                    </div>
                                            <?php endif; ?>
                                            <?php 
                                            $args3 = [
                                                'post_type' => 'product',
                                                'post_status' => 'publish',
                                                'order' => 'DESC',
                                                'posts_per_page' => 6,
                                                'orderby' => $orderby,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field'    => 'term_id',
                                                        'terms'    => $term->term_id,
                                                    ),
                                                ),
                                            ];
                                            $tets = new WP_Query($args3);
                                            if ($tets->have_posts()) { ?>
                                                <div class="module_content">
                                                    <div class="slick-slider slick-products-gia-dung">
                                                        <?php while ($tets->have_posts()) {
                                                            $tets-> the_post(); ?>
                                                            <?php get_template_part('woocommerce/product-box/desktop/product-box', '4'); ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                <?php } ?>
            </main>
        <?php } else { ?>
            <main class="main-site main-page main-products main-products-appliances">
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>                
                <section class="lth-products">  
                    <div class="module module__header" style="padding-bottom: 0; padding-top: 30px;"> 
                        <div class="container">                 
                            <div class="row"> 
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="groups-box">
                                        <?php $categories_classify = get_field('category_classify', $cat);
                                        if ( $categories_classify ) { ?>
                                            <div class="module_categories">
                                                <label><?php echo __('Phân loại:'); ?></label>
                                                <div class="module_content">
                                                    <div class="groups-box">
                                                        <?php foreach ( $categories_classify as $category_classify ) { ?>
                                                            <div class="item">
                                                                <article class="post-box">
                                                                    <div class="post-image">
                                                                        <a href="<?php echo get_term_link( $category_classify ); ?>" class="<?php echo $category_classify->name; ?>">
                                                                            <?php $thumbnail_id = get_woocommerce_term_meta( $category_classify->term_id, 'thumbnail_id', true );
                                                                            $image = wp_get_attachment_url( $thumbnail_id ); ?>
                                                                            <img src="<?php echo $image; ?>" alt="<?php echo $category_classify->name; ?> ">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <h3 class="post-name">
                                                                            <input type="radio" name="cat">
                                                                            <a href="<?php echo get_term_link( $category_classify ); ?>" class="<?php echo $category_classify->name; ?>">
                                                                                <?php echo $category_classify->name; ?> 
                                                                            </a> 
                                                                        </h3>   
                                                                    </div>
                                                                </article>
                                                            </div>
                                                            <!-- item -->
                                                        <?php } ?>
                                                    </div>
                                                </div>      
                                            </div>             
                                        <?php } ?> 
                                        <?php $category_trademark = get_field('category_trademark', $cat);
                                        if( $category_trademark ): ?>
                                            <div class="module_manufacturer">
                                                <label><?php echo __('Hãng sản xuất:'); ?></label>
                                                <div class="megamenu">
                                                    <div class="menu-content">      
                                                        <ul id="menu-main-menu" class="menu">
                                                            <?php foreach( $category_trademark as $trademark ): ?>
                                                                <li class="menu-item current-menu-item current_page_item menu-item-object-page">
                                                                    <a href="<?php echo get_term_link( $trademark ); ?>" class="<?php echo $trademark->name; ?>">
                                                                        <?php $thumbnail_id = get_woocommerce_term_meta( $trademark->term_id, 'thumbnail_id', true );
                                                                        $image = wp_get_attachment_url( $thumbnail_id );
                                                                        if ($image) { ?>
                                                                            <img src="<?php echo $image; ?>" alt="Trademark" width="170" height="72">
                                                                        <?php } else {
                                                                            echo $trademark->name; 
                                                                        } ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>  
                                                <?php
                                                    if (is_active_sidebar('sidebar_shop')) {
                                                        dynamic_sidebar('sidebar_shop');
                                                    }
                                                ?>
                                            </div>                 
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module module_products posts-list">
                        <?php
                            if ( woocommerce_product_loop() ) {
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' );
                                woocommerce_product_loop_start();
                                if ( wc_get_loop_prop( 'total' ) ) {
                                    while ( have_posts() ) {
                                        the_post();
                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action( 'woocommerce_shop_loop' );
                                        wc_get_template_part( 'content', 'product' );
                                    }
                                }
                                woocommerce_product_loop_end();
                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                            } else {
                                /**
                                 * Hook: woocommerce_no_products_found.
                                 *
                                 * @hooked wc_no_products_found - 10
                                 */
                                do_action( 'woocommerce_no_products_found' );
                            }
                        ?>        
                    </div>
                </section>
            </main>
        <?php }?>
    <?php }
?>
<?php get_footer( 'shop' );