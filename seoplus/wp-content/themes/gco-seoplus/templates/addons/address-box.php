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
					?>

					<?php if ($title) { ?>
						<h4><?php echo $title; ?></h4>
					<?php } ?>

					<?php if ($address || $phone || $email) { ?>
						<ul>
							<?php if ($address) { ?>
								<li>
									<i class="icofont-location-pin icon"></i>
									<span><?php echo $address; ?></span>
								</li>
							<?php } ?>
							<?php if ($email) { ?>
                                <li>
                                    <a href="mailto:<?php echo $email; ?>">
                                        <i class="icofont-envelope icon"></i>
                                        <span><?php echo $email; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($phone) { ?>
                                <li>
                                    <a href="tel:<?php echo $phone; ?>">
                                        <i class="icofont-ui-call icon"></i>
                                        <span><?php echo $phone; ?></span>
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