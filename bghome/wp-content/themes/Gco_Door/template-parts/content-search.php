<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package specia
 */

?>

<?php
	$hide_show_blog_meta = get_theme_mod('hide_show_blog_meta','on'); 
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 colums-posts">
    <div class="box-posts">
      <div class="img-posts">
          <a href="<?php the_permalink() ;?>"> 
             <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium');?>" alt="">
          </a>
          <div class="ovrly"></div>
          <p class="details-posts"><a href="<?php the_permalink() ;?>">Xem chi tiết</a></p>
      </div>
      <div class="info-posts">
          <a class="name-posts" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
          <p class="time-posts">
            <span><?php the_author_posts_link(); ?></span>
            <span><?php the_time('d, M, Y') ?></span>
          </p>
        <div class="excerpt-posts"><?php the_excerpt_max_charlength(160);?></div>
      </div>
    </div>
</div>