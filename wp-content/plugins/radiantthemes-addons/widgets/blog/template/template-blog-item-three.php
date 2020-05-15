<?php
/**
 * Template for Blog Item Three.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item">';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="pic">';
$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
$output .= '</div>';
$output .= '<div class="title">';
$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '</div>';
$output .= '<div class="meta">';
$output .= '<ul>';
$output .= '<li class="date">' . get_the_date() . '</li>';
$output .= '</ul>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<p class="excerpt">' . wp_trim_words( get_the_excerpt(), 20, '...' ) . '...</p>';
$output .= '</div>';
$output .= '<div class="more">';
$output .= '<a class="btn" href="' . get_the_permalink() . '"><span>' . esc_html__( 'Continue Reading', 'radiantthemes-addons' ) . '</span><span class="btn-arrow"><i class="fa fa-angle-right"></i></span></a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';
