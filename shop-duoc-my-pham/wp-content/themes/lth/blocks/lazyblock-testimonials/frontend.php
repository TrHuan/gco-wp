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
<section class="testemonials-details mb-150s mt-70s">
    <div class="container">
        <h2 class="fs-60s mb-150s titles-center__alls title-testemonials__details"><?php echo $attributes['title']; ?></h2>
        <div class="list-testemonials__pages">
            <?php $i; foreach( $attributes['testimonials'] as $inner ): $i++; ?>
                <div class="items-testemonials__details wow fadeIn<?php if ($i % 2 == 0) { ?>Right<?php } else { ?>Left<?php } ?> mb-50s" data-wow-duration="1s" data-wow-delay="0.1s">
                    <div class="img-testemonials__details">
                        <?php if ($inner['image']) { ?>
                            <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Testimonial" width="" height="">
                        <?php } ?>
                    </div>
                    <div class="intros-testemonials__details">
                        <h3 class="titles-medium__alls fs-28s mb-10s">"<?php echo $inner['testimonial_title']; ?>"</h3>
                        <p class="titles-thin__alls fs-20s mb-25s">- <?php echo $inner['testimonial_name']; ?> -</p>
                        <p class="fs-24s titles-light__alls">" <?php echo $inner['testimonial_description']; ?> "</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>