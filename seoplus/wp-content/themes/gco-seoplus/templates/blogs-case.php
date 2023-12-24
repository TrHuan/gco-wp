<?php
/**
 * Template Name: Page Case Study
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-posts">
    <div class="main-container">
        <div class="main-content">
			<h2>
				Case Study
			</h2>

            <?php
                $page__blogs = get_field('page__blogs', 'option');
                if( $page__blogs ):
                    $select = $page__blogs['show_blogs'];

                    if ($select) {
                        if( have_rows('page__blogs', 'option') ):
                            while( have_rows('page__blogs', 'option') ): the_row();
                                if( have_rows('blogs', 'option') ):
                                    while( have_rows('blogs', 'option') ): the_row();
                                        get_template_part('templates/blogs/posts-new-case', '');
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    }
                endif;
            ?>

            <article class="lth-posts lth-blogs">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="posts-box">
                                <div class="title-box">
                                    <h3 class="title"><?php echo __('Khám phá thêm'); ?></h3>
                                </div>

                                <div class="content-box">
                                    <?php
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									
										global $global_post_ids;									

                                        $args = [
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => $posts_per_page,
                                            'paged' => $paged,
											'post__not_in' => $global_post_ids,
                                        ];
                                        $wp_query = new WP_Query($args);
                                        if ($wp_query->have_posts()) { ?>
                                            <div class="groups-box">
                                                <?php while ($wp_query->have_posts()) {
                                                    $wp_query-> the_post(); ?>
                                                    <div class="item">
                                                        <?php get_template_part('template-parts/post/content', ''); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <div class="pagination">
                                                <button class="btn-load-more post-load-more">
                                                    <?php echo __('Xem thêm'); ?>                                                
                                                </button>
                                            </div>
                                        <?php } else {
                                            get_template_part('template-parts/post/content', 'none');
                                        }
                                        // reset post data
                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </article>

        </div>     
    </div>
</main>

<?php get_footer(); ?>


<script>
    jQuery(document).ready(function(){
        var offset = 5; // khái báo số lượng bài viết đã hiển thị
        jQuery('.post-load-more').click(function(event) {
            jQuery.ajax({ // Hàm ajax
                type : "post", //Phương thức truyền post hoặc get
                dataType : "html", //Dạng dữ liệu trả về xml, json, script, or html
                url : '<?php echo admin_url('admin-ajax.php');?>', // Nơi xử lý dữ liệu
                data : {
                    action: "postloadmore", //Tên action, dữ liệu gởi lên cho server
                    offset: offset, // gởi số lượng bài viết đã hiển thị cho server
                },
                
                success: function(response) {
                    jQuery('.lth-posts .groups-box').append(response);
                    offset = offset + 6; // tăng bài viết đã hiển thị

                    if (response == '') {
                        jQuery('.post-load-more').hide();
                    }
                }

           });
        });
    });
</script>