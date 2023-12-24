<div class="footer-main">                
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">               
                <div class="groups-box footer-groups-box">
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
                                                    <img src="<?php echo $logo['logo_footer']; ?>" alt="Dịch vụ SEO Plus" title="Dịch vụ SEO Plus">
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
                                                    <div class="groups-box">
                                                        <div class="item">
                                                            <div class="contact-box">
                                                                <?php
                                                                    $title = get_sub_field('title', 'option');
                                                                    $address = get_sub_field('address', 'option');
                                                                    $phone = get_sub_field('phone', 'option');
                                                                    $email = get_sub_field('email', 'option');
                                                                ?>
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
                                                                                <a href="mailto:<?php echo $email; ?>" rel="nofollow">
                                                                                    <i class="icofont-envelope icon"></i>
                                                                                    <span><?php echo $email; ?></span>
                                                                                </a>
                                                                            </li>
                                                                        <?php } ?>
                                                                        <?php if ($phone) { ?>
                                                                            <li>
                                                                                <a href="tel:<?php echo $phone; ?>" rel="nofollow">
                                                                                    <i class="icofont-ui-call icon"></i>
                                                                                    <span><?php echo $phone; ?></span>
                                                                                </a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
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
                                                        <a href="<?php if ($url) { echo $url; } else { echo __('#'); } ?>">
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