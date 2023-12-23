<?php
/**
 * Template for Blog Item Eleven.
 *
 * @package RadiantThemes
 */

$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x62.jpg' ) . '" alt="blank image" width="100" height="62">';
$output .= '<a class="holder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')"></a>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<p class="date">' . get_the_date() . '</p>';
$output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '<p>' . wp_trim_words( get_the_excerpt(), 20, '...' ) . '</p>';
$output .= '</div>';
$output .= '<div class="author">';
$output .= '<div class="author-thumbnail">';
$output .= get_avatar( get_the_author_meta( 'email' ), '150' );
$output .= '</div>';
$output .= '<p>' . esc_html__( 'By', 'radiantthemes-addons' ) . ' ' . get_the_author_link() . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
