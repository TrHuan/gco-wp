<?php
	'control_textarea_lth_title' => array(
        'type' => 'textarea',
        'name' => 'title',
        'default' => '',
        'label' => 'Title',
        'help' => '',
        'child_of' => '',
        'placement' => 'inspector',
        'width' => '100',
        'hide_if_not_selected' => 'false',
        'save_in_meta' => 'false',
        'save_in_meta_name' => '',
        'required' => 'false',
        'placeholder' => '',
        'characters_limit' => '',
    ),
    'control_url_lth_title_url' => array(
        'type' => 'url',
        'name' => 'title_url',
        'default' => '',
        'label' => 'Title Url',
        'help' => '',
        'child_of' => '',
        'placement' => 'inspector',
        'width' => '100',
        'hide_if_not_selected' => 'false',
        'save_in_meta' => 'false',
        'save_in_meta_name' => '',
        'required' => 'false',
        'placeholder' => '',
        'characters_limit' => '',
    ),
    'control_textarea_lth_description' => array(
        'type' => 'textarea',
        'name' => 'description',
        'default' => '',
        'label' => 'Description',
        'help' => '',
        'child_of' => '',
        'placement' => 'inspector',
        'width' => '100',
        'hide_if_not_selected' => 'false',
        'save_in_meta' => 'false',
        'save_in_meta_name' => '',
        'required' => 'false',
        'placeholder' => '',
        'characters_limit' => '',
    ),
?>

<?php if ($attributes['title'] || $attributes['description']) : ?>
    <div class="module_header title-box">
        <?php if (isset($attributes['title'])) : ?>
            <h2 class="title">
                <?php if ($attributes['title_url']) : ?> 
                    <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                <?php endif; ?>
                    <?php echo wpautop(esc_html($attributes['title'])); ?>
                <?php if ($attributes['title_url']) : ?> 
                    </a>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <?php if ($attributes['description']) : ?>
            <div class="infor">
                <?php echo wpautop(esc_html($attributes['description'])); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>