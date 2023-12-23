<?php
/**
 * Template Style Eight for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="doctor_finder_listing">';
 $output .= '<!-- doctor_finder_listing_box -->';
                        $output .= '<div class="doctor_finder_listing_box">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="pic">';
                                    $output .= '<img src="' . esc_url( get_template_directory_uri() ).'/images/blank/blank-image-100x107.png" alt="'.esc_attr__( 'Blank Image', 'apexclinic' ).'" width="100" height="107">';
                                        
                                        
              if ( 'yes' === $shortcode['team_enable_link'] ) {
                $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
            } else {
                $output .= '<div class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
            }                          



                                    $output .='</div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="data">';
                                    $output .= '<h4>' . get_the_title() . '</h4>';
                                       
                                        $output .= get_the_excerpt();
                                        $output .='<h6>'. esc_html( get_post_meta( get_the_ID(), 'qualification', true ) ).'</h6>';
                                        $output .='<a class="btn view-profile" href="'.get_the_permalink().'">
                                        '.esc_attr__( 'View Profile', 'apexclinic' ).'</a>';
                                        $output .='<a class="btn book-appointment" href="#" data-toggle="modal" data-target="#BookAppointment">'. esc_html__( 'Book an Appointment', 'apexclinic' ).'</a>';
                               $output .= '</div>';
                               $output .= '</div>';
                           $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<!-- doctor_finder_listing_box -->';
$output .= '</div>';                    

$output .= '<!-- team-item -->' . "\r";
?>
<!-- Book Appointment Modal -->
<div class="modal fade" id="BookAppointment" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title"><?php echo esc_html__( 'Book an Appointment', 'apexclinic' ); ?></h4>
            </div>
            <div class="modal-body">
                <!-- radiantthemes-appointment-window -->
                <div class="radiantthemes-appointment-window">
                    <?php echo do_shortcode( '[ea_bootstrap scroll_off="true"]' ); ?>
                </div>
                <!-- radiantthemes-appointment-window -->
            </div>
        </div>
    </div>
</div>
<!-- Book Appointment Modal -->

