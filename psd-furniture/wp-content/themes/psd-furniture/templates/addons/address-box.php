<?php
/**
 * Template Name: Addon Address Content
 * 
 * @author LTH
 * @since 2020
 */
?>

<div class="groups-box">
	<?php if( have_rows('contacts', 'option') ): ?> 
		<?php while( have_rows('contacts', 'option') ): the_row(); ?>
			<div class="item">
				<div class="contact-box">
					<?php
                        $title = get_sub_field('title', 'option');
                        $address = get_sub_field('address', 'option');
                        $phone = get_sub_field('phone', 'option');
                        $email = get_sub_field('email', 'option');
                        $phone_2 = get_sub_field('phone_2', 'option');
                        $hotline = get_sub_field('hotline', 'option');
                        $showroom = get_sub_field('showroom', 'option');
                    ?>

					<?php if ($title) { ?>
						<h4><?php echo $title; ?></h4>
					<?php } ?>

					<?php if ($address || $phone || $email) { ?>
                        <ul>
                            <?php if ($address) { ?>
                                <li>
                                    <label><?php echo __('Trụ sở chính & Xưởng sản xuất: '); ?></label>
                                    <span><?php echo $address; ?></span>
                                </li>
                            <?php } ?>
                            <?php if ($email) { ?>
                                <li>
                                    <label><?php echo __('Email: '); ?></label>
                                    <a href="mailto:<?php echo $email; ?>" title="<?php echo $email; ?>">
                                        <i class="fas fa-envelope icon"></i>
                                        <span><?php echo $email; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($phone) { ?>
                                <li>
                                    <a href="tel:<?php echo $phone; ?>" title="<?php echo $phone; ?>">
                                        <label><?php echo __('Điện thoại: '); ?></label>
                                        <span><?php echo $phone; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($showroom) { ?>
                                <li>
                                    <a href="tel:<?php echo $showroom; ?>" title="<?php echo $showroom; ?>">
                                        <label><?php echo __('Showroom: '); ?></label>
                                        <span><?php echo $showroom; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($phone_2) { ?>
                                <li>
                                    <a href="tel:<?php echo $phone_2; ?>" title="<?php echo $phone_2; ?>">
                                        <label><?php echo __('Điện thoại: '); ?></label>
                                        <span><?php echo $phone_2; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($hotline) { ?>
                                <li>
                                    <a href="tel:<?php echo $hotline; ?>" title="<?php echo $hotline; ?>">
                                        <label><?php echo __('Hotline: '); ?></label>
                                        <span><?php echo $hotline; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>