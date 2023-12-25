<?php
/**
 * Template Name: Page Home
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-home">
    <?php //if (have_posts()) { ?>
        <?php //while (have_posts()) { the_post(); ?>            

            <!--Start rev slider wrapper-->     
            <section class="rev_slider_wrapper">
                <div id="slider1" class="rev_slider"  data-version="5.0">
                    <ul>

                        <?php if( have_rows('slidershow', 'option') ): ?>
                            <?php while( have_rows('slidershow', 'option') ): the_row(); ?>

                                <?php get_template_part('templates/addons/slidershow', ''); ?>

                            <?php endwhile; ?>
                        <?php endif; ?>
            
                    </ul>
                </div>
            </section>
            <!--End rev slider wrapper--> 

            <!--Start welcome area-->
            <section class="welcome-area">
                <div class="container clearfix">
                    <?php if( have_rows('welcome', 'option') ): ?>
                        <?php while( have_rows('welcome', 'option') ): the_row(); ?>

                            <?php get_template_part('templates/addons/welcome', ''); ?>
                            
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </section>
            <!--End welcome area-->

            <!--Start service area-->
            <?php $dich_vu = get_field('dich_vu', 'option'); ?>

            <?php if( $dich_vu ): ?>
                <section class="service-area" style="background-image:url(<?php echo $dich_vu['hinh_nen']; ?>);">
                    <div class="container">
                        <div class="sec-title">
                            <h2><?php echo $dich_vu['tieu_de']; ?></h2>
                            <span class="decor"></span>
                        </div>
                        <div class="row">

                            <?php
                                $args = [
                                    'post_type' => 'thi-cong',
                                    'post_status' => 'publish',
                                    // 'order_by' => 'rand',
                                    'order' => 'DESC',
                                    'posts_per_page' => 6,
                                ];
                                $serv = new WP_Query($args);
                                if ($serv->have_posts()) { ?>
                                    <?php while ($serv->have_posts()) {
                                        $serv-> the_post(); ?>
                                        
                                        <?php get_template_part('template-parts/project/content', ''); ?>  
                                    <?php } ?>                                  
                                <?php } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata();
                            ?>
                            
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!--End service area-->

            <!--Start latest project area-->
            <section class="latest-project-area">
                <div class="container-fluid">

                    <?php if( have_rows('du_an', 'option') ): ?>
                        <?php while( have_rows('du_an', 'option') ): the_row(); ?>
                            <?php $tieu_de = get_sub_field('tieu_de'); ?>

                            <div class="container">
                                <div class="sec-title pull-left">
                                    <h2><?php echo $tieu_de; ?></h2>
                                    <span class="decor"></span>
                                </div>   
                                <ul class="project-filter post-filter pull-right">
                                    <li class="active" data-filter=".filter-item"><span>View All</span></li>

                                    <?php if( have_rows('danh_muc_du_an') ): ?>
                                        <?php while( have_rows('danh_muc_du_an') ): the_row(); ?>
                                            <?php $term = get_sub_field('danh_muc');
                                                if( $term ): ?>

                                                <li data-filter=".<?php echo $term->slug; ?>"><span><?php echo $term->name; ?> (<?php echo $term->count; ?>)</span></li>

                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="row project-content masonary-layout filter-layout">
                        <?php 
                            $cates = [];

                            if( have_rows('du_an', 'option') ):
                                while( have_rows('du_an', 'option') ): the_row();
                                    if( have_rows('danh_muc_du_an') ):
                                        while( have_rows('danh_muc_du_an') ): the_row();
                                            $term = get_sub_field('danh_muc');
                                                if( $term ):

                                                $cates[$term->term_id] = $term->term_id;

                                            endif;
                                        endwhile;
                                    endif;
                                endwhile;
                            endif;

                            $args = [
                                'post_type' => 'thiet-ke',
                                'post_status' => 'publish',
                                // 'order_by' => 'rand',
                                'order' => 'DESC',
                                'posts_per_page' => 8,
                                // 'thiet-ke-cat' => $cates,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'thiet-ke-cat',
                                        'field'    => 'term_id',
                                        'terms'    => $cates,
                                    ),
                                ),
                            ];
                            $serv = new WP_Query($args);
                            if ($serv->have_posts()) { ?>
                                <?php while ($serv->have_posts()) {
                                    $serv-> the_post(); ?>
                                    
                                    <?php get_template_part('template-parts/service/content', ''); ?>  
                                <?php } ?>                                  
                            <?php } else {
                                get_template_part('template-parts/content', 'none');
                            }
                            // reset post data
                            wp_reset_postdata();
                        ?>
                    </div>    

                    <div class="popup-project">
                        <div class="content">
                            <img src="#" alt="Image">
                            <a class="pp_close" href="#"></a>
                        </div>
                    </div> 
                </div>
            </section>
            <!--End latest project area-->

            <!--Start slogan area-->
            <?php $slogan = get_field('slogan', 'option'); ?>

            <?php if( $slogan ): ?>
                <section class="slogan-area" style="background-image:url(<?php echo $slogan['hinh_nen']; ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slogan">
                                    <h2><?php echo $slogan['content']; ?></h2>
                                </div>
                            </div>
                        </div>     
                    </div>
                </section>
            <?php endif; ?>
            <!--End slogan area-->

            <!--Start working area-->
            <section class="working-area">
                <div class="container">

                    <?php if( have_rows('qua_trinh_lam_viec', 'option') ): ?>
                        <?php while( have_rows('qua_trinh_lam_viec', 'option') ): the_row(); ?>

                            <?php get_template_part('templates/addons/qua_trinh_lam_viec', ''); ?>
                            
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </section>
            <!--End working area-->

            <!--Start testimonial area-->
            <?php $danh_gia_cua_khach = get_field('danh_gia_cua_khach', 'option'); ?>

            <?php if( $danh_gia_cua_khach ): ?>
                <section class="testimonial-area" style="background-image:url(<?php echo $danh_gia_cua_khach['hinh_nen']; ?>);">
                    <div class="container">
                        <div class="sec-title text-center">
                            <h2><?php echo $danh_gia_cua_khach['tieu_de']; ?></h2>
                            <span class="border"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="testimonials-carousel slick-testimonials slick-slider">
                                    <?php
                                        $args = [
                                            'post_type' => 'testimonial',
                                            'post_status' => 'publish',
                                            // 'order_by' => 'rand',
                                            'order' => 'DESC',
                                            'posts_per_page' => 3,
                                        ];
                                        $serv = new WP_Query($args);
                                        if ($serv->have_posts()) { ?>
                                            <?php while ($serv->have_posts()) {
                                                $serv-> the_post(); ?>
                                                
                                                <?php get_template_part('template-parts/testimonial/content', ''); ?>  
                                            <?php } ?>                                  
                                        <?php } else {
                                            get_template_part('template-parts/content', 'none');
                                        }
                                        // reset post data
                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!--End testimonial area-->

            <!--Start latest blog area-->
            <section class="latest-blog-area">
                <div class="container">
                    <?php if( have_rows('tin_tuc', 'option') ): ?>
                        <?php while( have_rows('tin_tuc', 'option') ): the_row(); ?>
                            <?php 
                                $tieu_de = get_sub_field('tieu_de'); 
                                $button = get_sub_field('button');
                                $button_url = $button['url'];
                                $button_title = $button['title'];
                                $button_target = $button['target'] ? $button['target'] : '_self';
                            ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sec-title pull-left">
                                        <h2><?php echo $tieu_de; ?></h2>
                                        <span class="decor"></span>
                                    </div>
                                    <div class="more-blog-button pull-right">
                                        <a class="thm-btn bg-cl-1" href="<?php echo $button_url; ?>" target="<?php echo $button_target; ?>"><?php echo $button_title; ?></a> 
                                    </div>
                                </div>
                            </div>   
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <div class="row">
                        <?php
                            $args = [
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                // 'order_by' => 'rand',
                                'order' => 'DESC',
                                'posts_per_page' => 3,
                            ];
                            $serv = new WP_Query($args);
                            if ($serv->have_posts()) { ?>
                                <?php while ($serv->have_posts()) {
                                    $serv-> the_post(); ?>
                                    
                                    <?php get_template_part('template-parts/post/content', ''); ?>  
                                <?php } ?>                                  
                            <?php } else {
                                get_template_part('template-parts/content', 'none');
                            }
                            // reset post data
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
            <!--End latest blog area-->

            <!--Start Brand area-->  
            <section class="brand-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="brand slick-brand slick-slider">
                                <?php if( have_rows('doi_tac', 'option') ): ?>
                                    <?php while( have_rows('doi_tac', 'option') ): the_row(); ?>
                                        <?php
                                            $img = get_sub_field('logo_doi_tac');
                                            $url = get_sub_field('url_web_doi_tac');
                                            if ($url) {
                                                $link_url = $url['url'];
                                                $url_title = $url['title'];
                                                $url_target = $url['target'] ? $url['target'] : '_self';
                                            }
                                        ?>

                                        <!--Start single item-->
                                        <div class="single-item">
                                            <a href="<?php echo $link_url; ?>" target="<?php echo $url_target; ?>" title="<?php echo $url_title; ?>"><img src="<?php echo $img; ?>" alt="Awesome Brand Image" width="205" height="85"></a>
                                        </div>
                                        <!--End single item-->
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Brand area-->   

        <?php //} ?>
    <?php //} ?>
</main>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>

<?php get_footer(); ?>
