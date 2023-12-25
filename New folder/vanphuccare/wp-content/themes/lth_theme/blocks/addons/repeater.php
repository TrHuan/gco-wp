<?php
   'control_repeater_lth_items' => array(
      'type' => 'repeater',
      'name' => 'items',
      'default' => '',
      'label' => 'Items',
      'help' => '',
      'child_of' => '',
      'placement' => 'inspector',
      'width' => '100',
      'hide_if_not_selected' => 'false',
      'save_in_meta' => 'false',
      'save_in_meta_name' => '',
      'required' => 'false',
      'rows_min' => '1',
      'rows_max' => '',
      'rows_label' => '',
      'rows_add_button_label' => '',
      'rows_collapsible' => 'true',
      'rows_collapsed' => 'true',
      'placeholder' => '',
      'characters_limit' => '',
   ),
   'control_text_lth_item_text' => array(
      'type' => 'text',
      'name' => 'item_text',
      'default' => '',
      'label' => 'Item',
      'help' => '',
      'child_of' => 'control_repeater_lth_items',
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

<?php
   foreach( $attributes['items'] as $inner ) {
      echo $inner['item_text'];
   }
?>