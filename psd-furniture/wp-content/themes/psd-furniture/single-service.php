<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-single.php'); ?>

<main class="main-site main-page main-single main-single-service">
    <div class="main-container">
        <div class="main-content">

            <?php
                $single = get_field('style');
            ?>
            <?php if ($single == 'style_01') { ?>
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
            <?php } else { ?>
                <article class="lth-services services-design">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="module module__services module__services__design">
                                    <div class="module__content">
                                        <div class="item">
                                            <div class="content-box">
                                                <?php 
                                                    $images = get_field('thu_vien_anh');
                                                    if( $images ): ?>
                                                    <div class="content-image">
                                                        <div class="slick-slider slick-services-library-for">
                                                            <?php foreach( $images as $image ): ?>
                                                                <div class="item">
                                                                    <div class="image">
                                                                        <img src="<?php echo $image; ?>" alt="Image">
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <div class="slick-slider slick-services-library-nav">
                                                            <?php foreach( $images as $image ): ?>
                                                                <div class="item">
                                                                    <div class="image">
                                                                        <img src="<?php echo $image; ?>" alt="Image">
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="content">
                                                    <h1 class="content-name">
                                                        <?php the_title(); ?>
                                                    </h1>
                                                    <div class="content-excerpt">
                                                        <?php the_content(); ?>
                                                    </div>
                                                    <?php 
                                                    $link = get_field('url_bao_gia');
                                                    if( $link ): 
                                                        $url = $link['url'];
                                                        $target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                        <div class="content-button">
                                                            <a href="<?php echo $url; ?>" title="Báo giá" target="<?php echo $target; ?>">
                                                                <?php  echo __('[Xem báo giá]'); ?>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php } ?>

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
