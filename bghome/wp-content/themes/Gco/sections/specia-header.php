<?php global $vz_options;?>
<section class="header-top-info-1">
    <div class="container">
    	<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<!-- Start Contact Info -->
				<ul class="header-contact">
					<?php if($vz_options['opt-header-address']) { ?> 
						<li class="header-address"><a href="tel:<?php echo $vz_options['opt-header-address']; ?>"><i class="fa fa-map-marked-alt"></i><span>Địa chỉ:</span> <?php echo $vz_options['opt-header-address']; ?></a></li>
					<?php } ?>
					<?php if($vz_options['opt-header-email']) { ?> 
						<li class="header-email"><a href="mailto:<?php echo $vz_options['opt-header-email']; ?>"><i class="fa fa-envelope"></i><span>Email:</span> <?php echo $vz_options['opt-header-email']; ?> </a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
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
    </div>
</section>

<div class="clearfix"></div>