  <?php global $vz_options;?>
  </div>
</div>
<!--======================================
    Footer Section
========================================-->
<!-- <footer class="footer-sidebar" role="contentinfo">
  <div class="background-overlay">
    <div class="container">
      <div class="row content-footer-widget">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 colums-widget-footer">
          <?php  dynamic_sidebar( 'footer-widget-one' ); ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 colums-widget-footer">
          <?php  dynamic_sidebar( 'footer-widget-two' ); ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 colums-widget-footer">
          <?php  dynamic_sidebar( 'footer-widget-three' ); ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 colums-widget-footer">
          <?php  dynamic_sidebar( 'footer-widget-four' ); ?>
        </div>
      </div>
    </div>
  </div>     
</footer> -->

<!--======================================
    Footer Copyright
========================================-->

<!-- <section class="footer-copyright">
    <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p class="copyright"><?php echo $vz_options['opt-copyright-footer'];?></p>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 page-contact-form">
             <div class="image-payment"><img src="<?php echo $vz_options['opt-image-payment']['url'];?>" alt=""></div>
          </div>
      </div>  
    </div>
</section> -->

<!--======================================
    Top Scroller
========================================-->
<!-- <a href="#" class="top-scroll"><i class="fa fa-hand-point-up"></i></a>  -->
<!-- <div class="social-ring">
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
  </div> -->
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
    <a class="viewport-zalo" href="https://chat.zalo.me/<?php echo $vz_options['opt-social-zalo'];?>" rel="nofollow" target="_blank">
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
