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

        	<article class="lth-contacts">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			        		<div class="address-box">
			        			<?php get_template_part('templates/addons/address', 'box'); ?>
			        		</div>

							<div class="contacts-box">
			        			<?php the_field('add_contact_form_7'); ?>
							</div>
			        	</div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        	<div class="googlemap-box">
                        		<?php the_field('googlemap', 'option'); ?>
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
