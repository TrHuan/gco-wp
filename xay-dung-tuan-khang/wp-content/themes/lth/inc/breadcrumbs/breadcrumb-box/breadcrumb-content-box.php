
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="position: initial;">
		<div class="title-box">
			<?php
				if (!is_single()) { ?>
					<h1 class="title">
						<?php 
						if (is_category()) {
							// single_cat_title();
							$archive_page = get_pages(
		                        array(
		                            'meta_key' => '_wp_page_template',
		                            'meta_value' => 'templates/blogs.php'
		                        )
		                    );
		                    $archive_name = $archive_page[0]->post_title;
	                    	echo $archive_name;
						} else if (is_tax()) {
							// single_cat_title();
							// if ( is_tax( 'thi-cong-cat' ) ) {
			                    // $archive_page = get_pages(
			                        // array(
			                            // 'meta_key' => '_wp_page_template',
			                            // 'meta_value' => 'templates/projects.php'
			                        // )
			                    // );
			                    // $archive_name = $archive_page[0]->post_title;
		                    	// echo $archive_name;
			                // } 

			                $term = get_queried_object()->term_id;
                            echo $term_name = get_term( $term )->name;
                        } else if (is_tag()) {
                        	$archive_page = get_pages(
		                        array(
		                            'meta_key' => '_wp_page_template',
		                            'meta_value' => 'templates/blogs.php'
		                        )
		                    );
		                    $archive_name = $archive_page[0]->post_title;
	                    	echo $archive_name;
						} else {
							if ( get_post_type() == 'thi-cong' ) {                    
				                $archive_page = get_pages(
				                    array(
				                        'meta_key' => '_wp_page_template',
				                        'meta_value' => 'templates/projects.php'
				                    )
				                );
				                $archive_id = $archive_page[0]->ID;
				                echo $archive_name = $archive_page[0]->post_title;
				            } elseif ( get_post_type() == 'thiet-ke' ) {                    
				                $archive_page = get_pages(
				                    array(
				                        'meta_key' => '_wp_page_template',
				                        'meta_value' => 'templates/services.php'
				                    )
				                );
				                $archive_id = $archive_page[0]->ID;
				                echo $archive_name = $archive_page[0]->post_title;
				            } elseif ( get_post_type() == 'product' && !is_single() ) {
	                            woocommerce_page_title();
                            } else {
                            	the_title();
                            }
						} ?>
					</h1>
				<?php } else { ?>
					<h2 class="title">	
		                <?php 
			                if ( get_post_type() == 'thiet-ke' ) {
			                    $archive_page = get_pages(
			                        array(
			                            'meta_key' => '_wp_page_template',
			                            'meta_value' => 'templates/services.php'
			                        )
			                    );
			                    $archive_name = $archive_page[0]->post_title;
			                    echo $archive_name;
			                } 

			                if ( get_post_type() == 'thi-cong' ) {
			                    $archive_page = get_pages(
			                        array(
			                            'meta_key' => '_wp_page_template',
			                            'meta_value' => 'templates/projects.php'
			                        )
			                    );
			                    $archive_name = $archive_page[0]->post_title;
			                    echo $archive_name;
			                }

			                if ( get_post_type() == 'post' ) {
			                    $archive_page = get_pages(
			                        array(
			                            'meta_key' => '_wp_page_template',
			                            'meta_value' => 'templates/blogs.php'
			                        )
			                    );
			                    $archive_name = $archive_page[0]->post_title;
			                    echo $archive_name;
			                } 
		                ?>

		                <?php //the_title(); ?>
		            </h2>
				<?php }
			?>	
		</div>
	</div>
</div>

<div class="nav-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="position: initial;">
				<?php if (!is_home()) : ?>
					<div class="content-box">
						<?php						
							if ( get_post_type() != 'product' ) {
								the_breadcrumb(); 
							} else {
								do_action('woo_custom_breadcrumb'); 
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>