<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_contact' );

  function create_widget_contact() {

    register_widget('Widget_Contact');

  }



  /**

  * Tạo class Widget_Contact

  */

  class Widget_Contact extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_contact', // id của widget

        'Liên Hệ', // tên của widget

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

        'address' => 'Địa Chỉ',

        'phone' => 'Điện Thoại',

        'email' => 'Email',

      );



      //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định

      $instance = wp_parse_args( (array) $instance, $default);



      //Tạo biến riêng cho giá trị mặc định trong mảng $default

      $title = esc_attr( $instance['title'] );

      $name = esc_attr( $instance['name'] );

      $address = esc_attr( $instance['address'] );

      $phone = esc_attr( $instance['phone'] );

      $email = esc_attr( $instance['email'] );



      //Hiển thị form trong option của widget

      echo'<p>';

      echo "Tiêu Đề:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('title').'" value="'.$title.'" />';

      echo'</p>';

      echo'<p>';

      echo "Name:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('name').'" value="'.$name.'" />';

      echo'</p>';

      echo'<p>';

      echo "Địa Chỉ:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('address').'" value="'.$address.'" />';

      echo'</p>';

      echo'<p>';

      echo "Điện Thoại:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('phone').'" value="'.$phone.'" />';

      echo'</p>';

      echo'<p>';

      echo "Email:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('email').'" value="'.$email.'" />';

      echo'</p>';

    }



    /**

    * save widget form

    */

    function update( $new_instance, $old_instance ) {

      parent::update( $new_instance, $old_instance );

      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);

      $instance['name'] = strip_tags($new_instance['name']);

      $instance['address'] = strip_tags($new_instance['address']);

      $instance['phone'] = strip_tags($new_instance['phone']);

      $instance['email'] = strip_tags($new_instance['email']);

      return $instance;

    }



    /**

    * Show widget

    */

    function widget( $args, $instance ) { 

      extract( $args );

      $title = apply_filters( 'widget_title', $instance['title'] );

      $name = apply_filters( 'widget_name', $instance['name'] );

      $address = apply_filters( 'widget_address', $instance['address'] );

      $phone = apply_filters( 'widget_phone', $instance['phone'] );

      $email = apply_filters( 'widget_email', $instance['email'] );



      echo $before_widget;

      //In tiêu đề widget

      



      // Nội dung trong widget ?>


      <div class="module_content module_contact">
          <ul>
            <li class="title">
              <?php echo $before_title.$title.$after_title; ?>
            </li>
            <li class="name">
              <h2><?php echo $before_name.$name.$after_name; ?></h2>
            </li>
            <li class="address">
              <label><?php echo __('Địa chỉ: '); ?></label>
              <?php echo $before_address.$address.$after_address; ?>
            </li>
            <li class="phone">
              <label><?php echo __('Điện thoại: '); ?></label>
              <a href="tel:<?php echo $before_phone.$phone.$after_phone; ?>" title="">
                <?php echo $before_phone.$phone.$after_phone; ?>
              </a>
            </li>
            <li class="email">
              <label><?php echo __('Email: '); ?></label>
              <a href="mailto:<?php echo $before_email.$email.$after_email; ?>" title="">
                <?php echo $before_email.$email.$after_email; ?>
              </a>
            </li>
          </ul>
      </div>


      <?php 


      // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>