<?php
    $tieu_de = get_sub_field('tieu_de');
    $tieu_de_mo_ta = get_sub_field('tieu_de_mo_ta');
    $mo_ta = get_sub_field('mo_ta');
    $button = get_sub_field('button');
    $button_url = $button['url'];
    $button_title = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
    $tieu_de_cuoi = get_sub_field('tieu_de_cuoi');


    $hinh_anh_video = get_sub_field('hinh_anh_video');
    $url_video = get_sub_field('url_video');
    $url_video_url = $url_video['url'];
    $url_video_title = $url_video['title'];
    $url_video_target = $url_video['target'] ? $url_video['target'] : '_self';
    $hinh_anh = get_sub_field('hinh_anh');
?>

<div class="sec-title">
    <!-- <h2>Welcome to <span>Interior</span></h2> -->
    <h2><?php echo $tieu_de; ?></h2>
    <span class="decor"></span>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="text-holder">
            <h3><?php echo $tieu_de_mo_ta; ?></h3>

            <?php echo $mo_ta; ?>

            <div class="bottom">
               <div class="button">
                   <a class="thm-btn bg-cl-1" href="<?php echo $button_url; ?>" target="<?php echo $button_target; ?>"><?php echo $button_title; ?></a>
               </div>

               <div class="title">
                   <h3><?php echo $tieu_de_cuoi; ?></span></h3>
               </div>     
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="gallery clearfix">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="video-gallery">
                        <img src="<?php echo $hinh_anh_video; ?>" alt="Awesome Video Gallery" width="298" height="268">
                        <div class="overlay-gallery">
                            <div class="icon-holder">
                                <div class="icon">
                                    <a class="video-fancybox" title="<?php echo $url_video_title; ?>" href="<?php echo $url_video_url; ?>" target="<?php echo $url_video_target; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/play-btn.png" alt="Play Button" width="55" height="55"/></a>   
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="gallery-bg-img">
                        <img src="<?php echo $hinh_anh; ?>" alt="Awesome Image" width="310" height="280">
                    </div>
                </div>
            </div> 
        </div>
    </div>                                
</div>