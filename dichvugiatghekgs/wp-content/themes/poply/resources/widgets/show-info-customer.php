<?php
class show_info_customer extends WP_Widget {
    function __construct() {
        parent::__construct(
            'show_info_customer',
            'Core - Hiển thị thông tin công ty',
            array( 'description'  =>  'Hiển thị thông tin công ty' )
        );
    }
    function form( $instance ) {
        $default = array(
            'title' => 'Hiển thị thông tin công ty',
        );
        $instance   = wp_parse_args( (array) $instance, $default );
        $title      = esc_attr($instance['title']);

        echo '<p>';
            echo 'Tiêu đề :';
            echo '<input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/>';
        echo '</p>';
    }
    function update( $new_instance, $old_instance ) {
        $instance           = $old_instance;
        $instance['title']  = strip_tags($new_instance['title']);
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $title  = apply_filters( 'widget_title', $instance['title'] );

        //field
        $customer_address   = get_field('customer_address', 'option');
        $customer_phone     = get_field('customer_phone', 'option');
        $customer_email     = get_field('customer_email', 'option');

        echo $before_widget; ?>
            <h2 class="t1 s18 bold text-center"><?php echo $title; ?></h2>
            <ul class="list-unstyled sdetail-add">
                <li>
                    <i class="fas fa-map-pin"></i> 
                    <?php echo $customer_address; ?>
                </li>
                <li>
                    <i class="fas fa-at"></i> 
                    <a href="mailto:<?php echo $customer_email; ?>" title=""> <?php echo $customer_email; ?></a>
                </li>
                <li>
                    <i class="fas fa-phone"></i> 
                    <a href="tel:<?php echo str_replace(' ','',$customer_phone);?>" title=""><?php echo $customer_phone; ?></a>
                </li>
            </ul>
        <?php echo $after_widget;
    }
}
function create_showinfocustomer_widget() {
    register_widget('show_info_customer');
}
add_action( 'widgets_init', 'create_showinfocustomer_widget' );
?>