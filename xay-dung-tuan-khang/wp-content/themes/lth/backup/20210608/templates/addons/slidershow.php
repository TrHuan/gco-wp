<?php
	$img = get_sub_field('image');

    $content = get_sub_field('content');

    $button_1 = get_sub_field('button_1');
    if( $button_1 ) {
        $button_1_url = $button_1['url'];
        $button_1_title = $button_1['title'];
        $button_1_target = $button_1['target'] ? $button_1['target'] : '_self';
    }

    $button_2 = get_sub_field('button_2');
    if( $button_2 ) {
        $button_2_url = $button_2['url'];
        $button_2_title = $button_2['title'];
        $button_2_target = $button_2['target'] ? $button_2['target'] : '_self';
    }
?>

<li data-transition="slidingoverlayleft">
    <img src="<?php echo $img; ?>"  alt="" width="1920" height="800" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
    
    <div class="tp-caption  tp-resizeme" 
        data-x="left" data-hoffset="0" 
        data-y="top" data-voffset="205" 
        data-transform_idle="o:1;"         
        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
        data-splitin="none" 
        data-splitout="none"
        data-start="700">
        <div class="slide-content-box">
            <?php the_sub_field('content'); ?>
        </div>
    </div>

    <?php if( $button_1 ) { ?>
        <div class="tp-caption tp-resizeme" 
            data-x="left" data-hoffset="0" 
            data-y="top" data-voffset="475" 
            data-transform_idle="o:1;"                         
            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
            data-splitin="none" 
            data-splitout="none" 
            data-responsive_offset="on"
            data-start="2300">
            <div class="slide-content-box">
                <div class="button">
                    <a class="thm-btn bg-cl-1" href="<?php echo $button_1_url; ?>" target="<?php echo esc_attr( $button_1_target ); ?>"><?php echo $button_1_title; ?></a>     
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if( $button_2 ) { ?>
        <div class="tp-caption tp-resizeme" 
            data-x="left" data-hoffset="199" 
            data-y="top" data-voffset="475" 
            data-transform_idle="o:1;"                         
            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
            data-splitin="none" 
            data-splitout="none" 
            data-responsive_offset="on"
            data-start="2600">
            <div class="slide-content-box">
                <div class="button">
                    <a class="thm-btn bdr" href="<?php echo $button_2_url; ?>" target="<?php echo esc_attr( $button_2_target ); ?>"><?php echo $button_2_title; ?></a>   
                </div>
            </div>
        </div>
    <?php } ?>
</li>