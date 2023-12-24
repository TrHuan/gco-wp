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
           <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4991629572335355"
     crossorigin="anonymous"></script>
<!-- Test-ngang -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4991629572335355"
     data-ad-slot="5855519658"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

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
                                   <!-- <a class="btn_google" rel="nofollow" href="javascript:;" title="Chia sẻ bài viết lên google+"><i class="fa fa-google-plus-square"></i></a>-->
                                </div>
                            </div>
                            <?php related_post();?>
                            <div class="entry-content">

                                <?php
                                while(have_posts()) : the_post();
                                //the_content();
                                    //if (is_single() || is_page()) {
                                        if (is_active_sidebar('ads-middle-single')){
                                            $tmpContent = get_the_content();
                                            eweb_do_between_entry($tmpContent);
                                        }
                                        the_content();

                                    //}
                                endwhile;wp_reset_query();
                                ?>
                                <?php if ( ! dynamic_sidebar( 'ads-bottom-single' ) ) : ?>
                                <?php endif;?>

                                <?php echo ew_comment_fb();?>
                                <div class="entry-meta">
                                    <span class="tag"><i class="fa fa-tags"></i> Từ khóa:</span>
                                    <span class="tag-links">
                                        <?php the_tags( '', '', '' );?>
                                    </span>
                                    <?php //ew_plugin_facebook();?>
                                </div>
                            </div>
                            <div class="post-related">
                                <div class="subcat-2">
                                    <span>Bài viết cùng chuyên mục</span>
                                </div>
                                <div class="related-posts">
                                    <div class="row">
                                        <?php
                                        $custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );
                                        $args = array(
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'showposts'=> 12,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'category',
                                                    'field' => 'id',
                                                    'terms' => $custom_taxterms
                                                )
                                            ),
                                            'post__not_in' => array ($post->ID),
                                        );
                                        $related_items = new WP_Query( $args );
                                        if ($related_items->have_posts()) :
                                        while ( $related_items->have_posts() ) : $related_items->the_post();
                                        ?>
                                        <div class="col-sm-3 col-xs-4 related-item">
                                            <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                <?php the_post_thumbnail('thumb_180x130', array('alt'=>get_the_title()));?>
                                            </a>
                                            <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                <?php the_title();?>
                                            </a>
                                        </div>
                                        <?php endwhile;endif;wp_reset_postdata();?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .post-content -->
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </section><!-- .main -->


        <!-- <div class="box_comment_fixed">
            <div class="box_comment_close" onclick="closeBoxComment();">x</div>
            <div class="box_comment_header" onclick="showFullBoxComment();">
                <span>
                    Bình luận Facebook
                </span>
                <i class="icon"></i>
            </div>
            <div class="box_comment_list">
                <div class="comment_form">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1498814190377627";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-comments" data-href="<?php //the_permalink();?>" data-width="100%" data-numposts="1" data-colorscheme="light"></div>
                </div>
            </div>
        </div> -->






<?php get_footer();?>
