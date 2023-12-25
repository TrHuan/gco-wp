<?php

	$cates = [];

	$terms = get_the_terms( $post->ID, 'thiet-ke-cat' );

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

<div class="col-md-3 col-sm-6 col-xs-12 filter-item <?php echo $kq; ?>">
    <div class="single-project-item">
        <div class="img-holder">
            <?php if (has_post_thumbnail()) { ?>
		        <img src="<?php echo lth_custom_img('full', 443, 340);?>" alt="Awesome Image" width="443" height="340">
		    <?php } ?>
            <div class="overlay">
                <div class="box">
                    <div class="content">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
                        <p>
                        	<?php
						        $terms = get_the_terms( $post->ID, 'thiet-ke-cat' );
					 
								if ( $terms && ! is_wp_error( $terms ) ) :
								 
								    foreach ( $terms as $term ) { ?>

								        <a href="<?php echo get_term_link($term, 'thiet-ke-cat'); ?>" title="<?php echo $cat = $term->nam; ?>"><?php echo $cat = $term->name; ?></a>

								    <?php }

								endif; 
							?>		
                        </p>
                        <div class="icon-holder">
                            <a href="<?php echo lth_custom_img('full', 443, 340);?>" data-rel="prettyPhoto" title="Interrio Project"><i class="fa fa-camera"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>