<?php
    $header_stick = get_field('header_stick', 'option');

    $select = $header_stick['header_stick'];

?>

<div class="header-main">
    <?php if ($select) { ?><div class="header-stick"><?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-column column-1">
                    <div class="header-main-box">
                        <div class="megamenu">
                            <a href="javascript:0" class="btn icon-title" title="">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>

                            <?php get_template_part('templates/addons/megamenu', ''); ?>

                            <a href="javascript:0" class="search-icon d-lg-none" title="">
                                <i class="icofont-search-1 icon-search"></i>
                            </a>

                            <?php get_template_part('templates/addons/logo-box', ''); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php if ($select) { ?></div><?php } ?>
</div>