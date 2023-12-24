<?php
/**
 * Template hiển thị nội dung cho post có post format là standard
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div class="item">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-content">
        	<div class="post-thumb_sb">
        		<a href="<?php the_permalink() ;?>"> 
					<?php the_post_thumbnail("thumbnail",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
				</a>
        	</div>   
            <h4 class="post-title">
                <a class="post-link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>           
            </h4>
        </div>
    </div>
</div>