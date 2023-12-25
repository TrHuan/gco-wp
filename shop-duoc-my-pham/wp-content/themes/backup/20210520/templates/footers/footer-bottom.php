
<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
            	<?php the_field('copyright', 'option'); ?>
            	<?php the_field('gpdkkd', 'option'); ?>
            </div>
            <div class="col-md-3">
            	<?php
            		$hotline = get_field('footer_bottom_hotline', 'option');
            	?>
                <p><?php echo $hotline['title']; ?></p>
                <p><a href="tel:<?php echo $hotline['content']; ?>" title="" class="txt-blue font-weight-bold"><?php echo $hotline['content']; ?></a> <?php echo __('(Dược sĩ tư vấn)') ?></p>
            </div>
            <div class="col-md-4 flex-center-end">
                <span>
                	<img src="<?php the_field('footer_bottom_image', 'option'); ?>" alt="Logo" width="163" height="61">
                </span>
            </div>
        </div>
    </div>
</section>