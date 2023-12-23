<?php
	$pageID = get_the_ID();
    $page = get_post($pageID);
    $title =  $page->post_title;

	$breadcrumb_all = get_field('breadcrumb', 'option');

	if (have_posts()) {
		while (have_posts()) { the_post();
			$breadcrumb_page_products = get_field('page_products');
			$breadcrumb_products = $breadcrumb_page_products['breadcrumb'];

			$term = get_queried_object();
			$breadcrumb_cats_products = get_field('category_product', $term);
			$breadcrumb_cat_products = $breadcrumb_cats_products['breadcrumb'];

		    $breadcrumb_single_product = get_field('breadcrumb_single_product');

		    //////////////////////////////////////////////////////////////////////

		    $page_blogs = get_pages(
		        array(
		            'meta_key' => '_wp_page_template',
		            'meta_value' => 'templates/blogs.php'
		        )
		    );
		    $page_blogs = $page_blogs[0]->post_title;

			$breadcrumb_page_blogs = get_field('page_blogs');
			$breadcrumb_blogs = $breadcrumb_page_blogs['breadcrumb'];

		    //////////////////////////////////////////////////////////////////////

		    $page_about = get_pages(
		        array(
		            'meta_key' => '_wp_page_template',
		            'meta_value' => 'templates/about.php'
		        )
		    );
		    $page_about = $page_about[0]->post_title;

			$breadcrumb_about = get_field('breadcrumb_about');

		    //////////////////////////////////////////////////////////////////////

			$page_contact = get_pages(
		        array(
		            'meta_key' => '_wp_page_template',
		            'meta_value' => 'templates/contact.php'
		        )
		    );
		    $page_contact = $page_contact[0]->post_title;

			$breadcrumb_contact = get_field('breadcrumb_contact');

		    //////////////////////////////////////////////////////////////////////

			$page_bao_gia = get_pages(
		        array(
		            'meta_key' => '_wp_page_template',
		            'meta_value' => 'templates/bao-gia.php'
		        )
		    );
		    $page_bao_gia = $page_bao_gia[0]->post_title;

			$breadcrumb_page_bao_gia = get_field('page_bao_gia');
			$breadcrumb_bao_gia = $breadcrumb_page_bao_gia['breadcrumb'];

			$page_single_bao_gia = get_field('page_single_bao_gia');
			$breadcrumb_single_bao_gia = $page_single_bao_gia['breadcrumb'];

		    //////////////////////////////////////////////////////////////////////

			$page_project = get_pages(
		        array(
		            'meta_key' => '_wp_page_template',
		            'meta_value' => 'templates/projects.php'
		        )
		    );
		    $page_project = $page_project[0]->post_title;

			$breadcrumb_page_projects = get_field('page_projects');
			$breadcrumb_projects = $breadcrumb_page_projects['breadcrumb'];
		}
	}

    //////////////////////////////////////////////////////////////////////

	if (get_post_type() == 'product') { 
		if ($breadcrumb_products) {
			if (!is_single() && $breadcrumb_cat_products) {
				$img_url = $breadcrumb_cat_products;
			} elseif (is_single() && $breadcrumb_single_product) {
				$img_url = $breadcrumb_single_product;
			} else {
		 		$img_url = $breadcrumb_products;
		 	}
		}  else {
			$img_url = $breadcrumb_all;
		}
	} elseif ($page_blogs == $title && $breadcrumb_blogs) {

		$img_url = $breadcrumb_blogs;

	} elseif (get_post_type() == 'post' && $breadcrumb_blogs) {

		$img_url = $breadcrumb_blogs;

	} elseif ($page_about == $title && $breadcrumb_about) {

		$img_url = $breadcrumb_about;

	} elseif ($page_contact == $title && $breadcrumb_contact) {

		$img_url = $breadcrumb_contact;

	} elseif (get_post_type() == 'bao-gia' && $breadcrumb_bao_gia) {
		if ($breadcrumb_single_bao_gia && is_single()) {

			$img_url = $breadcrumb_single_bao_gia;

		} else {

			$img_url = $breadcrumb_bao_gia;

		}
	} elseif ($page_project == $title || get_post_type() == 'project' && $breadcrumb_projects) {
		if ($breadcrumb_single_projects && is_single()) {

			$img_url = $breadcrumb_single_projects;

		} else {

			$img_url = $breadcrumb_projects;

		}
	} else {

		$img_url = $breadcrumb_all;

	}
?>

<!-- <div class="breadcrumbs-content <?php //echo $post->ID; ?>"> -->
<div class="breadcrumbs-content">
	<div class="breadcrumb-image">
		<div class="image">
			<img src="<?php echo $img_url; ?>" alt="Breadcrumb" style= "width: 100%;">
		</div>	

		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
										if ( get_post_type() == 'bao-gia' ) {                    
							                $archive_page = get_pages(
							                    array(
							                        'meta_key' => '_wp_page_template',
							                        'meta_value' => 'templates/bao-gia.php'
							                    )
							                );
							                $archive_id = $archive_page[0]->ID;
							                echo $archive_name = $archive_page[0]->post_title;
							            } elseif ( get_post_type() == 'project' ) {                    
							                $archive_page = get_pages(
							                    array(
							                        'meta_key' => '_wp_page_template',
							                        'meta_value' => 'templates/projects.php'
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
						                if ( get_post_type() == 'product' ) {
						                    the_title();
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

						                if ( get_post_type() == 'bao-gia' ) {                    
							                the_title();
							            }

							            if ( get_post_type() == 'project' ) {
						                    $archive_page = get_pages(
						                        array(
						                            'meta_key' => '_wp_page_template',
						                            'meta_value' => 'templates/projects.php'
						                        )
						                    );
						                    $archive_name = $archive_page[0]->post_title;
						                    echo $archive_name;
						                } 
					                ?>
					            </h2>
							<?php }
						?>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>