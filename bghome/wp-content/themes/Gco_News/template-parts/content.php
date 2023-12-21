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
	$hide_show_posts_meta = get_theme_mod('hide_show_posts_meta','on'); 
?>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 colums-posts">
    <div class="box-posts">
      <div class="img-posts">
          <a href="<?php the_permalink() ;?>"> 
             <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
          </a>
          <div class="ovrly"></div>
          <p class="details-posts"><a href="<?php the_permalink() ;?>">Xem chi tiết</a></p>
      </div>
      <div class="info-posts">
          <div class="meta-posts"> 
              <div class="time-posts">
                <span><i class="fal fa-calendar"></i><?php the_time('M d, Y') ?></span>/
                <span><i class="fal fa-user"></i><?php the_author_posts_link(); ?></span>
              </div>
              <ul class="list-social-share">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-square"></i></a></li>     
                <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google"></i></a></li>
                <li><a href="https://www.instagram.com/sharer.php?u=<?php the_permalink();?>"><i class="fab fa-instagram"></i></a></li>
              </ul>
          </div> 
          <a class="name-posts" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
          <div class="excerpt-posts"><?php the_excerpt_max_charlength(120);?></div>
        <!-- <p class="readmore-posts"><a href="<?php the_permalink() ;?>">Đọc thêm</a></p> -->
      </div>
    </div>
</div>