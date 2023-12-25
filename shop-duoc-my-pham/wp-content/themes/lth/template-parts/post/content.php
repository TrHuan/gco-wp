<div class="item">
	<article class="post-box">

		<?php if (has_post_thumbnail()) { ?>
	        <div class="post-image">
	        	<a href="<?php the_permalink(); ?>" title="" class="image">
		            <img src="<?php echo lth_custom_img('full', 404, 228);?>" width="404" height="228" alt="<?php the_title(); ?>">
		        </a>

	            <div class="post-cat">
	            	<?php $i = 0;
				        $terms = get_the_terms( $post->ID, 'category' );
			 
						if ( $terms && ! is_wp_error( $terms ) ) :
						 
						    foreach ( $terms as $term ) { $i++;
							    if ($i == 1) { ?>

							        <a href="<?php echo get_term_link($term, 'category'); ?>" title="<?php echo $cat = $term->name;; ?>"><?php echo $cat = $term->name;; ?></a>

							    <?php }
							}

						endif; 
					?>
	            </div>
	        </div>
	    <?php } ?>

	    <div class="post-content">
	    	<ul class="post-meta">
			    <li>
			        <?php echo __('Posted'); ?> <?php the_time('d m Y'); ?>
			    </li>

			    <li>
			        <?php echo __('0 lượt xem'); ?>
			    </li>
	    	</ul>	    

	    	<h3 class="post-name">
	    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		    		<?php the_title(); ?>
		    	</a>    		
	    	</h3>

		    <div class="post-excerpt">
		    	<?php the_excerpt(); ?>		    	
		    </div>
	    </div>
	</article>
</div>