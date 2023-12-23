<?php
/**
 * Template for Blog Item One.
 *
 * @package Radiantthemes
 */

$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x80.jpg' ) . '" alt="blank image" width="100" height="80">';
$output .= '<a class="holder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')"></a>';
$output .= '</div>';
$output .= '<div class="meta">';
$output .= '<ul>';
$output .= '<li class="date">' . get_the_date() . '</li>';
$output .= '</ul>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '<p>' . wp_trim_words( get_the_excerpt(), 20, '...' ) . '</p>';
$output .= '</div>';
$output .= '<div class="more">';
$output .= '<a class="btn" href="' . get_the_permalink() . '"><span>' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</span><i class="fa fa-long-arrow-right"></i></a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
