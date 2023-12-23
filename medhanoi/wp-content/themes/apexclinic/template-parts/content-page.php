<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package apexclinic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	    <?php if ( !preg_match( '/vc_row/', get_post()->post_content ) ) : ?>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
    <?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'apexclinic' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->