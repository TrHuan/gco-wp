<?php
add_action('widgets_init', 'ew_featured_video');
function ew_featured_video() {
        register_widget('ew_featured_video');
}
class ew_featured_video extends WP_Widget {
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Setup
	/*-----------------------------------------------------------------------------------*/
    function __construct() {
        $widget_ops = array(
            'classname' => '',
            'description' => 'Video mới (Content Home)'
        );
        parent::__construct('ew_featured_video', 'Video mới', $widget_ops);
    }

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        global $post;
        $title = apply_filters('widget_title', $instance['title']);
        $icon = apply_filters('widget_title', $instance['icon']);
        $number = $instance['number'];
        $cat = $instance['cats'];

        foreach ($cat as $cat_id) {
        	$args = array(
				'post_type' =>'video',
               	'showposts'=> $number,
    //            	'meta_key' => 'featured_video',
    //            	'order'=>'DESC',
    //            	'tax_query' => array(
				// 	array(
				// 		'taxonomy' => 'videos',
				// 		'field' => 'term_id',
				// 		'terms' => $cat_id
				// 	)
				// )
    		);
    		$term = get_term_by('id', $cat_id, 'videos');
	        $term_name = $term->name;
	        $slug = $term->slug;
	        $term_link = get_term_link( $slug, 'videos' );
	        if ( is_wp_error( $term_link ) ) {
	            continue;
	        }
        }
		?>
		<?php echo $before_widget;?>
            <div class="subcat">
                <div class="title_active">
                    <?php echo $icon;?> <?php echo $before_title;?><a href="<?php echo $term_link; ?>"><?php echo $title;?></a><?php echo $after_title;?>
                </div>
            </div>
            <div class="list-posts list-posts-3">
                <ul>
                	<?php
				    $my_query = new wp_query($args);
				    while($my_query->have_posts()) : $my_query->the_post();
				    	$url = get_post_meta( $post->ID, 'ew_oembed', true);
				    	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
					    ?>
	                    <li>
	                        <a class="thumbnail thumb-video" href="<?php the_permalink();?>" title="<?php the_title();?>">
	                        	<img src="http://img.youtube.com/vi/<?php echo $my_array_of_vars['v']; ?>/default.jpg" alt="<?php the_title();?>">
	                        	<span class="icon-play-video"></span>
	                        </a>
	                        <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
	                    </li>
		    		<?php //endif;
		    		endwhile; wp_reset_query();?>
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
		$instance['icon'] = strip_tags($new_instance['icon']);
        $instance['number'] = $new_instance['number'];
        $instance['cats'] = $new_instance['cats'];

		return $instance;
	}
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Settings (Displays the widget settings controls on the widget panel)
	/*-----------------------------------------------------------------------------------*/

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$icon = isset($instance['icon']) ? esc_attr($instance['icon']) : '[fa][/fa] ';
		$number = isset($instance['number']) ? absint($instance['number']) : 6;
		?>
		<p>
			<label>Title</label></br>
			<input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label>Icon</label></br>
			<input class="widefat" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>" /></p>
		<p>
			<label>Number Post</label>
			<input name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Lựa chọn danh mục', 'eweb'); ?>
				<?php
				$args = array(
                    'orderby' => 'count',
                );
                $terms = get_terms('videos', $args);
				echo "<br/>";
				$i=1;
				foreach ($terms as $cat) {
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
					$option .= $cat->name;
					$option .= '&nbsp;('.$cat->count.' video)';
					$option .= '<br />';
					echo $option;
					$i++;
				}
				?>
			</label>
		</p>
		<?php
	}
}
?>