
<div class="nav-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if (!is_home()) : ?>
					<div class="content-box">
						<?php						
							// breadcrumb
						    echo '<nav class="woocommerce-breadcrumb">';
						    if (!is_home()) {
						        echo '<a href="';
						        echo get_option('home');
						        echo '">';
						        echo __('Trang chủ');
						        echo "</a>";
						        echo " / ";

						        if (get_post_type() == 'page') {
						        	if (is_search()) {
						        		echo __('Kết quả tìm kiếm: "') . get_search_query() . '"';
						        	} else {
						            	the_title();
						            }
						        }

						        if (get_post_type() == 'post') {
						            if (is_category()) {                  
						                $archive_page = get_pages(
						                    array(
						                        'meta_key' => '_wp_page_template',
						                        'meta_value' => 'templates/blogs.php'
						                    )
						                );
						                $archive_id = $archive_page[0]->ID;
						                $archive_name = $archive_page[0]->post_title;
						                echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
						                
						                echo " / ";

						                single_cat_title();
						            }

						            if (is_single()) {
						                $archive_page = get_pages(
						                    array(
						                        'meta_key' => '_wp_page_template',
						                        'meta_value' => 'templates/blogs.php'
						                    )
						                );
						                $archive_id = $archive_page[0]->ID;
						                $archive_name = $archive_page[0]->post_title;
						                echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
						                
						                echo " / ";

						                the_title();
						            }
						        }

						        if (get_post_type() == 'product') {
							        if (!is_single()) {
							        	if (is_tax()) {
							        		echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" title="">';
								        	echo get_the_title( get_option('woocommerce_shop_page_id') );
								        	echo '</a>';

							        		echo ' / ';
							        	}

							            woocommerce_page_title();
							        } else {
							        	echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" title="">';
							        	echo get_the_title( get_option('woocommerce_shop_page_id') );
							        	echo '</a>';

							        	echo ' / ';

							            the_title();
							        }            
							    }
						    }
						    elseif (is_tag()) {single_tag_title();}
						    elseif (is_day()) {echo"Archive for "; the_time('F jS, Y');}
						    elseif (is_month()) {echo"Archive for "; the_time('F, Y');}
						    elseif (is_year()) {echo"Archive for "; the_time('Y');}
						    elseif (is_author()) {echo"Author Archive";}
						    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Archives";}
						    elseif (is_search()) {echo"Search Results";}
						    echo '</nav>';
							// end breadcrumb
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>