<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_blogs' );

  function create_widget_blogs() {

    register_widget('Widget_Blogs');

  }



  /**

  * Tạo class Widget_Blogs

  */

  class Widget_Blogs extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_blogs', // id của widget

        'Tin Tức', // tên của widget

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
    
      // echo '<input class="widefat" type="text" name="'.$this->get_field_name('posts_per_pages').'" value="5" />';

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

      $style = get_field('style', 'widget_' . $widget_id);

      echo '<div class="sidebar-posts-box recent-post '.$style.'">';

      //In tiêu đề widget
      if ($title) {
        echo $before_title.$title.$after_title;
      }


      // Nội dung trong widget

      if ($style == 'style_01') {
        $select = get_field('select', 'widget_' . $widget_id);

        if ($select == 'rand') {
          $orderby = 'rand';
        }

        if ($select == 'new' || $select == 'rand') {
          $args = [

            'post_type' => 'post',

            'post_status' => 'publish',

            'posts_per_page' => $posts_per_page,

            'post__not_in' => array($id),

            'orderby' => $orderby,

          ];

          $wp_query = new WP_Query($args); ?>


          <div class="tops-news__pages mb-50s">
              <div class="row gutter-10">
                <?php if ($wp_query->have_posts()) { $i;

                  while ($wp_query->have_posts()) { 

                    $wp_query-> the_post(); $i++; ?>

                    <?php if ($i == 1) { ?>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-12">
                    <?php } elseif ($i == 2) { ?>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <?php } ?>

                        <?php //load file tương ứng với post format

                        get_template_part('template-parts/post/content', 'sidebar'); ?>

                    <?php if ($i == 1 || $i == 3) { ?>
                      </div>
                    <?php } ?>

                  <?php }

                } ?>
              </div>
          </div>

        <?php } else {
          $i;
          $featured_posts = get_field('posts', 'widget_' . $widget_id);
          if( $featured_posts ): ?>
            <div class="tops-news__pages mb-50s">
              <div class="row gutter-10">
                <?php foreach( $featured_posts as $post ):
                  $imgsrc = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                  $i++; ?>
                  <?php if ($i == 1) { ?>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-12">
                  <?php } elseif ($i == 2) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                  <?php } ?>

                      <div class="items-prj__pages">
                        <?php if ($imgsrc) { ?>
                          <a href="<?php the_permalink(); ?>" title="" class="image">
                                <img src="<?php echo $imgsrc; ?>" width="" height="" alt="<?php echo $post->post_title; ?>">
                            </a>
                        <?php } ?>
                        <div class="intros-prj__pages">
                          <p class="days-news fs-13s mb-10s"><?php the_time('d'); ?> <?php echo __('Thg '); the_time('m,'); ?> <?php the_time('Y'); ?></p>
                          <h3>
                            <a href="<?php the_permalink($post); ?>" title="<?php echo $post->post_title; ?>" class="name-prj__pages fs-17s titles-medium__alls">
                                <?php echo $post->post_title; ?>
                              </a>   
                          </h3>
                        </div>
                      </div>

                  <?php if ($i == 1 || $i == 3) { ?>
                    </div>
                  <?php } ?>
                <?php endforeach; wp_reset_postdata(); ?>
              </div>
            </div>
          <?php endif;
        }
      } else {
        $select = get_field('select', 'widget_' . $widget_id);

        if ($select == 'rand') {
          $orderby = 'rand';
        }

        if ($select == 'new' || $select == 'rand') {
          $args = [

            'post_type' => 'post',

            'post_status' => 'publish',

            'posts_per_page' => $posts_per_page,

            'post__not_in' => array($id),

            'orderby' => $orderby,

          ];

          $wp_query = new WP_Query($args); ?>


          <div class="tops-news__pages mb-50s">
              <div class="row gutter-10">
                <?php if ($wp_query->have_posts()) {

                  while ($wp_query->have_posts()) { 

                    $wp_query-> the_post(); ?>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">

                        <?php //load file tương ứng với post format

                        get_template_part('template-parts/post/content', 'sidebar'); ?>

                    </div>

                  <?php }

                } ?>
              </div>
          </div>

        <?php } else {
          $featured_posts = get_field('posts', 'widget_' . $widget_id);
          if( $featured_posts ): ?>
            <div class="tops-news__pages mb-50s">
              <div class="row gutter-10">
                <?php foreach( $featured_posts as $post ):
                  $imgsrc = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">

                      <div class="items-prj__pages">
                        <?php if ($imgsrc) { ?>
                          <a href="<?php the_permalink(); ?>" title="" class="image">
                                <img src="<?php echo $imgsrc; ?>" width="" height="" alt="<?php echo $post->post_title; ?>">
                            </a>
                        <?php } ?>
                        <div class="intros-prj__pages">
                          <p class="days-news fs-13s mb-10s"><?php the_time('d'); ?> <?php echo __('Thg '); the_time('m,'); ?> <?php the_time('Y'); ?></p>
                          <h3>
                            <a href="<?php the_permalink($post); ?>" title="<?php echo $post->post_title; ?>" class="name-prj__pages fs-17s titles-medium__alls">
                                <?php echo $post->post_title; ?>
                              </a>   
                          </h3>
                        </div>
                      </div>

                  </div>
                <?php endforeach; wp_reset_postdata(); ?>
              </div>
            </div>
          <?php endif;
        }
      }

      echo '</div>';

      // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>