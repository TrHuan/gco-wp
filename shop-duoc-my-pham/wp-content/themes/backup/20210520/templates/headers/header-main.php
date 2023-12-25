<?php
    $header_stick = get_field('header_stick', 'option');

    $select = $header_stick['header_stick'];

?>

<section class="header-bot"> 
    <?php if ($select) { ?><div class="header-stick"><?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php get_template_part('templates/addons/logo-box', ''); ?>
                </div>
                <div class="col-md-9 flex-center-end">
                    <?php get_template_part('templates/addons/megamenu', ''); ?>

                    <?php //get_template_part('templates/addons/menu-mobile', 'box'); ?>
                </div>
            </div>
        </div>
    <?php if ($select) { ?></div><?php } ?>
</section>