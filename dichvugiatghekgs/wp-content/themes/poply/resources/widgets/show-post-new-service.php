<?php
class show_post_new_service extends WP_Widget {
    function __construct() {
        parent::__construct(
            'show_post_new_service',
            'Core - Hiển thị bài viết dịch vụ mới nhất',
            array( 'description'  =>  'Hiển thị bài viết dịch vụ mới nhất' )
        );
    }
    function form( $instance ) {
        $default = array(
            'title'         => 'Hiển thị bài viết dịch vụ mới nhất',
            'number_post'   => 3
        );
        $instance       = wp_parse_args( (array) $instance, $default );
        $title          = esc_attr($instance['title']);
        $number_post    = esc_attr($instance['number_post']);

        echo '<p>';
            echo 'Tiêu đề :';
            echo '<input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/>';
        echo '</p>';

        echo '<p>';
            echo 'Số lượng bài viết hiển thị :';
            echo '<input type="number" class="widefat" name="'.$this->get_field_name('number_post').'" value="'.$number_post.'" />';
        echo '</p>';
    }
    function update( $new_instance, $old_instance ) {
        $instance                   = $old_instance;
        $instance['title']          = strip_tags($new_instance['title']);
        $instance['number_post']    = strip_tags($new_instance['number_post']);
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $title          = apply_filters( 'widget_title', $instance['title'] );
        $number_post    = $instance['number_post'];

        echo $before_widget; ?>
            <ul class="list-unstyled sdetail-nav">

                <?php
                    $query = query_post_by_custompost('service', $number_post);

                    if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();
                ?>

                    <?php get_template_part('resources/views/content/widget-post-new-service', get_post_format()); ?>

                <?php endwhile; wp_reset_postdata(); else: echo ''; endif; ?>

            </ul>
        <?php echo $after_widget;
    }
}
function create_showpostnewservice_widget() {
    register_widget('show_post_new_service');
}
add_action( 'widgets_init', 'create_showpostnewservice_widget' );
?>