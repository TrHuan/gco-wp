<?php
/*
Template Name: Trang đăng nhập
*/

get_header();?>

	<div class="site-main">
        <header class="entry-header">
            <div class="entry-meta">
                <h1 class="cat-links">
                    Đăng nhập
                </h1>
            </div>
        </header><!-- .entry-header -->

        <?php get_template_part('template-parts/tempalte-post-update');?>

        <div id="primary" >
            <div id="content">
                <div class="entry-content">
                	<?php echo do_shortcode('[dm_login_form]'); ?>
                </div>
            </div><!-- #content -->
        </div>
        <div class="clear"></div>
        <?php if ( ! dynamic_sidebar( 'bottom-cate' ) ) : ?>
        <?php endif;?>
        <div class="clear"></div>
    </div><!-- #main -->

<?php get_footer();?>