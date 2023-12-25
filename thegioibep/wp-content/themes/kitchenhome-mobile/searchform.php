<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>



<?php
    if ( wp_is_mobile() ) { ?>
        <form class="searchs-headers forms search-form" action="<?php bloginfo('url'); ?>/" method="GET" role="form">
            <!-- <div class="search-box">
                <div class="search-content"> -->
                    <input type="text" name="s" placeholder="Nhập từ khóa cần tìm?">
                    <button><img src="<?php echo ASSETS_URI; ?>/images/search-headers.png" alt=""></button>
                    <input type="hidden" name="post_type" value="product||post||project">        
                <!-- </div>
            </div> -->
        </form>
    <?php } else { ?>
        <div class="search-box">
            <div class="search-content">
                <div class="search-close">
                    <a href="#" title="" class="close-icon" data_toggle="search-content">
                        <i class="icofont-close"></i>
                    </a>
                </div>

                <form role="search" method="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
                    <div class="form-content">
                        <div class="form-group">
                            <input type="text" name="s" placeholder="<?php echo __('Tìm kiếm...') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-search"><i class="icofont-search-1"></i></button>
                            <input type="hidden" name="post_type" value="product||post||project">
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    <?php }
?>