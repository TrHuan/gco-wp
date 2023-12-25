<?php

	$cates = [];

	$terms = get_the_terms( $post->ID, 'thi-cong-cat' );

	if ( $terms && ! is_wp_error( $terms ) ) :
								 
	    foreach ( $terms as $term ) {
	    	$cat_slug = $term->slug;

	    	$cates[$term->term_id] = $cat_slug;
	    }

	endif; 


	foreach ($cates as $kg) {
		// var_dump($kg);
		$kq .= $kg . ' ';
	}

?>		

<div class="single-project-item col-md-4 col-sm-4 col-xs-12 filter-item <?php echo $kq; ?>">
    <div class="img-holder">
        <?php if (has_post_thumbnail()) { ?>
	        <img src="<?php echo lth_custom_img('full', 443, 340);?>" alt="Awesome Image">
	    <?php } ?>
        <div class="overlay">
            <div class="box">
                <div class="content">
                    <div class="icon-holder">
                        <a href="images/project/pj-with-text/5.jpg" data-rel="prettyPhoto" title="Interrio Project"><span class="flaticon-cross"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-holder">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
        <p><?php
	        $terms = get_the_terms( $post->ID, 'thi-cong-cat' );
 
			if ( $terms && ! is_wp_error( $terms ) ) :
			 
			    foreach ( $terms as $term ) { ?>

			        <a href="<?php echo get_term_link($term, 'thi-cong-cat'); ?>" title="<?php echo $cat = $term->nam; ?>"><?php echo $cat = $term->name; ?></a>

			    <?php }

			endif; 
		?></p>
    </div>   
</div>