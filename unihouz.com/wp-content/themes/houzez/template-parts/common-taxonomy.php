<?php
global $post, $taxonomy_name, $listing_view, $houzez_local,$search_style;
// Title
$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$taxonomy_title = $current_term->name;
$taxonomy_name = get_query_var( 'taxonomy' );

$is_sticky = '';
$sticky_sidebar = houzez_option('sticky_sidebar');
if( $sticky_sidebar['property_listings'] != 0 ) { 
    $is_sticky = 'houzez_sticky'; 
}

$listing_view = houzez_option('halfmap_posts_layout', 'list-view-v1');
//$taxonomy_layout = houzez_option('taxonomy_layout');

$have_switcher = true;

$wrap_class = $item_layout = $view_class = $cols_in_row = '';
if($listing_view == 'list-view-v1') {
    $wrap_class = 'listing-v1';
    $item_layout = 'v1';
    $view_class = 'list-view';

} elseif($listing_view == 'grid-view-v1') {
    $wrap_class = 'listing-v1';
    $item_layout = 'v1';
    $view_class = 'grid-view';

} elseif($listing_view == 'list-view-v2') {
    $wrap_class = 'listing-v2';
    $item_layout = 'v2';
    $view_class = 'list-view';

} elseif($listing_view == 'grid-view-v2') {
    $wrap_class = 'listing-v2';
    $item_layout = 'v2';
    $view_class = 'grid-view';

} elseif($listing_view == 'grid-view-v3') {
    $wrap_class = 'listing-v3';
    $item_layout = 'v3';
    $view_class = 'grid-view';
    $have_switcher = false;

} elseif($listing_view == 'grid-view-v4') {
    $wrap_class = 'listing-v4';
    $item_layout = 'v4';
    $view_class = 'grid-view';
    $have_switcher = false;

} elseif($listing_view == 'list-view-v5') {
    $wrap_class = 'listing-v5';
    $item_layout = 'v5';
    $view_class = 'list-view';

} elseif($listing_view == 'grid-view-v5') {
    $wrap_class = 'listing-v5';
    $item_layout = 'v5';
    $view_class = 'grid-view';

} elseif($listing_view == 'grid-view-v6') {
    $wrap_class = 'listing-v6';
    $item_layout = 'v6';
    $view_class = 'grid-view';
    $have_switcher = false;

}


$taxonomy_content_position = houzez_option('taxonomy_content_position', 'above');

$sort_args = array('post_status' => 'publish');
$sort_args = houzez_prop_sort($sort_args);
global $wp_query;
$args = array_merge( $wp_query->query_vars, $sort_args );

$wp_query = new WP_Query( $args );

$total_listing_found = $wp_query->found_posts;
$property_label = houzez_option('cl_property', 'Property');
if( $total_listing_found > 1 ) {
   $property_label = houzez_option('cl_properties', 'Properties'); 
}
?>
<?php 
$enable_search = houzez_option('enable_halfmap_search', 1);
$search_style = houzez_option('halfmap_search_layout', 'v4');
if( isset($_GET['halfmap_search']) && $_GET['halfmap_search'] != '' ) {
    $search_style = $_GET['halfmap_search'];
}

if( wp_is_mobile() ) {
    $search_style = 'v1';
}

if($enable_search != 0 && $search_style != 'v4') {
    // get_template_part('template-parts/search/search-half-map-header');
}
?>
<section class="half-map-wrap map-on-left clearfix">
    <div id="map-view-wrap" class="half-map-left-wrap">
        <div class="map-wrap">
            <?php get_template_part('template-parts/map-buttons'); ?>
            
            <div id="houzez-properties-map"></div> 

            <?php if(houzez_get_map_system() == 'google') { ?>
            <div id="houzez-map-loading" class="houzez-map-loading">
                <div class="mapPlaceholder">
                    <div class="loader-ripple spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    <div id="half-map-listing-area" class="half-map-right-wrap <?php echo esc_attr($wrap_class); ?>">
        <?php 
        if($enable_search != 0) {
            get_template_part('template-parts/search/search-half-map');
        }
        ?>
        <div class="page-title-wrap">
            <div class="d-flex align-items-center">
                <div class="page-title flex-grow-1">
                    <!-- <span><?php echo esc_attr($total_properties); ?></span> <?php esc_html_e('Results Found', 'houzez');?> -->
                    <h1><?php echo esc_html($taxonomy_title); ?></h1>
                </div>

                <?php get_template_part('template-parts/listing/listing-sort-by'); ?>  
                <?php 
                if($have_switcher) {
                    get_template_part('template-parts/listing/listing-switch-view'); 
                }?> 
            </div>  
        </div>

        <div class="listing-view <?php echo esc_attr($view_class); ?>" data-layout="<?php echo esc_attr($item_layout); ?>">
            <?php
            if ( $taxonomy_content_position !== '1' ) {
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <article <?php post_class(); ?>>
                            <?php //the_content(); ?>
                        </article>
                        <?php
                    }
                } 
            }?>
            <div id="houzez_ajax_container">
                <div class="card-deck">
                <?php
                if ( $wp_query->have_posts() ) :
                    while ( $wp_query->have_posts() ) : $wp_query->the_post();

                        get_template_part('template-parts/listing/item', $item_layout);

                    endwhile;
                else:
                    
                    echo '<div class="search-no-results-found">';
                        esc_html_e('No results found', 'houzez');
                    echo '</div>';
                    
                endif;
                wp_reset_postdata();
                ?> 
                </div>
                <div class="clearfix"></div>

                <?php houzez_ajax_pagination( $wp_query->max_num_pages ); ?>
            </div>

            <?php
            if ('1' === $taxonomy_content_position ) {
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <section class="content-wrap">
                            <?php //the_content(); ?>
                        </section>
                        <?php
                    }
                }
            }
            ?>
            
        </div><!-- listing-view -->

    </div>
</section>

<!-- listing-wrap -->
