<?php
global $post;
$agent_form = houzez_option('agent_form_sidebar');
$sidebar_meta = houzez_get_sidebar_meta($post->ID);

if( isset( $_GET['agent_form']) && $_GET['agent_form'] == 'yes' ) {
    $agent_form = 1;
}
?>

<aside id="sidebar" class="sidebar-wrap sidebar-project">
    <div class="sidebar-title">
        <h1 class="heading-title"><?php the_title(); ?></h1>
        <?php if (get_field('project_location')) { ?>
            <div class="item-address">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/location.png" >&nbsp; <?php echo get_field('project_location'); ?>
            </div> 
        <?php } ?>

        <?php if (get_field('project_price')) { ?>
            <div class="custom-price">
                <div class="custom-area">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                    <span class="area-label"> <?php esc_html_e('Giá : ', 'houzez') ?> &nbsp; </span>
                </div>
                <div class="price-item">
                    <span class="item-price item-price-text"><?php echo get_field('project_price'); ?></span>
                </div>
            </div>
        <?php } else { ?>
            <div class="custom-price">
                <div class="custom-area">
                    <span class=""> <?php esc_html_e('Giá ', 'houzez') ?> &nbsp; </span>
                </div>
                <div class="price-item">
                    <span class="item-price item-price-text"><?php esc_html_e('Đang cập nhật', 'houzez') ?></span>
                </div>
            </div>
        <?php } ?>

        <div class="sidebar-detail">
            <div class="sidebar-btn-phone">
                <a href="tel:<?php echo houzez_option('hd1_4_phone'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/phone.png"> <?php echo houzez_option('hd1_4_phone'); ?></a>
            </div>
            <!-- <div class="sidebar-document">
                <a href="" target=_blank><?php //esc_html_e('Đánh giá', 'houzez') ?> </a>
            </div> -->
            <div class="sidebar-document">
                <a href="" data-toggle="modal" data-target="#sidebarModal" ><?php esc_html_e('Thông tin liên hệ', 'houzez') ?> </a>
            </div>

            

            <div class="sidebar-document">
                <a download href="<?php the_field('project_document') ?>" target=_blank><?php esc_html_e('Tài liệu dự án', 'houzez') ?> &nbsp;  <i class="fa fa-cloud-download-alt"></i></a>
            </div>
            
        </div>
    </div>

    <div class="related-project">
        <div class="block-title-wrap">
            <h2><?php esc_html_e('Các sản phẩm thuộc dự án', 'houzez') ?></h2>
        </div>
        <div class="tables-alls">
            <table cellspacing="0">
                <tbody>
                    <tr class="project-form-label">
                        <td class="project-thumbnail"><?php esc_html_e('Ảnh', 'houzez') ?></td>
                        <td class="project-area"><?php esc_html_e('Diện tích', 'houzez') ?></td>
                        <td class="project-price"><?php esc_html_e('Giá', 'houzez') ?></td>
                    </tr>
                    
                    <?php if( have_rows('our_product') ): ?>
                    <?php while( have_rows('our_product') ): the_row(); 
                        $image = get_sub_field('image');
                        $area = get_sub_field('area');
                        $price = get_sub_field('price');
                    ?>
                        <tr class="project-form-item">
                            <td class="project-thumbnail">
                                <a href="#project-slider">
                                    <img src="<?php echo $image; ?>" alt="Dự án">
                                </a>                       
                            </td>

                            <td class="project-area">
                                <span class="hz-area"><?php echo $area; ?> </span>                   
                            </td>

                            <td class="project-price">
                                <?php if ($price) { ?>
                                    <span class="item-price"><?php echo $price; ?></span>
                                <?php } else { ?>
                                    <span class="item-price"><?php esc_html_e('Đang cập nhật', 'houzez') ?></span>
                                <?php } ?>                     
                            </td>
                        </tr>
                    <?php endwhile; endif; ?>
                </tbody>
            </table>
        </div>
        
    </div>
    
    <div class="related-project">
        <div class="block-title-wrap">
            <h2><?php esc_html_e('Dự án tương tự', 'houzez') ?></h2>
        </div>
        <div class="tables-alls">
            <?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=3&orderby=rand&post_type=du-an'); ?>
            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <div class="project-same">
                    <div class="project-thumbnail">
                        <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail("large",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                        </a>                       
                    </div>
                    <div class="content">
                        <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                    </div>
                    
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        
    </div>



    
</aside>