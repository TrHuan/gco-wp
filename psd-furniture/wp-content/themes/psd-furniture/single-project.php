<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-single.php'); ?>

<main class="main-site main-page main-single">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-post-single">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="post-single-box">
                                <div class="content-box">
                                    <?php
                                        if (have_posts()) {
                                            while (have_posts()) {
                                                the_post();
                                                get_template_part('template-parts/post/content', get_post_format());
                                            }
                                        } else {
                                            get_template_part('template-parts/content', 'none');
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="sidebars">
                                <!-- Sidebar -->
                                <?php if (is_active_sidebar('sidebar_projects')) { ?>

                                    <aside class="lth-sidebars">
                                        <?php dynamic_sidebar('sidebar_projects'); ?>
                                    </aside>

                                <?php } ?>
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
                                    <?php echo do_shortcode('[contact-form-7 id="666" title="Liên hệ với chúng tôi 2"]') ?>
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
