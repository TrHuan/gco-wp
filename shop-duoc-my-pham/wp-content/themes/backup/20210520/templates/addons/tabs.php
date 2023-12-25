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
    if ($id) {
    	$id = 'lth-' . $id;
    }

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

				<?php while( have_rows('tabs') ): the_row(); $j++; ?>

		            <div class="tab-content-box">
	            		<?php
							$title = get_sub_field('title');
							$description = get_sub_field('description');

							if ($title || $description) {
						?>
							<div class="title-box d-none">
								<?php if ($title) { ?>
									<h3 class="title"><?php echo $title; ?></h3>
								<?php }?>
								<?php if ($description) { ?>
									<p><?php echo $description; ?></p>
								<?php }?>
							</div>
						<?php } ?>

		            	<div class="tab-panel tab-panel-<?php echo $j; if ($j == '1') { ?> active <?php } ?>">

					    	<?php if( have_rows('tab') ): ?>

				                <?php while( have_rows('tab') ): the_row(); ?>

				                    
					                <?php get_template_part('templates/addons/main', ''); ?>

				                <?php endwhile; ?>

				        	<?php endif; ?>

				        </div>

			        </div>

		    	<?php endwhile; ?>

			</div>

        <?php endif; ?>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
		    $('.tabs-box-<?php echo $rand; ?> .title').click(function(){
		        var hs = $(this).hasClass('active');
		        var ac = $(this).attr('data_number');

		        if (!hs) {
		            $('.tabs-box-<?php echo $rand; ?> .title').removeClass('active');
		            $(this).addClass('active');
		            $('.tabs-box-<?php echo $rand; ?> .tab-panel').removeClass('active');
		            $('.tabs-box-<?php echo $rand; ?> .tab-panel-' + ac).addClass('active');
		        }
		    });

		    $('.tabs-box-<?php echo $rand; ?> .tab-content-box .title').click(function(){
		        var hs = $(this).parent().next().hasClass('active');

		        if (!hs) {
		            $('.tabs-box-<?php echo $rand; ?> .tab-panel').removeClass('active');
		            $(this).parent().next().addClass('active');
		        }
		    });
		});
	</script>
</article>