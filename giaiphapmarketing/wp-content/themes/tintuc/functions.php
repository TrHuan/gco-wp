<?php
/**
 * E-web functions and definitions
 *
 */

/*-----------------------------------------------------------------------------------*/
/*  Make theme available for translation.
/*  Translations can be filed in the /languages/ directory.
/*  If you're building a theme based on eweb, use a find and replace
/*  to change 'eweb' to the name of your theme in all the template files
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'eweb', get_template_directory() . '/languages' );

/*-----------------------------------------------------------------------------------*/
/*  Core Features
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/framework/core/eweb-core.php';

/*-----------------------------------------------------------------------------------*/
/*  Register Widget
/*-----------------------------------------------------------------------------------*/
include(TEMPLATEPATH . '/framework/widgets/create_widget.php');
include(TEMPLATEPATH . '/framework/widgets/create_area_widget.php');

/*-----------------------------------------------------------------------------------*/
/*  Create Custom Post Type
/*-----------------------------------------------------------------------------------*/
include (TEMPLATEPATH . '/framework/custom_post_type/custom_post_type.php' );

/*-----------------------------------------------------------------------------------*/
/*  Create Taxonomy
/*-----------------------------------------------------------------------------------*/
include (TEMPLATEPATH . '/framework/custom_taxonomy/custom_taxonomy.php' );

/*-----------------------------------------------------------------------------------*/
/*  Create metadata
/*-----------------------------------------------------------------------------------*/
include (TEMPLATEPATH . '/framework/custom_field/metadata.php' );

/*-----------------------------------------------------------------------------------*/
/*  Create metadata
/*-----------------------------------------------------------------------------------*/
include (TEMPLATEPATH . '/framework/module/theme-options.php' );

