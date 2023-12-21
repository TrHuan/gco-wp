<?php
    //field
    $socical_phone          = get_field('socical_phone', 'option');
    $socical_zalo           = get_field('socical_zalo', 'option');
    $socical_messenger      = get_field('socical_messenger', 'option');
    $socical_chat_fb        = get_field('socical_chat_fb', 'option');
    $socical_back_to_top    = get_field('socical_back_to_top', 'option');   
?>

<!-- Chat fb -->
<?php if(!empty( $socical_chat_fb )) { echo $socical_chat_fb; } ?>



<!-- Socical -->
<div id="tool__society">
    <div class="tool__item">

        <?php if(!empty( $socical_phone )) { ?>
        <a href="tel:<?php echo $socical_phone; ?>" class="tool__icon tool__icon_tel" title="">
            <img src="<?php echo asset('images/icon/icon-phone.png'); ?>" alt="phone" width="33" height="33">
			<div class="socical_popup">
				<?php echo $socical_phone; ?>
			</div>
        </a>
        <?php } ?>

        <?php if(!empty( $socical_zalo )) { ?>
        <a href="https://zalo.me/<?php echo $socical_zalo; ?>" class="tool__icon tool__icon_zalo" title="" target="_blank">
            <img src="<?php echo asset('images/icon/icon-zalo.png'); ?>" alt="zalo" width="33" height="33">
			<div class="socical_popup">
				<?php echo $socical_zalo; ?>
			</div>
        </a>
        <?php } ?>

        <?php if(!empty( $socical_messenger )) { ?>
        <a href="https://<?php echo $socical_messenger; ?>" class="tool__icon tool__icon_mes" title="" target="_blank">
            <img src="<?php echo asset('images/icon/icon-mes.png'); ?>" alt="messenger" width="33" height="33">
        </a>
        <?php } ?>

        <?php if(!empty( $socical_back_to_top )) { ?>
        <a href="javascript:void(0)" id="back-to-top" class="tool__icon tool__icon_back" title="">
            <img src="<?php echo asset('images/icon/icon-back.png'); ?>" alt="back to top" width="33" height="33">
        </a>
        <?php } ?>

    </div>
</div>

<style type="text/css">
    /*socical*/
    #tool__society {
        position: fixed;
        bottom: 55px;
        left: 25px;
        width: 48px;
        z-index: 9999;
    }
    #tool__society .tool__item {
        display: flex;
        display: -webkit-flex;
        flex-direction: column;
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        -o-flex-direction: column;
        -ms-flex-direction: column;
    }
    #tool__society .tool__item .tool__icon {
        display: flex;
        display: -webkit-flex;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        width: 48px;
        height: 48px;
        margin: 20px 0 0;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
        background: orange;
        border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        animation: zoom 1s infinite;
        -moz-animation: zoom 1s infinite;
        -webkit-animation: zoom 1s infinite;
        -o-animation: zoom 1s infinite;
        -ms-animation: zoom 1s infinite;
        animation-direction: alternate-reverse;
        -moz-animation-direction: alternate-reverse;
        -webkit-animation-direction: alternate-reverse;
        -o-animation-direction: alternate-reverse;
        -ms-animation-direction: alternate-reverse;
		position: relative;
		z-index: 4;
    }
    #tool__society .tool__item .tool__icon img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        width: calc(100% - 15px);
    }
	#tool__society .tool__item .tool__icon .socical_popup {
/* 		opacity: 0;
		visibility: hidden; */
		position: absolute;
		left: 0;
		top: 0;
		z-index: -1;
		height: 100%;
		line-height: 48px;
		padding-left: 60px;
		padding-right: 10px;
		border-radius: 30px;
		transition: 0.3s ease 0s;
	}
    #tool__society .tool__item .tool__icon.tool__icon_tel,
	#tool__society .tool__item .tool__icon.tool__icon_tel .socical_popup {
        background: #21BD56;
    }
    #tool__society .tool__item .tool__icon.tool__icon_zalo,
	#tool__society .tool__item .tool__icon.tool__icon_zalo .socical_popup {
        background: #2074C8;
    }
    #tool__society .tool__item .tool__icon.tool__icon_mes,
	#tool__society .tool__item .tool__icon.tool__icon_mes .socical_popup {
        background: #007FFF;
    }
	#tool__society .tool__item .tool__icon:hover .socical_popup {
		opacity: 1;
		visibility: visible;
	}
    /*#tool__society .tool__item .tool__icon.tool__icon_back {
        padding: 9px;
        text-align: center;
    }*/
    @keyframes zoom{
        from {
            box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 0px, rgba(16, 128, 199, 0.12) 0px 0px 0px 0px;
            -moz-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 0px, rgba(16, 128, 199, 0.12) 0px 0px 0px 0px;
            -webkit-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 0px, rgba(16, 128, 199, 0.12) 0px 0px 0px 0px;
            -o-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 0px, rgba(16, 128, 199, 0.12) 0px 0px 0px 0px;
            -ms-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 0px, rgba(16, 128, 199, 0.12) 0px 0px 0px 0px;
        }
        to {
            box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 5px, rgba(16, 128, 199, 0.12) 0px 0px 0px 10px;
            -moz-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 5px, rgba(16, 128, 199, 0.12) 0px 0px 0px 10px;
            -webkit-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 5px, rgba(16, 128, 199, 0.12) 0px 0px 0px 10px;
            -o-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 5px, rgba(16, 128, 199, 0.12) 0px 0px 0px 10px;
            -ms-box-shadow: rgba(16, 128, 199, 0.21) 0px 0px 0px 5px, rgba(16, 128, 199, 0.12) 0px 0px 0px 10px;
        }
    }
    /*@media screen and (max-width: 480px) {
        #tool__society .tool__item {
            flex-direction: row;
            -moz-flex-direction: row;
            -webkit-flex-direction: row;
            -o-flex-direction: row;
            -ms-flex-direction: row;
        }
    }*/
</style>

<?php if(!empty( $socical_back_to_top )) { ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        // Back to top
        if (jQuery('#back-to-top').length) {
            jQuery("#back-to-top").on('click', function() {
                jQuery('html, body').animate({
                    scrollTop: jQuery('html, body').offset().top,
                }, 1000);
            });
        }
    });
</script>
<?php } ?>