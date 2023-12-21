<?php 
/**
Template Name: Homepage
*/
get_header();
?>

<?php global $vz_options;?>
<section id="field_activity">
  	<div class="background-overlay">
		<?php if( have_rows('main_activity') ): ?>
		   <div class="row content-field_activity">
		    <?php $i=1;while( have_rows('main_activity') ): the_row(); 
		        $image_field_activity = get_sub_field('image_field_activity');
		        $name_field_activity = get_sub_field('name_field_activity');
		        $link_field_activity = get_sub_field('link_field_activity');
		        ?>
		        <?php if ($i==2): ?>
		        	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 items-field_activity">
		                <div class="box-field_activity">
	                        <img class="img-box-fiels"  src="<?php echo $image_field_activity['url'];?>" alt="Image <?php //echo $name_field_activity;?>"/>
	                        <div class="infor-field_activity">
	                            <h3>
	                            	<a href="<?php echo $link_field_activity;?>" class="name-field_activity">
	                            		<?php echo $name_field_activity;?>
	                            	</a>
	                            </h3>
	                        </div>
		                </div>
		            </div>
		        	<?php else: ?>
		        	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 items-field_activity">
		                <div class="box-field_activity">
		                    <img class="img-box-fiels img-box-fiels1" src="<?php echo $image_field_activity['url'];?>" alt="Image <?php //echo $name_field_activity;?>"/>
	                        <div class="infor-field_activity">
	                            <h3>
	                            	<a href="<?php echo $link_field_activity;?>" class="name-field_activity">
	                            		<?php echo $name_field_activity;?>
	                            	</a>
	                            </h3>
	                        </div>
		                </div>
		            </div>
		        <?php endif ?>
		    <?php $i++;endwhile; ?>
		   </div>
		<?php endif; ?>
    </div>
</section>
<div class="clearfix"></div>

<?php get_template_part('sections/specia','videos'); ?>

<?php get_template_part('sections/specia','contact'); ?>

<?php get_template_part('sections/specia','partner'); ?>

<?php get_footer();?>
