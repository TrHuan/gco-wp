<div class="footer-bottom">                
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

				<div class="copyright">
                    <?php
                        $logo = get_field('footer_options', 'option');
                        if( $logo ):
                    ?>
						<a href="<?php echo HOME_URI; ?>">
                            <img src="<?php echo $logo['logo_footer']; ?>" alt="Dịch vụ SEO Plus" title="Dịch vụ SEO Plus" width="35" height="36">
                        </a>
                    <?php endif; ?>

					<?php the_field('copyright', 'option'); ?>					
				</div>
				
			</div>
        </div>
    </div>
</div>