<div class="megamenu menu-mobile d-xl-none">
	<div class="menu-mobile-title">
		<div class="title-box">
			<button aria-label="Menu" class="title">
				<i class="icofont-minus icon"></i>
                <i class="icofont-minus icon"></i>
                <i class="icofont-minus icon"></i>
			</button>
		</div>
	</div>

	<div class="menu-mobile-content">
		<div class="content-box">
			
			<div class="title-box">
				<div class="logo-box">
					<a href="<?php echo HOME_URI; ?>">
						<img src="<?php echo lth_custom_logo('full', 120, 46); ?>" alt="Logo" width="120" height="46">
					</a>
				</div>
				<div class="menu-close" >
					<i class="icofont-close icon"></i>
				</div>
			</div>

			<?php get_template_part('templates/addons/megamenu', 'box'); ?>

			<div class="logins-box d-block d-md-none">
                <div class="content-box">
                    <?php get_template_part('templates/accounts/user-box', ''); ?>
                </div>
            </div>

            <div class="d-block d-sm-none">
                <div class="mobile-search-box">
                    <?php get_search_form(); ?>
                </div>
            </div>

            <div class="hotline-box d-block d-sm-none">
                <div class="content-box">
                    <ul>
                        <?php
                            if( have_rows('contacts', 'option') ):
                                while( have_rows('contacts', 'option') ): the_row();
                                    $phone = get_sub_field('phone', 'option');
                        ?>
                        <?php if (get_sub_field('active', 'option') == 'yes') { ?>
                            <li>
                                <label><?php echo __('Hotline'); ?></label>
                                <span><?php echo $phone; ?></span>
                            </li>
                        <?php } endwhile; endif; ?>
                    </ul>
                </div>
            </div>

		</div>
	</div>
</div>