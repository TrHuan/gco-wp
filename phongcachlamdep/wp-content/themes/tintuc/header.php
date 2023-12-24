<!DOCTYPE HTML>

<html lang="vi-VN">

<head>
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head();?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-102624231-39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-102624231-39');
</script>

<meta name="google-site-verification" content="xDAcuv4pUNJjarf1EDT1BnBfcLs2Zx9IsZBGXuCCDLw" />
<meta name="google-site-verification" content="Chb8VOYlcIlga-5nAOV7k0hgaU7cWICW3XoEee-Pdqc" />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2295610989160501"
     crossorigin="anonymous"></script>
  
</head>

<body <?php body_class();?>>
    <div class="wrapper">
        <div id="header-wrapper">
            <header id="header" class="header">
                <div class="logo-banner">
                    <div class="wrapper-logo-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-xs-12">
                                    <div class="logo">
                                        <a title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>" rel="home">
                                            <img src="<?php echo ot_get_option('logo');?>" alt="<?php bloginfo('name'); ?>">
                                        </a>
                                        <?php if(is_home()){echo '<h1 class="site-title">'.get_bloginfo('name').'</h1>';}?>
                                    </div>
                                </div>
                                <?php
                                $banner = ot_get_option('banner');
                                if($banner)
                                    echo '<div class="col-lg-8 col-sm-12"><img src="'.$banner.'" alt="banner"/></div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-main-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="main-menu">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'main_menu',
                                        'container' => false
                                    ));
                                    ?>
                                </nav>
                                <nav id="site-navigation" class="main-navigation" role="navigation">
                                    <button type="button" class="navbar-toggle off-canvas-toggle" id="show-menu">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="logo2" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>" rel="home">
                                        <img src="<?php echo ot_get_option('logo_mobile');?>" alt="<?php bloginfo('name'); ?>">
                                    </a>
                                     <a href="" id="reload" title="refresh"><i class="fa fa-refresh"></i></a>
                                </nav>
                                <div id="off-canvas">
                                    <div class="off-canvas-inner">
                                        <?php
                                        $menu_class = 'menu';
                                        wp_nav_menu( array(
                                            'theme_location' => 'main_menu',
                                            'menu_class' => $menu_class,
                                            'container' => false
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header><!-- /header -->
        </div>
