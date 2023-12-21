<?php while( have_rows('videos_images') ): the_row(); ?>
	<div class="module module_library">
		<div class="module_title">
			<h2 class="title">
				<?php the_sub_field('title'); ?>
			</h2>
		</div>

		<?php $terms = get_terms( array( 'taxonomy' => 'thu-vien-cat', 'parent' => 0 ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

            foreach ( $terms as $term ) { ?>
				<?php if ($term->slug == 'video') { ?>
                    <div class="module_content module_content_<?php echo $term->slug; ?>">
                        <?php
                            $args = [
                                'post_type' => 'thu-vien',
                                'post_status' => 'publish',
                                'posts_per_page' => 2,
                                'orderby' => 'id',
                                'order'      => 'DESC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'thu-vien-cat',
                                        'field' => 'term_id',
                                        'terms' => $term,
                                    )
                                )
                            ];
                            $tets = new WP_Query($args);
                            if ($tets->have_posts()) { $i; ?>
                                <?php while ($tets->have_posts()) {
                                    $tets-> the_post(); $i++; ?>

                                    <ul class="groups-box">

                                        
                                        <?php //load file tương ứng với post format
                                        get_template_part('template-parts/thu-vien/content', ''); ?>

                                    </ul>

                                <?php } ?>
                            <?php } else {
                                get_template_part('template-parts/content', 'none');
                            }
                            // reset post data
                            wp_reset_postdata();
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="module_content module_content_<?php echo $term->slug; ?>">
                        <?php
                            $args = [
                                'post_type' => 'thu-vien',
                                'post_status' => 'publish',
                                'posts_per_page' => 6,
                                'orderby' => 'id',
                                'order'      => 'DESC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'thu-vien-cat',
                                        'field' => 'term_id',
                                        'terms' => $term,
                                    )
                                )
                            ];
                            $tets = new WP_Query($args);
                            if ($tets->have_posts()) { $i; ?>
                                <?php while ($tets->have_posts()) {
                                    $tets-> the_post(); $i++; ?>

                                    <?php if ($i % 2 == 1) { ?>
                                        <ul class="groups-box">
                                    <?php } ?>

                                        
                                        <?php //load file tương ứng với post format
                                        get_template_part('template-parts/thu-vien/content', ''); ?>

                                    <?php if ($i % 2 == 0) { ?>
                                        </ul>
                                    <?php } ?>

                                <?php } ?>
                            <?php } else {
                                get_template_part('template-parts/content', 'none');
                            }
                            // reset post data
                            wp_reset_postdata();
                        ?>
                    </div>
                <?php } ?>
			<?php }
        } ?>

        <?php
        	$btn_url = get_sub_field('button');
			if( $btn_url ) {
			    $url_btn = $btn_url['url'];
			    $btn_title = $btn_url['title'];
			    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
			}
        ?>
        <?php if ($btn_url) { ?>
        	<div class="post-button">
				<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>>" title="" class="btn btn-banner">
					<?php echo $btn_title; ?>
				</a>
			</div>
		<?php } ?>
	</div>
<?php endwhile; ?>