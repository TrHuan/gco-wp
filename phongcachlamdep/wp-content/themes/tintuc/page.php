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
                        <header class="entry-header">
                            <h1 class="cat-links">
                                <?php the_title();?>
                            </h1>
                            <?php if ( ! dynamic_sidebar( 'ads-top-single' ) ) : ?>
                            <?php endif;?>
                        </header><!-- .entry-header -->
                        <div class="post-content">
                            <div id="date_share" class="shareheard">
                                <div class="date">
                                    <i class="fa fa-calendar"></i>
                                    <?php printf( '%s', '<span>' . get_the_date('D, m / Y') . '</span>' );?>
                                    <?php echo get_the_time(); ?>
                                    <span class="drash_share">|</span>
                                    <i class="fa fa-user"></i> <?php $author_id = $post->post_author; ?><a class="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'user_nicename' , $author_id ); ?></a>
                                </div>
                                <div id="block_share">
                                    <a class="btn_facebook" rel="nofollow" href="javascript:;" title="Chia sẻ bài viết lên facebook"><i class="fa fa-facebook-official"></i></a>
                                    <a class="btn_twitter" rel="nofollow" href="javascript:;" id="twitter" title="Chia sẻ bài viết lên twitter"><i class="fa fa-twitter-square"></i></a>
                                    <a class="btn_google" rel="nofollow" href="javascript:;" title="Chia sẻ bài viết lên google+"><i class="fa fa-google-plus-square"></i></a>
                                </div>
                            </div>
                            <div class="entry-content">
                                <?php
                                while(have_posts()) : the_post();
                                    the_content();
                                endwhile;
                                
                                if ( ! dynamic_sidebar( 'ads-bottom-single' ) ) :
                                endif;?>
                            </div>
                        </div><!-- .post-content -->
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </section><!-- .main -->

<?php get_footer();?>