<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-blogs">
    <section class="lth-blogs">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module__header">
                        <div class="module_title">
                            <h1 class="title">
                                <?php
                                    if (is_category()) {
                                        single_cat_title();  //Category
                                        echo __(' | Bếp EU');
                                    } elseif (is_author()) {
                                        the_post();
                                        echo ('Archives by author: ' . get_the_author());  //Tác giả
                                        rewind_posts();
                                    } else {
                                        echo _('Archives');
                                    }
                                ?>
                            </h1>
                        </div>
                    </div>

                    <div class="module module_blogs"> 
                        <div class="module_content">
                            <div class="groups-box">
                                <?php
                                    if (have_posts()) { $i; ?>

                                        <div class="groups-box">

                                            <?php while (have_posts()) {
                                                the_post(); $i++;
                                                if ($i == 1) { ?>
                                                    <div class="item item-first">
                                                        <article class="post-box">
                                                            <div class="post-content">
                                                                <h3 class="post-name">
                                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>        
                                                                </h3>

                                                                <ul class="post-meta">
                                                                    <li>
                                                                        <i class="icofont-clock-time icon"></i>
                                                                        <?php the_time('d/m/Y'); ?>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icofont-eye icon"></i>
                                                                        <?php echo getPostViews(get_the_ID()); ?>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" title="" tabindex="0"><?php single_cat_title();  ?></a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="post-excerpt">
                                                                <!-- <p>Sắp xếp đồ đạc trong nhà bếp mới ngoài việc hạn chế lựa chọn các món đồ dùng ít  sử dụng, không cần thiết thì bạn lưu ý cách bố trí sau...</p> -->
                                                            </div>

                                                            <?php if (has_post_thumbnail()) { ?>
                                                                <div class="post-image">
                                                                    <a href="<?php the_permalink(); ?>" title="" class="image">
                                                                        <img src="<?php echo lth_custom_img('full', 370, 200);?>" alt="<?php the_title(); ?>" width="370" height="200">
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </article>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="item">
                                                        <article class="post-box">                  
                                                            <?php if (has_post_thumbnail()) { ?>
                                                                <div class="post-image">
                                                                    <a href="<?php the_permalink(); ?>" title="" class="image">
                                                                        <img src="<?php echo lth_custom_img('full', 370, 200);?>" alt="<?php the_title(); ?>" width="370" height="200">
                                                                    </a>
                                                                </div>
                                                            <?php } ?>

                                                            <div class="post-content">
                                                                <h3 class="post-name">
                                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>         
                                                                </h3>

                                                                <ul class="post-meta">
                                                                    <li>
                                                                        <i class="icofont-clock-time icon"></i>
                                                                        <?php the_time('d/m/Y'); ?>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icofont-eye icon"></i>
                                                                        <?php echo getPostViews(get_the_ID()); ?>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" title="" tabindex="0"><?php single_cat_title();  ?></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </article>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                        </div>

                                        <?php require_once(LIBS_DIR . '/pagination.php');
                                    } else {
                                        get_template_part('template-parts/content', 'none');
                                    }
                                ?>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
