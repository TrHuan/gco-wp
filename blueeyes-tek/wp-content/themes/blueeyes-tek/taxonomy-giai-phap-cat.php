<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page main-giai-phap">
    <section class="lth-giai-phap">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_posts blog-content-list giai-phap-list">                        
                        <div class="module_title">
                            <h2 class="title">
                                <?php
                                    if (is_category()) {
                                        single_cat_title();  //Category
                                    } elseif (is_author()) {
                                        the_post();
                                        echo ('Archives by author: ' . get_the_author());  //Tác giả
                                        rewind_posts();
                                    } else {
                                        //echo _('Archives');

                                        $term = get_queried_object()->term_id;
                                        echo $term_name = get_term( $term )->name;
                                    }
                                ?>
                            </h2>
                        </div>

                        <div class="module_content">
                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $term = get_queried_object()->term_id;

                                $args = [
                                    'post_type' => 'giai-phap',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $posts_per_page,
                                    'paged' => $paged,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'giai-phap-cat',
                                            'field' => 'term_id',
                                            'terms' => $term
                                        )
                                    )
                                ];
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>

                                    <?php 
                                        while (have_posts()) : the_post(); 
                                        $post_format = get_post_format();
                                    ?>
                                        <div id="post-<?php the_ID();?>" <?php post_class( 'theme-clearfix' ); ?>>
                                            <div class="entry clearfix">
                                                <?php if (get_the_post_thumbnail()){?>
                                                <div class="entry-thumb pull-left">
                                                    <a class="entry-hover" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">            
                                                        <?php the_post_thumbnail("thumbnail")?>
                                                    </a>
                                                </div>
                                                <?php }?>
                                                <div class="entry-content">
                                                    <span class="entry-date">
                                                            <?php echo ( get_the_title() ) ? date( 'l, F j, Y',strtotime($post->post_date)) : '<a href="'.get_the_permalink().'">'.date( 'l, F j, Y',strtotime($post->post_date)).'</a>'; ?>
                                                        </span>
                                                    <div class="title-blog">
                                                        <h3>
                                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?> </a>
                                                        </h3>
                                                    </div>
                                                    <div class="entry-description">
                                                        <?php 
                                                                                    
                                                            if ( preg_match('/<!--more(.*?)?-->/', $post->post_content, $matches) ) {
                                                                $content = explode($matches[0], $post->post_content, 2);
                                                                $content = $content[0];
                                                                $content = wp_trim_words($post->post_content, 30, '...');
                                                                echo $content;  
                                                            } else {
                                                                the_content('...');
                                                            }       
                                                        ?>
                                                    </div>
                                                     <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'maxshop' ).'</span>', 'after' => '</div>' , 'link_before' => '<span>', 'link_after'  => '</span>' ) ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    
                                    <div class="clearfix"></div>
                                    
                                    <?php
                                } ?>
                        </div>                   
                    </div>
                </div>

                <!-- <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <aside class="sidebars">                 
                        <?php
                            // if (is_active_sidebar('sidebar_giai_phap')) {
                            //     dynamic_sidebar('sidebar_giai_phap');
                            // }
                        ?>
                    </aside>
                </div> -->
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
