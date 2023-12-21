<?php

the_posts_pagination (array(
    'prev_text' => '<span class="screen-read-text"><i class="icofont-thin-left"></i>' . __('Previous page') . '</span>',
    'before_page_number' => '<span class="meta-nav screen-read-text">' . __('Page') . '</span>',
    'prev_text' => '<span class="screen-read-text">' . __('Next page') . '<i class="icofont-thin-right"></i></span>',
));

?>

<div class="pagination pagination-blogs">

    <div class="alignleft"><?php previous_posts_link('Quay lại') ?></div>
    <div class="alignright"><?php next_posts_link('Xem thêm','') ?></div>

</div>