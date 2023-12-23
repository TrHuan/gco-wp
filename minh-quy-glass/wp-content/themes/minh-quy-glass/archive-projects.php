<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main main-page main-projects">
    <section class="lth-projects">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_projects module_projects_list">       
                        <div class="module_title">
                            <p class="infor"><?php echo __('Dưới đây là những dự án mà Minh Quý Glass đã và đang tham gia triển khai thi công') ?></p>
                        </div>
                                    
                        <!-- <div class="module_title">
                            <h2 class="title">
                                <?php
                                    // if (is_category()) {
                                    //     single_cat_title();  //Category
                                    // } elseif (is_author()) {
                                    //     the_post();
                                    //     echo ('Archives by author: ' . get_the_author());  //Tác giả
                                    //     rewind_posts();
                                    // } else {
                                    //     echo _('Archives');
                                    // }
                                ?>
                            </h2>
                        </div> -->

                        <div class="module_content">
                            <?php
                                if (have_posts()) { ?>

                                    <div class="groups-box">

                                        <?php while (have_posts()) {
                                            the_post();
                                            get_template_part('template-parts/project/content', '');
                                        } ?>
                                        
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
    </section>
</main>

<?php get_footer(); ?>
