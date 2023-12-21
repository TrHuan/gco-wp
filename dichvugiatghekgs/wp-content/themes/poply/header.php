<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<!--     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="canonical" href="<?php echo get_page_link_current(); ?>" />

    <title><?php echo title(); ?></title>

    <?php wp_head(); ?>



    <?php echo get_field('insert_code_header', 'option'); ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "dịch vụ giặt ghế Không Gian Sạch",
  "image": "https://dichvugiatghekgs.com/wp-content/uploads/2023/03/menu-logo.png",
  "@id": "https://dichvugiatghekgs.com/",
  "url": "https://dichvugiatghekgs.com/",
  "telephone": "0911113822",
  "priceRange": "2000000-100000000",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Số 2, ngõ 420 đường Khương Đình, phường Hạ Đình, quận Thanh Xuân",
    "addressLocality": "Hà Nội",
    "postalCode": "100000",
    "addressCountry": "VN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 20.9905738,
    "longitude": 105.8124953
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
  "sameAs": "https://www.facebook.com/khonggiansachorg" 
}
</script>


</head>

<body <?php body_class(); ?>>





<div class="wrapper index">



<header class="fixed-top top">

    <div class="container">

        <div class="d-flex align-items-center justify-content-between w-100 pl-lg-3 pl-0 top-wrap">

            <!-- hamburger menu -->

            <a id="nav-icon" href="#menu" class="d-xl-none">

                <span></span>

                <span></span>

                <span></span>

            </a>



            <!-- logo -->

            <?php get_template_part("resources/views/logo"); ?>



            <div class="d-flex align-items-center top-gradientbg pr-sm-5 px-0">



                <!-- menu -->

                <?php get_template_part("resources/views/menu"); ?>



                <div class="d-flex align-items-center ml-md-4 ml-0 tmenu-control-r">

                    <div class="index-link search-wrap">

                        <a href="<?php echo get_option('home');?>#regis" title="" class="btn link-btn">Hẹn tư vấn</a>

                    </div>

                </div>

                

            </div>

        </div>

    </div>

</header>



<main class="index">