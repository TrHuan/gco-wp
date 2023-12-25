<footer>
    <section class="footers">
        <div class="slogan-tops__footers">
            <div class="container">
                <?php
                    if (is_active_sidebar('widget_footer_slogan')) {
                        dynamic_sidebar('widget_footer_slogan');
                    }
                ?>
            </div>
        </div>
        <?php if( have_rows('showsroom', 'option') ): ?>  
		    <ul class="list-showsroom__footers">
				<?php while( have_rows('showsroom', 'option') ): the_row(); ?>
		            <li>
		                <div class="items-showsrooms__footers">
		                    <p class="titles-showsrooms__footers">Xem địa chỉ Showroom tại <?php the_sub_field('title'); ?> <i class="fa fa-caret-down" aria-hidden="true"></i></p>
		                     <?php if( have_rows('item') ): ?> 
		                     	<?php while( have_rows('item') ): the_row(); ?>
				                    <div class="intros-showsroom__footers">
				                        <h6 class="names-showroom__footers"><?php the_sub_field('name'); ?></h6>
                                        <div class="names-showroom-inner">
    				                        <p class="times-open__showrooms"><?php the_sub_field('mo_cua'); ?></p>
    				                        <?php the_sub_field('map'); ?>
    				                        <p class="local-showroom__footers"><?php the_sub_field('dia_chi'); ?></p>
    				                        <ul class="tell-hotline__show-rooms">
    				                            <li>
    				                                <p>Tel</p>
    				                                <p><a title="" href="tel:<?php the_sub_field('dien_thoai'); ?>">: <?php the_sub_field('dien_thoai'); ?></a></p>
    				                            </li>
    				                            <li>
    				                                <p>Hotline</p>
    				                                <p><a title="" href="tel:<?php the_sub_field('hotline'); ?>">: <?php the_sub_field('hotline'); ?></a></p>
    				                            </li>
    				                        </ul>
                                        </div>
				                    </div>
				                
				                <?php endwhile; ?>
		                  <?php endif; ?>
                        </div>
		            </li>
		    	<?php endwhile; ?>
		    </ul>
		<?php endif; ?>
        <div class="intros-footers__bottoms">
            <?php
                if (is_active_sidebar('widget_footer_mobile')) {
                    dynamic_sidebar('widget_footer_mobile');
                }
            ?>
        </div>
        
        <div class="footer-copyright">
            <?php
                if (is_active_sidebar('widget_footer_3')) {
                    dynamic_sidebar('widget_footer_3');
                }
            ?>
        </div>
        
    </section>
</footer>