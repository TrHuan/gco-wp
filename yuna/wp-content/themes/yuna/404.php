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
    .p404 {
        background: url(<?php echo ASSETS_URI; ?>/images/bg404.jpg);
        padding: 125px 0px 60px;
    }

    .btn-404:hover {
        color: #4c63cc;
    }
</style>

<main class="main-site main-page main-404">
    <section class="p404 t8">
        <div class="text-center container">
            <h1 class="s72 t8"><?php echo __('404 page'); ?></h1>
            <h2 class="s24 py-4"><?php echo __('Xin lỗi, chúng tôi không tìm thấy trang bạn cần'); ?></h2>
            <div class="text-center">
                <a href="<?php echo HOME_URI; ?>" title="" class="btn btn-404"><?php echo __('Trang chủ'); ?></a>
            </div>
        </div>
    </section>
</main>
    
<?php get_footer(); ?>