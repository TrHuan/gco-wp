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

                        <div class="row">

                            <div class="col-lg-12">

                                <header class="entry-header">

                                    <?php if ( ! dynamic_sidebar( 'ads-bottom-single' ) ) : ?>

                                    <?php endif;?>

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

                                    <?php related_post();?>

                                    <div class="entry-content">

                                        <?php
                                        while(have_posts()) : the_post();
                                            $post_id = get_the_id();
                                            $array[] = $post_id;
                                            $url = get_post_meta( $post_id, 'ew_oembed', true);
                                            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                                            //setPostViews( get_the_ID() );
                                            //the_content();
                                            //if (is_single() || is_page()) {
                                            ?>
                                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v']; ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
                                            <?php
                                            //}
                                        endwhile;wp_reset_query();

                                        echo ew_comment_fb();?>

                                        <div class="post-related">
                                            <div class="subcat-2">
                                                <span>Video cùng chuyên mục</span>
                                            </div>
                                            <div class="related-posts">
                                                <div class="row">
                                                    <?php
                                                    $custom_taxterms = wp_get_object_terms( $post->ID, 'videos', array('fields' => 'ids') );
                                                    $args = array(
                                                        'post_type' => 'video',
                                                        'post_status' => 'publish',
                                                        'showposts'=> 12,
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'videos',
                                                                'field' => 'id',
                                                                'terms' => $custom_taxterms
                                                            )
                                                        ),
                                                        'post__not_in' => array ($post->ID),
                                                    );
                                                    $related_items = new WP_Query( $args );
                                                    if ($related_items->have_posts()) :
                                                        while ( $related_items->have_posts() ) : $related_items->the_post();
                                                        $url1 = get_post_meta( $post->ID, 'ew_oembed', true);
                                                        parse_str( parse_url( $url1, PHP_URL_QUERY ), $my_array_of_vars1 );
                                                        ?>
                                                        <div class="item-video col-md-3 col-sm-4 col-xs-6">
                                                            <a class="thumbnail thumb-video" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                                <img src="http://img.youtube.com/vi/<?php echo $my_array_of_vars1['v']; ?>/hqdefault.jpg" alt="<?php the_title();?>" class="img-reponsive">
                                                                <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                                                                <!-- <div class="com_share">
                                                                    <i class="fa fa-calendar"></i> <?php echo timeago(); ?>
                                                                </div> -->
                                                            </a>
                                                        </div>
                                                    <?php endwhile;endif;wp_reset_postdata();?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div><!-- .post-content -->

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 hidden-sm hidden-xs">

                        <?php if ( ! dynamic_sidebar( 'sidebar' ) ) :
                        endif;?>

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

                    <div class="fb-comments" data-href="<?php the_permalink();?>" data-width="100%" data-numposts="1" data-colorscheme="light"></div>

                </div>

            </div>

        </div> -->



<?php get_footer();?>