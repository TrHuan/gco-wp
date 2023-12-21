<?php
/**
 * @block-slug  :   lth-terms
 * @block-output:   lth_terms_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-terms/frontend_callback', 'lth_terms_output_fe', 10, 2);

if (!function_exists('lth_terms_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_terms_output_fe($output, $attributes) {
        ob_start();
?>  

<?php if ($attributes['style'] == 'style-01') { ?>
    <div class="our-team ptb-80">
        <div class="container">
          <div class="section-title default-title">
              <h2><?php echo esc_html($attributes['title']); ?></h2>
          </div>
            <div class="row text-center">
                <?php foreach( $attributes['terms'] as $inner ): ?>
                <!-- Single Team Start Here -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single-team mb-all-30">
                        <div class="team-img sidebar-img sidebar-banner">
                            <?php if ($inner['image']) { ?>
                                <a href="#">
                                    <img src="<?php echo esc_url( $inner['image']['url'] ); ?>" alt="Feature" width="" height="">
                                </a>
                            <?php } ?>
                            <div class="team-link">
                                <ul>
                                    <?php //if ( $inner['term_facebook'] ) { ?>
                                        <li><a href="<?php echo esc_url( $inner['term_facebook'] ); ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php //} ?>
                                    <?php //if ( $inner['term_twitter'] ) { ?>
                                        <li><a href="<?php echo esc_url( $inner['term_twitter'] ); ?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php //} ?>
                                    <?php //if ( $inner['term_google_plus'] ) { ?>
                                        <li><a href="<?php echo esc_url( $inner['term_google_plus'] ); ?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?php //} ?>
                                </ul>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4><?php echo $inner['term_title']; ?></h4>
                            <p><?php echo $inner['term_description']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- Single Team End Here -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php
        return ob_get_clean();
    }
endif;
?>