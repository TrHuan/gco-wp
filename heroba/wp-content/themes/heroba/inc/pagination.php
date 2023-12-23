
<div class="paginations">
    <?php
        the_posts_pagination (array(
            'prev_text' => '<span class="screen-read-text">' . __('Previous page') . '</span>',
            'before_page_number' => '<span class="meta-nav screen-read-text">' . __('Page') . '</span>',
            'prev_text' => '<span class="screen-read-text">' . __('Next page') . '</span>',
        ));
    ?>
</div>

<div class="paginations paginations-2">
    <div class="pagination">
        <?php echo $nextLink = next_posts_link('Xem tiếp'); ?>
        <?php echo $previousLink = previous_posts_link('Quay lại'); ?>
    </div>
</div>