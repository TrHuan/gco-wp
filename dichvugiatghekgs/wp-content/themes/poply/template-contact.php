<?php
	/*
	Template Name: Mẫu Liên hệ
	*/
?>

<?php get_header(); ?>

<?php
    $page_id        = get_the_ID();
    $page_name      = get_the_title();
    $page_content   = wpautop(get_the_content());

    //banner
    $data_page_banner  = array(
        'image_alt'    =>    $page_name
    );

    //field
    $customer_address   = get_field('customer_address', 'option');
    $customer_phone     = get_field('customer_phone', 'option');
    $customer_email     = get_field('customer_email', 'option');

    $contact_contact_title      = get_field('contact_contact_title');
    $contact_contact_desc       = get_field('contact_contact_desc');
    $contact_contact_form_id    = get_field('contact_contact_form');
    $contact_contact_form       = do_shortcode('[contact-form-7 id="'.$contact_contact_form_id.'"]');

    $contact_map = get_field('contact_map');
?>

<?php get_template_part("resources/views/page-banner"); ?>

<section class="b2 spage" style="background: url(<?php echo asset('images/bg2.png'); ?>) no-repeat center top; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-3">
                <aside class="contact-aside">
                    <div class="contact-aside-item">
                        <i class="fas fa-map-pin"></i>
                        <h2 class="py-3 f2 s18 bold">Địa chỉ</h2>
                        <p><?php echo $customer_address; ?></p>
                    </div>
                    <div class="contact-aside-item">
                        <i class="fas fa-envelope"></i>
                        <h2 class="py-3 f2 s18 bold">Email</h2>
                        <p><a href="mailto:<?php echo $customer_email; ?>" title=""><?php echo $customer_email; ?></a></p>
                    </div>
                    <div class="contact-aside-item">
                        <i class="fas fa-phone-square"></i>
                        <h2 class="py-3 f2 s18 bold">Điện thoại</h2>
                        <p><a href="tel:<?php echo str_replace(' ','',$customer_phone);?>" title=""><?php echo $customer_phone; ?></a></p>
                    </div>
                </aside>
            </div>
            <div class="col-lg-6 col-xl-9">
                <h1 class="f2 bold t1 s30 mb-4 about-tit"><?php echo $contact_contact_title; ?></h1>
                <p><?php echo $contact_contact_desc; ?></p>

                <?php if(!empty( $contact_contact_form )) { ?>
                <div class="contact-frm">
                    <?php echo $contact_contact_form; ?>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<div class="container-flush contact-map">
    <?php echo $contact_map; ?>
</div>

<?php get_footer(); ?>