<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-posts">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module__blogs module__handbooks module__blogs__list">
                                <div class="module__content groups-box">                                 
                                    <?php
                                    if (have_posts()) { ?>

                                            <?php while (have_posts()) {
                                                the_post(); ?>

                                                <div class="item">
                                                    <?php
                                                        //load file tương ứng với post format
                                                        get_template_part('template-parts/post/content', get_post_format());
                                                    ?>
                                                </div>
                                            <?php } ?>

                                        <?php } else {
                                        get_template_part('template-parts/post/content', 'none');
                                    }
                                    ?>
                                </div>

                                <?php require_once(LIBS_DIR . '/paginations/pagination.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="lth-contacts">
                <div class="container">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="module module__contacts">
                                <div class="title-box">
                                    <h3 class="title"><?php echo __('Liên hệ với chúng tôi'); ?></h3>
                                    <?php 
                                        $description_form_contact = get_field('description_form_contact'); 
                                        if ($description_form_contact) { 
                                    ?>
                                        <p><?php echo $description_form_contact; ?></p>
                                    <?php }?>
                                </div>

                                <div class="content-box">
                                    <?php echo do_shortcode('[contact-form-7 id="656" title="Liên hệ với chúng tôi"]') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</main>

<?php get_footer(); ?>
