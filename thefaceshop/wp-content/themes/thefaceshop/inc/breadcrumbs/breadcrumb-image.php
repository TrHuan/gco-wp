<?php
	$pageID = get_the_ID();
    $page = get_post($pageID);
    $title =  $page->post_title;

	$breadcrumb_all = get_field('breadcrumb', 'option');

	if (get_post_type() == 'page') {
		$breadcrumb_page = get_field('breadcrumb');

    	if ($breadcrumb_page) {
    		$img_url = $breadcrumb_page;
    	} else {
			$img_url = $breadcrumb_all;
		}
	}

	if (get_post_type() == 'post') {
		$archive_page = get_pages(
            array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'templates/blogs.php'
            )
        );
        $archive_id = $archive_page[0]->ID;

		$breadcrumb_page = get_field('breadcrumb', $archive_id);

		$term = get_queried_object();
		$breadcrumb_cats_blog = get_field('category_blog', $term);
		$breadcrumb_cat_blog = $breadcrumb_cats_blog['breadcrumb'];

		$breadcrumb_single = get_field('breadcrumb');

		if (is_category() && $breadcrumb_cat_blog) {
			$img_url = $breadcrumb_cat_blog;
		} elseif (is_single() && $breadcrumb_single) {
			$img_url = $breadcrumb_single;			
		} elseif ($breadcrumb_page) {
			$img_url = $breadcrumb_page;
		} else {
			$img_url = $breadcrumb_all;
		}		
	}

	if (get_post_type() == 'product') {
		$breadcrumb_products = get_field('breadcrumb', woocommerce_get_page_id('shop'));

		$term = get_queried_object();
		$breadcrumb_cats_products = get_field('category_product', $term);
		$breadcrumb_cat_products = $breadcrumb_cats_products['breadcrumb'];

		$breadcrumb_single = get_field('breadcrumb');

		if (!is_single() && $breadcrumb_products || is_tax() && $breadcrumb_cat_products) {
			if ($breadcrumb_cat_products) {
				$img_url = $breadcrumb_cat_products;
			} else {
				$img_url = $breadcrumb_products;
			}
		} elseif (is_single() && $breadcrumb_single) {
			$img_url = $breadcrumb_single;
		} elseif (is_single() && $breadcrumb_products) {
			$img_url = $breadcrumb_products;
		} else {
			$img_url = $breadcrumb_all;
		}		
	}

	if (get_post_type() == 'project' || get_queried_object()->taxonomy == 'project-cat') {
		// code...
		$archive_page = get_pages(
            array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'templates/projects.php'
            )
        );
        $archive_id = $archive_page[0]->ID;

		$breadcrumb_page = get_field('breadcrumb', $archive_id);

		$term = get_queried_object();
		$breadcrumb_cat_project = get_field('breadcrumb', $term);

		$breadcrumb_single = get_field('breadcrumb');

		if (is_tax() && $breadcrumb_cat_project) {
			$img_url = $breadcrumb_cat_project;
		} elseif (is_single() && $breadcrumb_single) {
			$img_url = $breadcrumb_single;			
		} elseif ($breadcrumb_page) {
			$img_url = $breadcrumb_page;
		} else {
			$img_url = $breadcrumb_all;
		}
	}	

	if (get_post_type() == 'service' || get_queried_object()->taxonomy == 'service-cat') {
		// code...
		$archive_page = get_pages(
            array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'templates/services.php'
            )
        );
        $archive_id = $archive_page[0]->ID;

		$breadcrumb_page = get_field('breadcrumb', $archive_id);

		$term = get_queried_object();
		$breadcrumb_cat_service = get_field('breadcrumb', $term);

		$breadcrumb_single = get_field('breadcrumb');

		if (is_tax() && $breadcrumb_cat_service) {
			$img_url = $breadcrumb_cat_service;
		} elseif (is_single() && $breadcrumb_single) {
			$img_url = $breadcrumb_single;			
		} elseif ($breadcrumb_page) {
			$img_url = $breadcrumb_page;
		} else {
			$img_url = $breadcrumb_all;
		}
	}
?>

<div class="breadcrumbs-content">
	<div class="breadcrumb-image">
		<?php if ($img_url) { ?>
			<div class="image">
				<img src="<?php echo $img_url; ?>" alt="Breadcrumb" style= "width: 100%;">
			</div>	
		<?php } ?>

		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="title-box">
						<?php
							if (!is_single()) { ?>
								<h1 class="title">
									<?php 
										if (get_post_type() == 'page') {
											the_title();
										}

										if (get_post_type() == 'post') {
											if (is_category()) {
												single_cat_title();
											}
										}

										if (get_post_type() == 'product') {
											woocommerce_page_title();
										}

										if (get_post_type() == 'project' || get_queried_object()->taxonomy == 'project-cat') {
											if (is_tax()) {
												single_cat_title();
											} else {
												$archive_page = get_pages(
										            array(
										                'meta_key' => '_wp_page_template',
										                'meta_value' => 'templates/projects.php'
										            )
										        );
										        echo $archive_id = $archive_page[0]->ID;
											}
										}

										if (get_post_type() == 'service' || get_queried_object()->taxonomy == 'service-cat') {
											if (is_tax()) {
												single_cat_title();
											} else {
												$archive_page = get_pages(
										            array(
										                'meta_key' => '_wp_page_template',
										                'meta_value' => 'templates/services.php'
										            )
										        );
										        echo $archive_id = $archive_page[0]->ID;
											}
										}
									?>
								</h1>
							<?php } else { ?>
								<h2 class="title">	
					                <?php 
						                the_title();
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