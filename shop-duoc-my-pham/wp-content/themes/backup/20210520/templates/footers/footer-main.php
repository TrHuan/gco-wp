
<section class="footer-info">
    <div class="container">
        <div class="row">
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
                    
                    <?php if ($value === 'contact') { ?> 
                        <div class="col-md-4 foot-1"> 

                            <?php if ($show_logo) { ?>
                                <p>
                                    <a href="<?php echo HOME_URI; ?>">
                                        <?php
                                            $logo = get_field('footer_options', 'option');
                                            if( $logo ):
                                        ?>
                                            <img src="<?php echo $logo['logo_footer']; ?>" alt="Logo" width="380" height="105">
                                        <?php endif; ?>
                                    </a>
                                </p>
                            <?php }?>                                    
                                        
                            <?php if( have_rows('contacts', 'option') ): ?> 
                                <?php while( have_rows('contacts', 'option') ): the_row(); ?>
                                    <?php if (get_sub_field('active', 'option') == 'yes') { ?>
                                        <div class="groups-box">
                                            <div class="item">
                                                <div class="contact-box">
                                                    <?php
                                                        $address = get_sub_field('address', 'option');
                                                        $phone = get_sub_field('phone', 'option');
                                                        $email = get_sub_field('email', 'option');
                                                    ?>

                                                    <p>Trụ sở: <?php echo $address; ?></p>
                                                    <p>ĐT:  <?php echo $phone; ?></p>
                                                    <p>Email: I<?php echo $email; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                       
                        </div>
                    <?php } ?> 

                    <?php if ($value === 'menu') { ?>
                        <div class="col-md-3 offset-md-1 col-6">
                            <h3><?php echo $title; ?></h3>
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
                        </div>
                    <?php } ?>
                    <?php if ($value === 'fanpage') { ?>
                        <div class="col-md-3 offset-md-1">
                            <div class="fanpage-box">
                                <?php echo $fanpage; ?>
                            </div>
                        </div>
                    <?php } else if ($value === 'socials') { ?>
                        <div class="col-md-3 offset-md-1">
                            <?php get_template_part('templates/addons/socials', 'box'); ?>
                        </div>
                    <?php } ?>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>