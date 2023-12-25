<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<?php
    $term_bl = get_queried_object();
?>

<main class="main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?> 

    <section class="blog">
        <div class="container">
            <?php if( have_rows('page_blogs','option') ): ?>  
                <?php while( have_rows('page_blogs','option') ): the_row(); ?>
                    <?php 
                    $terms = get_sub_field('categories');
                    if( $terms ): ?>
                        <ul class="nav nav-pills justify-content-lg-center mb-5 beauty-tabs" role="tablist">
                            <?php foreach( $terms as $term ): ?>
                                <li class="nav-item">
                                    <a class="<?php if ($term_bl->term_id == $term->term_id) {echo 'active';} ?>" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                        <?php echo esc_html( $term->name ); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="row blog-row">
                <?php
                    if (have_posts()) {
                        while (have_posts()) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <?php the_post();
                                    get_template_part('template-parts/post/content', '');?>                        
                            </div>
                        <?php } ?>

                        <?php require_once(LIBS_DIR . '/pagination.php');
                    } else {
                        get_template_part('template-parts/content', 'none');
                    }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
