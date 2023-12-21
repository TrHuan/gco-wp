<?php global $vz_options;?>
<section id="section-register" class="fadeInUp wow" data-wow-delay="0.2s">
    <div class="background-overlay">
        <div class="content-register">
          <h2 class="title-section"><?php echo $vz_options['opt-title-register'];?></h2>
          <div class="box-register-form">
            <p class="txt-register-form"><?php echo $vz_options['opt-description-register'];?></p>
            <?php echo do_shortcode('[contact-form-7 id="134" title="Đăng ký"]');?>
          </div>
        </div>
    </div>
</section>