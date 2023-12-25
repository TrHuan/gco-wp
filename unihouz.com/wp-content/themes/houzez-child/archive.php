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
                <?php //echo do_shortcode('[INSERT_ELEMENTOR id="18140"]') ?>

                <div class="project-page-filter projectSelect ">
                
                    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                        <div class="filter-inpt">
                            <p class="filter-title">Tìm kiếm</p>
                            <select name="statusfilter" class="selectpicker ">
                                <option value="" selected>Loại dự án</option>
                                <?php
                                $field = get_field_object('field_61a59a60b9c9f');

                                if ($field['choices']) : ?>
                                    <?php foreach ($field['choices'] as $value => $label) : ?>
                                        <option value="<?php echo $label; ?>" class="list-select"><?php echo $label; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="filter-inpt">
                            <p class="filter-title">Vị trí</p>
                            <select name="projectfilter" class="selectpicker ">
                                <option value="" selected>Tất cả</option>
                                <?php
                                $field = get_field_object('field_61a577ed32a33');

                                if ($field['choices']) : ?>
                                    <?php foreach ($field['choices'] as $value => $label) : ?>
                                        <option value="<?php echo $label; ?>" class="list-select"><?php echo $label; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="filter-inpt">
                            <p class="filter-title">Diện tích</p>
                            <select name="areafilter" class="selectpicker ">
                                <option value="" selected>Diện tích tối đa</option>
                                <?php
                                $field = get_field_object('field_61a59cd5b9ca2');

                                if ($field['choices']) : ?>
                                    <?php foreach ($field['choices'] as $value => $label) : ?>
                                        <option value="<?php echo $label; ?>" class="list-select"><?php echo $label; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="filter-inpt">
                            <p class="filter-title">Ngân sách</p>            
                            <select name="pricefilter" class="selectpicker ">
                                <option value="" selected>Khoảng giá</option>
                                <?php
                                $field = get_field_object('field_61a59c23b9ca1');

                                if ($field['choices']) : ?>
                                    <?php foreach ($field['choices'] as $value => $label) : ?>
                                        <option value="<?php echo $label; ?>" class="list-select"><?php echo $label; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        

                        <button type="button" class="submit__form">Tìm kiếm Dự án</button>
                        <input type="hidden" name="action" value="myfilter">
                    </form>

                    <!-- <button class="call-ajax">Tìm kiếm</button> -->

                    <!-- <button class="clear-select" onclick="myFunction()">XÓA</button> -->

                </div>

            </div>
            <div class="page-project project-page-main "  id="response">
                <div class="row">
                    <?php
                        $archive_object = get_queried_object();
                        $archive_id 	= $archive_object->term_id;

                        $args = array(
                            'post_status' => 'publish',
                            'post_type' => 'du-an',
                            'tax_query' => array(
                                array(
                                    'taxonomy'  =>  $archive_object->taxonomy,
                                    'field' => 'id',
                                    'terms' 	=> $archive_id,
                                )
                            )
                        );
                        // var_dump($args);
                        $getposts = new WP_Query($args);
                        global $wp_query; $wp_query->in_the_loop = true;
                        while ( $getposts->have_posts() ): $getposts->the_post();
                    ?>
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
                                            <span class="label"> <?php esc_html_e('Diện tích:', 'houzez') ?> </span>
                                            <span class="field"><?php echo get_field('project_area'); ?> </span>
                                        </li>
                                    <?php } ?>
                                    <?php if (get_field('project_type')) { ?>
                                        <li>
                                            <img alt="Loại hình" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/bds.png">
                                            <span class="label"> <?php esc_html_e('Loại hình:', 'houzez') ?></span>
                                            <span class="field"><?php echo get_field('project_type'); ?> </span>
                                        </li>
                                    <?php } ?>
                                    <?php if (get_field('project_price')) { ?>
                                        <li>
                                            <img alt="Giá" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                            <span class="label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                            <span class="field"><?php echo get_field('project_price'); ?></span>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <img alt="Giá" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                            <span class="area-label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                            <span class="field"><?php esc_html_e('Đang cập nhật', 'houzez') ?></span>
                                        </li>
                                    <?php } ?>
                                </ul> 

                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php gcotheme_pagination(); wp_reset_postdata();  ?>
            </div>
        </div>
    </div>

<?php 
get_footer();
