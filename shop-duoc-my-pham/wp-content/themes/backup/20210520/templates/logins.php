<?php
/**
 * Template Name: Page Logins
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>
<?php get_header(); ?>

<?php global $userdata; ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb.php'); ?>

<main class="main-site main-page main-logins">
    <div class="main-container">
        <div class="main-content">

        	<article class="lth-logins">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        	
                            <div class="logins-registrations-box">
                                <div class="content-box">
                                    <?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url  = get_edit_profile_url($user_id); ?>

                                        <?php get_template_part('templates/accounts/user-box', ''); ?>

                                    <?php } else { ?>
                                        <?php get_template_part('templates/accounts/user-box', ''); ?>

                                        <?php get_template_part('templates/accounts/login', ''); ?>

                                        <?php get_template_part('templates/accounts/registration', ''); ?>

                                    <?php } ?>
                                </div>
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
