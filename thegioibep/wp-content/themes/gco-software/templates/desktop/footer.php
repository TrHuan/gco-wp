<footer>
	<div class="footer-main">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<?php
                        if (is_active_sidebar('widget_footer_slogan')) {
                            dynamic_sidebar('widget_footer_slogan');
                        }
                    ?>
				</div>
				<div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 col-12 footer-address">
					<?php
                    $sub_showroom = '';
                    $showrooms = get_field('showsroom', 'option');
                    if( $showrooms ){
                        echo '<div class="showrooms-menu">';
                        foreach( $showrooms as $showroom ){
                            echo '<div class="sitem">';
                            if( $showroom['title'] ){
                                echo '<h2>'.$showroom['title'].'</h2>';
                            }
                            $items = $showroom['item'];
                            if( $items ){
                                echo '<ul class="showrooms-list">';
                                $i = 1;
                                foreach( $items as $item ){
                                    if( $item['name'] ){
                                        $sub_showroom.= '<div id="showroom-'.$i.'" class="showroom-detail" style="display:none;">
                                                    <div class="swr swr-first">
                                                        <div class="swr-line">Địa chỉ : <b>'.$item['dia_chi'].'</b></div>
                                                        <div class="swr-line">Tel: <b>'.$item['dien_thoai'].'</b></div>
                                                        <div class="swr-line">Hotline: <b>'.$item['hotline'].'</b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="swr">
                                                                <div class="swr-line"><span class="slabel">Giới thiệu Showroom</span></div>
                                                                <div class="swr-line"><div class="showroom-img"><img width="605" height="340" alt="" src="'.$item['hinh_anh'].'" /></div></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="swr">
                                                                <div class="swr-line"><span class="slabel btn-popup-map" data_map="map-'.$i.'">Bản đồ đường đi</span></div>
                                                                <div class="swr-line">'.$item['map'].'</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                        echo '<li class="clearfix" data-id="showroom-'.$i.'">'.$item['name'].'<span></span></li>';
                                    }?>

                                    <div class="popup-map map-<?php echo $i; ?>">
                                        <div class="contents">
                                            <div class="content">
                                                <div class="swr-line"><?php echo $item['map']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++;
                                }
                                echo '</ul>'; 
                            }
                            echo '</div>';//sitem
                        }
                        echo '</div>';//end showrooms-menu                            
                    }//if( $showrooms )
                    /*
                    if (is_active_sidebar('widget_footer_1')) {
                        dynamic_sidebar('widget_footer_1');
                    }*/
                    ?>
				</div>
				<div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
                    <?php if( $sub_showroom ){
                        echo $sub_showroom;
                    }?>
                    <div class="footer-info">
    					<div class="groups-box">
    						<?php
                                if (is_active_sidebar('widget_footer_2')) {
                                    dynamic_sidebar('widget_footer_2');
                                }
                            ?>
    					</div>
    					<div class="footer-bottom">								
    						<?php
                                if (is_active_sidebar('widget_footer_3')) {
                                    dynamic_sidebar('widget_footer_3');
                                }
                            ?>
    					</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</footer> <!—end footer -->