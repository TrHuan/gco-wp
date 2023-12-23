<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_socials' );

  function create_widget_socials() {

    register_widget('Widget_Socials');

  }



  /**

  * Tạo class Widget_Socials

  */

  class Widget_Socials extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_socials', // id của widget

        'Liên Kết MXH', // tên của widget

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

    }



    /**

    * save widget form

    */

    function update( $new_instance, $old_instance ) {

      parent::update( $new_instance, $old_instance );

      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);

      return $instance;

    }



    /**

    * Show widget

    */

    function widget( $args, $instance ) { 

      extract( $args );

      echo '<div class="widget-socials">';

      $title = apply_filters( 'widget_title', $instance['title'] );



      echo $before_widget;

      //In tiêu đề widget

      echo $before_title.$title.$after_title;



      // Nội dung trong widget ?>


      <div class="module__content">
        <?php get_template_part('templates/addons/socials-box', ''); ?>
      </div>


      <?php 

      // Kết thúc nội dung trong widget

      echo $after_widget;

      echo '</div>';

    }

  }

?>