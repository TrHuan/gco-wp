<?php
add_action('widgets_init', 'eweb_post_by_cate_2');
function eweb_post_by_cate_2() {
        register_widget('eweb_post_by_cate_2');
}
class eweb_post_by_cate_2 extends WP_Widget {
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Setup
	/*-----------------------------------------------------------------------------------*/
    function __construct() {
        $widget_ops = array(
            'classname' => 'item-cate-2',
            'description' => 'Bài viết theo chuyên mục (Sidebar)'
        );
        parent::__construct('eweb_post_by_cate_2', 'EW: Bài viết theo chuyên mục 2', $widget_ops);
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
            <?php echo $before_title;?><a href="<?php echo get_category_link($cat_id); ?>" ><?php echo $title;?></a><?php echo $after_title;?>
            <div class="list-posts">
                <ul>
                	<?php
				    $my_query = new wp_query($args);
				    $i=1;
				    while($my_query->have_posts()):$my_query->the_post();
				    if($i==1){
				    ?>
                    <li>
                        <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                            <?php the_post_thumbnail('thumb_300x216', array('alt'=>get_the_title()));?>
                        </a>
                        <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>">
                            <?php the_title();?>
                        </a>
                        <p><?php echo eweb_truncate_description('140');?></p>
                    </li>
                    <?php }else{?>
                    <li>
                        <i class="fa fa-caret-right" aria-hidden="true"></i> <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                    </li>
                    <?php }?>
		    		<?php $i++;endwhile; wp_reset_query();?>
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
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '[fa][/fa] ';
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