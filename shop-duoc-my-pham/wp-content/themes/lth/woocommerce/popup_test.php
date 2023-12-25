<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
						<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

									<div id="customer_details">
										<?php do_action( 'woocommerce_checkout_billing' ); ?>

										<?php do_action( 'woocommerce_checkout_shipping' ); ?>
									</div>

									<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
								</div>

								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="order-review">
										<h3 id="order_review_heading"><?php esc_html_e( 'Đơn hàng của bạn', 'woocommerce' ); ?></h3>
										
										<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

										<div id="order_review" class="woocommerce-checkout-review-order">
											<?php //do_action( 'woocommerce_checkout_order_review' ); ?>

											<?php get_template_part('woocommerce/checkout/review-order', ''); ?>
										</div>

										<div class="form-row place-order">
											<noscript>
												<?php
												/* translators: $1 and $2 opening and closing emphasis tags respectively */
												printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
												?>
												<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
											</noscript>

											<?php wc_get_template( 'checkout/terms.php' ); ?>

											<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

											<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="<?php echo __('Đặt hàng') ?>" data-value="<?php echo __('Đặt hàng') ?>"><?php echo __('Đặt hàng') ?></button>

											<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

											<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
										</div>

										<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
									</div>
								</div>
							</div>

						</form>
						<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>