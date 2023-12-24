<?php
add_action('widgets_init', 'eweb_post_by_cate_5');
function eweb_post_by_cate_5() {
        register_widget('eweb_post_by_cate_5');
}
class eweb_post_by_cate_5 extends WP_Widget {
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Setup
	/*-----------------------------------------------------------------------------------*/
    function __construct() {
        $widget_ops = array(
            'classname' => '',
            'description' => 'Bài viết theo chuyên mục 5 (Content Home)'
        );
        parent::__construct('eweb_post_by_cate_5', 'EW: Bài viết theo chuyên mục 5', $widget_ops);
    }

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        global $post;
        $title = apply_filters('widget_title', $instance['title']);
        $cat = $instance['cats'];
        $number = $instance['number'];

		foreach ($cat as $cat_id) {
        	$args = array(
               'showposts'=> $number,
               'cat' => $cat_id,
               'order'=>'DESC',
    		);
        }
		?>
		<?php echo $before_widget;?>
            <div class="subcat">
                <div class="title_active">
                    <?php echo $before_title;?><a href="<?php echo get_category_link($cat_id); ?>" ><?php echo $title;?></a><?php echo $after_title;?>
                </div>
                <ul>
                	<?php
                	$args_sub = array(
						'child_of' => $cat_id,
						'hide_empty' => 0
					);
                	$categories = get_categories($args_sub);
					foreach ($categories as $category) {
						$option = '<li><a href="'.get_category_link( $category->term_id ).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a></li>';
						echo $option;
					}
                	?>
                </ul>
            </div>
            <div class="list-posts list-posts-3">
                <ul>
                	<?php
				    $my_query = new wp_query($args);
				    while($my_query->have_posts()):$my_query->the_post(); ?>
	                    <li>
	                        <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
	                        	<?php the_post_thumbnail('thumb_180x130', array('alt'=>get_the_title()));?>
	                        </a>
	                        <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>">
	                        	<?php the_title();?>
	                        </a>
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
		$instance['cats'] = $new_instance['cats'];
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
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label></br>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Number Post</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" value="<?php echo $number; ?>" size="3" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Lựa chọn bài viết theo chuyên mục', 'eweb'); ?>
				<?php
				$categories = get_categories('hide_empty=0');
				echo "<br/>";
				$i=1;
				foreach ($categories as $cat) {
					$option = '<input type="radio" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
					if (isset($instance['cats'])) {
						foreach ($instance['cats'] as $cats) {
							if ($cats == $cat->term_id) {
								$option = $option . ' checked="checked"';
							}
						}
					}else{
						if($i == 1){
							$option = $option . ' checked="checked"';
						}
					}
					$option .= ' value="' . $cat->term_id . '" />';
					$option .= '&nbsp;';
					$option .= $cat->cat_name;
					$option .= '&nbsp;('.$cat->count.' bài viết)';
					$option .= '<br />';
					echo $option;
					$i++;
				} ?>
			</label>
		</p>
		<?php
	}
}
?>