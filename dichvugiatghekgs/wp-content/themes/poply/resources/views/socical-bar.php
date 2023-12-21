<div class="socical-bar">
    <ul>
        <!--facebook-->
        <li>
            <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="small">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fxebagac.local%2Fdich-vu%2Ftaxi-tu-lai-dau-tien-tren-the-gioi-ra-mat-tai-nhat.html&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                </a>
            </div>
            <i class="fab fa-facebook-f"></i>
        </li>
        <!--twitter-->
        <li>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-via="wpbeginner" data-text="<?php the_title(); ?>" data-related="syedbalkhi:Founder of WPBeginner" data-count="vertical">
            </a>
            <i class="fab fa-twitter"></i>
        </li>
        <!--linkedin-->
        <li>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
        <!--skype-->
        <li>
            <div class='skype-share' data-href='<?php the_permalink(); ?>' data-lang='en-US' data-text='' data-style='square'>
                <!-- <i class="fab fa-skype" aria-hidden="true"></i> -->
            </div>
        </li>
        <!--zalo-->
        <!-- <li>
            <div class="zalo-share-button" data-href="<?php the_permalink(); ?>" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div>
        </li> -->
    </ul>
</div>

<?php
//check language for fb
// switch (ICL_LANGUAGE_CODE) {
//     case 'en':
//         $lang = 'en_US';
//         break;
//     case 'ko':
//         $lang = 'ko_KR';
//         break;
//     default:
//         $lang = 'vi_VN';
//         break;
// }
?>
<!--sdk fb comments, like, share-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/<?php echo $lang; ?>/sdk.js#xfbml=1&version=v9.0" nonce="mZ55CjvT"></script>

<script type="text/javascript">
    //skype
    (function(r, d, s) {
        r.loadSkypeWebSdkAsync = r.loadSkypeWebSdkAsync || function(p) {
            var js, sjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(p.id)) {
                return;
            }
            js = d.createElement(s);
            js.id = p.id;
            js.src = p.scriptToLoad;
            js.onload = p.callback
            sjs.parentNode.insertBefore(js, sjs);
        };
        var p = {
            scriptToLoad: 'https://swx.cdn.skype.com/shared/v/latest/skypewebsdk.js',
            id: 'skype_web_sdk'
        };
        r.loadSkypeWebSdkAsync(p);
    })(window, document, 'script');
</script>
<!--twitter-->
<script src="https://platform.twitter.com/widgets.js" type="text/javascript"></script>
<!--zalo-->
<!-- <script src="https://sp.zalo.me/plugins/sdk.js"></script> -->


<style type="text/css">
    .socical-bar ul {
        display: flex;
        display: -webkit-flex;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        justify-content: flex-end;
        -moz-justify-content: flex-end;
        -webkit-justify-content: flex-end;
        -o-justify-content: flex-end;
        -ms-justify-content: flex-end;
        margin-top: 30px;
    }

    .socical-bar ul li {
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
        position: relative;
        z-index: 1;
        width: 80px;
        height: 30px;
        margin: 4px 0 0 4px;
        overflow: hidden;
        background: #48b2ef;
    }

    .socical-bar ul li i {
        background: #48b2ef;
        color: #fff;
        /*padding: 6px;*/
    }

    .socical-bar ul li iframe,
    .socical-bar ul li span {
        width: 80px !important;
    }

    .socical-bar ul li .fb-share-button,
    .socical-bar ul li .twitter-share-button {
        opacity: 0;
        position: absolute !important;
        left: 0;
        top: 0;
        width: 100% !important;
        height: 100% !important;
        z-index: 2;
    }

    .socical-bar ul li svg {
        color: #fff;
        font-size: 16px;
    }

    .socical-bar ul li .skypeShare {
        background: transparent;
    }
</style>