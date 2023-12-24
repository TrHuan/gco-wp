<div class="footer-main">                
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">               
                <div class="groups-box">
                    <?php if( have_rows('footer_content', 'option') ): ?> 
                        <?php while( have_rows('footer_content', 'option') ): the_row(); ?>
                            <?php
                                $title = get_sub_field('title', 'option');
                                $select = get_sub_field_object('select', 'option');
                                $value = $select['value'];
                                $show_logo = get_sub_field('show_logo', 'option');
                                $fanpage = get_sub_field('fanpage', 'option');
                                $clas = get_sub_field('class', 'option');

                                if ($clas) {
                                    $class = 'footer-' . $clas;
                                }
                            ?>

                            <div class="footer-box <?php if ($show_logo) { ?>footer-logo <?php }  echo $class;?> <?php if ($value === 'socials') { ?> footer-socials <?php } ?> <?php if ($value === 'contact') { ?> footer-contact <?php } ?>">
                                <?php if ($show_logo) { ?>
                                    <div class="logo-box">
                                        <div class="content-box">
                                            <a href="<?php echo HOME_URI; ?>">
                                                <?php
                                                    $logo = get_field('footer_options', 'option');
                                                    if( $logo ):
                                                ?>
                                                    <img src="<?php echo $logo['logo_footer']; ?>" alt="Logo">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php }?>

                                <div class="title-box">
                                    <h3 class="title">
                                        <?php echo $title; ?>
                                    </h3>
                                </div>

                                <div class="content-box">
                                    <?php if ($value === 'contact') { ?>                                        
                                        
                                        <?php if( have_rows('contacts', 'option') ): ?> 
                                            <?php while( have_rows('contacts', 'option') ): the_row(); ?>
                                                <?php if (get_sub_field('active', 'option') == 'yes') { ?>
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
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                    <?php } ?>

                                    <?php if ($value === 'menu') { ?>
                                        <ul>
                                            <?php if( have_rows('items') ): ?> 
                                                <?php while( have_rows('items') ): the_row(); ?>
                                                    <?php
                                                        $item = get_sub_field('item');
                                                        $url = get_sub_field('url');
                                                    ?>

                                                    <li>
                                                        <a href="<?php if ($url) { echo $url; } else { echo __('#'); } ?>" title="<?php echo $item; ?>">
                                                            <?php echo $item; ?>
                                                        </a>
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </ul>
                                    <?php } ?>

                                    <?php if ($value === 'fanpage') { ?>
                                        <div class="fanpage-box">
                                            <?php echo $fanpage; ?>
                                        </div>

                                        <?php get_template_part('templates/addons/socials', 'box'); ?>
                                    <?php } ?>

                                    <?php if ($value === 'socials') { ?>
                                        <?php get_template_part('templates/addons/socials', 'box'); ?>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>