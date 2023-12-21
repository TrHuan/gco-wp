<?php
if (!class_exists('Shortcode_Listbox')) {
    class Shortcode_Listbox extends Shortcode
    {
        /**
         * Shortcode name.
         *
         * @var  string
         */
        public $shortcode = 'listbox';
        /**
         * Default $atts .
         *
         * @var  array
         */
        public $default_atts = array();

        public function output_html($atts, $content = null)
        {
            $atts = function_exists('vc_map_get_attributes') ? vc_map_get_attributes('listbox', $atts) : $atts;
            extract($atts);
            $css_class   = array('lth-listbox');
            $css_class[] = $atts['el_class'];
            $css_class[] = $atts['style'];
            $css_class[] = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'listbox', $atts);
            ob_start();
            ?>
            <div class="<?php echo esc_attr(implode(' ', $css_class)); ?>">
                <?php if ($atts['title']) : ?>
                    <label class="title"><?php echo esc_html($atts['title']); ?></label>
                <?php endif;
                $items = vc_param_group_parse_atts($atts['items']); ?>
                <ul class="content">
                    <?php foreach ($items as $item): ?>                    
                        <?php if (isset($item['title'])) : ?>                            
                            <li class="item">
                                <?php if ($item['custom_links'] != '') : ?>
                                    <a href="<?php echo $item['custom_links']; ?>"
                                       target="<?php echo esc_attr($item['custom_links_target']); ?>">
                                        <?php echo esc_html($item['title']); ?>
                                    </a>
                                <?php else: ?>
                                    <span><?php echo esc_html($item['title']); ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php
            $html = ob_get_clean();

            return apply_filters('Shortcode_Listbox', $html, $atts, $content);
        }
    }

    new Shortcode_Listbox();
}