<?php
    $header_stick = get_field('header_stick', 'option');

    $select = $header_stick['header_stick'];

?>

<div class="header-main"> 

    <?php get_search_form(); ?> 
    
    <?php get_template_part('templates/addons/menu-mobile', 'box'); ?>

    <?php if ($select) { ?><div class="header-stick"><?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 col-column column-1">
                    <div class="groups-box">

                        <div class="megamenu menu-mobile-button d-lg-none">
                            <div class="menu-mobile-title">
                                <div class="title-box">
                                    <button aria-label="Menu" class="title">
                                        <i class="icofont-minus icon"></i>
                                        <i class="icofont-minus icon"></i>
                                        <i class="icofont-minus icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <?php get_template_part('templates/addons/logo-box', ''); ?>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 col-column column-2 d-none d-lg-block">
                    <div class="groups-box">
                        <?php get_template_part('templates/addons/megamenu', ''); ?>

                        <div class="header-right">
                            <div class="hotline-box d-none d-sm-block">
                                <div class="content-box">
                                    <?php $phone = get_field('hotline', 'option'); ?>
                                    <a href="tel:<?php echo $phone; ?>" rel="nofollow">
                                        <i class="icofont-ui-call icon"></i>
                                        <span><?php echo $phone; ?></span>
                                    </a>
                                </div>
                            </div>  

                            <div class="search-button">
                                <div class="title-box">
                                    <button class="btn btn-search" aria-label="Search">
                                        <span>Tìm kiếm</span> <i class="icofont-search-1 icon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="buttons">
                                <a href="#" class="btn btn-popup" data_popup="popup-box-1"><?php echo __('Đăng ký'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php if ($select) { ?></div><?php } ?>
</div>
