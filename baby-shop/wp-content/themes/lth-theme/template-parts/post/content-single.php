
<h1 class="vk-page__title mb-1" ><?php the_title(); ?></h1>
<div class="vk-blog-detail__date"><?php echo __('Đăng ngày'); ?> <?php the_time('d'); ?>/<?php the_time('m'); ?>/<?php the_time('Y'); ?></div>
<div class="vk-blog-detail__content">                            
    <?php the_content(); ?>
</div> <!--./content-->