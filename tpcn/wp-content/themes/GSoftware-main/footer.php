<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SH_Theme
 */

global $sh_option;
do_action( 'sh_after_content_sidebar_wrap' );
?>
		</div>
	</div><!-- #content -->

	<footer id="footer" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="footer-main-box groups-box">
							<?php
								global $sh_option;
								$footer_widgets = $sh_option['opt-number-footer'];
								$footer_widgets_number = intval($footer_widgets);
								$counter = 1;
							?>

							<?php while ( $counter <= $footer_widgets_number ) {

								echo '<div class="item item-' . $counter . '">';
									dynamic_sidebar( 'footer-' . $counter );
								echo '</div>';
								$counter++;
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<p id="back-top"><a href="#top" target="_blank"><i class="icofont-thin-up"></i></a></p>
	</footer><!-- #colophon -->

	<?php do_action( 'sh_after_footer' );?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
