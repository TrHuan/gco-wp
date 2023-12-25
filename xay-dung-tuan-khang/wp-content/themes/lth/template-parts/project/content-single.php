
<div class="groups-box" id="project-single-area">
	<div id="project-single-carousel" class="slick-slider slick-single-project">
        <?php
    	$images = get_field('thu_vien_anh');
		if( $images ): ?>
	        <?php foreach( $images as $image ): ?>
	            <div class="item">
	                <div class="single-item">
	                    <div class="img-holder">
	                        <img src="<?php echo $image; ?>" alt="Awesome Image">
	                    </div>
	                </div>
	            </div>
	        <?php endforeach; ?>
		<?php  else : ?>
		    <img src="<?php echo lth_custom_img('full', 870, 485);?>" alt="Awesome Image">
		<?php endif; ?>
    </div>
	<!-- ///// -->
	<div class="project-info">
        <h1><?php the_title(); ?></h1>
        <p><?php the_excerpt(); ?></p>
        <ul class="project-info-list">
            <?php if( have_rows('quy_mo') ): ?>
                <?php while( have_rows('quy_mo') ): the_row(); ?>
		            <li>
		                <div class="icon-holder">
		                    <i class="fa fa-user" aria-hidden="true"></i>
		                </div>
		                <div class="text-holder">
		                    <h5><?php echo __('Khách hàng'); ?></h5>
		                    <p><?php the_sub_field('khach_hang'); ?></p>
		                </div>
		            </li>
		            <li>
		                <div class="icon-holder">
		                    <i class="fa fa-folder-open" aria-hidden="true"></i>
		                </div>
		                <div class="text-holder">
		                    <h5><?php echo __('Danh mục'); ?></h5>
		                    <?php
						        $terms = get_the_terms( $post->ID, 'thiet-ke-cat' );
					 
								if ( $terms && ! is_wp_error( $terms ) ) :
								 
								    foreach ( $terms as $term ) { ?>

								        <a href="<?php echo get_term_link($term, 'thiet-ke-cat'); ?>" title="<?php echo $cat = $term->name;; ?>"><?php echo $cat = $term->name;; ?></a>

								    <?php }

								endif; 
							?>	
		                </div>
		            </li>
		            <li>
		                <div class="icon-holder">
		                    <i class="fa fa-calendar" aria-hidden="true"></i>
		                </div>
		                <div class="text-holder">
		                    <h5><?php echo __('Ngày bắt đầu'); ?></h5>
		                    <p><?php the_sub_field('ngay_bat_dau'); ?></p>
		                </div>
		            </li>
		            <li>
		                <div class="icon-holder">
		                    <i class="fa fa-calendar" aria-hidden="true"></i>
		                </div>
		                <div class="text-holder">
		                    <h5><?php echo __('Ngày kết thúc'); ?></h5>
		                    <p><?php the_sub_field('ngay_ket_thuc'); ?></p>
		                </div>
		            </li>
		            <li>
		                <div class="icon-holder">
		                    <i class="fa fa-usd" aria-hidden="true"></i>
		                </div>
		                <div class="text-holder">
		                    <h5><?php echo __('Chi phí'); ?></h5>
		                    <p><?php the_sub_field('chi_phi'); ?></p>
		                </div>
		            </li>
		            <li>
		                <div class="icon-holder">
		                    <i class="fa fa-map-marker" aria-hidden="true"></i>
		                </div>
		                <div class="text-holder">
		                    <h5><?php echo __('Địa chỉ'); ?></h5>
		                    <p><?php the_sub_field('dia_chi'); ?></p>
		                </div>
		            </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</div> 

<div class="post-content">
    <?php the_content(); ?>
</div>

<?php if( have_rows('danh_gia') ): ?>
    <?php while( have_rows('danh_gia') ): the_row(); ?>
    	<?php if (get_sub_field('noi_dung') || get_sub_field('ho_ten') || get_sub_field('nganh_nghe')) { ?>
			<div class="project-manager-box">
			    <h4><?php the_sub_field('noi_dung'); ?></h4>
			    <h5><?php the_sub_field('ho_ten'); ?> <span>- <?php the_sub_field('nganh_nghe'); ?></span></h5>
			</div>
		<?php } ?>
	<?php endwhile; ?>
<?php endif; ?>

<!--Start related project items-->
<?php
$du_an_lien_quan = get_field('du_an_lien_quan');
if( $du_an_lien_quan ): ?>
    <div class="related-project-items">
        <div class="sec-title text-center">
            <h2><?php echo __('Dự án liên quan') ?></h2>
        </div>

	    <?php foreach( $du_an_lien_quan as $post ):
	        $permalink = get_permalink( $post );
	        $title = get_the_title( $post );
	        ?>

	        <!--Start single project item-->
	        <div class="col-md-4">
	            <div class="single-project-item">
	                <div class="img-holder">
	                    <?php if (has_post_thumbnail()) { ?>
					        <img src="<?php echo lth_custom_img('full', 443, 340);?>" alt="Awesome Image">
					    <?php } ?>
	                    <div class="overlay">
	                        <div class="box">
	                            <div class="content">
	                                <div class="icon-holder">
	                                    <a href="<?php echo esc_url( $permalink ); ?>" data-rel="prettyPhoto" title="Interrio Project"><span class="flaticon-cross"></span></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="text-holder">
	                    <a href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_html( $title ); ?>">
	                    	<h3><?php echo esc_html( $title ); ?></h3>
	                    </a>
	                    <p>
	                    	<?php
	                    		$terms = get_the_terms( $post, 'thiet-ke-cat' );

								if ( $terms && ! is_wp_error( $terms ) ) :
								 
								    foreach ( $terms as $term ) { ?>

								        <a href="<?php echo get_term_link($term, 'thiet-ke-cat'); ?>" title="<?php echo $cat = $term->nam; ?>"><?php echo $cat = $term->name; ?></a>

								    <?php }

								endif;
	                    	?>
	                    </p>
	                </div>   
	            </div>
	        </div>
	        <!--End single project item--> 
	    <?php endforeach; ?>
    </div>
<?php endif; ?> 
<!--End related project items--> 