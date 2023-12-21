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

	    	<ul class="post-meta">
			    <li>
			        <?php echo __('Posted'); ?> <?php the_time('F j, Y g:i a'); ?>
			    </li>

			    <li>
			        <?php echo __('By'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(	); ?></a>
			    </li>

			    <li>
			        <?php echo __('Posted In'); ?> <?php echo trim($output, $separator); ?>
			    </li>

	    		<li>
	    			<?php echo __('Categories'); ?> 
			    	<?php
				        $terms = get_the_terms( $post->ID, 'category' );
			 
						if ( $terms && ! is_wp_error( $terms ) ) :
						 
						    foreach ( $terms as $term ) { ?>

						        <a href="<?php echo get_term_link($term, 'category'); ?>" title="<?php echo $cat = $term->name;; ?>"><?php echo $cat = $term->name;; ?></a>

						    <?php }

						endif; 
					?>
				</li>
	    	</ul>	    

		    <?php the_excerpt(); ?>

		    <a class="button btn btn-read-more" href="<?php the_permalink(); ?>" title="">
		        <?php echo __('Read More'); ?>
		    </a>
	    </div>
	</article>
</div>