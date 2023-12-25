<?php
/**
 * The template for displaying archive project
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package houzez
 */

get_header(); ?>

    <div class="archive-project">
        <div class="container">
            <?php  
                echo '<h1 class="page-title">';
                    single_term_title();
                echo '</h1>';
                the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
            <div class="project-search">
                <?php //require get_theme_file_path( 'template-parts/search/search-project.php' ); ?>
                <?php echo do_shortcode('[INSERT_ELEMENTOR id="18140"]') ?>

                <div class="filter-project">
                    <form action="<?php bloginfo('url'); ?>/" method="GET" role="form">
                        <input type="hidden" name="post_type" value="du-an">
                        <select name="category" id="inputCategory" class="form-group select-cat" >
                            <option value="">Loại dự án</option>
                            <?php $args = array( 
                                'hide_empty' => 0,
                                'taxonomy' => 'muc-du-an',
                                'parent' => ''
                                ); 
                                $cates = get_categories( $args ); 
                                foreach ( $cates as $cate ) {  ?>
                                    <option value="<?php echo $cate->slug; ?>"><?php echo $cate->name; ?></option>
                            <?php } ?>
                        </select>
                        <div class="form-group">
                            <select name="category" class="province">
                                <option value="">Tất cả</option>
                                <?php $args = array( 
                                    'hide_empty' => 0,
                                    'taxonomy' => 'vi-tri-du-an',
                                    'parent' => 0
                                    ); 
                                    $cates = get_categories( $args ); 
                                    foreach ( $cates as $cate ) {  ?>
                                        <option value="<?php echo $cate->slug; ?>"><?php echo $cate->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn"> Tìm kiếm Dự án</button>
                    </form>
                </div>

            </div>
            <div class="page-project project-page-main "  id="response">
                <h2 class="page-title"><?php printf( esc_html__( 'Kết quả tìm kiếm: %s', 'shtheme' ), '<span></span>' ); ?></h2>
                <?php
                    $post_type 	= isset($_GET['post_type']) && $_GET['post_type'] ? $_GET['post_type'] : 'post';
                    // $district	= isset($_GET['tinh-thanh']) && $_GET['tinh-thanh'] ? $_GET['tinh-thanh'] : '';
                    // $location 	= isset($_GET['quan-huyen']) && $_GET['quan-huyen'] ? $_GET['quan-huyen'] : $district;
                    // $key 		= isset($_GET['s']) && $_GET['s'] ? $_GET['s'] : '';
                    $args = array(
                        'showposts'		=> 16,
                        'post_type'		=> $post_type,
                        // 's'				=> $key,
                        // 'khu-vuc'		=> $location
                    );
                ?>
                
                <div class="row">
                    <?php $the_query = new WP_Query( $args ); ?>
                    <?php if( $the_query->have_posts() ): ?>
                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="col-md-6 col-12">
                            <div class="item-header">
                                <div class="listing-image-wrap">
                                    <div class="listing-thumb">
                                        <a href="<?php the_permalink() ?>" class="listing-featured-thumb hover-effect">
                                            <?php echo get_the_post_thumbnail( get_the_id(), 'large', array( 'class' =>'img-fluid wp-post-image', 'alt' => 'Dự án') ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-body flex-grow-1">
                                <h2 class="item-title">
                                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                </h2> 
                                <div class="description">
                                    <?php echo wp_trim_words( get_the_content(), 25, '.' ); ?>
                                </div>
                                <ul class="item-amenities item-amenities-with-icons">
                                    <?php if (get_field('project_location')) { ?>
                                        <li>
                                            <img alt="Vị trí" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/location.png" >
                                            <span class="field"><?php echo get_field('project_location'); ?></span>
                                        </li> 
                                    <?php } ?>
                                    <?php if (get_field('project_area')) { ?>
                                        <li>
                                            <i class="houzez-icon icon-ruler-triangle mr-1"></i>
                                            <span class="label"> <?php esc_html_e('Diện tích :', 'houzez') ?> </span>
                                            <span class="field"><?php echo get_field('project_area'); ?> </span>
                                        </li>
                                    <?php } ?>
                                    <?php if (get_field('project_type')) { ?>
                                        <li>
                                            <img alt="Loại hình" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/bds.png">
                                            <span class="label"> <?php esc_html_e('Loại hình :', 'houzez') ?> &nbsp; </span>
                                            <span class="field"><?php echo get_field('project_type'); ?> </span>
                                        </li>
                                    <?php } ?>
                                    <?php if (get_field('project_price')) { ?>
                                        <li>
                                            <img alt="Giá" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                            <span class="label"> <?php esc_html_e('Giá : ', 'houzez') ?> &nbsp; </span>
                                            <span class="field"><?php echo get_field('project_price'); ?></span>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <img alt="Giá" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                            <span class="area-label"> <?php esc_html_e('Giá : ', 'houzez') ?> &nbsp; </span>
                                            <span class="field"><?php esc_html_e('Đang cập nhật', 'houzez') ?></span>
                                        </li>
                                    <?php } ?>
                                </ul> 

                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
                <?php gcotheme_pagination(); wp_reset_postdata();  ?>
            </div>
        </div>
    </div>

<?php 
get_footer();
