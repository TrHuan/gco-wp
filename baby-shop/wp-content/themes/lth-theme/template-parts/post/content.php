<div class=" _item">
    <div class="vk-blog-item vk-blog-item--style-3">

        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 260, 370);?>" width="260" height="370" alt="<?php the_title(); ?>">
        </a>


        <div class="vk-blog-item__brief">
            <h3 class="vk-blog-item__title">
            	<a href="<?php the_permalink(); ?>" title="">
		    		<?php the_title(); ?>
		    	</a>
            </h3>

            <div class="vk-blog-detail__date"><?php echo __('Đăng ngày'); ?> <?php the_time('d'); ?>/<?php the_time('m'); ?>/<?php the_time('Y'); ?></div>

            <div class="vk-blog-item__text">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div> <!--./vk-blog-item-->
</div>