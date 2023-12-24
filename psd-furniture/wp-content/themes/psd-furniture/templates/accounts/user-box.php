<?php
/**
 * Template Name: Addon user box
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<?php global $userdata; ?>

<?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url  = get_edit_profile_url($user_id); ?>
    
    <div class="user-box">
        <div class="user-icon">
            <a href="<?php if (class_exists( 'WooCommerce' )) {echo get_permalink( wc_get_page_id( 'myaccount' ) );} else {echo $profile_url;} ?>">
                <?php echo get_avatar($userdata->ID); ?>
                <span  style="position: absolute; font-size: 0;"><?php if ($userdata->nickname && !class_exists( 'WooCommerce' )) {echo $userdata->nickname;} else {echo $userdata->display_name;}  ?></span>
            </a>
        </div>

        <div class="user-content">
            <div class="content">
                <div class="user-close" >
                    <i class="icofont-close icon"></i>
                </div>

                <ul>
                    <li>
                        <div class="sub-header">        
                            <div class="image"><?php echo get_avatar($userdata->ID); ?></div>

                            <ul>
                                <li>
                                    <span><?php echo __('Xin chào: ') ?> <?php if ($userdata->nickname && !class_exists( 'WooCommerce' )) {echo $userdata->nickname;} else {echo $userdata->display_name;}  ?></span>
                                </li>

                                <?php
                                    if ( class_exists( 'WooCommerce' ) ) {
                                        $phone = $userdata->billing_phone;
                                    }

                                    if ($phone) {
                                ?>
                                    <li>
                                        <a href="tell:<?php echo $phone; ?>" title="<?php echo $phone; ?>">
                                            <?php echo $phone; ?>
                                        </a>
                                    </li>
                                <?php } ?>

                                <?php if ($userdata->user_email) { ?>
                                    <li>
                                        <a href="<?php echo $userdata->user_email; ?>" title="<?php echo $userdata->user_email; ?>">
                                            <?php echo $userdata->user_email; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?php if (class_exists( 'WooCommerce' )) {echo get_permalink( wc_get_page_id( 'myaccount' ) );} else {echo $profile_url;} ?>">
                            <?php echo __('Tài khoản của tôi'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo wp_logout_url('index.php'); ?>">
                            <?php echo __('Đăng xuất'); ?>
                        </a>
                    </li>
                </ul> 
            </div>
        </div>       
    </div>

<?php } else { ?>

    <div class="user-box">
        <ul>
            <li>
                <a href=" <?php echo site_url( 'login' ); ?>" class="login-title active">
                    <?php echo __('Đăng nhập'); ?>
                </a>
            </li>
            <li>
                <a href=" <?php echo site_url( 'login' ); ?>" class="registration-title">
                    <?php echo __('Đăng ký'); ?>
                </a>
            </li>
        </ul>            
    </div>

<?php } ?>