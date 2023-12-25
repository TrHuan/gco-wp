<?php

// the_posts_pagination (array(
//     'prev_text' => '<span class="screen-read-text">' . __('Previous page') . '</span>',
//     'before_page_number' => '<span class="meta-nav screen-read-text">' . __('Page') . '</span>',
//     'prev_text' => '<span class="screen-read-text">' . __('Next page') . '</span>',
// )); 
    global $wp_query_count;
    if ( is_null($wp_query_count) || $wp_query_count > 0 ) : ?>
        <!--<div class="bottoms-prds__pages mb-10s">
            <div class="container">
                <?php //previous_posts_link('Quay lại') ?>
                <?php //next_posts_link('Xem thêm...','') ?>
            </div>
        </div>-->
<?php endif;