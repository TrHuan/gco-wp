<div class="project-viewed-wrap">
    <div class="block-title-wrap">
        <h2><?php esc_html_e('Dự án vừa xem', 'houzez'); ?></h2>
    </div>
    <div class="block-content-wrap">
        <div class="elementor-element elementor-widget elementor-widget-houzez_elementor_property-card-v2">
            <div class="elementor-widget-container">
                <div id="properties_module_section" class="property-cards-module property-cards-module-v2 property-cards-module-3-cols">
                    <div id="module_properties" class="listing-view grid-view card-deck grid-view-2-cols">
                        <?php 
                            if (get_post_type( $post->ID ) == 'du-an' ) 
                                update_post_meta( $post->ID, '_last_viewed', current_time('mysql') );
                            ?>
                                <?php
                                $args = array(
                                    'post_type' => 'du-an',
                                    'posts_per_page' => 2,
                                    'meta_key' => '_last_viewed',
                                    'orderby' => 'meta_value',
                                    'order' => 'DESC'
                                );
                                query_posts( $args ); ?>
                                <?php if( have_posts() ) : ?>
                                    <?php while( have_posts() ) : the_post(); ?>
                                    <div class="item-listing-wrap hz-item-gallery-js card">
                                        <div class="item-wrap item-wrap-v2 item-wrap-no-frame h-100">
                                            <div class="d-flex align-items-center h-100">
                                                <div class="item-header">
                                                    <div class="labels-wrap labels-right">
                                                        <?php if (get_field('project_label')) { ?>
                                                            <div class="hz-label">
                                                                <a href="" class="label label-color-61"><?php echo get_field('project_label'); ?></a>
                                                            </div>
                                                        <?php } ?>
                                                        
                                                        <div class="label-status">
                                                            <?php 
                                                                $field = get_field_object('project_status');
                                                                $status = $field['value'];
                                                                if ($status) {
                                                            ?>
                                                                <div class="label"><?php esc_html_e('Đang mở bán', 'houzez') ?></div>
                                                            <?php } else { ?>
                                                                <div class="label no-status"> <?php esc_html_e('Chưa mở bán', 'houzez') ?> </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="listing-image-wrap">
                                                        <div class="listing-thumb">
                                                            <a href="<?php the_permalink() ?>" class="listing-featured-thumb hover-effect">
                                                                <?php echo get_the_post_thumbnail( get_the_id(), 'large', array( 'class' =>'img-fluid wp-post-image', 'alt' => 'Dự án') ); ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="preview_loader"></div>
                                                </div>
                                                <div class="item-body flex-grow-1">
                                                    <h2 class="item-title">
                                                        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                                    </h2> 
                                                    

                                                    <ul class="item-amenities item-amenities-with-icons project-custom">
                                                        <?php if (get_field('project_location')) { ?>
                                                            <div class="custom-property">
                                                                <div class="custom-area">
                                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/location.png" >
                                                                </div>
                                                                <div class="property-items"><?php echo get_field('project_location'); ?></div>
                                                            </div>
                                                            
                                                        <?php } ?>
                                                        
                                                        <?php if (get_field('project_area')) { ?>
                                                            <div class="custom-property area">
                                                                <div class="custom-area">
                                                                    <i class="houzez-icon icon-ruler-triangle mr-1"></i>
                                                                    <span class="area-label"> <?php esc_html_e('Diện tích:', 'houzez') ?> </span>
                                                                </div>
                                                                <div class="property-items"><?php echo get_field('project_area'); ?> </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (get_field('project_type')) { ?>
                                                            <div class="custom-property">
                                                                <div class="custom-area">
                                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/bds.png">
                                                                    <span class="area-label"> <?php esc_html_e('Loại hình:', 'houzez') ?></span>
                                                                </div>
                                                                <div class="property-items"><?php echo get_field('project_type'); ?> </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (get_field('project_price')) { ?>
                                                            <div class="custom-property">
                                                                <div class="custom-area">
                                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                                                    <span class="area-label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                                                </div>
                                                                <div class="property-items price-item"><?php echo get_field('project_price'); ?></div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="custom-property">
                                                                <div class="custom-area">
                                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                                                    <span class="area-label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                                                </div>
                                                                <div class="property-items price-item"><?php esc_html_e('Đang cập nhật', 'houzez') ?></div>
                                                            </div>
                                                        <?php } ?>
                                                    </ul> 

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
