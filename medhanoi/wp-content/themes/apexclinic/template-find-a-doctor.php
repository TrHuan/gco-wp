<?php
/*
 Template Name: Find a Doctor
 */
 ?>

 <?php get_header(); ?>
 <?php
if(isset($_REQUEST['btnsubmit'])){
  	$taskOption = $_POST['taskoption'];
  	$doctor = $_POST['doctor'];
 }else {
	$taskOption = "";
  	$doctor = "";
 }
?>

<!-- wraper_doctor_finder -->
<div class="wraper_doctor_finder">
    <div class="container">
        <!-- doctor_finder -->
        <div class="row doctor_finder">
	        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	            <!-- doctor_finder_sidebar -->
        		<div class="doctor_finder_sidebar">
        		    <!-- doctor-finder-search -->
        			<div class="doctor-finder-search">
        			    <h3><?php echo esc_html__('Find the Perfect Doctor', 'apexclinic');?></h3>
        			    <hr>
            			<!-- doctor-finder-search-form -->
            			<div class="doctor-finder-search-form">
            			    <form method="post" id="mycontactform">
        			        <div class="form-row">
        			            <label><?php echo esc_html__('Doctor Name', 'apexclinic');?><span>*</span></label>
                                <select name="doctor">
                                <?php
                                echo '<option value="">' . esc_html__('Search by Name', 'apexclinic') . '</option>';
                                if(""!=$doctor){
                                echo '<option value="' . $doctor . '" selected="selected">'.$doctor.'</option>';
                                }
                                $args = array(
                                    'post_type' => 'team',
                                    'posts_per_page' => -1,
                                    'orderby'   => 'title',
                                );
                                query_posts($args);
                                while ( have_posts() ) : the_post();
                                echo '<option value="' . get_the_title() . '">'.get_the_title().'</option>';
                                endwhile; // end of the loop. ?>
                                </select>
        			        </div>
        			        <div class="form-row">
        			            <label><?php echo esc_html__('Search by Specialization', 'apexclinic');?><span>*</span></label>
                                <select name="taskoption">
                                <?php
                                echo '<option value="">' . esc_html__('Search by Specialization', 'apexclinic') . '</option>';
                                if(""!=$taskOption){
                                $task = get_term_by('slug', $taskOption, 'profession');
                                $task_name = $task->name;
                                echo '<option value="' . $taskOption . '" selected="selected">'.$task_name.'</option>';
                                }
                                $args = array(
                                    'taxonomy' => 'profession',
                                );
                                $terms = get_terms('profession', $args);
                                if (count($terms) > 0) {
                                foreach ($terms as $term) {
                                echo '<option value="' . $term->slug . '">'.$term->name.'</option>';
                                }
                                }; ?>
                                </select>
    			            </div>
    			            <div class="form-row">
    			                <input type="submit" value="<?php echo esc_attr__('Continue', 'apexclinic');?>" name="btnsubmit">
			                </div>
            			    </form>
            			</div>
            			<!-- doctor-finder-search-form -->
        			</div>
        			<!-- doctor-finder-search -->
    			</div>
                <!-- doctor-finder-search -->
                <!-- widget-area -->
                <div class="widget-area">
                    <?php dynamic_sidebar( 'apexclinic-general-sidebar' ); ?>
                </div>
                <!-- widget-area -->
	        </div>
	        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	            <!-- doctor_finder_content -->
	            <div class="doctor_finder_content">
	                 <?php wp_reset_query(); the_content();?>
	            </div>
	            <!-- doctor_finder_content -->
	            <!-- doctor_finder_listing -->
	            <div class="doctor_finder_listing">
                    <?php
                    if ($taskOption && ''==$doctor) {
                    $args = array(
                        'post_type' => 'team',
                        'orderby' => 'rand',
                        'posts_per_page' =>-1,
                        'post_status' => 'publish',
                        'order' => 'ASC',
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'profession',
                                'field' => 'slug',
                                'terms' => $taskOption
                            )
                        )
                    );
                    $my_query = new WP_Query( $args );
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                        <!-- doctor_finder_listing_box -->
                        <div class="doctor_finder_listing_box">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="pic">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank/blank-image-100x107.png" alt="<?php echo esc_attr__( 'Blank Image', 'apexclinic' ) ?>" width="100" height="107">
                                        <a class="pic-main" href="<?php the_permalink()?>" style="background-image:url(<?php echo esc_url($featured_img_url); ?>);"></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="data">
                                        <h4><?php the_title();?></h4>
                                        <?php the_excerpt(); ?>
                                        <h6><?php echo esc_html( get_post_meta( get_the_ID(), 'qualification', true ) ); ?></h6>
                                        <a class="btn view-profile" href="<?php the_permalink()?>">View Profile</a>
                                        <a class="btn book-appointment" href="#" data-toggle="modal" data-target="#BookAppointment"><?php echo esc_html__( 'Book an Appointment', 'apexclinic' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- doctor_finder_listing_box -->
                    <?php endwhile;
                    }
                    }elseif ($doctor) {
                    $team_post = get_page_by_title( $doctor, OBJECT, 'team' );
	                $featured_img_url = get_the_post_thumbnail_url($team_post->ID,'full');
                    ?>
                        <!-- doctor_finder_listing_box -->
                        <div class="doctor_finder_listing_box">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="pic">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank/blank-image-100x107.png" alt="<?php echo esc_attr__( 'Blank Image', 'apexclinic' ) ?>" width="100" height="107">
                                        <a class="pic-main" href="<?php the_permalink()?>" style="background-image:url(<?php echo esc_url($featured_img_url); ?>);"></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="data">
                                        <h4><?php echo esc_attr($doctor) ;?></h4>
                                        <?php echo esc_attr($team_post->post_excerpt); ?>
				<h6><?php echo esc_html( get_post_meta( $team_post->ID, 'qualification', true ) ); ?></h6>
                                        <a class="btn view-profile" href="<?php the_permalink($team_post->ID)?>">View Profile</a>
                                        <a class="btn book-appointment" href="#" data-toggle="modal" data-target="#BookAppointment"><?php echo esc_html__( 'Book an Appointment', 'apexclinic' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- doctor_finder_listing_box -->
                    <?php
                    }else {
                    	$args = array(
                			'post_type' => 'team',
                			'orderby' => 'title',
                			'posts_per_page' =>-1,
                			'post_status' => 'publish',
                			'order' => 'ASC',
                    );
                    $my_query = new WP_Query( $args );
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                        <!-- doctor_finder_listing_box -->
                        <div class="doctor_finder_listing_box">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="pic">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank/blank-image-100x107.png" alt="<?php echo esc_attr__( 'Blank Image', 'apexclinic' ) ?>" width="100" height="107">
                                        <a class="pic-main" href="<?php the_permalink()?>" style="background-image:url(<?php echo esc_url($featured_img_url); ?>);"></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="data">
                                        <h4><?php the_title();?></h4>
                                        <?php the_excerpt(); ?>
                                        <h6><?php echo esc_html( get_post_meta( get_the_ID(), 'qualification', true ) ); ?></h6>
                                        <a class="btn view-profile" href="<?php the_permalink()?>">View Profile</a>
                                        <a class="btn book-appointment" href="#" data-toggle="modal" data-target="#BookAppointment"><?php echo esc_html__( 'Book an Appointment', 'apexclinic' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- doctor_finder_listing_box -->
                    <?php endwhile;
                    }
                    }
                    ?>
                </div>
                <!-- doctor_finder_listing -->
            </div>
        </div>
        <!-- doctor_finder -->
    </div>
</div>
<!-- wraper_doctor_finder -->

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

<?php get_footer(); ?>
