<?php
/* Tạo widget hiển thị bài xem nhiều
 * @tham khảo tại http://bit.ly/1tY8TFn
 */

function create_topview_widget() {
    register_widget( 'TopView_Widget' );
}
add_action( 'widgets_init', 'create_topview_widget' );

class TopView_Widget extends WP_Widget {

    /*
     * Thiết lập tên widget và description của nó (Appearance -> Widgets)
     */
    function TopView_Widget() {
        $widget_ops = array(
           'classname' => 'topview',
            'description' => 'Xem bài viết xem nhiều nhất - Sidebar'
        );

        parent::__construct('topview', 'Bài viết xem nhiều', $widget_ops);
    }

    /*
     * Tạo form điền tham số cho widget
     * ở đây ta có 3 form là title, postnum (số lượng bài) và postdate (tuổi của bài
     */
    function form($instance) {
        $default = array(
            'title' => '[fa][/fa] Bài viết được quan tâm',
            'postnum' => 5,
            'postdate' => 7
        );
        $instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr( $instance['title'] );
        $postnum = esc_attr( $instance['postnum'] );
        $postdate = esc_attr( $instance['postdate'] );

        echo "<label>Tiêu đề:</label> <input class='widefat' type='text' name='".$this->get_field_name('title')."' value='".$title."' />";
        echo "<label>Số lượng bài viết:</label> <input class='widefat' type='number' name='".$this->get_field_name('postnum')."' value='".$postnum."' />";
        echo "<label>Độ tuổi của bài viết (ngày)</label> <input class='widefat' type='number' name='".$this->get_field_name('postdate')."' value='".$postdate."' />";
    }

    /*
     * Cập nhật dữ liệu nhập vào form tùy chọn trong database
     */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['postnum'] = strip_tags($new_instance['postnum']);
        $instance['postdate'] = strip_tags($new_instance['postdate']);
        return $instance;
    }

    function widget($args, $instance) {
        global $postdate; // Thiết lập biến $postdate là biến toàn cục để dùng ở hàm filter_where
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $postnum = $instance['postnum'];
        $postdate = $instance['postdate'];

        echo $before_widget;?>

        <?php echo $before_title;?><?php echo $title;?><?php echo $after_title;?>

        <?php $query_args = array(
            'showposts' => $postnum,
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'ignore_sticky_posts' => -1
        );

        /*
         * Cách lấy bài viết theo độ tuổi (-30 days = lấy bài được 30 ngày tuổi)
         * @tham khảo tại http://bit.ly/1y7WXFp
         */
        function filter_where( $where = '' ) {
            global $postdate;
            $where .= " AND post_date > '" . date('Y-m-d', strtotime('-'.$postdate.' days')) . "'";
            return $where;
        }
        add_filter( 'posts_where', 'filter_where' );

        $postview_query = new WP_Query( $query_args );

        remove_filter( 'posts_where', 'filter_where' ); // Xóa filter để tránh ảnh hưởng đến query khác

        if ($postview_query->have_posts() ) :

            echo '<div class="list-posts"><ul>';
            while ( $postview_query->have_posts() ) :
                $postview_query->the_post(); ?>

                    <li>
                        <a class="bold" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </li>

            <?php endwhile;

        endif;
            echo '</ul></div>';
        echo $after_widget;
    }
}