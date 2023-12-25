<?php
// code will goes here

define('MY_PATH', get_theme_file_path());

add_filter('use_block_editor_for_post', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_false' );

function my_custom_rewrite() {
    $args = array("post_type" => "property","posts_per_page" => -1);
    $posts = get_posts( $args );
        foreach($posts as $post){
            $cat = get_the_terms($post,"property_type");
          $cat_slug = $cat[0]->slug;
          $post_slug = $post->post_name;
          add_rewrite_rule('^'.$cat_slug.'/'.$post_slug.'?/','index.php/du-an/'.$cat_slug.'/'.$post_slug.'/', 'top');
       }
 }
//add_action('init', 'my_custom_rewrite');

// Load file
require get_theme_file_path( 'inc/widgets/wg-social.php' );
require get_theme_file_path( '/inc/shortcodes/ajax-filter-project.php' );
// require get_theme_file_path( '/inc/shortcodes/blogs.php' );
require get_theme_file_path('/inc/shortcodes/class-modules-theme.php');

require get_theme_file_path('/framework/widgets/investor-search.php');

// Load Custom Post Type
require get_theme_file_path() . '/inc/cpt/cpt-abstract.php';
require get_theme_file_path() . '/inc/cpt/du-an.php';
require get_theme_file_path() . '/inc/cpt/cpt.php';
	
// Load Custom Taxonomy
require get_theme_file_path() . '/inc/taxonomies/custom-taxonomy-abstract.php';
require get_theme_file_path() . '/inc/taxonomies/du-an-cat.php';
require get_theme_file_path() . '/inc/taxonomies/custom-taxonomy.php';

// Load Lib
// add_action('wp_enqueue_scripts', 'custom_child_theme_scripts');
function custom_child_theme_scripts() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/lib/js/custom-child.js'  );

    // wp_enqueue_script( 'select2-js', get_stylesheet_directory_uri() . '/lib/js/select2.min.js'  );
    // wp_enqueue_style( 'select2-css', get_stylesheet_directory_uri() . '/lib/css/select2.min.css'  );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// Redirect Archive

function useParentCategoryTemplateProject() {
    if ( is_category() && !is_feed()  ) {
        if (is_category(get_cat_id('Tin tức')) || cat_is_ancestor_of(get_cat_id('Tin tức'), get_query_var('cat')) ) {
            load_template(TEMPLATEPATH . '/archive-post.php');
            exit;
        }
    }
}
// add_action('template_redirect', 'useParentCategoryTemplateProject');

// Sidebar
function shtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Chủ đầu tư', 'shtheme' ),
		'id'            => 'invertor-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'shtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
// add_action( 'widgets_init', 'shtheme_widgets_init' );

/**
 * Display Pagination
**/
if ( ! function_exists( 'gcotheme_pagination' ) ) {
    function gcotheme_pagination() {
        global $wp_query;
        $big = 999999999;
        echo '<div class="page_nav">';
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
        ) );
        echo '</div>';
    }
}

// Viewed Project

// add_action('init', 'my_custom_rewrite'); 
// function my_custom_rewrite() {

//     add_permastruct('du-an', '/%customname%/', false);
//  }

// add_filter( 'post_type_link', 'my_custom_permalinks', 10, 2 );
// function my_custom_permalinks( $permalink, $post ) {
//       return str_replace( '%customname%/', $post->post_name, $permalink );
// }


// Custom permalink

add_filter( 'register_post_type_args', 'wp_register_post_type_args', 10, 2 );
function wp_register_post_type_args( $args, $post_type ) {

    if ( 'property' === $post_type ) {
        $args['rewrite']['slug'] = 'bat-dong-san';
    }

    return $args;
}

// Supper admin
/**
 * Hide Menu Page If User Not TP
**/
function remove_menus() {
	global $current_user;
	$username = $current_user->user_login;
	if( ( $username != 'TP' ) && ( $username != 'healer' ) ) {
		remove_menu_page( 'plugins.php' );
	 	// remove_menu_page( 'tools.php' );
	 	remove_menu_page( 'options-general.php' );
	 	remove_menu_page( 'edit-comments.php' );
	 	remove_menu_page( 'edit.php?post_type=acf-field-group' );
    	remove_menu_page( 'wpcf7' );
        remove_menu_page( 'elementor' );
        remove_menu_page( 'users.php' );
        remove_menu_page( 'loco' );
        remove_menu_page( 'contact_vr' );
        remove_menu_page( 'facebook-messenger-customer-chat' );
        remove_menu_page( 'houzez_options' );
        remove_menu_page( 'houzez_plugins' );
	}
}
add_action( 'admin_menu', 'remove_menus', 999 );

function remove_unnecessary_wordpress_menus(){
	global $current_user, $submenu;
	$username = $current_user->user_login;
	if ( ( $username != 'TP' ) && ( $username != 'healer' ) ) {
		unset($submenu['index.php'][10]);
	    unset($submenu['themes.php'][5]);
	    unset($submenu['themes.php'][20]);
	    unset($submenu['themes.php'][22]);
	}
}
add_action('admin_menu', 'remove_unnecessary_wordpress_menus', 999);