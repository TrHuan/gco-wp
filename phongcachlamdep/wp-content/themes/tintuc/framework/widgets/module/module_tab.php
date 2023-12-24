<?php
add_action('widgets_init', 'eweb_module_tab');
function eweb_module_tab() {
        register_widget('eweb_module_tab');
}
class eweb_module_tab extends WP_Widget {
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Setup
	/*-----------------------------------------------------------------------------------*/
    function __construct() {
        $widget_ops = array(
            'classname' => '',
            'description' => 'EW: Box Tab'
        );
        parent::__construct('eweb_module_tab', 'EW: Box Tab', $widget_ops);
    }

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        global $post;
        $title = apply_filters('widget_title', $instance['title']);
        $title2 = apply_filters('widget_title', $instance['title2']);
        $number = $instance['number'];
		?>
		<div class="tabsview">
	        <div id="tabs">
	            <ul>
	                <li><a href="#tabs-1"><?php echo $title?></a></li>
	                <li><a href="#tabs-2"><?php echo $title2?></a></li>
	            </ul>
	            <div id="tabs-1">
	                <div class="list-posts">
		                <ul>
		                	<?php
		                	$args = array(
								'showposts'=> $number,
							);
							$i=1;
						    $my_query = new wp_query($args);
						    while($my_query->have_posts()):$my_query->the_post();?>
		                    <li>
		                    	<span class="number"><?php echo $i;?></span>
		                        <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?><?php //dap_an(get_the_id());?></a>
		                    </li>
		                    <?php $i++;endwhile; wp_reset_query();?>
		                </ul>
		            </div>
	            </div>
	            <div id="tabs-2">
	                <div class="list-posts">
		                <ul>
		                	<?php
		                	$args = array(
                                'showposts' => $number,
                                'orderby' => 'date',
                                'meta_query' => array(
                                    array(
                                        'key' => 'is_feature_post',
                                        'value' => 'feature_post',
                                        'compare' => 'LIKE'
                                    )
                                )
                            );
                            $i=1;
						    $my_query = new wp_query($args);
						    while($my_query->have_posts()):$my_query->the_post();?>
			                    <li>
			                    	<span class="number"><?php echo $i;?></span>
			                        <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?><?php //dap_an(get_the_id());?></a>
			                    </li>
		                    <?php $i++;endwhile; wp_reset_query();?>
		                </ul>
		            </div>
	            </div>
	        </div>
	        <script>
	        jQuery(function() {
	             jQuery( "#tabs" ).tabs();
	        });
	        </script>
	    </div>
        <?php
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Update Widget
	/*-----------------------------------------------------------------------------------*/
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['title2'] = strip_tags($new_instance['title2']);
        $instance['number'] = $new_instance['number'];

		return $instance;
	}
	/*-----------------------------------------------------------------------------------*/
	/*	Widget Settings (Displays the widget settings controls on the widget panel)
	/*-----------------------------------------------------------------------------------*/

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Tin mới';
		$title2 = isset($instance['title2']) ? esc_attr($instance['title2']) : 'Tin nổi bật';
		$number = isset($instance['number']) ? absint($instance['number']) : 6;
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label></br>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('title2'); ?>">Title 2</label></br>
			<input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Number Post</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
	<?php }
}
?>