/*-----------------------------------------------------------------------------------*/
/*  Meta Boxes
/*-----------------------------------------------------------------------------------*/
define( 'RWMB_URL', trailingslashit( get_template_directory_uri().'/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory().'/meta-box' ) );
require_once RWMB_DIR.'meta-box.php';
include get_template_directory().'/meta-box-config.php';


/*-----------------------------------------------------------------------------------*/
/*  Register Menu
/*-----------------------------------------------------------------------------------*/
register_nav_menus( array(
  'main_menu' => __( 'Menu chính', 'eweb' ),
  'second_menu' => __( 'Menu phụ', 'eweb' ),
  ) );

/*-----------------------------------------------------------------------------------*/
/*  Adding Default Thumbnail Sizes
/*-----------------------------------------------------------------------------------*/
if( function_exists( 'add_theme_support' ) ){
  add_theme_support( 'post-thumbnails' );
        //add_image_size( 'thumb_482x340', 482, 340, true);
  add_image_size( 'thumb_247x158', 247, 158, true);
  add_image_size( 'thumb_180x130', 180, 130, true);
  add_image_size( 'thumb_545x280', 545, 280, true);
  add_image_size( 'thumb_75x60', 75, 60, true);
  add_image_size( 'thumb_147x91', 147, 91, true);
  add_image_size( 'thumb_216x160', 216, 160, true);
  add_image_size( 'thumb_300x216', 300, 216, true);
  add_image_size( 'thumb_100x80', 100, 80, true);
  add_image_size( 'thumb_120x90', 120, 90, true);
}

/*-----------------------------------------------------------------------------------*/
/*  Load Required CSS Styles
/*-----------------------------------------------------------------------------------*/
if(!function_exists('load_theme_styles')){
  function load_theme_styles(){
    if (!is_admin()) {
      $stylesheet_url = get_template_directory_uri().'/css/';
      wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', '', 'v3.3.4', false );
      wp_enqueue_style( 'owl.carousel', $stylesheet_url . 'owl.carousel.min.css', '', 'v2.0.0', false );
      wp_enqueue_style( 'owl.theme', $stylesheet_url . 'owl.theme.default.min.css', '', 'v2.0.0', false );
      wp_enqueue_style( 'owl.animate', $stylesheet_url . 'animate.min.css', '', '', false );
      wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/font-awesome/css/font-awesome.min.css', '', 'v4.3.0', false );
      wp_enqueue_style( 'reset', $stylesheet_url . 'reset.css', '', '', false );
      wp_enqueue_style( 'core', $stylesheet_url . 'wp-core.css', '', '', false );
      wp_enqueue_style( 'style', get_stylesheet_uri() );
                //wp_enqueue_style( 'custom', $stylesheet_url . 'custom.css.php');
      wp_enqueue_style( 'roboto-condensed', 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,vietnamese');
                //wp_enqueue_style( 'open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,vietnamese');
    }
  }
}
add_action( 'wp_enqueue_scripts', 'load_theme_styles' );

/*-----------------------------------------------------------------------------------*/
/*  Load Required JS Scripts
/*-----------------------------------------------------------------------------------*/
if(!function_exists('load_theme_scripts')){
  function load_theme_scripts(){
    if (!is_admin()) {
      $java_script_url = get_template_directory_uri().'/js/';

      wp_enqueue_script('jquery');
      wp_enqueue_script('owl.carousel', $java_script_url . 'owl.carousel.min.js', array('jquery'), 'v1.3.2', true);
      wp_enqueue_script('jquery-ui', $java_script_url . 'jquery-ui.custom.min.js', array('jquery'), '', true);
      wp_enqueue_script('global', $java_script_url . 'global.js', array('jquery'), '', true);

                // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                //     wp_enqueue_script( 'comment-reply' );
                // }
    }
  }
}
add_action('wp_enqueue_scripts', 'load_theme_scripts');

/*-----------------------------------------------------------------------------------*/
/*  Info Head
/*-----------------------------------------------------------------------------------*/

add_action('wp_head', 'ew_info_head',1,1);
function ew_info_head(){?>
        <!--
        *****************************************
        *       DEVELOPER:  HIEUND              *
        *       EMAIL:  NG.HIEU89@GMAIL.COM     *
        *       SKYPE: HIEU.DEV                 *
        *       WEBSITE: E-WEB.VN               *
        *****************************************
      -->
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php
      $app_id = ot_get_option('app_id_facebook');
      $user_facebook_id = ot_get_option('user_facebook_id');
      $link_fanpage = ot_get_option('link_fanpage');
      ?>
      <meta property="article:author" content="<?php echo $link_fanpage;?>" />
      <meta property="fb:app_id" content="<?php echo $app_id;?>"/>
      <meta property="fb:admins" content="<?php echo $user_facebook_id;?>"/>
      <?php
      $favicon = ot_get_option('favicon');
      if( !empty($favicon) ){?>
      <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
      <?php }?>
      <?php }

      /*-----------------------------------------------------------------------------------*/
/*  Info Footer
/*-----------------------------------------------------------------------------------*/
add_action('wp_footer', 'ew_footer');
function ew_footer(){
  $tracking_code = ot_get_option('tracking_code');
  if(!empty($tracking_code)){
    echo $tracking_code;
  }
}
add_action('wp_footer','ew_modules_social');
function ew_modules_social(){
  $app_id = ot_get_option('app_id_facebook');
  if(!empty($app_id)){?>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=<?php echo $app_id;?>";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <?php }?>
  <script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
  </script>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <?php }

  /*-----------------------------------------------------------------------------------*/
/*  Function Comment Facebook
/*-----------------------------------------------------------------------------------*/

function ew_comment_fb(){
  $app_id = ot_get_option('app_id_facebook');
  $link_fanpage = ot_get_option('link_fanpage');
  if(!empty($app_id)){?>
  <div class="box-comment">
    <div class="share-send">
      <div class="fb-btn fb-send" data-href="<?php the_permalink(); ?>"></div>
      <div class="fb-like" data-href="<?php echo $link_fanpage;?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
      <div class="fb-like" data-href="<?php the_permalink();?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
      <a href="<?php the_permalink(); ?>" class="twitter-share-button" data-via="">Tweet</a>
      <g:plusone></g:plusone>
    </div>
    <div class="fb-comments" data-href="<?php the_permalink();?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
  </div>
  <?php }
}

/*-----------------------------------------------------------------------------------*/
/*  Chỉ có danh mục có post_type là post mới xuất hiện trên trang kết quả tìm kiếm
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'eweb_search_filter' ) ){
  function eweb_search_filter($query) {
    if ( !$query->is_admin && $query->is_search) {
           $query->set('post_type', array('post') ); // id of page or post
         }
         return $query;
       }
       add_filter( 'pre_get_posts', 'eweb_search_filter' );
     }

     add_action('init','remove_thumbnail_support');
     function remove_thumbnail_support(){
      remove_post_type_support('page','thumbnail');
    }

    function post_format($post_id){
      $p_format = get_post_format($post_id);
      if($p_format == 'gallery'){
        echo '<i class="fa fa-picture-o"></i>';
      }elseif ($p_format == 'video'){
        echo '<i class="fa fa-video-camera"></i>';
      }
    }

    function timeago( $type = 'post' ) {
      $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
      return human_time_diff($d('U'), current_time('timestamp')) . " " . __(' trước');
    }

    function post_info($post_id){?>
    <div class="com_share">
      <i class="fa fa-calendar"></i> <?php echo timeago(); ?>
      <i class="fa fa-user"></i> <?php $author_id = $post->post_author; ?><a class="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'user_nicename' , $author_id ); ?></a>
      <i class="fa fa-comments"></i> <?php $count = wp_count_comments($post_id);echo $count->approved;?>
    </div>
    <?php }

    function related_post(){
      global $post;
      $custom_taxterms = wp_get_object_terms( $post->ID, 'dong-su-kien', array('fields' => 'ids') );
      $showposts = 0;
      if(is_single()){
        $showposts =5;
      }elseif(is_singular()){
        $showposts = 2;
      }
      else{
        $showposts = 2;
      }
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'showposts'=> $showposts,
        'tax_query' => array(
          array(
            'taxonomy' => 'dong-su-kien',
            'field' => 'id',
            'terms' => $custom_taxterms
            )
          ),
        'post__not_in' => array ($post->ID),
        );
      $related_items = new WP_Query( $args );
      echo '<div class="flw dong-su-kien">';
      if ($related_items->have_posts()) :
        while ( $related_items->have_posts() ) : $related_items->the_post();
      ?>
      <div>
        <i class="fa fa-caret-right"></i>
        <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
      </div>
      <?php endwhile;endif;wp_reset_postdata();
      echo '</div>';
    }

    function count_number_tag(){
      $posttags = get_the_tags();
      $count=0;
      if ($posttags) {
        foreach($posttags as $tag) {
          $count++;
        }
        echo '<i class="fa fa-tags"></i> '.$count;
      }
    }

    /*-----------------------------------------------------------------------------------*/
/*  Add shortcode to widget title
/*-----------------------------------------------------------------------------------*/
add_filter( 'widget_title', 'do_shortcode' );
add_shortcode( 'fa', 'so_shortcode_fa' );
function so_shortcode_fa( $attr, $content ) {
  return '<i class="fa fa-'. $content . '"></i>';
}

/*-----------------------------------------------------------------------------------*/
/*  Chuyển hướng thẳng bài viết khi search ra 1 kết quả
/*-----------------------------------------------------------------------------------*/
add_action('template_redirect', 'eweb_redirect_single_post');
function eweb_redirect_single_post() {
  if (is_search()) {
    global $wp_query;
    if ($wp_query->post_count == 1) {
      wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    }
  }
}

/*-----------------------------------------------------------------------------------*/
/*  Custom form Comment
/*-----------------------------------------------------------------------------------*/
if(!function_exists( 'eweb_comments_callback') ){
  function eweb_comments_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      <article id="comment-<?php comment_ID(); ?>" class="comment">
        <div class="avatar-wrap">
          <?php echo get_avatar( $comment, 60 ); ?>
        </div>
        <div class="comment-meta comment-author">
          <?php
          printf( '<cite class="fn">%1$s</cite> ', get_comment_author_link());
          ?>
          <section class="comment-edit">
            <a href="#">
              <time dir="ltr" datetime="<?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?>">
                <?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?>
                <?php edit_comment_link( __( '(Chỉnh sửa)' ), '  ', '' );?>
              </time>
            </a>
            <a class="comment-reply-link" href=""><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Phản hồi <span>&darr;</span>', 'eweb' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></a> <span></span><!-- .reply -->
          </section>
          <div dir="ltr" class="comment-content">
            <?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Bình luận của bạn đang chờ kiểm duyệt.' ); ?></em>
          <?php endif; ?>
          <p><?php comment_text(); ?></p>
        </div>
      </div>
    </article>
  </li>
  <?php }
}

/*-----------------------------------------------------------------------------------*/
/*  Add column IMAGE to page manager product
/*-----------------------------------------------------------------------------------*/
    // Lấy ra ảnh thumb theo post ID để insert vào wp-admin
function ew_get_featured_image($post_ID) {
  $post_thumbnail_id = get_post_thumbnail_id($post_ID);
  if ($post_thumbnail_id) {
    $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, '');
    return $post_thumbnail_img[0];
  }
}
    // ADD NEW COLUMN IN WP-ADMIN
function ew_columns_head($defaults) {
  $defaults['featured_image'] = 'Featured Image';
  return $defaults;
}
    // SHOW THE FEATURED IMAGE
function ew_columns_content($column_name, $post_ID) {
  if ($column_name == 'featured_image') {
    $post_featured_image = ew_get_featured_image($post_ID);
    if ($post_featured_image) {
                // HAS A FEATURED IMAGE
      echo '<img style="width:80px;height:80px" src="' . $post_featured_image . '" />';
    }
    else {
                // NO FEATURED IMAGE, SHOW THE DEFAULT ONE
      echo '<img style="width:80px;height:80px" src="' . get_bloginfo( 'template_url' ) . '/images/no-thumb.png" />';
    }
  }
}
add_filter('manage_posts_columns', 'ew_columns_head');
add_action('manage_posts_custom_column', 'ew_columns_content', 10, 2);

/*-----------------------------------------------------------------------------------*/
/*  Add Item to Menu
/*-----------------------------------------------------------------------------------*/
add_filter('wp_nav_menu_items', 'ew_add_li', 10, 2);
function ew_add_li($items, $args) {
  if( $args->theme_location == 'main_menu' ){
    $items_close = '
    <li class="close-menu">
    <a class="" href="#" title="Close">
    <i class="fa fa-times-circle"></i>
    </a>
    </li>
    ';
    $items = $items_close.$items;
  }
  return $items;
}

/*-----------------------------------------------------------------------------------*/
/*  Function Add Ads to Middle Post
/*-----------------------------------------------------------------------------------*/
function eweb_do_between_entry($tmpcontent){
  add_filter('the_content', 'eweb_sidebar_to_between_entry',999);
        /*
        *giá trị index của filter là 1 số lớn hơn các filter khác trong Theme của bạn ứng với filter the_content;
        */
        function eweb_sidebar_to_between_entry($tmpcontent){
            //if (is_single() || is_page()) {
                //if (polygon_content_exist_tag('table',$tmpcontent)!=true){
          $content_block = explode('<p>',$tmpcontent);
                    $characterCount = strlen(strip_tags($tmpcontent));//Đếm số ký tự nội dung hiện có;
                    $idxBlockPutSidebar = round(count($content_block)/2);//Vị trí sẽ add nội dung;

                    //if($idxBlockPutSidebar >= 4 && $characterCount >= 3000){
                    if(!empty($content_block[$idxBlockPutSidebar])){
                      ob_start();
                      do_action('ew_between_entry');
                      $output = ob_get_contents();
                      ob_end_clean();
                      $content_block[$idxBlockPutSidebar] .=$output;
                    }
                    for($i=1;$i<count($content_block);$i++){
                      $content_block[$i] = '<p>'.$content_block[$i];
                    }
                    $tmpcontent = implode('',$content_block);
                    //}
                //}
            //}
                    return $tmpcontent;
                  }
                  function ew_sidebar_between_entry() {
                    if (is_active_sidebar('ads-middle-single')) {
                      dynamic_sidebar('ads-middle-single');
                    }
                  }
                  add_action('ew_between_entry', 'ew_sidebar_between_entry');
                }

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );