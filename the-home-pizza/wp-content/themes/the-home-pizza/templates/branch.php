<?php
/**
 * Template Name: Trang Nhà Hàng
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-branchs">
    <section class="lth-page-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_banner"> 
                        <div class="module_content">
                            <?php if( have_rows('contact_banner') ): ?>
                                <?php while( have_rows('contact_banner') ): the_row(); ?>
                                    <div class="banner-image">
                                        <div class="image">
                                            <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">         
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <div class="banner-content">
                                <?php if( have_rows('contact_banner') ): ?>
                                    <?php while( have_rows('contact_banner') ): the_row(); ?>
                                        <h1><?php the_sub_field('title'); ?></h1>
                                    <?php endwhile; ?>
                                <?php endif; ?>

                                <?php if( have_rows('branchs') ): $i; ?>
                                    <ul>
                                        <?php while( have_rows('branchs') ): the_row(); $i++; ?>
                                            <li>
                                                <a href="<?php the_sub_field('branch_name'); ?>" class="btn <?php if ($i ==1) {echo 'active';} ?>"><?php the_sub_field('branch_name'); ?></a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $branch_image = get_field('branch_image'); ?>

    <?php if( have_rows('branchs') ): $j; ?>
        <?php while( have_rows('branchs') ): the_row(); $j++; ?>
            <section class="lth-map <?php if ($j ==1) {echo 'active';} ?>" data_name="<?php the_sub_field('branch_name'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_map"> 
                                <div class="module_content">
                                    <?php the_sub_field('branch_map'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="module module_map_content"> 
                                <div class="module_content">
                                    <p class="map-name-image">
                                        <img src="<?php echo $branch_image; ?>" alt="<?php the_sub_field('branch_name'); ?>">
                                    </p>
                                    <p class="map-name">
                                        <span><?php the_sub_field('branch_name'); ?></span>
                                    </p>
                                    <p class="map-address">
                                        <label><?php echo __('Địa chỉ:') ?></label>
                                        <span><?php the_sub_field('branch_address'); ?></span>
                                    </p>
                                    <p class="map-phone">
                                        <label><?php echo __('Số điện thoại:') ?></label>
                                        <span><?php the_sub_field('branch_phone'); ?></span>
                                    </p>
                                    <ul>
                                        <li>
                                            <a href="<?php the_sub_field('branch_facebook'); ?>" title="">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-01.png" alt="Facebook">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php the_sub_field('link_google_map'); ?>" title="">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-07.png" alt="Map">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tel:<?php the_sub_field('branch_phone'); ?>" title="">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-08.png" alt="Map">
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="map-description">
                                        <?php the_sub_field('branch_description'); ?>
                                    </p>
                                    <ul class="other-branches">
                                        <?php if( have_rows('other_branches') ): ?>
                                            <li><?php echo __('Xem thêm:'); ?></li>
                                            <?php while( have_rows('other_branches') ): the_row(); ?>
                                                <li>
                                                    <a href="<?php the_sub_field('other_branches_name'); ?>" title=""><?php the_sub_field('other_branches_name'); ?></a>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    
</main>

<?php get_footer(); ?>
