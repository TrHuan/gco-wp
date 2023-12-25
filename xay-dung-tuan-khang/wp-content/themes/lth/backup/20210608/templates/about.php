<?php
/**
 * Template Name: Page About
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-home">
    <?php //if (have_posts()) { ?>
        <?php //while (have_posts()) { the_post(); ?>            

            <!--Start about interrio area--> 
            <section class="about-interrio-area">
                <div class="container">
                    <div class="sec-title">
                        <h2><?php the_field('tieu_de_trang', 'option'); ?></h2>
                        <span class="decor"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-holder">
                                <?php if( have_rows('gioi_thieu', 'option') ): ?>
                                    <?php while( have_rows('gioi_thieu', 'option') ): the_row(); ?>
                                        <h3><?php the_sub_field('tieu_de', 'option'); ?></h3>
                                        <?php the_sub_field('mo_ta', 'option'); ?>
                                        <div class="signature-and-name">
                                            <div class="signature">
                                                <img src="<?php the_sub_field('chu_ky', 'option'); ?>">
                                            </div>
                                            <div class="name">
                                                <h4><?php the_sub_field('ten', 'option'); ?></h4>
                                                <p><?php the_sub_field('chuc_vu', 'option'); ?></p>
                                            </div>
                                        </div> 

                                    <?php endwhile; ?>
                                <?php endif; ?>                                  
                            </div>
                        </div>
                        <!--Start single item-->
                        <div class="col-md-4">
                            <?php if( have_rows('nhiem_vu', 'option') ): ?>
                                <?php while( have_rows('nhiem_vu', 'option') ): the_row(); ?>
                                    <div class="single-item">
                                        <div class="img-holder">
                                            <img src="<?php the_sub_field('hinh_anh', 'option'); ?>" alt="Awesome Image">
                                            <div class="overlay">
                                                <div class="box">
                                                    <div class="content">
                                                        <a href="javascript:0"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-box">
                                            <h3><?php the_sub_field('tieu_de', 'option'); ?></h3>
                                            <?php the_sub_field('mo_ta', 'option'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <!--End single item-->
                        <!--Start single item-->
                        <div class="col-md-4">
                            <?php if( have_rows('tam_nhin', 'option') ): ?>
                                <?php while( have_rows('tam_nhin', 'option') ): the_row(); ?>
                                    <div class="single-item pdtop">
                                        <div class="img-holder">
                                            <img src="<?php the_sub_field('hinh_anh', 'option'); ?>" alt="Awesome Image">
                                            <div class="overlay">
                                                <div class="box">
                                                    <div class="content">
                                                        <a href="javascript:0"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-box">
                                            <h3><?php the_sub_field('tieu_de', 'option'); ?></h3>
                                            <?php the_sub_field('mo_ta', 'option'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <!--End single item-->
                    </div>
                </div>    
            </section>           
            <!--End about interrio area--> 

            <!--Start choose area--> 
            <?php $tai_sao_chon = get_field('tai_sao_chon', 'option'); ?>

            <?php if( $tai_sao_chon ): ?>
                <section class="choose-area" style="background-image:url(<?php echo $tai_sao_chon['hinh_nen']; ?>);">
                    <div class="container">
                        <div class="sec-title text-center">
                            <h2><?php echo $tai_sao_chon['tieu_de']; ?></h2>
                            <span class="border"></span>
                        </div>
                        <div class="row">
                            <?php if( have_rows('tai_sao_chon', 'option') ): ?>
                                <?php while( have_rows('tai_sao_chon', 'option') ): the_row(); ?>

                                    <?php if( have_rows('item', 'option') ): ?>
                                        <?php while( have_rows('item', 'option') ): the_row(); ?>

                                            <!--Start single item-->
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="single-item">
                                                    <div class="icon-holder">
                                                        <?php if (get_sub_field('icon_image', 'option')) { ?>
                                                            <img src="<?php the_sub_field('icon_image', 'option'); ?>" alt="Awesome Image">
                                                        <?php } else { ?>
                                                            <span class="<?php the_sub_field('icon_class', 'option'); ?>"></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="text-holder">
                                                        <h3><?php the_sub_field('tieu_de', 'option'); ?></h3>
                                                        <p><?php the_sub_field('mo_ta', 'option'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single item-->

                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                <?php endwhile; ?>
                            <?php endif; ?>                         
                        </div>
                    </div>    
                </section>
            <?php endif; ?>
            <!--End choose area-->

            <!--Start our team area--> 
            <section class="team-area">
                <div class="container">
                    <?php if( have_rows('thanh_vien', 'option') ): ?>
                        <?php while( have_rows('thanh_vien', 'option') ): the_row(); ?>
                            <div class="sec-title">
                                <h2><?php the_sub_field('tieu_de'); ?></h2>
                                <span class="decor"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="team-members slick-team slick-slider">
                                        <?php if( have_rows('item', 'option') ): ?>
                                            <?php while( have_rows('item', 'option') ): the_row(); ?>
                                                <!--Start single team member-->
                                                <div class="item">
                                                    <div class="single-team-member">
                                                        <div class="img-holder">
                                                            <img src="<?php the_sub_field('avata'); ?>" alt="Awesome Image">
                                                            <div class="overlay">
                                                                <div class="box">
                                                                    <div class="content">
                                                                        <ul>
                                                                            <li><a href="<?php the_sub_field('facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                                            <li><a href="<?php the_sub_field('twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                                            <li><a href="<?php the_sub_field('google'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                                            <li><a href="<?php the_sub_field('skype'); ?>"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-holder text-center">
                                                            <h3><?php the_sub_field('ho_ten'); ?></h3>
                                                            <p><?php the_sub_field('chuc_vu'); ?></p>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <!--End single team member-->
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!--Start bottom text-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bottom-text text-center">
                                        <h3><?php the_sub_field('slogan'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <!--End bottom text-->
                        <?php endwhile; ?>
                    <?php endif; ?>  
                </div>
            </section>
            <!--End our team area--> 

            <!--Start slogan area-->
            <?php $slogan = get_field('slogan_about', 'option'); ?>

            <?php if( $slogan ): ?>
                <section class="slogan-area bg-clr-1" style="background-image:url(<?php echo $slogan['hinh_nen']; ?>);">
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

                <?php get_template_part('templates/addons/slogan', ''); ?>
            <?php endif; ?>
            <!--End slogan area-->

            <!--Start fact counter area-->
            <div class="fact-counter-area">
                <div class="container">
                    <?php if( have_rows('su_that_thu_vi', 'option') ): ?>
                        <?php while( have_rows('su_that_thu_vi', 'option') ): the_row(); ?>
                            <div class="sec-title">
                                <h2><?php the_sub_field('tieu_de'); ?></h2>
                                <span class="decor"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="fact-counter-carousel slick-fact-counter slick-slider">
                                        <?php if( have_rows('item_content', 'option') ): ?>
                                            <?php while( have_rows('item_content', 'option') ): the_row(); ?>
                                            <div class="single-item">
                                                <?php the_sub_field('content'); ?>
                                            </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>    
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <?php if( have_rows('item', 'option') ): $i; ?>
                                            <?php while( have_rows('item', 'option') ): the_row(); $i++; ?>
                                                <!--Start single fact counter-->
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="single-fact-counter text-center">
                                                        <div class="box">
                                                            <h2><span id="timer-<?php echo $i; ?>" class="timer" data-from="1" data-to="<?php the_sub_field('so_lieu'); ?>" data-speed="<?php the_sub_field('so_lieu'); ?>" data-refresh-interval="50"><?php the_sub_field('so_lieu'); ?></span><i class="fa fa-plus" aria-hidden="true"></i></h2>
                                                            <div class="icon-holder">
                                                                <?php if (get_sub_field('icon_image')) { ?>
                                                                    <img src="<?php the_sub_field('icon_image'); ?>" alt="Awesome Image">
                                                                <?php } else { ?>
                                                                    <span class="<?php the_sub_field('icon_class'); ?>"></span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="title">
                                                            <h3><?php the_sub_field('tieu_de'); ?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End single fact counter-->
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>                
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!--End fact counter area-->  

        <?php //} ?>
    <?php //} ?>
</main>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>

<?php get_footer(); ?>
