<?php
	$archive_page = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'templates/nop-don-ung-tuyen.php'
        )
    );
    $archive_id = $archive_page[0]->ID;
    $get_permalink = get_permalink( $archive_id );
?>

<div class="item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if (has_post_thumbnail()) { ?>
			<?php
				$settings = get_sub_field('settings');
			?>

	        <div class="post-image">
	        	<a href="<?php the_permalink(); ?>" title="" class="image">
		            <img src="<?php echo lth_custom_img('full', 300, 300);?>" alt="<?php the_title(); ?>">
		        </a>
	        </div>
	    <?php } ?>

	    <div class="post-content">
	    	<h3 class="post-name">
	    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a>    		
	    	</h3>

	    	<div class="post-mo-ta-tom-tat">
	    		<ul>
	    			<?php if( have_rows('mo_ta_tom_tat') ): ?>
					    <?php while( have_rows('mo_ta_tom_tat') ): the_row(); 
					        // Get sub field values.
					        $thoi_gian_lam_viec = get_sub_field('thoi_gian_lam_viec');
					        $dia_diem_phong_van = get_sub_field('dia_diem_phong_van');
					    ?>
			    			<li>
			    				<i class="icofont-clock-time" aria-hidden="true"></i>
			    				<?php echo $thoi_gian_lam_viec; ?>
			    			</li>
			    			<li>
			    				<i class="icofont-comment" aria-hidden="true"></i>
			    				<p>
				    				<?php
				    					echo __('<span>(Phỏng vấn tại)</span>');
				    					echo $dia_diem_phong_van;
				    				?>
				    			</p>
			    			</li>
	    				<?php endwhile; ?>
					<?php endif; ?>
	    		</ul>
	    	</div>

	    	<div class="post-button">
	    		<a href="<?php echo $get_permalink; ?>" title="" class="btn"><?php echo __('Ứng tuyển'); ?></a>
	    	</div>
	    </div>
	</article>
</div>