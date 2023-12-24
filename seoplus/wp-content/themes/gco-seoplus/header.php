<?php
/**
 * Header
 * @author LTH
 * @since 2020
 */
?>
<!DOCTYPE html>
    <html lang="VI">
        <head>
            <meta charset="UTF-8">
<!--             <meta name="description" content="Free Web tutorials"> -->
            <meta name="keywords" content="Php, HTML, CSS, JavaScript">
            <meta name="author" content="LTH">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/gif">

            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

            <?php wp_head(); ?> <!-- hook của wordpress gọi đến file inc/head.php -->

            <?php require_once(LIBS_DIR . '/css.php'); ?>

			
<meta name="google-site-verification" content="nRhcznpLCg7WOGtNeSxQkW2q-sSnnyCaFnHzuH6jhiw" />
			

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-185941964-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-185941964-1');
</script>
			
			
			
<!-- đoạn code popup -->			
<!--	<script>
        jQuery(document).ready(function() {
            setTimeout(function(){
                jQuery("#popup_banner_beta").css("display","block");
                jQuery('.close_icon').click(function(){
                    jQuery("#popup_banner_beta").css("display","none");
                });
                jQuery('.mask_popup_banner_beta').click(function(){
                    jQuery("#popup_banner_beta").css("display","none");
                });
            },15000);
        });
    </script>
    <div id="popup_banner_beta">
        <div class="mask_popup_banner_beta"></div>
        <div class="content_popup_banner_beta">
            <img src="https://seoplus.com.vn/wp-content/uploads/2022/02/close-button.png" class="close_icon" alt="Close Image" width="50" height="50">
            <a rel="nofollow" href="https://www.facebook.com/groups/trunguyseo" target="_blank" title="GROUP GIẢI ĐÁP SEO">
                <img src="https://seoplus.com.vn/wp-content/uploads/2022/03/popup-group.png" alt="Dịch vụ SEO" class="image_popup"/>
            </a>
        </div>
    </div>
    <style>
    	#popup_banner_beta{position:fixed;width:100%;height:100vh;z-index:99999;top:0;left:0;display:none;}
        .mask_popup_banner_beta{background:rgba(0,0,0,.38);cursor:pointer;position:absolute;width:100%;height:100vh;top:0;z-index:9;left:0;}
        .content_popup_banner_beta{position:absolute;top:50%;left:50%;z-index:10;transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);}
        .close_icon{position:absolute;top:-30px;right:-40px;width:40px;cursor:pointer;z-index: 11;}
    	.image_popup{width:100%;}
    	@media only screen and (max-width:480px;){
    		.content_popup_banner_beta{width:300px;}.content_popup_banner_beta a img:nth-of-type(1){width:100%;}.close_icon{top:0px;right:0px;width:40px;}
    	}
    </style>	

-->
			
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "SEO TỔNG THỂ - SEO PLUS",
  "alternateName": "SEO PLUS",
  "url": "https://seoplus.com.vn/",
  "logo": "https://seoplus.com.vn/wp-content/uploads/bfi_thumb/logo_seo-p5or1a6vbdf4inejgk0dmjngg3s90gu29sy3q14zwo.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "0868913668",
    "contactType": "technical support",
    "contactOption": ["TollFree","HearingImpairedSupported"],
    "areaServed": "VN",
    "availableLanguage": ["en","Vietnamese"]
  },
  "sameAs": [
    "https://www.facebook.com/Seoplus.com.vn",
    "https://twitter.com/seoplus5",
    "https://www.youtube.com/channel/UCtw61u9_Sg-SXQ2Y-LJBkIA",
    "https://seoplus-gco.blogspot.com/",
    "https://seoplus-gco.tumblr.com/",
    "https://www.pinterest.com/seoplus_gco/",
    "https://seoplusgco.wordpress.com/",
    "https://simpleweb.vn/dich-vu-seo",
    "https://about.me/seoplus-gco",
    "https://blog.seoplus.com.vn/"
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "SEO TỔNG THỂ - SEO PLUS",
  "image": "https://seoplus.com.vn/wp-content/uploads/bfi_thumb/logo_seo-p5or1a6vbdf4inejgk0dmjngg3s90gu29sy3q14zwo.png",
  "@id": "https://seoplus.com.vn/wp-content/uploads/bfi_thumb/logo_seo-p5or1a6vbdf4inejgk0dmjngg3s90gu29sy3q14zwo.png",
  "url": "https://seoplus.com.vn/",
  "telephone": "0868913668",
  "priceRange": "1000000-500000000",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Tầng 8 tòa nhà Ford Thanh Xuân, 311 - 313 Trường Chinh, Phường Khương Mai, Quận Thanh Xuân",
    "addressLocality": "Hà Nội",
    "postalCode": "100000",
    "addressCountry": "VN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 21.0018856,
    "longitude": 105.8214273
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs":[
    "https://www.facebook.com/Seoplus.com.vn",
    "https://twitter.com/seoplus5",
    "https://www.youtube.com/channel/UCtw61u9_Sg-SXQ2Y-LJBkIA",
    "https://seoplus-gco.blogspot.com/",
    "https://seoplus-gco.tumblr.com/",
    "https://www.pinterest.com/seoplus_gco/",
    "https://seoplusgco.wordpress.com/",
    "https://simpleweb.vn/dich-vu-seo",
    "https://about.me/seoplus-gco",
    "https://blog.seoplus.com.vn/"
    ]
}
</script>

			
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Phường Xuân Đỉnh, Quận Bắc Từ Liêm",
        "addressRegion": "Hà Nội",
        "addressCountry": "Việt Nam",
        "postalCode": "100000",
        "streetAddress": "E1A, Ecohome1, Xuân Đỉnh"
      },
      "colleague": [
        "https://seoplus.com.vn/author/gco_admin/"
      ],
      "email": "hongkyhvt@gmail.com",
      "image": "https://seoplus.com.vn/wp-content/uploads/2023/04/nguyen-hong-ky.jpg",
      "jobTitle": "SEO Manager",
      "name": "Nguyễn Hồng Kỳ",
      "alumniOf": "HANOI UNIVERSITY OF INDUSTRY",
      "birthPlace": "Hà Nội, Việt Nam",
      "birthDate": "1992-08-10",
      "height": "72 inches",
      "gender": "male",
      "memberOf": "SEO PLUS",
      "nationality": "Việt Nam",
      "telephone": "0828822226",
      "url": "https://seoplus.com.vn/",
	    "sameAs" : [ "https://www.facebook.com/hongkyhandsome",
      "https://www.facebook.com/hongkyhandsome"]
    }
    </script>

<link rel="alternate" type="application/rss+xml" href="https://seoplus.com.vn/feed/" />			
<meta name="p:domain_verify" content="c3e9acd10be1d60339e92c775e36e60f"/>			
        </head>

        <?php
            $ptp = get_post_type();

            if ($ptp == 'post') {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/blogs.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;

                $dat_url = get_permalink( $archive_id );
            }
        ?>
        
        <body <?php body_class(); ?> data_url="<?php echo $dat_url; ?>">  


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TZHRZ9T"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->			
			
			
           <header class="headers"> 
                
                <?php
                    $header_top = get_field('header_top', 'option');
                    
                    if( $header_top ):
                        $select = $header_top['header_top'];

                        if ($select) {
                            get_template_part('templates/headers/header', 'top');
                        } 
                    endif;
                ?>   
                
                <?php get_template_part('templates/headers/header', 'main'); ?> 

            </header> <!-- end header --> 