<?php
/**
 * The template for displaying author page
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<?php
if( isset( $_POST['user_profile_nonce_field'] ) 
  && wp_verify_nonce( $_POST['user_profile_nonce_field'], 'user_profile_nonce' ) ) {
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] ){
            wp_update_user( 
                array( 
                    'ID' => $current_user->ID, 
                    'user_pass' => esc_attr( $_POST['pass1'] ) 
                ) 
            );
        }
        else {
            echo   $error[] = __('Mật khẩu của bạn không được cập nhật', 'profile');
        }
    }

    /* Update thông tin user. */
    if ( !empty( $_POST['user_url'] ) ){
        wp_update_user( 
            array( 
                'ID' => $current_user->ID, 
                'user_url' => esc_url( $_POST['user_url'] ) 
            ) 
        );
    }
    if ( !empty( $_POST['nickname'] ) ) {
        update_user_meta( 
            $current_user->ID, 'nickname', esc_attr( $_POST['nickname'] ) 
         ); 
    }
    if ( !empty( $_POST['phone'] ) ) {
        update_user_meta( 
            $current_user->ID, 'phone', esc_attr( $_POST['phone'] ) 
        ); 
    }
    if ( !empty( $_POST['zalo'] ) ) {
        update_user_meta( 
            $current_user->ID, 'zalo', esc_attr( $_POST['zalo'] ) 
        ); 
    }
    if ( !empty( $_POST['facebook'] ) ) {
        update_user_meta( 
            $current_user->ID, 'facebook', esc_attr( $_POST['facebook'] ) 
        ); 
    }
    if ( !empty( $_POST['googleplus'] ) ) {
        update_user_meta( 
            $current_user->ID, 'googleplus', esc_attr( $_POST['googleplus'] ) 
        ); 
    }
    if ( !empty( $_POST['twitter'] ) ) {
        update_user_meta( 
            $current_user->ID, 'twitter', esc_attr( $_POST['twitter'] ) 
        ); 
    }
    if ( !empty( $_POST['description'] ) ){
        update_user_meta( 
            $current_user->ID, 'description', esc_attr( $_POST['description'] ) 
        ); 
    }
    echo '<div class="alert alert-success">
        <strong>Bạn đã sửa thông tin cá nhân thành công!</strong>
    </div>';
}
?>

<?php
    $user_id    = get_current_user_id();
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    $author_id = $author->ID;
?>

