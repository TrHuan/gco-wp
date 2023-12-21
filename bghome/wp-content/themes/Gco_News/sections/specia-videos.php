<?php global $vz_options;?>
<section id="section-videos_newspapers" class="fadeInUp wow" data-wow-delay="0.2s">
  <div class="background-overlay">
      <div class="container">
        <h2 class="title-section"><?php echo $vz_options['opt-title-videos_newspapers'];?></h2>
        <?php if (isset($vz_options['opt-slides-videos_newspapers']) && !empty($vz_options['opt-slides-videos_newspapers'])) : ?>
          <div id="videos_newspapers-carousel" class="owl-carousel owl-theme">
            <?php 
              $slidesvideos = $vz_options['opt-slides-videos_newspapers']; 
              foreach ($slidesvideos as $key => $value) {
            ?>        
            <div class="items-videos_newspapers">
                  <div class="box-videos_newspapers">
                        <a href="<?php echo $value['url'];?>" class="swipebox popup-youtube">
                          <img src="<?php echo $value['image'];?>" alt="">
                          <span class="play"></span>
                          <div class="ovrly"></div>
                       </a>
                       <h3 class="name-videos_newspapers"><?php echo $value['title'];?></h3>
                  </div>
              </div>
            <?php } ?> 
          </div>
        <?php endif;?>
      </div>
    </div>
</section>
<div class="clearfix"></div>