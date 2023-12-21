
<h2 class="post-name">
	<?php the_title(); ?>
</h2>

<ul class="post-meta">
    <li>
        <?php echo __('Posted'); ?> <?php the_time('F j, Y g:i a'); ?>
    </li>

    <li>
        <?php echo __('By'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(	); ?></a>
    </li>

	<li>
		<?php echo __('Categories'); ?>

    	<?php
	        $terms = get_the_terms( $post->ID, 'service_cat' );
 
			if ( $terms && ! is_wp_error( $terms ) ) :
			 
			    foreach ( $terms as $term ) { ?>

			        <a href="<?php echo get_term_link($term, 'service_cat'); ?>" title="<?php echo $cat = $term->name;; ?>"><?php echo $cat = $term->name;; ?></a>

			    <?php }

			endif; 
		?>		
	</li>
</ul>	    

<div class="post-content">
    <?php the_content(); ?>
</div>
