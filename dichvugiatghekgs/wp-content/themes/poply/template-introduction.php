<?php

	/*

	Template Name: Mẫu Giới thiệu

	*/

?>



<?php get_header(); ?>



<?php

    $page_id        = get_the_ID();

    $page_name      = get_the_title();

    $page_content   = wpautop(get_the_content());



    //banner

    $data_page_banner  = array(

        'image_alt'    =>    $page_name

    );



    //field

    $intro_testimonial_content = get_field('intro_testimonial_content');



    $intro_peace_image  = get_field('intro_peace_image');

    $intro_peace_title  = get_field('intro_peace_title');

    $intro_peace_desc   = get_field('intro_peace_desc');



    $intro_service_title    = get_field('intro_service_title');

    $intro_service_desc     = get_field('intro_service_desc');

    $intro_service_content  = get_field('intro_service_content');

?>



<?php get_template_part("resources/views/page-banner"); ?>



<section class="b2 spage" style="background: url(<?php echo asset('images/bg2.png'); ?>) no-repeat center top; background-size: cover;">

    <div class="container">

        <h1 class="f2 bold s30 mb-5 text-center about-tit"><?php echo $page_name; ?></h1>

        <div class="row">

            <div class="col-lg-12">

                <div class="about-slider">



                    <?php if(!empty( $intro_testimonial_content )) { ?>

                    <?php

                        foreach ($intro_testimonial_content as $foreach_kq) {



                        $post_image     = $foreach_kq["image"];

                        $post_job       = $foreach_kq["job"];

                        $post_comment   = $foreach_kq["comment"];

                    ?>

                        <article class="about-item">

                            <div class="d-flex">

                                <figure class="about-img"><img src="<?php echo $post_image; ?>" alt=""></figure>

                                <figcaption class="about-content">

                                    <div class="about-content-wrap">

                                        <p><?php echo $post_comment; ?></p>

                                    </div>

                                    <div class="about-sign f2 bold text-right s14"><?php echo $post_job; ?></div>

                                </figcaption>

                            </div>

                        </article>

                    <?php } ?>

                    <?php } ?>



                </div>

                <div class="apage-wrap wp-editor-fix">

                    <?php the_content(); ?>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="about-pain">

    <div class="container-flush">

        <div class="row no-gutters">

            <div class="col-sm-6 b4 d-flex align-items-center justify-content-center">

                <div class="py-3 w-lg-50 m-auto text-white text-center">

                    <h2 class="f2 bold s24 pb-4 about-pain-tit"><?php echo $intro_peace_title; ?></h2>

                    <p><?php echo $intro_peace_desc; ?></p>

                </div>

            </div>

            <div class="col-sm-6">

                <div class="text-center">

                    <img src="<?php echo $intro_peace_image; ?>" alt="">

                </div>

            </div>

        </div>

    </div>

</section>



<section class="about-ser">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <div class="row as-row">



                    <?php if(!empty( $intro_service_content )) { ?>

                    <?php

                        foreach ($intro_service_content as $foreach_kq) {



                        $post_image = $foreach_kq["image"];

                        $post_title = $foreach_kq["title"];

                        $post_desc  = $foreach_kq["desc"];

                    ?>

                        <div class="col-lg-4 col-md-6 col-sm-6">

                            <section class="about-ser-item">

                                <img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>">

                                <div class="h3 bold s24 f2 py-3 about-ser-tit"><?php echo $post_title; ?></div>

                                <div class="about-ser-content">

                                    <p><?php echo $post_desc; ?></p>

                                </div>

                            </section>

                        </div>

                    <?php } ?>

                    <?php } ?>

                    

                </div>

            </div>

            <div class="col-md-3">

                <div class="text-md-right">

                    <h2 class="t1 f2 s30 bold pb-4 about-ser-r"><?php echo $intro_service_title; ?></h2>

                    <blockquote class="italic">

                        <p><?php echo $intro_service_desc; ?></p>

                    </blockquote>

                </div>

            </div>

        </div>

    </div>

</section>



<?php get_footer(); ?>