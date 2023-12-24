<?php
    $header_top = get_field('header_top', 'option');

	$color = $header_top['color'];
	$bg_color = $header_top['background_color'];

?>
<style type="text/css">
	.header-top {
		background-color: <?php echo $bg_color; ?>;
		color:  <?php echo $color; ?>;
	}

	.header-top a {
		color:  <?php echo $color; ?>;
	}
</style>

<div class="header-top">  
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="header-top-box">
					<div class="groups-box">

						<?php if( have_rows('top_box', 'option') ): ?> 
    						<?php while( have_rows('top_box', 'option') ): the_row(); ?>
    							<div class="item">
	    							<?php if( have_rows('items', 'option') ): ?> 
	    								<ul class="groups-box">
				    						<?php while( have_rows('items', 'option') ): the_row(); ?>
				    							<?php
							            			$item = get_sub_field('item');
							            			$url = get_sub_field('url');
							            		?>

							            		<li>
								            		<?php if ($url) { ?>
									            		<a href="<?php echo $url; ?>">
									            	<?php } else { ?>
									            		<span>
									            	<?php } ?>
									            			<?php echo $item; ?>
									            	<?php if ($url) { ?>
									            		</a>
									            	<?php } else { ?>
									            		</span>
									            	<?php } ?>
									            </li>
							            	<?php endwhile; ?>
					    				</ul>
			    					<?php endif; ?>
			            		</div>
			            	<?php endwhile; ?>
    					<?php endif; ?>

					</div>
				</div>
            </div>
        </div>
    </div>
</div>	