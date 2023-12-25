<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
   <div class="banner-area banner-style-three">
      <div class="container">
         <div class="row">
         <?php
            if ( $settings['list'] ) {
               foreach (  $settings['list'] as $item ) { ?> 
                  <div class="col-lg-4 col-md-4 mb-sm-30">
                     <div class="single-banner zoom">
                        <a href="<?php echo $item['list_link_url']['url']; ?>">
                           <img src="<?php echo $item['list_image']['url']; ?>" alt="banner-img" width="377" height="230">
                        </a>
                     </div>
                  </div>
               <?php }
            }
         ?>                
         </div>
      </div>
   </div>
<?php } elseif ($settings['style_items'] == 2) { ?>
   <div class="product-bannner">
      <div class="container">
         <div class="row">
            <?php
               if ( $settings['list'] ) {
                  foreach (  $settings['list'] as $item ) { ?>
                     <div class="col-md-6">
                        <div class="single-banner home-style-two-banner">
                           <a href="<?php echo $item['list_link_url']['url']; ?>">
                              <img class="primary-img" src="<?php echo $item['list_image']['url']; ?>" alt="banner-img" width="575" height="292">
                              <img class="secondary-img" src="<?php echo $item['list_image_2']['url']; ?>" alt="banner-hover-image" width="575" height="292">
                           </a>
                        </div>
                     </div>
                  <?php }
               }
            ?>                   
         </div>
      </div>
   </div>
<?php } elseif ($settings['style_items'] == 3) { ?>   
   <?php
      if ( $settings['list'] ) {
         foreach (  $settings['list'] as $item ) { ?>
            <div class="testmonial bg-image-5 ptb-90" style="background-image: url(<?php echo $item['list_image']['url']; ?>);">
               <div class="container">
                  <div class="section-title text-center cl-testmonial">
                     <h2><?php echo $item['list_text_1']; ?></h2>
                     <p><?php echo $item['list_text_1']; ?></p>
                  </div>       
               </div>
           </div>
         <?php }
      }
   ?>
<?php } ?>