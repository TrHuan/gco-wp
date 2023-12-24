<?php
/**
* Template Name: Addon Customs Menu
* 
* @author LTH
* @since 2020
*/
?>

<?php
	$id = get_sub_field('id');
	// if ($id) {
	// 	$id = 'lth-' . $id;
	// }

	$clas = get_sub_field('class');

	$style = get_sub_field('styles');

	$class = $clas . ' ' . $style;
?>

<article <?php if ($id) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-customs-menus <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">           
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="customs-menus-box">
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

					<?php if( have_rows('content') ): ?>
						<div class="content-box">
							<ul>
								<?php $i; ?>
								<?php while( have_rows('content') ): the_row(); ?>
						    		<?php
						    			$i++;
						    			$item = get_sub_field('item');
						    			$url = get_sub_field('url');
						    		?>

									<li>
										<a class="<?php if($i == '1') {echo 'first active';} ?>" href="<?php if ($url) { echo $url; } else {echo 'javascript:0';} ?>" title="<?php echo $item; ?>"><?php echo $item; ?></a>
									</li>
				    			<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?> 
				</div>
			</div>
		</div>
	</div>
</article>