<div class="megamenu menu-mobile d-lg-none">
	<div class="menu-mobile-content">
		<div class="content-box">
			
			<div class="title-box">
				<div class="logo-box">
					<a href="<?php echo HOME_URI; ?>">
						<img src="<?php echo lth_custom_logo('full', 60, 20); ?>" alt="Dịch vụ SEO Plus" title="Dịch vụ SEO Plus" width="120" height="46">
					</a>
				</div>
				<div class="menu-close" >
					<i class="icofont-close icon"></i>
				</div>
			</div>

			<?php get_template_part('templates/addons/megamenu', 'box'); ?>

            <div class="hotline-box d-block d-lg-none">
                <div class="content-box">
                    <?php $phone = get_field('hotline', 'option'); ?>
                    <a href="tel:<?php echo $phone; ?>" rel="nofollow">
                        <i class="icofont-ui-call icon"></i>
                        <span><?php echo $phone; ?></span>
                    </a>
                </div>
            </div>

            <div class="d-block d-lg-none">  
                <div class="search-button">
                    <div class="title-box">
                        <button class="btn btn-search" aria-label="Search">
                            <span>Tìm kiếm</span> <i class="icofont-search-1 icon"></i>
                        </button>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>