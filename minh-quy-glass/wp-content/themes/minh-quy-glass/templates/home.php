<?php
/**
 * Template Name: Trang Chủ
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-home">
    <?php //if (have_posts()) { ?>
        <?php //while (have_posts()) { the_post(); ?>

            <?php if( have_rows('home_main', 'option') ): ?>
                <?php while( have_rows('home_main', 'option') ): the_row(); ?>
                    
                    <article class="lth-slidershow">
                        <div class="container-fuild">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php get_template_part('templates/addons/slidershow', ''); ?>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="lth-features">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php get_template_part('templates/addons/features', ''); ?>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="lth-banners">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="module module_banners">
                                        <?php 
                                            $gioi_thieu = get_sub_field('about');
                                            if ($gioi_thieu) { 
                                        ?>
                                            <div class="module_content">
                                                <div class="content groups-box">
                                                    <div class="content-box">
                                                        <h1 class="title"><?php echo $gioi_thieu['title']; ?></h1>

                                                        <?php echo $gioi_thieu['content']; ?>

                                                        <?php
                                                            $link =  $gioi_thieu['button'];
                                                            if ($link) {
                                                                $url = $link['url'];
                                                                $title = $link['title'];
                                                                $target = $link['target'] ? $link['target'] : '_self';
                                                            }
                                                        ?>

                                                        <div class="button-box">
                                                            <a href="<?php echo $url; ?>" title="<?php echo $title; ?>" target="<?php echo $target; ?>" class="btn">
                                                                <?php echo $title; ?>
                                                                <i class="icofont-arrow-right icon"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="content-image">
                                                        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" title="" class="image">
                                                            <img src="<?php echo $gioi_thieu['image']; ?>" alt="Image" width="300" height="300">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="lth-products">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php get_template_part('templates/addons/products', ''); ?>                                    
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="lth-projects">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php get_template_part('templates/addons/projects', ''); ?>                                    
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="lth-blogs">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php get_template_part('templates/addons/blogs', ''); ?>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="lth-brands">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php get_template_part('templates/addons/brands', ''); ?>
                                </div>
                            </div>
                        </div>
                    </article>

                <?php endwhile; ?>
            <?php endif; ?>

        <?php //} ?>
    <?php //} ?>
</main>

<?php get_footer(); ?>
