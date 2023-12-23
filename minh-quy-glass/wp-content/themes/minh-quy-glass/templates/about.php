<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-about">
    <article class="lth-about lth-banners style-02">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="module module_about module_banners">
                            <div class="module_content">
                                <?php $introduce = get_field('introduce', 'option'); 
                                    if ($introduce) {
                                ?>

                                    <?php if ($introduce['title']) { ?>
                                        <h1 class="title"><?php echo $introduce['title']; ?></h1>
                                    <?php } ?>

                                    <?php if ($introduce['description']) { ?>
                                        <p><?php echo $introduce['description']; ?></p>
                                    <?php } ?>   

                                    <?php echo $introduce['content']; ?>

                                    <div class="content content-contact">
                                        <h3><?php echo __('Liên hệ để được tư vấn và hỗ trợ:') ?></h3>

                                        <?php
                                            $footer_1 = get_field('footer_1', 'option');
                                            $title = $footer_1['title'];
                                            $dia_chi = $footer_1['dia_chi'];
                                            $hotline = $footer_1['hotline'];
                                            $email = $footer_1['email'];
                                        ?>

                                        <p><?php echo $title; ?></p>

                                        <p><?php echo __('Địa chỉ: ') ?><?php echo $dia_chi; ?></p>

                                        <p><?php echo __('Điện thoại: ') ?><?php echo $hotline; ?></p>

                                        <p><?php echo __('Email: ') ?><?php echo $email; ?></p>      
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
</main>

<?php get_footer(); ?>
