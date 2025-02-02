<?php
/**
 * Fancy Text Box Template Style Thirteen
 *
 * @package RadiantThemes
 */

$output .= '<div class="holder matchHeight ' . esc_attr( $fancy_css ) . '">';
$output .= '<div class="first-layer">';
$output .= '<div class="icon">';
if ( 'image' === $shortcode['fancy_textbox_icontype'] && $shortcode['fancy_textbox_image'] ) {
	$output .= wp_get_attachment_image( $shortcode['fancy_textbox_image'], 'full' );
}
if ( 'icon' === $shortcode['fancy_textbox_icontype'] && $shortcode['fancy_textbox_icon_icofont'] ) {
	$output .= '<i class="' . esc_attr( $selected_font_style ) . '"></i> ';
}
$output .= '</div>';
$output .= '<div class="data">';
if ( $shortcode['fancy_textbox_title'] ) {
	$output .= '<p class="title">' . esc_attr( $shortcode['fancy_textbox_title'] ) . '</p>';
}
if ( $shortcode['fancy_textbox_subtitle'] ) {
	$output .= '<p class="subtitle">' . esc_attr( $shortcode['fancy_textbox_subtitle'] ) . '</p>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="second-layer">';
$output .= '<div class="data">';
if ( $shortcode['fancy_textbox_title'] ) {
	$output .= '<p class="title">' . esc_attr( $shortcode['fancy_textbox_title'] ) . '</p>';
}
if ( $shortcode['fancy_textbox_subtitle'] ) {
	$output .= '<p class="subtitle">' . esc_attr( $shortcode['fancy_textbox_subtitle'] ) . '</p>';
}
if ( $shortcode['fancy_textbox_content'] ) {
	$output .= '<p class="content">' . wp_kses_post( $shortcode['fancy_textbox_content'] ) . '</p>';
}
$output .= '</div>';
if ( $fancy_textbox_link_url ) {
	$output .= '<div class="more">';
	$output .= '<a class="btn" href="' . esc_url( $fancy_textbox_link_url ) . '" ' . esc_html( $fancy_textbox_link_target ) . '' . esc_html( $fancy_textbox_link_rel ) . '>' . esc_attr( $fancy_textbox_link_title ) . '<i class="fa fa-angle-right"></i></a>';
	$output .= '</div>';
}
$output .= '</div>';
$output .= '</div>';
