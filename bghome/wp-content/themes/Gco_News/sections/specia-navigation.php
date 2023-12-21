<?php global $vz_options;?>

<header role="banner">

	<nav class='navbar navbar-default sticky-nav' role='navigation'>

		<div class="header-navbar-top">

			<a class="navbar-brand" href="/">

						<?php specia_logo();?>

					</a>

			<?php $description = get_bloginfo( 'description');

			if ($description) : ?>

				<h1 class="site-description"><?php echo esc_html($description); ?></h1>

			<?php endif; ?>

			<a id="showmenu">

				<span class="hamburger hamburger--collapse">

					<span class="hamburger-box">

						<span class="hamburger-inner"></span>

					</span>

				</span>

			</a>

		</div>

	</nav>

	<div id="mobilenav">

		<div class="mobilenav__inner">

			<a class="menu_close"><i class="fas fa-angle-left"></i></a>

			<div class="logo-mobilenav">

				<a href="/">

					<?php specia_logo();?>

				</a>

        	</div>

        	<div class="box-header-search">

        		<?php echo do_shortcode('[wpdreams_ajaxsearchlite]');?> 
				<?php //echo get_product_search_form();?>

			</div>

			<?php 

			wp_nav_menu( array(

				'theme_location'    => 'primary_menu', 

				'menu_id'           => 'menu-main', 

				'menu_class'        => 'mobile-menu',

			) );

			?>

		</div>

		<div class="mobilenav-bottom">

			<h3 class="title-infor_contact"><?php echo $vz_options['opt-title-infor_contact'];?></h3>

			<p class="description-infor_contact"><?php echo $vz_options['opt-description-infor_contact'];?></p>

			<ul id="list-infor_contact">

		        <?php if($vz_options['opt-address-infor_contact_1']) { ?> 

		          <li class="address-infor_contact">

		            <i class="fal fa-map-marker-alt"></i><p><span>Đ/c: </span><?php echo $vz_options['opt-address-infor_contact_1'];?></p>

		          </li>

		        <?php } ?>

		        <?php if($vz_options['opt-address-infor_contact_2']) { ?> 

		          <li class="address-infor_contact">

		            <i class="fal fa-map-marker-alt"></i><p><span>ĐCSX: </span><?php echo $vz_options['opt-address-infor_contact_2'];?></p>

		          </li>

		        <?php } ?>

		       <?php if($vz_options['opt-hotline-infor_contact']) { ?> 

		          <li class="hotline-infor_contact">

		            <i class="fal fa-phone"></i><p><a href="tel:<?php echo $vz_options['opt-hotline-infor_contact'];?>"><?php echo $vz_options['opt-hotline-infor_contact'];?></a></p>

		          </li>

		        <?php } ?>

		        <?php if($vz_options['opt-email-infor_contact']) { ?> 

		          <li class="email-infor_contact">

		            <i class="fal fa-envelope"></i><p><a href="mailto:<?php echo $vz_options['opt-email-infor_contact'];?>"><?php echo $vz_options['opt-email-infor_contact'];?></a></p>

		          </li>

		        <?php } ?>

		        <!--<?php if($vz_options['opt-website-infor_contact']) { ?>

		          <li class="website-infor_contact">

		            <i class="fal fa-envelope"></i><p><span>Website: </span><a href="<?php echo $website;?>"><?php echo $website;?></a></p>

		          </li>

		        <?php } ?> -->

	        </ul>

	        <?php if($vz_options['switch-social']) { ?>

	            <ul class="social">

	              <?php if($vz_options['social-facebook']) { ?> 

	                <li><a href="<?php echo $vz_options['social-facebook']; ?>"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>

	              <?php } ?>

	                        

	              <?php if($vz_options['social-twitter']) { ?> 

	              <li><a href="<?php echo $vz_options['social-twitter']; ?>"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>

	              <?php } ?>

	              

	              <?php if($vz_options['social-google']) { ?> 

	              <li><a href="<?php echo $vz_options['social-google']; ?>"><i class="fab fa-google-plus"></i><span>Google Plus</span></a></li>

	              <?php } ?>



	              <?php if($vz_options['social-youtube']) { ?> 

	              <li><a href="<?php echo $vz_options['social-youtube']; ?>"><i class="fab fa-youtube"></i><span>Youtube</span></a></li>

	              <?php } ?>



	              <?php if($vz_options['social-linkedin']) { ?> 

	              <li><a href="<?php echo $vz_options['social-linkedin']; ?>"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a></li>

	              <?php } ?>

	              

	              <?php if($vz_options['social-pinterest']) { ?> 

	              <li><a href="<?php echo $vz_options['social-pinterest']; ?>"><i class="fab fa-pinterest-p"></i><span>Pinterest</span></a></li>

	              <?php } ?>



	              <?php if($vz_options['social-instagram']) { ?> 

	              <li><a href="<?php echo $vz_options['social-instagram']; ?>"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>

	              <?php } ?>

	            </ul>

	          <?php } ?>

	        <!-- /End Social Media Icons-->

		</div>

	</div>

</header>