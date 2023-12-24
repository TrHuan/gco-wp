<?php
/**
 * The template for displaying author page
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main-site main-page main-posts">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <?php
                                $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                                ?>
                            <h2 class="name-author">Tác giả: <?php echo $curauth->nickname; ?></h2>
                            <div class="desc-author">
                                <?php echo $curauth->user_description; ?>
                            </div>
                            <div class="groups-box_posts_author">                                
                                <?php
                                if (have_posts()) { ?>

                                        <?php while (have_posts()) {
                                            the_post(); ?>

                                            <div class="item-posts_author">
                                                <?php
                                                    //load file tương ứng với post format
                                                    get_template_part('template-parts/post/content-author', get_post_format());
                                                ?>
                                            </div>
                                        <?php } ?>

                                    <?php require_once(LIBS_DIR . '/paginations/pagination.php');
                                    
                                } else {
                                    get_template_part('template-parts/post/content', 'none');
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="sidebars">
                                <!-- Sidebar -->
                                <?php if (is_active_sidebar('sidebar_blogs')) { ?>

                                    <aside class="lth-sidebars">
                                        <?php dynamic_sidebar('sidebar_blogs'); ?>
                                    </aside>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</main>

<?php get_footer(); ?>
