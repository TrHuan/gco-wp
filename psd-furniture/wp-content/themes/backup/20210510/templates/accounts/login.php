<?php
/**
 * Template Name: Addon user box
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<?php global $userdata; ?>

<div class="logins-box active">
    <div class="title-box">
        <h3 class="title"><?php echo __( 'Đăng nhập' ) ?></h3>
    </div>

    <div class="form-login">
        <?php
            $args = array(
                'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
                'form_id' => 'logins', //Để dành viết CSS
                'label_username' => __( 'Tên tài khoản' ),
                'label_password' => __( 'Mật khẩu' ),
                'label_remember' => __( 'Ghi nhớ' ),
                'label_log_in' => __( 'Đăng nhập' ),
            );
        ?>

        <?php
            $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
            if ( $login === "failed" ) {
                echo wpautop(__('Sai tên tài khoản hoặc mật khẩu.'));
            } elseif ( $login === "empty" ) {
                echo wpautop(__('Tên tài khoản hoặc mật khẩu không thể bỏ trống.'));
            } elseif ( $login === "false" ) {
                echo wpautop(__('Bạn đã thoát ra.'));
            }
        ?>

        <?php wp_login_form(); ?>
    </div>
</div>