<?php
/**
 * Accordion Template Style Four
 *
 * @package RadiantThemes
 */

$output .= '<div class="radiantthemes-accordion-item">';
$output .= '<div class="radiantthemes-accordion-item-title">';
$output .= '<div class="radiantthemes-accordion-item-title-icon"></div>';
$output .= '<h4 class="panel-title"><span class="panel-title-counter"></span>' . esc_attr( $shortcode['accordion_item_title'] ) . '</h4>';
$output .= '</div>';
$output .= '<div class="radiantthemes-accordion-item-body">';
$output .= $content;
$output .= '</div>';
$output .= '</div>';
