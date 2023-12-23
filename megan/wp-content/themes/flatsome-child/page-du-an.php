<?php

/**
 * Template Name: Page Du An
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main">
    <div id="page-header-du-an" class="page-header-wrapper">
        <div class="page-title dark featured-title">
            <div class="page-title-bg">
                <div class="title-bg fill bg-fill parallax-active" data-parallax-container=".page-title" data-parallax-background="" data-parallax="-">
                </div>
                <div class="title-overlay fill"></div>
            </div>

            <div class="page-title-inner container align-center text-center flex-row-col medium-flex-wrap">
                <div class="title-wrapper uppercase is-large flex-col">
                    <h1 class="entry-title mb-0"><?php the_title(); ?></h1>
                </div>
                <div class="title-content flex-col">
                    <div class="title-breadcrumbs pb-half pt-half">
                    <?php $terms = get_field('danh_muc_du_an');
                    if( $terms ): ?>
                        <ul>
                        <?php foreach( $terms as $term ): ?>
                            <li>
                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    </div>      
                </div>
            </div>

            <style>
            #page-header-du-an .page-title-inner {
                min-height: 160px;
            }
            #page-header-du-an .title-bg {
                background-image: url(<?php echo get_field('hinh_anh'); ?>);
            }
            </style>
        </div>
    </div>

    <div class="page-content page-content-du-an">
        <section class="section" id="section_1351337976">
        <div class="section-content relative">
            <div class="row">
                <?php $terms = get_field('danh_muc_du_an');
                if( $terms ): ?>
                    <ul>
                    <?php foreach( $terms as $term ): ?>
                        <li>
                            <div class="item">
                                <article class="post-box">
                                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                        <div class="post-image">
                                            <img src="<?php echo get_field('anh_dai_dien', $term->taxonomy . '_' . $term->term_id); ?>" alt="<?php echo esc_html( $term->name ); ?>">
                                        </div>

                                        <div class="post-content">
                                            <h3 class="post-name">                                            
                                                <?php echo esc_html( $term->name ); ?>
                                            </h3>
                                        </div>
                                    </a>
                                </article>
                            </div>                            
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>