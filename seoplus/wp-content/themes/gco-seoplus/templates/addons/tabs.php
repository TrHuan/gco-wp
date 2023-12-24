<?php
/**
 * Template Name: Addon Posts
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $rands = rand();
    $rand = $rands;

    $id = get_sub_field('id');
    // if ($id) {
    // 	$id = 'lth-' . $id;
    // }

    $class = get_sub_field('class');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-tabs <?php echo $class; ?>">
	<div class="tabs-box tabs-box-<?php echo $rand; ?>">		
		<div class="container">       		
	        <div class="row">
	            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<?php
						$title = get_sub_field('title');
						$description = get_sub_field('description');

						if ($title || $description) {
					?>
						<div class="title-box">
							<?php if ($title) { ?>
								<h3 class="title"><?php echo $title; ?></h3>
							<?php }?>
							<?php if ($description) { ?>
								<p><?php echo $description; ?></p>
							<?php }?>
						</div>
					<?php } ?>

				    <?php if( have_rows('tabs') ): $i; ?>

			        	<div class="title-tab">
			                <ul class="title-box">
				        		<?php while( have_rows('tabs') ): the_row(); $i++; ?>

				                	<?php
				                        $title = get_sub_field('title');
				                    ?>

				                    <li>
				                        <a class="title tab-title-<?php echo $i; if ($i == '1') { ?> active <?php } ?>" href="javascript:0" data_number="<?php echo $i; ?>">
				                            <span class="text"><?php echo $title; ?></span>
				                        </a>
				                    </li>
			            		<?php endwhile; ?>
			                </ul>
			            </div>

			        <?php endif; ?>
			    </div>
			</div>
		</div>

        <?php if( have_rows('tabs') ): $j; ?>

			<div class="tab-content">		
				<div class="container">       		
			        <div class="row">
			            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="panel-group" id="accordion_boxtab" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
								<?php while( have_rows('tabs') ): the_row(); $j++; ?>
						
											<div class="panel-heading" role="tab" id="heading_<?php echo $j;?>">
											<?php
												$title = get_sub_field('title');
												$description = get_sub_field('description');

												if ($title || $description) {
											?>
												<h3 class="panel-title">
													<?php if ($title) { ?>
														<a role="button" data-toggle="collapse" data-parent="#accordion_boxtab" href="#collapse_<?php echo $j;?>" aria-expanded="true" aria-controls="collapse_<?php echo $j;?>"><?php echo $title; ?></a>
													<?php }?>
													<?php if ($description) { ?>
														<p><?php echo $description; ?></p>
													<?php }?>
												</h3>
											<?php } ?>
											</div>
											<div id="collapse_<?php echo $j;?>" class="panel-collapse collapse tab-collapse-<?php echo $j; if ($j == '1') { ?> in <?php } ?>" role="tabpanel" aria-labelledby="heading_<?php echo $j;?>">
											  <div class="panel-body">
												<?php if( have_rows('tab') ): ?>

												<?php while( have_rows('tab') ): the_row(); ?>
													<?php get_template_part('templates/addons/main', ''); ?>

													<?php endwhile; ?>

												<?php endif; ?>
												</div>
											</div>

								<?php endwhile; ?>
								</div>
							</div>
						</div>
					</div>
		        </div>
			</div>

        <?php endif; ?>
	</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css" media="screen">
.collapse {
	display: none;
}
	.collapse.in {
	display: block;
}
</style>
</article>