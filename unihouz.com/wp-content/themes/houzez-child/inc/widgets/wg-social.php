<?php
add_action('widgets_init', 'register_widget_social');

function register_widget_social() {
    register_widget('Gtid_Social_Widget');
}

class Gtid_Social_Widget extends WP_Widget {

    function __construct() {

        parent::__construct(
            'social',
            __( 'GCO - Social', 'houzez' ),
            array(
                'description'  =>  __( 'Display information social', 'houzez' )
            )
        );
        
    }

    function widget($args, $instance) {
        extract($args);
        echo $before_widget;

        if ($instance['title']) echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title;
        global $sh_option;
        ?>
        <?php if( houzez_option('social-footer') != '0' ) { ?>
            <div class="footer-social">
                <?php 
                $text_facebook = $text_twitter = $text_instagram = $text_linkedin = $text_googleplus = $text_youtube = $text_pinterest = $text_yelp = $text_behance = '';

                $icons_class = "mr-2";
                if(houzez_option('ft-bottom') == 'v2') {
                    $text_facebook = esc_html__('Facebook', 'houzez'); 
                    $text_twitter = esc_html__('Twitter', 'houzez');
                    $text_instagram = esc_html__('Instagram', 'houzez'); 
                    $text_linkedin = esc_html__('Linkedin', 'houzez');
                    $text_googleplus = esc_html__('Google +', 'houzez');
                    $text_youtube = esc_html__('Youtube', 'houzez');
                    $text_pinterest = esc_html__('Pinterest', 'houzez');
                    $text_yelp = esc_html__('Yelp', 'houzez');
                    $text_behance = esc_html__('Behance', 'houzez');
                }

                if(houzez_option('ft-bottom') == 'v3') {
                    $icons_class = "";
                }
                ?>

                <?php if( houzez_option('fs-facebook') != '' ){ ?>
                <div>
                    <a class="btn-facebook" target="_blank" href="<?php echo esc_url(houzez_option('fs-facebook')); ?>">
                        <i class="houzez-icon icon-social-media-facebook <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_facebook; ?>
                    </a>
                </div>
                <?php } ?>

                <?php if( houzez_option('fs-twitter') != '' ){ ?>
                    <div>
                        <a class="btn-twitter" target="_blank" href="<?php echo esc_url(houzez_option('fs-twitter')); ?>">
                            <i class="houzez-icon icon-social-media-twitter <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_twitter; ?>
                        </a>
                    </div>
                    <?php } ?>

                    <?php if( houzez_option('fs-googleplus') != '' ){ ?>
                    <div>
                        <a class="btn-googleplus" target="_blank" href="<?php echo esc_url(houzez_option('fs-googleplus')); ?>">
                            <i class="houzez-icon icon-social-media-google-plus-1 <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_googleplus; ?>
                        </a>
                    </div>
                <?php } ?>

                <?php if( houzez_option('fs-linkedin') != '' ){ ?>
                    <div>
                        <a class="btn-linkedin" target="_blank" href="<?php echo esc_url(houzez_option('fs-linkedin')); ?>">
                            <i class="houzez-icon icon-professional-network-linkedin <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_linkedin; ?>
                        </a>
                    </div>
                <?php } ?>

                <?php if( houzez_option('fs-instagram') != '' ){ ?>
                <div>
                    <a class="btn-instagram" target="_blank" href="<?php echo esc_url(houzez_option('fs-instagram')); ?>">
                        <i class="houzez-icon icon-social-instagram <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_instagram; ?>
                    </a>
                </div>
                <?php } ?>

                <?php if( houzez_option('fs-pinterest') != '' ){ ?>
                <div>
                    <a class="btn-pinterest" target="_blank" href="<?php echo esc_url(houzez_option('fs-pinterest')); ?>">
                        <i class="houzez-icon icon-social-pinterest <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_pinterest; ?>
                    </a>
                </div>
                <?php } ?>

                <?php if( houzez_option('fs-yelp') != '' ){ ?>
                <div>
                    <a class="btn-yelp" target="_blank" href="<?php echo esc_url(houzez_option('fs-yelp')); ?>">
                        <i class="houzez-icon icon-social-media-yelp <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_yelp; ?>
                    </a>
                </div>
                <?php } ?>

                <?php if( houzez_option('fs-behance') != '' ){ ?>
                <div>
                    <a class="btn-behance" target="_blank" href="<?php echo esc_url(houzez_option('fs-behance')); ?>">
                        <i class="houzez-icon icon-designer-community-behance <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_behance; ?>
                    </a>
                </div>
                <?php } ?>

                <?php if( houzez_option('fs-youtube') != '' ){ ?>
                <div>
                    <a class="btn-youtube" target="_blank" href="<?php echo esc_url(houzez_option('fs-youtube')); ?>">
                        <i class="houzez-icon icon-social-video-youtube-clip <?php echo esc_attr($icons_class); ?>"></i> <?php echo $text_youtube; ?>
                    </a>
                </div>
                <?php } ?>


            </div>

        <?php }


        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    function form($instance) {
        $instance = wp_parse_args(
            (array)$instance, array(
                // 'title'             => '', 
                // 'numpro'            => '3',  
                // 'cat'               => '',
            )
        );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Tiêu đề', 'houzez' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>
        <?php _e('<p>This widget content is displayed from <strong>Theme Options -> Social</strong></p>');?>
    <?php
    }

}
