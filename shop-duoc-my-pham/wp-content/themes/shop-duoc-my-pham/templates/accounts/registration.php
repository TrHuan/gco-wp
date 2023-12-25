<?php
/**
 * Template Name: Addon user box
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<?php global $userdata; ?>

<div class="registrations-box">
    <?php $err = ''; $success = ''; global $wpdb, $PasswordHash, $current_user, $user_ID; if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
        $pwd1 = $wpdb->escape(trim($_POST['pwd1']));
        $pwd2 = $wpdb->escape(trim($_POST['pwd2']));
        $email = $wpdb->escape(trim($_POST['email']));
        $username = $wpdb->escape(trim($_POST['username']));

        if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "") {
            $err = 'Vui lòng không bỏ trống những thông tin bắt buộc!';
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err = 'Địa chỉ Email không hợp lệ!.';
        } else if(email_exists($email) ) {
            $err = 'Địa chỉ Email đã tồn tại!.';
        } else if($pwd1 <> $pwd2 ){
            $err = '2 Password không giống nhau!.';
        } else {
            $user_id = wp_insert_user( array ('user_pass' => apply_filters('pre_user_user_pass', $pwd1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
            if( is_wp_error($user_id) ) {
                $err = 'Error on user creation.';
            } else {
                do_action('user_register', $user_id);
                $success = 'Bạn đã đăng ký thành công!';
            }
        }
    } ?>
    <!--display error/success message-->

    <div class="title-box">
        <h3 class="title"><?php echo __( 'Đăng ký' ) ?></h3>
    </div>

    <div id="message">
        <?php
            if(! empty($err) ) :
                echo ''.$err.'';
            endif;
        ?>
        <?php
            if(! empty($success) ) :
                $login_page  = home_url( '/logins.php' );
                echo ''.$success. '<a href='.$login_page.'>'.__('Đăng nhập').'</a>'.'';
            endif;
        ?>
    </div>

    <form class="form-horizontal" method="post" role="form">
        <div class="form-group">
            <label class="control-label" for="username">
                <?php echo __('Tên đăng nhập'); ?>
            </label>
            <div class="">
                <input type="text" class="form-control" name="username" id="username" placeholder="<?php echo __('Tên đăng nhập'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="email">
                <?php echo __('Email'); ?>
            </label>
            <div class="">
                <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo __('Email'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="pwd1">
                <?php echo __('Mật khẩu'); ?>
            </label>
            <div class="">
                <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="<?php echo __('Mật khẩu'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="pwd2">
                <?php echo __('Nhắc lại mật khẩu'); ?>
            </label>
            <div class="">
                <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="<?php echo __('Nhắc lại mật khẩu'); ?>">
            </div>
        </div>
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
        <div class="form-group">
            <div class="col-sm-offset-3">
                <button type="submit" class="btn btn-primary"><?php echo __('Đăng ký'); ?></button>
                <input type="hidden" name="task" value="register" />
            </div>
        </div>
    </form>
</div>