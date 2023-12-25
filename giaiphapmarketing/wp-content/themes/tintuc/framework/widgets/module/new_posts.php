<?php
add_action('widgets_init', 'eweb_new_posts');
function eweb_new_posts() {
        register_widget('eweb_new_posts');
}
class eweb_new_posts extends WP_Widget {
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Setup
	/*-----------------------------------------------------------------------------------*/
    function __construct() {
        $widget_ops = array(
            'classname' => '',
            'description' => 'Bài viết mới (Sidebar)'
        );
        parent::__construct('eweb_new_posts', 'EW: Bài viết mới', $widget_ops);
    }

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        global $post;
        $title = apply_filters('widget_title', $instance['title']);
        $number = $instance['number'];
        $args = array(
			'showposts'=> $number,
			'order'=>'DESC',
		);
		echo $before_widget;?>
            <?php echo $before_title;?><?php echo $title;?><?php echo $after_title;?>
            <div class="list-posts">
                <ul>
                	<?php
				    $my_query = new wp_query($args);
				    while($my_query->have_posts()):$my_query->the_post();?>
                    <li>
                        <i class="fa fa-caret-right" aria-hidden="true"></i> <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                    </li>
                    <?php endwhile; wp_reset_query();?>
                </ul>
            </div>
        <?php echo $after_widget; //End Box
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Update Widget
	/*-----------------------------------------------------------------------------------*/
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];

		return $instance;
	}
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Settings (Displays the widget settings controls on the widget panel)
	/*-----------------------------------------------------------------------------------*/

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '[fa][/fa] ';
		$number = isset($instance['number']) ? absint($instance['number']) : 6;
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label></br>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Number Post</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" value="<?php echo $number; ?>" size="3" /></p>
		<?php
	}
}
?>