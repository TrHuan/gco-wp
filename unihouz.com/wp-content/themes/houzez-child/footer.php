</main><!-- .main-wrap start in header.php-->

<?php 
if( ! houzez_is_half_map() && ! houzez_is_splash() ) {
	if(houzez_is_dashboard()) { 
		get_template_part('template-parts/dashboard/dashboard-footer'); 
	} else {
		
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
			get_template_part('template-parts/footer/main'); 
		}

		get_template_part('template-parts/listing/compare-properties'); 
	}
}

if( houzez_is_half_map() ) {
	get_template_part('template-parts/listing/compare-properties');
	get_template_part('template-parts/listing/partials/mobile-map-switch');
}

if( wp_is_mobile() ) {
	get_template_part('template-parts/search/mobile-search'); 
}

if( !houzez_is_login_page() ) { 
	get_template_part('template-parts/login-register/modal-login-register'); 
}
get_template_part('template-parts/login-register/modal-reset-password-form'); 

get_template_part('template-parts/listing/listing-lightbox'); 

if(is_singular('property')) {
	get_template_part( 'property-details/mobile-property-contact');
	get_template_part( 'property-details/lightbox');
}

if( ( is_singular('houzez_agency') && houzez_option('agency_form_agency_page', 1) ) || ( is_singular('houzez_agent') && houzez_option('agent_form_agent_page', 1) ) ) {
    get_template_part('template-parts/realtors/contact', 'form'); 
}

if(houzez_is_dashboard()) { 
	if( isset($_GET['hpage']) && $_GET['hpage'] == 'leads' ) {
		get_template_part('template-parts/dashboard/board/leads/new-lead-panel');

	} elseif( isset($_GET['hpage']) && $_GET['hpage'] == 'deals' ) {
		get_template_part('template-parts/dashboard/board/deals/new-deal-panel');

	} elseif( (isset($_GET['hpage']) && $_GET['hpage'] == 'enquiries') || (isset($_GET['hpage']) && ($_GET['hpage'] == 'lead-detail' && $_GET['tab']== 'enquires'))  ) {
		get_template_part('template-parts/dashboard/board/enquires/add-new-enquiry');
	}
}
?>

<!-- Modal -->
<div class="sidebar-modalContact">
    <div class="container">
        <div class="modal fade" id="sidebarModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-md-6 col-12 items">
                            <div class="modalContact-content">
                                <div class="item-listing-wrap hz-item-gallery-js card">
                                    <div class="item--wrap item-wrap-v2 item-wrap-no-frame h-100">
                                        <div class="align-items-center h-100">
                                            <div class="item-header">
                                                
                                                
                                                <div class="listing-image-wrap">
                                                    <div class="listing-thumb">
                                                        <a href="<?php the_permalink() ?>" class="listing-featured-thumb hover-effect">
                                                            <?php echo get_the_post_thumbnail( get_the_id(), 'large', array( 'class' =>'img-fluid wp-post-image', 'alt' => 'Dự án') ); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="preview_loader"></div>
                                            </div>
                                            <div class="item-body flex-grow-1">
                                                <h2 class="item-title">
                                                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                                </h2> 
                                                

                                                <ul class="item-amenities item-amenities-with-icons project-custom">
                                                    <?php if (get_field('project_location')) { ?>
                                                        <div class="custom-property">
                                                            <div class="custom-area">
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/location.png" >
                                                            </div>
                                                            <div class="property-items"><?php echo get_field('project_location'); ?></div>
                                                        </div>
                                                        
                                                    <?php } ?>
                                                    
                                                    <?php if (get_field('project_area')) { ?>
                                                        <div class="custom-property area">
                                                            <div class="custom-area">
                                                                <i class="houzez-icon icon-ruler-triangle mr-1"></i>
                                                                <span class="area-label"> <?php esc_html_e('Diện tích:', 'houzez') ?> </span>
                                                            </div>
                                                            <div class="property-items"><?php echo get_field('project_area'); ?> </div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (get_field('project_type')) { ?>
                                                        <div class="custom-property">
                                                            <div class="custom-area">
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/bds.png">
                                                                <span class="area-label"> <?php esc_html_e('Loại hình:', 'houzez') ?></span>
                                                            </div>
                                                            <div class="property-items"><?php echo get_field('project_type'); ?> </div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (get_field('project_price')) { ?>
                                                        <div class="custom-property">
                                                            <div class="custom-area">
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                                                <span class="area-label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                                            </div>
                                                            <div class="property-items price-item"><?php echo get_field('project_price'); ?></div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="custom-property">
                                                            <div class="custom-area">
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/price.png">
                                                                <span class="area-label"> <?php esc_html_e('Giá:', 'houzez') ?></span>
                                                            </div>
                                                            <div class="property-items price-item"><?php esc_html_e('Đang cập nhật', 'houzez') ?></div>
                                                        </div>
                                                    <?php } ?>
                                                </ul> 

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 items">
                            <div class="modalContact-form">
                                <div class="modal-header">
                                    <h4 class="modal-title">Yêu cầu thông tin</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <?php echo do_shortcode('[contact-form-7 id="18857" title="Liên hệ chi tiết dự án"]') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php wp_footer(); ?>


<script>
    jQuery(document).ready(function(){
        /* Slick Slider
        ---------------------------------------------------------------*/
        if ( jQuery().slick ) {
            var slick = jQuery(".slick-carousel");
            slick.each(function(){
                var item        = jQuery(this).data('item'),
                    item_lg     = jQuery(this).data('item_lg'),
                    item_md     = jQuery(this).data('item_md'),
                    item_sm     = jQuery(this).data('item_sm'),
                    item_mb     = jQuery(this).data('item_mb'),
                    row         = jQuery(this).data('row'),
                    arrows      = jQuery(this).data('arrows'),
                    dots        = jQuery(this).data('dots'),
                    vertical    = jQuery(this).data('vertical');
                jQuery(this).slick({
                    autoplay: true,
                    dots: dots,
                    arrows: arrows,
                    infinite: false,
                    autoplaySpeed: 3000,
                    vertical: vertical,
                    slidesToShow: item,
                    slidesToScroll: 1,
                    variableWidth: true,
                    lazyLoad: 'ondemand',
                    // verticalSwiping: true,
                    rows: row,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: item_lg,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: item_md,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: item_sm,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: item_mb,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                });
            });
        };

    });
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/js/jquery.ui.touch-punch.min.js"></script>

</body>
</html>
