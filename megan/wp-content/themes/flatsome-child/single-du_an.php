<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<?php $id = get_queried_object_id();
if (class_exists('WPSEO_Primary_Term')) {
	$wpseo_primary_term = new WPSEO_Primary_Term('du_an_cat', $id);
	$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
	$term = get_term($wpseo_primary_term);
	$term_id = $term->term_id;
	$term_name = $term->name;
	$term_description = $term->description;
} ?></span>

<div id="content" class="du-an-wrapper du-an-single page-wrapper">
	<section class="section sec_ch_banner" style="padding: 0 0 60px">
		<div class="section-content relative">
			<div class="banner has-hover" id="banner-672857877">
				<div class="banner-inner fill">
					<div class="banner-bg fill">
						<div class="bg fill bg-fill  bg-loaded"></div>
						<div class="overlay"></div>
					</div>
					<!-- bg-layers -->
					<div class="banner-layers container">
						<div class="fill banner-link"></div>
						<div id="text-box-1778082283" class="text-box banner-layer x0 md-x0 lg-x0 y85 md-y85 lg-y85 res-text">
							<div class="text dark">

								<div class="text-inner text-left">

									<a class="button primary" style="border-radius:5px;">
										<span><?php echo $term_name; ?></span>
									</a>

									<h1 class="title"><?php the_title(); ?></h1>
								</div>
							</div>
							<!-- text-box-inner -->

							<style scope="scope">
								#text-box-1778082283 .text-inner {
									padding: 0px 0px 0px 15px;
								}
								
								#text-box-1778082283 {
									width: 60%;
								}
								
								#text-box-1778082283 .text {
									font-size: 100%;
								}
								
								@media (min-width: 550px) {
									#text-box-1778082283 {
										width: 60%;
									}
								}
							</style>
						</div>
						<!-- text-box -->

						<div id="text-box-301290602" class="text-box banner-layer x100 md-x100 lg-x100 y100 md-y100 lg-y100 res-text">
							<div class="text ">
								<div class="text-inner text-left">
									<?php echo $term_description; ?>
								</div>
							</div>
							<!-- text-box-inner -->

							<style scope="scope">
								#text-box-301290602 {
									margin: 0px 15px 0px 0px;
									width: 60%;
								}
								
								#text-box-301290602 .text {
									background-color: rgb(248, 248, 248);
									font-size: 100%;
								}
								
								#text-box-301290602 .text-inner {
									padding: 30px 30px 30px 30px;
								}
								
								@media (min-width: 550px) {
									#text-box-301290602 {
										width: 40%;
									}
								}
							</style>
						</div>
						<!-- text-box -->

					</div>
					<!-- .banner-layers -->
				</div>
				<!-- .banner-inner -->


				<style scope="scope">
					#banner-672857877 {
						padding-top: 500px;
					}
					
					#banner-672857877 .bg.bg-loaded {
						background-image: url(<?php echo get_field('hinh_anh_dau_trang'); ?>);
					}
					
					#banner-672857877 .overlay {
						background-color: rgba(0, 0, 0, 0.31);
					}
				</style>
			</div>
			<!-- .banner -->
		</div>
		<!-- .section-content -->
	</section>

    <div class="section-content relative">
        <div class="row row-collapse">
            <div class="col medium-12 small-12 large-7">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_406862453">
                        <div class="img-inner dark">
							<?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                    </div>

                    <h2><?php the_title(); ?></h2>
					<ul class="mo-ta">
						<li><?php echo __('Loại sản phẩm: ') ?><strong><?php echo get_field('loai_san_pham'); ?></strong></li>
						<li><?php echo __('Diện tích: ') ?><strong><?php echo get_field('dien_tich'); ?></strong></li>
						<li><?php echo __('Thiết kế: ') ?><strong><?php echo get_field('thiet_ke'); ?></strong></li>
						<li><?php echo __('Tình trạng: ') ?><span data-text-color="alert"><?php echo get_field('tinh_trang'); ?></span></li>
					</ul>
                    <div class="is-divider divider clearfix" style="max-width:100%;height:1px;"></div>
                    <!-- .divider -->
                    <p><?php echo __('Giá bán: ') ?><strong><span style="font-size: 22px;" data-text-color="primary"><?php echo get_field('gia'); ?></span></strong>
                    </p>
                    <div class="is-divider divider clearfix" style="max-width:100%;height:1px;"></div>
                    <!-- .divider -->
                    <h3><?php echo __('QUY TRÌNH') ?></h3>
					<?php echo get_field('quy_trinh'); ?>
                    <div class="is-divider divider clearfix" style="max-width:100%;height:1px;"></div>
                    <!-- .divider -->
                    <h3><?php echo __('HÌNH ẢNH') ?></h3>
                    <div class="swiper swiper-slider swiper-hinh-anh" data-item="5" data-item_lg="4" data-item_md="3" data-item_sm="2" data-item_mb="2"
						data-row="1" data-dots="false" data-arrows="true" data-autoplay="false">
						<?php
							$images = get_field('hinh_anh');
							foreach( $images as $image ): ?>
							<div class="item">
								<div class="post-box col-inner">
									<div class="post-image">
										<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="Hình Ảnh" width="auto" height="auto">
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
                    <div class="is-divider divider clearfix" style="max-width:100%;height:1px;"></div>
                    <!-- .divider -->
                    <h3><?php echo __('VIDEO') ?></h3>
                    <div class="video video-fit mb" style="padding-top:56.25%;">
						<?php echo get_field('video'); ?>
                    </div>
                    <div class="is-divider divider clearfix" style="max-width:100%;height:1px;"></div>
                    <!-- .divider -->
					<h3><?php echo __('TIẾN ĐỘ DỰ ÁN') ?></h3>
					<?php echo get_field('tien_do'); ?>
                    <div class="is-divider divider clearfix" style="max-width:100%;height:1px;"></div>
                    <!-- .divider -->
					<h3><?php echo __('LÝ DO MUA') ?></h3>
					<?php echo get_field('ly_do_mua'); ?>
				
					<div class="message-box relative" style="padding-top:20px;padding-bottom:20px;">
                        <div class="message-box-bg-image bg-fill fill" style="background-image:url(<?php echo get_field('hinh_nen_tu_van'); ?>);"></div>
                        <div class="message-box-bg-overlay bg-fill fill" style="background-color:rgba(237, 184, 65, 0.83);"></div>
                        <div class="container relative">
                            <div class="inner last-reset">
                                <div class="row row-collapse align-middle align-center">
                                    <div class="col medium-7 small-12 large-7">
                                        <div class="col-inner">
                                            <h3><?php echo __('BẠN MUỐN ĐƯỢC TƯ VẤN VỀ DỰ ÁN') ?></h3>
                                        </div>
                                    </div>
                                    <div class="col medium-5 small-12 large-5">
                                        <div class="col-inner text-center">
                                            <a href="tel:+<?php echo get_field('sdt_tu_van'); ?>" target="_self" class="button secondary" style="border-radius:5px;">
                                                <span><?php echo __('GỌI CHO CHÚNG TÔI') ?></span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-element" style="display:block; height:auto; padding-top:30px"></div>
                    <h3><?php echo __('LIÊN HỆ') ?></h3>
                    <div class="row row-collapse" id="row-1292412174">
                        <div class="col small-12 large-12">
                            <div class="col-inner text-center">
								<?php echo do_shortcode(get_field('form_lien_he')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col medium-12 small-12 large-5">
                <div class="col-inner" style="padding:0px 0px 0px 30px;">
                    <article class="lth-products">
						<div class="module module_products">
							<div class="module_header">
								<h2 class="title">
									<?php echo __('CĂN HỘ ĐANG BÁN'); ?>
								</h2>
							</div>

							<div class="module_content">
								<?php
								$args = [
								'post_type' => 'du_an',
								'post_status' => 'publish',
								'tax_query' => array(
									array(
										'taxonomy' => 'du_an_cat',
										'field'    => 'id',
										'terms'    => $term_id,
									),
								),
								'posts_per_page' => 5,
								'orderby' => 'date',
								'order' => 'DESC',
								];

								$wp_query = new WP_Query($args);
								if ($wp_query->have_posts()) { ?>
								<?php while ($wp_query->have_posts()) {
									$wp_query->the_post(); ?>

									<div class="item">
										<article class="post-box">
										<?php if (has_post_thumbnail()) { ?>
											<div class="post-image">
											<a href="<?php the_permalink(); ?>" title="" class="image">
											
												<?php the_post_thumbnail('thumbnail'); ?>
											</a>
											</div>
										<?php } ?>

										<div class="post-content">
											<h3 class="post-name">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
											</h3>
											<div class="post-mo-ta">
											<div class="post-dien-tich">
												<?php echo __('Diện tích: '); ?>
												<span><?php echo get_field('dien_tich'); ?></span>
											</div>
											<div class="post-gia">
												<?php echo __("Giá bán: ") ?>
												<span><?php echo get_field('gia'); ?></span>
											</div>
											</div>
											<div class="post-button">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php echo __('Xem chi tiết »'); ?>
												</a>
											</div>
										</div>
										</article>
									</div>
								<?php }
								}
								// reset post data
								wp_reset_postdata();
								?>
							</div>

							<div class="gco is-divider divider clearfix" style="margin-top:0px;margin-bottom:0px;max-width:100%;height:24px;background-color:rgba(255, 255, 255, 0);"></div>

							<a href="<?php echo get_field('url_xem_them_can_ho'); ?>" target="_self" class="button primary td-read-more">
								<span><?php echo __('Xem tất cả căn hộ'); ?></span>
							</a>
						</div>
					</article>
                </div>
            </div>

            <style scope="scope">
            </style>
        </div>
    </div>
</div>

<?php get_footer();
