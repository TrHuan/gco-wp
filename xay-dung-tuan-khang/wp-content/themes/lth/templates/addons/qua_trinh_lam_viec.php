<?php
    $tieu_de = get_sub_field('tieu_de');
    $mo_ta = get_sub_field('mo_ta');
?>

<div class="sec-title text-center">
    <h2><?php echo $tieu_de; ?></h2>
    <p><?php echo $mo_ta; ?></p>
</div>  

<div class="row">
    <?php if( have_rows('noi_dung', 'option') ): $i; ?>
        <?php while( have_rows('noi_dung', 'option') ): the_row(); $i++; ?>
            <?php
                $tieu_de = get_sub_field('tieu_de');
                $mo_ta = get_sub_field('mo_ta');
                $icon_class = get_sub_field('icon_class');
                $hinh_anh = get_sub_field('hinh_anh');
            ?>

            <!--Start single working item-->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-working-item">
                   <div class="icon-box">
                        <div class="icon">
                            <?php if ($hinh_anh) { ?>
                                <img src="<?php echo $hinh_anh; ?>" alt="Icon">
                            <?php } else { ?>
                                <span class="<?php echo $icon_class; ?>"></span>
                            <?php } ?>
                        </div>
                        <div class="count">
                            <h3><?php echo $i; ?></h3>
                        </div>    
                   </div>
                   <div class="text-box text-center">
                       <h3><?php echo $tieu_de; ?></h3>
                       <p><?php echo $mo_ta; ?></p>
                   </div>     
                </div>
            </div>
            <!--End single working item-->
        <?php endwhile; ?>
    <?php endif; ?>
</div>