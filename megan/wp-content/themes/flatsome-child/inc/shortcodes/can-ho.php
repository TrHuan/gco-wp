<?php

function can_ho_func($atts){
  extract(shortcode_atts(array(
    'gco_textfield_title'      => '',
    'gco_post_cat'      => '',
    'gco_textfield_per_page'      => '',
    'gco_select_style'      => '',
  ), $atts));

  if($visibility == 'hidden') return;
  ob_start(); ?>

<article class="lth-products">
    <div class="module module_products">
          <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
              <h2 class="title">
                  <?php echo $gco_textfield_title; ?>
              </h2>
          </div>

        <div class="module_content <?php echo $gco_select_style; ?>">
            <?php
            
            $args = [
              'post_type' => 'du_an',
              'post_status' => 'publish',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'du_an_cat',
                      'field'    => 'id',
                      'terms'    => $gco_post_cat,
                  ),
              ),
              'posts_per_page' => $gco_textfield_per_page,
              'orderby' => 'date',
              'order' => 'DESC',
            ];

            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) { ?>
              <?php while ($wp_query->have_posts()) {
                  $wp_query->the_post(); ?>

                  <div class="item">
                    <article class="post-box">
                      <?php if (has_post_thumbnail()) { ?>
                        <div class="post-image">
                          <a href="<?php the_permalink(); ?>" title="" class="image">
                          
                            <?php the_post_thumbnail('thumbnail'); ?>
                          </a>
                        </div>
                      <?php } ?>

                      <div class="post-content">
                        <h3 class="post-name">
                          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                          </a>
                        </h3>
                        <div class="post-mo-ta">
                          <div class="post-dien-tich">
                            <?php echo __('Diện tích: '); ?>
                            <span><?php echo get_field('dien_tich'); ?></span>
                          </div>
                          <div class="post-gia">
                            <?php echo __("Giá bán: ") ?>
                            <span><?php echo get_field('gia'); ?></span>
                          </div>
                        </div>
                        <div class="post-button">
                          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                              <?php echo __('Xem chi tiết »'); ?>
                            </a>
                        </div>
                      </div>
                    </article>
                  </div>
              <?php }
            }
            // reset post data
            wp_reset_postdata();
            ?>
        </div>

        <?php if ($attributes['button_url']) : ?>
            <div class="module_button">
                <a href="<?php echo esc_url($attributes['button_url']); ?>">
                    <?php echo $attributes['button_text']; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</article>

  <?php return ob_get_clean();
}
add_shortcode('can_ho', 'can_ho_func');