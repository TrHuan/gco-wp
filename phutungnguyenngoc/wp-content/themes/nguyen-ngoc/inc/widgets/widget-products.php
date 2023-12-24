<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_products' );

  function create_widget_products() {

    register_widget('Widget_Products');

  }



  /**

  * Tạo class Widget_Products

  */

  class Widget_Products extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_products', // id của widget

        'Sản Phẩm', // tên của widget

        array(

          'description' => 'Mô tả của widget' // mô tả

        )

      );

    }



    /**

    * Tạo form option cho widget

    */

    function form( $instance ) {

      //Biến tạo các giá trị mặc định trong form

      $default = array(

        'title' => 'Tiêu Đề',

        'posts_per_page' => 5,

      );



      //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định

      $instance = wp_parse_args( (array) $instance, $default);



      //Tạo biến riêng cho giá trị mặc định trong mảng $default

      $title = esc_attr( $instance['title'] );

      $posts_per_page = esc_attr( $instance['posts_per_page'] );



      //Hiển thị form trong option của widget

      echo'<p>';

      echo "Tiêu Đề:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('title').'" value="'.$title.'" />';

      echo'</p>';

      echo'<p>';

      echo "Số Lượng Hiển Thị:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('posts_per_page').'" value="'.$posts_per_page.'" />';

      echo'</p>';

    }



    /**

    * save widget form

    */

    function update( $new_instance, $old_instance ) {

      parent::update( $new_instance, $old_instance );

      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);

      $instance['posts_per_page'] = strip_tags($new_instance['posts_per_page']);

      return $instance;

    }



    /**

    * Show widget

    */

    function widget( $args, $instance ) { 

      extract( $args );

      $title = apply_filters( 'widget_title', $instance['title'] );

      $posts_per_page = apply_filters( 'widget_posts_per_page', $instance['posts_per_page'] );



      echo $before_widget;

      echo '<div class="sidebar-products-box">';

      //In tiêu đề widget

      echo $before_title.$title.$after_title;



      // Nội dung trong widget

      $rand = get_field('rand', 'widget_' . $widget_id);
        if ($rand == 'yes') {
          $orderby = 'rand';
        }

      $args = [

        'post_type' => 'product',

        'post_status' => 'publish',

        'posts_per_page' => $posts_per_page,

        'orderby' => $orderby,

      ];

      $wp_query = new WP_Query($args); ?>


      <div class="best-seller">
          <?php if ($wp_query->have_posts()) {

            while ($wp_query->have_posts()) {

              $wp_query-> the_post(); ?>

              <div class="single-best-seller">
                <div class="best-seller-img">
                    <a href="<?php the_permalink(); ?>" title="" class="image">
                        <img src="<?php echo lth_custom_img('full', 100, 100);?>" alt="<?php the_title(); ?>">
                    </a>
                </div>
                <div class="best-seller-text">
                    <h4>
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <?php the_title(); ?>
                    </a> 
                    </h4>
                    <span><?php the_time('d/m/Y'); ?></span>
                </div>
            </div>

            <?php }

          } else {

            get_template_part('template-parts/content', 'none');

          } ?>
      </div>


      <?php 

      echo '</div>';
      
      // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>