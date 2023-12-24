<?php
/**
 * Pagination
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */

the_posts_pagination (array(
    'prev_text' => '<i class="icofont-simple-left"></i> <span>' . __('Trang trước') . '</span>',
    // 'prev_text' => '<span class="screen-read-text">' . __('Next page') . '</span>',
    'before_page_number' => '<span>' . __('Page') . '</span>',
    'next_text' => '<span>' . __('Trang tiếp') . '</span> <i class="icofont-simple-right"></i>',
));

?>