<div class="art-breadcrumbs">
	<?php if ($img_url) { ?>
		<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-box/breadcrumb-image-box.php'); ?>
	<?php } ?>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="breadcrumbs-content">
					<div class="title-box breadcrumb-title">
						<h1 class="title"><?php echo __('Xin chào: '); the_author_meta( 'nickname', $author_id );  ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<main class="main-site main-page main-author">
    <div class="main-container">
        <div class="main-content">

        	<article class="lth-author">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			        		<div class="author-box">
			        			<?php if($user_id == $author_id) { ?>
							        <form role="form" action="" id="user_profile" method="POST">
									    <?php wp_nonce_field('user_profile_nonce', 'user_profile_nonce_field'); ?>
									    <div class="form-group">
									        <label for="nickname"><?php echo __('Họ tên'); ?></label>
									        <input type="text" class="form-control" id="nickname"
									           name="nickname" placeholder="<?php echo __('Họ tên'); ?>" value="<?php the_author_meta( 'nickname', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="email"><?php echo __('Email'); ?></label>
									        <input disabled type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php the_author_meta( 'user_email', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="user_url"><?php echo __('Website'); ?></label>
									        <input type="text" class="form-control" id="user_url" name="user_url" placeholder="<?php echo __('Website'); ?>" value="<?php the_author_meta( 'user_url', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="phone"><?php echo __('Số điện thoại'); ?></label>
									        <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo __('Số điện thoại'); ?>" value="<?php the_author_meta( 'phone', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="zalo"><?php echo __('Zalo'); ?></label>
									        <input type="text" class="form-control" id="zalo" name="zalo" placeholder="<?php echo __('Zalo'); ?>" value="<?php the_author_meta( 'zalo', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="facebook"><?php echo __('Facebook'); ?></label>
									        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="<?php echo __('Facebook'); ?>" value="<?php the_author_meta( 'facebook', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="googleplus"><?php echo __('Google Plus'); ?></label>
									        <input type="text" class="form-control" id="googleplus" name="googleplus" placeholder="<?php echo __('Google Plus'); ?>" value="<?php the_author_meta( 'googleplus', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="twitter"><?php echo __('Twitter'); ?></label>
									        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="<?php echo __('Twitter'); ?>" value="<?php the_author_meta( 'twitter', $author_id ); ?>">
									    </div>
									    <div class="form-group">
									        <label for="description"><?php echo __('Mô tả về bạn'); ?></label>
									        <textarea class="form-control" name="description" id="description" rows="3" cols="50">
									            <?php the_author_meta( 'description', $author_id ); ?>
									        </textarea>
									    </div>
									    <div class="form-group">
									        <label for="pass1"><?php echo __('Mật khẩu'); ?></label>
									        <input type="password" class="form-control" id="pass1"name="pass1" placeholder="<?php echo __('Mật khẩu'); ?>">
									    </div>
									    <div class="form-group">
									        <label for="pass2"><?php echo __('Nhập lại mật khẩu'); ?></label>
									        <input type="password" class="form-control" id="pass2" name="pass2" placeholder="<?php echo __('Nhập lại mật khẩu'); ?>">
									    </div>
									    <div class="form-group">
									        <button type="submit" class="btn btn-success"><?php echo __('Cập nhật'); ?></button>
									    </div>
									</form>
							    <?php } else { ?>
							        <div class="info_author">
									    <ul class="list-item">
									        <li class="item">
									            <label for="nickname"><?php echo __('Họ tên:'); ?></label> 
									            <?php the_author_meta( 'nickname', $author_id ); ?>
									        </li>
									        <li class="item">
									            <label for="user_url"><?php echo __('Website:'); ?></label> 
									            <a rel="nofollow" href="<?php the_author_meta( 'user_url', $author_id ); ?>">
									                <?php the_author_meta( 'user_url', $author_id ); ?>
									            </a>
									        </li>
									        <li class="item">
									            <label for="user_url"><?php echo __('Số điện thoại:'); ?></label> 
									            <a rel="nofollow" href="tell:<?php the_author_meta( 'phone', $author_id ); ?>">
									                <?php the_author_meta( 'phone', $author_id ); ?>
									            </a>
									        </li>
									        <li class="item">
									            <label for="user_url"><?php echo __('Zalo:'); ?></label> 
									            <a rel="nofollow" href="<?php the_author_meta( 'zalo', $author_id ); ?>">
									                <?php the_author_meta( 'zalo', $author_id ); ?>
									            </a>
									        </li>
									        <li class="item">
									            <label for="user_url"><?php echo __('Facebook:'); ?></label> 
									            <a rel="nofollow" href="<?php the_author_meta( 'facebook', $author_id ); ?>">
									                <?php the_author_meta( 'facebook', $author_id ); ?>
									            </a>
									        </li>
									        <li class="item">
									            <label for="user_url"><?php echo __('Google Plus:'); ?></label> 
									            <a rel="nofollow" 
									                           href="<?php the_author_meta( 'googleplus', $author_id ); ?>">
									                <?php the_author_meta( 'googleplus', $author_id ); ?>
									            </a>
									        </li>
									        <li class="item">
									            <label for="user_url"><?php echo __('Twitter:'); ?></label> 
									            <a rel="nofollow" href="<?php the_author_meta( 'twitter', $author_id ); ?>">
									                <?php the_author_meta( 'twitter', $author_id ); ?>
									            </a>
									        </li>
									        <li class="item">
									            <label for="description"><?php echo __('Chia sẻ về tôi:'); ?></label>
									            <p><?php the_author_meta( 'description', $author_id ); ?></p>
									       </li>
									    </ul>
									</div>

							    <?php } ?>
			        		</div>
			        	</div>
					</div>
				</div>
			</article>

			<?php if (have_posts()) { ?>
                <?php while (have_posts()) { the_post(); ?>

                    <?php if( have_rows('main') ): ?>
                        <?php while( have_rows('main') ): the_row(); ?>
                            
                            <?php get_template_part('templates/addons/main', ''); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php } ?>
            <?php } ?>

		</div>
	</div>
</main>

<?php get_footer(); ?>
