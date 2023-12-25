<?php
/**
 * @block-slug  :   lth-receive-messages
 * @block-output:   lth_receive_messages_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-receive-messages/frontend_callback', 'lth_receive_messages_output_fe', 10, 2);

if (!function_exists('lth_receive_messages_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_receive_messages_output_fe($output, $attributes) {
        ob_start();
?>  
<section class="why-choose__about mb-80s">
    <div class="container">
        <div class="btn-why__choose">
            <div class="fs-20s mb-30s titles-bold__alls text-color__blues titles-center__alls"><?php echo wpautop(esc_html($attributes['title'])); ?></div>
            <?php echo wpautop(esc_html($attributes['description'])); ?>
            <ul class="list-btn__choose">
                <li><a href="#" title="" class="btn-oranges__second"> <img src="<?php echo ASSETS_URI; ?>/images/chat-ions-btn.svg" alt=""> <?php echo __('Tư vấn miễn phí'); ?></a></li>
                <li><a href="#" title="" class="btn-blues__alls"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo __('Gọi báo giá'); ?> <span class="titles-medium__alls"> <?php echo $attributes['feature_phone'] ?> </span><?php echo __('( Zalo)'); ?></a></li>
            </ul>
        </div>
    </div>
</section>
<?php
        return ob_get_clean();
    }
endif;
?>