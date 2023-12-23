<?php

function du_an_func($atts){
  extract(shortcode_atts(array(
    'gco_post_cat'      => '',
  ), $atts));

  if($visibility == 'hidden') return;
  ob_start(); ?>

  <div class="swiper swiper-slider swiper-categories has-shadow row-box-shadow-1 row-box-shadow-2-hover" data-item="5" data-item_lg="4" data-item_md="3" data-item_sm="2" data-item_mb="2"
        data-row="1" data-dots="false" data-arrows="true" data-autoplay="false">
          <?php
            $categories = explode(',', $gco_post_cat);
            foreach ( $categories as $category ) { ?>
              <div class="item">
                <div class="post-box col-inner">
                  <a href="<?php echo get_category_link($category); ?>">
                      <?php $image = get_field('anh_dai_dien', 'category_' . $category);
                      if ($image) { ?>
                          <div class="post-image">
                              <img src="<?php echo $image; ?>" alt="<?php echo get_cat_name($category); ?>" width="auto" height="auto">
                          </div>
                      <?php } ?>

                      <div class="post-content">
                          <h3 class="post-name">                              
                              <?php $term = get_term_by( 'id', $category, 'du_an_cat' );
                              echo $taxonomy_name = $term->name; ?>
                          </h3>
                      </div>
                  </a>
                </div>
            </div>
          <?php } ?>
    </div>

  <?php return ob_get_clean();
}
add_shortcode('du_an', 'du_an_func');