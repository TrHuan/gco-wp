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
                    <div class="col-md-9 col-xs-12">
                        <?php if ( ! dynamic_sidebar( 'ads-top-cate' ) ) : ?>
                        <?php endif;?>
                        <header class="entry-header">
                            <div class="entry-meta">
                                <h1 class="cat-links">
                                    <?php single_cat_title();?>
                                </h1>
                            </div>
                        </header><!-- .entry-header -->
                        <section class="category-area">
                            <div class="site-category" role="main">
                                <div class="list">
                                    <ul class="row">
                                        <?php
                                        while(have_posts()) : the_post();
                                            $url1 = get_post_meta( $post->ID, 'ew_oembed', true);
                                            parse_str( parse_url( $url1, PHP_URL_QUERY ), $my_array_of_vars1 ); ?>
                                            <li class="item-video col-md-3 col-sm-4 col-xs-6 ">
                                                <a class="thumbnail thumb-video" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                    <img src="http://img.youtube.com/vi/<?php echo $my_array_of_vars1['v']; ?>/hqdefault.jpg" alt="<?php the_title();?>" class="img-reponsive">
                                                    <span class="icon-play-video"></span>
                                                </a>
                                                <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                                                <!-- <div class="com_share">
                                                    <i class="fa fa-calendar"></i> <?php echo timeago(); ?>
                                                </div> -->
                                            </li>
                                        <?php endwhile; wp_reset_query();?>
                                    </ul>
                                    <nav class="navigation paging-navigation" role="navigation">
                                        <?php wp_pagenavi();?>
                                    </nav><!-- .navigation -->
                                </div>
                                <!-- #secondary -->
                            </div><!-- #content -->
                        </section><!-- #primary -->
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <?php if ( ! dynamic_sidebar( 'sidebar' ) ) :
                        endif;?>
                    </div>
                </div>
            </div>
        </section><!-- .main -->
<?php get_footer();?>