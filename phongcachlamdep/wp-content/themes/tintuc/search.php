<?php get_header();?>
    <div id="main">
        <?php get_template_part('template-parts/tempalte-post-update');?>
        <section class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumb">
                            <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-xs-12">
                        <?php if ( ! dynamic_sidebar( 'ads-top-cate' ) ) : ?>
                        <?php endif;?>
                        <header class="entry-header">
                            <div class="entry-meta">
                                <h1 class="cat-links">
                                    <?php printf( 'Từ khóa tìm kiếm: %s', get_search_query() );?>
                                </h1>
                            </div>
                        </header><!-- .entry-header -->
                        <div id="primary" class="content-area">
                            <div class="flw site-main">
                                <?php
                                while(have_posts()) : the_post();
                                    $class = array('flw','mg-bottom10','thumb-left');
                                    ?>
                                    <article <?php post_class($class);?>>
                                        <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                            <?php the_post_thumbnail('thumb_180x130', array('alt'=>get_the_title()));?>
                                        </a>
                                        <a class="bold font16" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                                        <div class="post-excerpt"><?php eweb_truncate_description('300');?></div>
                                        <?php related_post();?>
                                    </article>
                                <?php endwhile; wp_reset_query();?>
                                <nav class="navigation paging-navigation" role="navigation">
                                    <?php wp_pagenavi();?>
                                </nav><!-- .navigation -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </section><!-- .main -->

<?php get_footer();?>