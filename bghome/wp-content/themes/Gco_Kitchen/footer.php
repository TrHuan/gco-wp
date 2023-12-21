<?php global $vz_options;?>
</div>
<!--======================================
    Footer Section
========================================-->
<footer class="footer-sidebar" role="contentinfo">
  <div class="background-overlay">
    <div class="container">
      <div class="row content-footer-widget">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-widget-left">
          <div class="introsd-footers__lefts">
            <div class="inner-footers__lefts">
            <?php  dynamic_sidebar( 'footer-widget-left' ); ?>
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
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-widget-right">
          <div class="footer-widget-menu">
            <?php dynamic_sidebar( 'footer-widget-right' ); ?>
          </div>
          <div class="form-footer_register">
            <h3 class="tit-footer_register">Đăng ký nhận thông tin</h3>
            <?php echo do_shortcode('[contact-form-7 id="47" title="Form Email"]');?>
          </div>
        </div>
      </div>
      <p class="txt-copyright"><?php echo $vz_options['opt-copyright-footer'];?></p>
    </div>
  </div>     
</footer>
<div class="clearfix"></div>

<!--======================================
    Top Scroller
========================================-->
<!-- <a href="#" class="top-scroll"><i class="fa fa-hand-point-up"></i></a>  -->
<div class="social-ring">
  <div class="social-ring-main">
      <div class="social-ring-content">
         <a href="tel:<?php echo $vz_options['opt-social-hotline'];?>" class="call-icon" rel="nofollow" target="_blank">
            <i class="fa fa-phone-alt" aria-hidden="true"></i>
            <div class="animated alo-circle"></div>
            <div class="animated alo-circle-fill"></div>
             <span><?php echo $vz_options['opt-social-hotline'];?></span>
          </a>
      </div>
    </div>
  </div>
<ul class="social-in-viewport">
  <li>
    <a class="viewport-hotline" href="tel:<?php echo $vz_options['opt-social-hotline'];?>" rel="nofollow" target="_blank">
      <i class="fa fa-phone-alt" aria-hidden="true"></i>
      <span>Gọi điện</span>
    </a>
  </li>
  <li>
    <a class="viewport-messenger" href="<?php echo $vz_options['opt-social-messenger'];?>" rel="nofollow" target="_blank">
      <img src="<?php bloginfo('template_directory');?>/images/icon-messenger.png" alt="">
      <span>Messenger</span>
    </a>
  </li>
  <li>
    <a class="viewport-zalo" href="https://zalo.me/<?php echo $vz_options['opt-social-zalo'];?>" rel="nofollow" target="_blank">
      <img src="<?php bloginfo('template_directory');?>/images/icon-zalo.png" alt="">
      <span>Chat zalo</span>
    </a>
  </li>
  <li>
    <a class="viewport-map" href="<?php echo $vz_options['opt-social-googlemap'];?>" rel="nofollow" target="_blank">
      <img src="<?php bloginfo('template_directory');?>/images/wpfast-icon-map.png" alt="">
      <span>Tìm đường</span>
    </a>
  </li>
</ul>
  <div class="modal fade" id="registerForm">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Vui lòng điền đầy đủ thông tin vào mẫu bên dưới!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
           <?php echo do_shortcode('[contact-form-7 id="142" title="Form Báo giá"]');?> 
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="SuccessfulForm">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="icon-check"><i class="fa fa-check-circle"></i></div>
        <h4 class="title-successful">Đăng ký thành công</h4>
        <p class="des-successful">Cảm ơn bạn đã quan tâm và đăng ký cho chúng tôi.<br> Chúng tôi sẽ liên hệ với bạn trong vòng 24h. Nếu bạn có bất cứ thắc mắc hay câu hỏi nào vui lòng gọi điện để được tư vấn: <a href="tel:<?php echo $vz_options['opt-social-hotline'];?>"><?php echo $vz_options['opt-social-hotline'];?></a></p>
      <div class="back-homepage"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>Trở về trang chủ</span></a></div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    </div>
  </div>
</div>

<div class="popup-register"><a href="#" data-toggle="modal" data-target="#registerForm"><img src="<?php bloginfo('template_directory');?>/images/btn-popup.png" alt=""></a></div>
<script async="1" defer="1" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&amp;version=v3.2"></script>
<?php echo $vz_options['opt-textarea-footer'];?>
<?php wp_footer(); ?>
</body>
</html>
