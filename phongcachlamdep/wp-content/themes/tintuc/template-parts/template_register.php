<?php
/*
Template Name: Trang đăng ký
*/
require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;
//Check whether the user is already logged in
if (!$user_ID) {

	if($_POST){
		//We shall SQL escape all inputs
		$username = $wpdb->escape($_POST['username']);
		if(empty($username)) {
			echo "Tên đăng nhập không được để trống.";
			exit();
		}
		$email = $wpdb->escape($_POST['email']);
		if(empty($email)) {
			echo "Địa chỉ Email không được để trống.";
			exit();
		}elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
			echo "Địa chỉ Email không hợp lệ.";
			exit();
		}

		$random_password = wp_generate_password( 12, false );
		$status = wp_create_user( $username, $random_password, $email );
		if ( is_wp_error($status) )
			echo "Tên đăng nhập hoặc địa chỉ Email đã tồn tại.";
		else {
			$from = get_option('admin_email');
			$headers = 'From: '.$from . "\r\n";
			$subject = "Đăng ký thành công";
			$msg = "Đăng ký thành công.\nThông tin chi tiết của bạn\nUsername: $username\nPassword: $random_password";
			wp_mail( $email, $subject, $msg, $headers );
			$link_login = ot_get_option('link_login');
			echo "
			Cám ơn bạn đã đăng ký.<br>
			Mật khẩu đã được chuyển tới địa chỉ Email của bạn.<br>
			Click vào <a href='".$link_login."'>đây</a> để tiến hành đăng nhập
			";
		}

		exit();

	} else {
	get_header();?>

		<div class="site-main">
	        <header class="entry-header">
	            <div class="entry-meta">
	                <h1 class="cat-links">
	                    Đăng ký thành viên
	                </h1>
	            </div>
	        </header><!-- .entry-header -->

	        <?php get_template_part('template-parts/tempalte-post-update');?>

	        <div id="primary" >
	            <div id="content">
	                <div class="entry-content">
	                	<?php
						if(get_option('users_can_register')) { //Check whether user registration is enabled by the administrator
						?>
						<div id="result"></div> <!-- To hold validation results -->
						<form id="wp_signup_form" action="" method="post">
							<label>Tên đăng nhập</label><br />
							<input type="text" name="username" placeholder="Username" class="text" value="" /><br /><br />
							<label>Địa chỉ Email</label><br />
							<input type="text" name="email" class="text" placeholder="Email" value="" /> <br /><br />
							<input type="submit" id="submitbtn" name="submit" value="Đăng ký" /><br /><br /><br />
						</form>
						<script type="text/javascript">
							jQuery("#submitbtn").click(function() {

							jQuery('#result').html('<img src="<?php bloginfo('template_url'); ?>/images/ajax-loader.gif" class="loader" />').fadeIn();
							var input_data = jQuery('#wp_signup_form').serialize();
							jQuery.ajax({
								type: "POST",
								url:  "<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
								data: input_data,
								success: function(msg){
									jQuery('.loader').remove();
									jQuery('<div>').html(msg).appendTo('div#result').hide().fadeIn('slow');
								}
							});
							return false;

							});
						</script>
						<?php }
							else echo "Registration is currently disabled. Please try again later.";
						?>
	                </div>
	            </div><!-- #content -->
	        </div>
	        <div class="clear"></div>
	        <?php if ( ! dynamic_sidebar( 'bottom-cate' ) ) : ?>
	        <?php endif;?>
	        <div class="clear"></div>
	    </div><!-- #main -->

	<?php get_footer();
	} //end of if($_post)
}
else {
	wp_redirect( home_url() ); exit;
}
?>