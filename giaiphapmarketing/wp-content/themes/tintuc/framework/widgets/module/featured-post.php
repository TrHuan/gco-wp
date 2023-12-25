<?php
add_action('widgets_init', 'eweb_featured_post');
function eweb_featured_post() {
        register_widget('eweb_featured_post');
}
class eweb_featured_post extends WP_Widget {
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Setup
	/*-----------------------------------------------------------------------------------*/
    function __construct() {
        $widget_ops = array(
            'classname' => 'popular-posts',
            'description' => 'Bài viết nổi bật - Slider'
        );
        parent::__construct('eweb_featured_post', 'EW: Bài viết nổi bật - Slider', $widget_ops);
    }

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        global $post;
        $title = apply_filters('widget_title', $instance['title']);
        $number = $instance['number'];
		
		echo $before_widget;
			echo $before_title; ?>
				<a href="javascript:void(0);"><?php echo $title;?></a>
        	<?php echo $after_title;?>
            <div id="owl-popular" class="owl-carousel">
                <?php
                $args = array(
                    'showposts' => $number,
                    'meta_query' => array(
                        array(
                            'key' => 'is_feature_post',
                            'value' => 'feature_post',
                            'compare' => 'LIKE'
                        )
                    )
                );
                $vonglap = new WP_Query($args);
                while($vonglap->have_posts()) : $vonglap->the_post(); ?>
                    <div class="item">
                        <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                            <?php the_post_thumbnail('thumb_247x158', array('alt'=>get_the_title()));?>
                        </a>
                        <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>">
                            <?php the_title();?>
                        </a>
                    </div>
                <?php endwhile; wp_reset_query();?>
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
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 6;
		?>
		<p>
			<label>Title</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label>Number Post</label>
			<input name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<?php
	}
}