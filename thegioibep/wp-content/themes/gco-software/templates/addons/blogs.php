<?php while( have_rows('tin_tuc_su_kien') ): the_row(); ?>

    <h2 class="titles-md__alls titles-news__alls fs-14s mb-15s">
    	<i class="fa fa-star" aria-hidden="true"></i>
		<?php the_sub_field('title'); ?>
    </h2>
    <ul class="list-news__mains">
    	<?php
        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            // 'order_by' => 'rand',
            'order' => 'DESC',
            'posts_per_page' => 3,
        ];
        $tets = new WP_Query($args);
        if ($tets->have_posts()) { 
            // var_dump($tets);    
            // echo '<pre>';
            // print_r($tets);
        ?>

			
                <?php while ($tets->have_posts()) {
                    $tets-> the_post(); ?>
                    <li>
                        <?php get_template_part('template-parts/post/content', ''); ?>
                    </li>
                <?php } ?>
            
        <?php } else {
            get_template_part('template-parts/content', 'none');
        }
        // reset post data
        wp_reset_postdata(); ?>
    </ul>
    <?php
    	$archive_page = get_pages(
            array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'templates/blogs.php'
            )
        );
        $archive_id = $archive_page[0]->ID;
    ?>
    <a title="" href="<?php echo get_permalink( $archive_id ); ?>" class="btn-whites__alls">
	    <?php echo __('Xem các tin khác'); ?>
	</a>
<?php endwhile; ?>