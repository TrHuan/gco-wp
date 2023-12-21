<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package specia
 */
?>
<?php
	$hide_show_blog_meta = get_theme_mod('hide_show_blog_meta','on'); 
?>
<div class="colums-posts">
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
            <span><i class="fal fa-calendar"></i><?php the_time('M d, Y') ?></span>/
            <span><i class="fal fa-user"></i><?php the_author_posts_link(); ?></span>/
            <span class="post-comment"><i class="fal fa-comments-alt"></i> <?php $comments_count = wp_count_comments(get_the_ID());echo $comments_count->approved;?></span>
          </p>
        <div class="excerpt-posts"><?php the_excerpt_max_charlength(160);?></div>
      </div>
    </div>
</div>