<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-single.php'); ?>

<main class="main-site main-page main-single">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-post-single">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="sidebars-left">
                                <?php if( have_rows('items') ): $i; ?>
                                <aside class="lth-sidebars">
                                    <div class="sb-close">
                                        <i class="icofont-close"></i>
                                    </div>

                                    <div class="sb-menu">
                                        <i class="icofont-navigation-menu"></i>
                                    </div>

                                    <article class="sidebar-box muc-luc-box">
                                        <?php echo do_shortcode('[toc]') ?>
                                    </article>
                                </aside>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="groups-box">
                                <div class="post-single-box">
                                    <div class="content-box">
                                        <?php
                                            if (have_posts()) {
                                                while (have_posts()) {
                                                    the_post();
                                                    get_template_part('template-parts/post/content', get_post_format());
                                                }
                                            } else {
                                                get_template_part('template-parts/content', 'none');
                                            }
                                        ?>
                                    </div> 
									
<!-- Code hiện coupon đếm ngược -->									
<!-- <div class="get-coupon-box">	
	<div class="get-coupon"  onclick="myFunction()" id="foo" ><span id="label"></span><span id="countdowntimer"> </span><span id="button_text">Bấm vào đây để lấy mã giải nén</span></div>
</div>
									
<script type="text/javascript">
	
	function myFunction() {
		
		var timeleft = 5;

		document.getElementById("button_text").innerHTML = "";
		document.getElementById("label").innerHTML = "Time: ";
		
  //added this next 4 lines for the link
  var a = document.createElement('a');
  var link = document.createTextNode("https://www.youtube.com/watch?v=26WpGvLpFzw");
  a.appendChild(link);
  a.href = "https://www.youtube.com/watch?v=26WpGvLpFzw";

  var downloadTimer = setInterval(function() {
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if (timeleft <= 0) {
      clearInterval(downloadTimer);

      document.getElementById("foo").innerHTML = "0868913668";
      //added this part for the delay
      setTimeout(function() {
      //  document.getElementById("foo").innerHTML = "";
		  
        // document.getElementById("foo").appendChild(a);
      }, 5000);
    }
  }, 1000);	
	}
</script> -->
												
                                    <div id="comments"><?php echo do_shortcode('[wpdiscuz_comments]') ?></div>

                                    <!-- <div class="lth-popups-reviews">
                                        <div class="popups-box">          
                                            <div class="popups-content">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <div class="popup-content">
                                                                <div class="popup-box popups-reviews">
                                                                    <div class="title-box">
                                                                        <h3 class="title"><?php //echo __('Bình luận'); ?></h3>
                                                                        <p></p>
                                                                    </div>

                                                                    <div class="content-box">   
                                                                        <?php //echo do_shortcode('[wpdiscuz_comments]') ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>  -->                                      
                                                                    
                                </div>

                                <div class="sidebars">
                                    <!-- Sidebar -->
                                    <?php if (is_active_sidebar('sidebar_blogs')) { ?>

                                        <aside class="lth-sidebars">
                                            <?php dynamic_sidebar('sidebar_blogs'); ?>
                                        </aside>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </article>

            <?php
                $posts = get_field('posts');
                if( $posts ):
            ?>
                <article class="lth-posts lth-related-posts">
                    <div class="container">             
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="posts-box">
                                    <div class="title-box">
                                        <h3 class="title"><?php echo __('Bài viết liên quan'); ?></h3>
                                    </div>
                                        <div class="content-box">
                                            <div class="slick-slider slick-related-posts">
                                                <?php foreach( $posts as $post ): 
                                                    setup_postdata($post); ?>

                                                    <div class="item">
                                                        <?php get_template_part('template-parts/post/content', get_post_format()); ?>
                                                    </div>

                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

            <?php
                $page_single_blog = get_field('page_single_blog', 'option');
                if( $page_single_blog ):
                    $select = $page_single_blog['show_blogs'];

                    if ($select) {
                        if( have_rows('page_single_blog', 'option') ):
                            while( have_rows('page_single_blog', 'option') ): the_row();
                                if( have_rows('blogs', 'option') ):
                                    while( have_rows('blogs', 'option') ): the_row();
                                        get_template_part('templates/blogs/related-posts', '');
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    }
                endif;
            ?>

            <?php
                $page_single_blog = get_field('page_single_blog', 'option');
                if( $page_single_blog ):
                    $select = $page_single_blog['show_products'];

                    if ($select) {
                        if( have_rows('page_single_blog', 'option') ):
                            while( have_rows('page_single_blog', 'option') ): the_row();
                                if( have_rows('products', 'option') ):
                                    while( have_rows('products', 'option') ): the_row();
                                        get_template_part('woocommerce/product-box/related-products', '');
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    }
                endif;
            ?>

        </div>
    </div>
</main>

<?php get_footer(); ?> 