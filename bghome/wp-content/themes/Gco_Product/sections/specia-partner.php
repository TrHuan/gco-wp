<?php global $vz_options;?>
<section id="section-partner" class="fadeInUp wow" data-wow-delay="0.2s">
  <div class="background-overlay">
      <div class="container">
        <h2 class="title-alls__mains"><?php echo $vz_options['opt-title-partner'];?></h2>
        <?php if (isset($vz_options['opt-slides-partner']) && !empty($vz_options['opt-slides-partner'])) : ?>
          <div id="partner-carousel" class="owl-carousel owl-theme">
            <?php 
              $slidespartner = $vz_options['opt-slides-partner']; 
              foreach ($slidespartner as $key => $value) {
            ?>        
            <div class="item-partner"> 
              <a class="link-partner" href="<?php echo $value['url'];?>" target="_blank">         
               <img src="<?php echo $value['image']?>" alt=""/>  
              </a>     
            </div>
            <?php } ?> 
          </div>
        <?php endif;?>
      </div>
    </div>
</section>
<div class="clearfix"></div>