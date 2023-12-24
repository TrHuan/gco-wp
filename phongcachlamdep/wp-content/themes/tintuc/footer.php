        <div id="footer-wrapper">
            <div class="social_fo">
                <div class="container">
                    <div class="row">
                        <?php
                        $on_off_social = ot_get_option('on_off_social');
                        $facebook = ot_get_option('facebook');
                        $twitter = ot_get_option('twitter');
                        $linked_in = ot_get_option('linked_in');
                        $rss = ot_get_option('rss');
                        $g_plus = ot_get_option('g_plus');
                        $custom_link = ot_get_option('custom_link',array());
                        ?>

                        <?php if(!empty($custom_link)) :?>
                        <div class="col-lg-6 hidden-xs">
                            <div class="page_site">
                                <?php foreach($custom_link as $item){
                                    $title = $item['title'];
                                    $link_custom = $item['link_custom'];
                                    $icon_FA = $item['icon_FA'];
                                    ?>
                                    <div><a title="<?php echo $title;?>" href="<?php echo $link_custom;?>" class="face"><?php echo $icon_FA;?>&nbsp;<?php echo $title;?></a></div>
                                <?php }?>
                            </div>
                        </div>
                        <?php endif;?>

                        <?php if($on_off_social == 'on') :?>
                        <div class="col-lg-6 hidden-xs">
                            <div class="social" <?php if(empty($custom_link)){echo 'style="float:left"'; }?>>Kết nối với chúng tôi
                                <?php if(!empty($facebook)) :?>
                                    <a target="_blank" href="<?php echo $facebook;?>" class="icon_font face"><i class="fa fa-facebook-official"></i></a>
                                <?php endif;?>
                                <?php if(!empty($twitter)) :?>
                                    <a target="_blank" href="<?php echo $twitter;?>" class="icon_font twitte"><i class="fa fa-twitter-square"></i></a>
                                <?php endif;?>
                                <?php if(!empty($linked_in)) :?>
                                    <a target="_blank" href="<?php echo $linked_in;?>" class="icon_font in"><i class="fa fa-linkedin-square"></i></a>
                                <?php endif;?>
                                <?php if(!empty($rss)) :?>
                                    <a target="_blank" href="<?php echo $rss;?>" class="icon_font rss"><i class="fa fa-rss-square"></i></a>
                                <?php endif;?>
                                <?php if(!empty($g_plus)) :?>
                                    <a target="_blank" href="<?php echo $g_plus;?>" class="icon_font gogle"><i class="fa fa-google-plus-square"></i></a>
                                <?php endif;?>
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="to_top">
                            <a href="#" class="scrollTo"><i class="fa fa-angle-double-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <footer id="footer" class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <?php if ( ! dynamic_sidebar( 'footer-block-1' ) ) : ?>
                            <?php endif;?>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <?php if ( ! dynamic_sidebar( 'footer-block-2' ) ) : ?>
                            <?php endif;?>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <?php if ( ! dynamic_sidebar( 'footer-block-3' ) ) : ?>
                            <?php endif;?>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <?php if ( ! dynamic_sidebar( 'footer-block-4' ) ) : ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <div class="copy">
                                    <?php $copyright = ot_get_option('copyright');echo $copyright;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <?php wp_footer();?>
    </div>
</body>
</html>
