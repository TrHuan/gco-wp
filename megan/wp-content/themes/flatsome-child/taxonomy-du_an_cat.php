<?php get_header(); ?>

<div class="du-an-page-wrapper du-an-archive">
	<?php
		$term = get_queried_object();
        $ID = get_field('content', $term);

        $args = array(
            'post_type' => 'blocks',
            'p' => $ID, 
        );
        $loop = new WP_Query($args);
        while ( $loop->have_posts() ) :
            $loop->the_post();
            global $post;
            the_content();
        endwhile;
    ?>
</div>

<?php get_footer(); ?>
