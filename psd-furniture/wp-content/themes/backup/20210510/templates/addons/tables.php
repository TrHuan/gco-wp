<?php
/**
 * Template Name: Addon Tables
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $id = get_sub_field('id');
    if ($id) {
    	$id = 'lth-' . $id;
    }

    $class = get_sub_field('class');
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-tables <?php echo $cl; ?> <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            	<div class="tables-box">
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


					<div class="content-box">
						<?php if( have_rows('tables') ): ?>
						    <?php while( have_rows('tables') ): the_row(); ?>

						    	<?php if (get_sub_field('content')) { ?>
						    		<?php
						    			$wd = 'calc(100% - ' . get_sub_field('width_table') . 'px)';
						    		?>

						    		<div class="content" style="width: <?php if (get_sub_field('width_table')) { echo $wd; } else { echo '100%'; } ?>">
						    			<?php the_sub_field('content'); ?>
						    		</div>
						    	<?php } ?>

								<div style="width: <?php if (get_sub_field('width_table')) {the_sub_field('width_table'); echo ('px'); } else { echo '100%'; } ?>" class="table">

									<table style="width: <?php if (get_sub_field('width_table')) {the_sub_field('width_table'); echo ('px'); } else { echo '100%'; } ?>">

										<?php if( have_rows('rows') ): $i; ?>
										    <?php while( have_rows('rows') ): the_row(); $i++; ?>

												<tr>

											    	<?php if( have_rows('columns') ): $j; ?>
											    		<?php while( have_rows('columns') ): the_row(); $j++; ?>

												    		<?php if ($i == 1) { ?>
												    			<th><?php the_sub_field('text'); ?></th>
												    		<?php } else { ?>
																<td><?php the_sub_field('text'); ?></td>
												    		<?php } ?>

											    		<?php endwhile; ?>
													<?php endif; ?>	

												</tr>

										    <?php endwhile; ?>
										<?php endif; ?>	

									</table>

								</div>

						    <?php endwhile; ?>
						<?php endif; ?>	
					</div>	

            	</div>
            </div>
        </div>
	</div>
</article>