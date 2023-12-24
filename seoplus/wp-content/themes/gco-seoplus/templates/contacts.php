<?php
/**
 * Template Name: Page Contact
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>
<?php get_header(); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb.php'); ?>

<main class="main-site main-page main-contacts">
    <div class="main-container">
        <div class="main-content">

			<?php if (have_posts()) { ?>
                <?php while (have_posts()) { the_post(); ?>

                    <?php if( have_rows('main') ): ?>
                        <?php while( have_rows('main') ): the_row(); ?>
                            
                            <?php get_template_part('templates/addons/main', ''); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php } ?>
            <?php } ?>

        	<article class="lth-contacts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="contacts-box">
								<div class="title-box">
									<h3 class="title"><?php echo __('Liên hệ với chúng tôi'); ?></h3>
									<?php 
				        				$description_form_contact = get_field('description_form_contact'); 
				        				if ($description_form_contact) { 
			        				?>
										<p><?php echo $description_form_contact; ?></p>
									<?php }?>
								</div>

								<div class="content-box">
			        				<?php the_field('add_contact_form_7'); ?>
			        			</div>
							</div>
						</div>
					</div>
				</div>
			</article>

			<article class="lth-address">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			        		<div class="address-box">
			        			<div class="title-box">
			        				<h3 class="title"><?php echo __('Văn phòng'); ?></h3>
			        				<?php 
				        				$description = get_field('description'); 
				        				if ($description) { 
			        				?>
										<p><?php echo $description; ?></p>
									<?php }?>
			        			</div>

			        			<?php get_template_part('templates/addons/address', 'box'); ?>
			        		</div>
			        	</div>
					</div>
				</div>
			</article>

		</div>
	</div>
</main>

<?php get_footer(); ?>
