<?php global $vz_options;?>
<section id="section-banner">
    <div class="background-overlay">
        <?php if (isset($vz_options['opt-slides-banner']) && !empty($vz_options['opt-slides-banner'])) : ?>
          <div id="banner-carousel" class="owl-carousel owl-theme">
            <?php 
              $banner = $vz_options['opt-slides-banner']; 
              foreach ($banner as $key => $value) {
            ?>        
            <div class="item-banner">
                <img src="<?php echo $value['image'];?>" alt=""/> 
                <div class="cover-banner">
                    <div class="container">
                        <div class="after-banners__mains"></div>
                        <div class="infor-banner">
                            <div class="line-banner"></div>
                            <h2 class="name-banner"><?php echo $value['title'];?></h2>
                            <p class="description-banner"><?php echo $value['description'];?></p>
                            <p class="readmore-banner"><a href="<?php echo $value['url'];?>">Chọn quà <i class="fal fa-long-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>     
            </div>
            <?php } ?> 
          </div>
        <?php endif;?>
    </div>
</section>
<div class="clearfix"></div>