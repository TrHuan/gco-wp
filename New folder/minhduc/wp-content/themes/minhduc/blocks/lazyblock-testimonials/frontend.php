<?php
/**
 * @block-slug  :   lth-testimonials
 * @block-output:   lth_testimonials_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-testimonials/frontend_callback', 'lth_testimonials_output_fe', 10, 2);

if (!function_exists('lth_testimonials_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_testimonials_output_fe($output, $attributes) {
        ob_start();
?>   
<section class="customer-feedback__mains p-50s mb-100s wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
    <div class="container">
        <?php if ($attributes['title'] || $attributes['description'] || $attributes['categories']) : ?>
            <div class="module_header title-box">
                <?php if (isset($attributes['title'])) : ?>
                    <h2 class="title">
                        <?php if ($attributes['url']) : ?> 
                            <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                        <?php else : ?>
                            <span>
                        <?php endif; ?>
                            <?php echo wpautop(esc_html($attributes['title'])); ?>
                        <?php if ($attributes['url']) : ?> 
                            </a>
                        <?php else : ?>
                            </span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($attributes['description']) : ?>
                    <div class="infor">
                        <?php echo wpautop(esc_html($attributes['description'])); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class=" sl-feedback__mains swiper">
            <div class="swiper-wrapper">
                <?php foreach( $attributes['testimonials'] as $inner ): ?>
                    <div class="swiper-slide">
                        <div class="items-customer__feedbacks">
                            <div class="intros-customer__feedbacks">
                                <?php if ($inner['image']) { ?>
                                    <div class="avatar-customer__feedbacks mb-10s">
                                        <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Testimonial" width="" height="">
                                    </div>
                                <?php } ?>
                                <div class="names-customer__feedbacks titles-medium__alls fs-15s"><?php echo wpautop($inner['testimonial_name']); ?></div>
                                <div class="fs-10s position-works__customer"><?php echo wpautop($inner['testimonial_job']); ?></div>
                            </div>
                            <div class="intros-feedback__mains">
                                 <?php echo wpautop($inner['testimonial_description']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>