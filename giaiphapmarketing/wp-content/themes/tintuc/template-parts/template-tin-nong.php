<?php /*Template Name: Trang Tin HOT*/?>
<?php get_header();?>

    <div class="site-main">
        <header class="entry-header">
            <div class="entry-meta">
                <h1 class="cat-links">
                    <?php the_title();?>
                </h1>
            </div>
        </header><!-- .entry-header -->

        <?php get_template_part('template-parts/tempalte-post-update');?>

        <section class="category-area">
            <div class="site-category" role="main">
                <div class="list_category list">
                    <ul>
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 10, 'paged'=>$paged ) );
                        while($loop->have_posts()) : $loop->the_post();?>
                        <li <?php post_class();?>>
                            <?php post_format(get_the_id());?>
                            <h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
                            <?php post_info();?>
                            <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                <?php the_post_thumbnail('thumb_180x120', array('alt'=>get_the_title()));?>
                            </a>
                            <div class="info-post"><?php eweb_truncate_description('500');?></div>
                            <?php related_post();?>
                        </li>
                        <?php endwhile; wp_reset_query();?>
                    </ul>
                    <nav class="navigation paging-navigation" role="navigation">
                        <?php wp_pagenavi( array( 'query' => $loop ) );?>
                    </nav><!-- .navigation -->
                </div>
                <?php get_sidebar();?>
                <!-- #secondary -->
            </div><!-- #content -->
        </section><!-- #primary -->
        <div class="clear"></div>
        <?php if ( ! dynamic_sidebar( 'bottom-cate' ) ) : ?>
        <?php endif;?>
        <div class="clear"></div>
    </div><!-- #main -->

<?php get_footer();?>