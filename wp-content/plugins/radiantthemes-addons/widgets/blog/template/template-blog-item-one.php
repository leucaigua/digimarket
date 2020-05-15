<?php
/**
 * Template for Blog Item One.
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
$output .= '<div class="data">';
$output .= '<ul class="meta">';
$output .= '<li class="date">' . get_the_date() . esc_html__( ' by ', 'radiantthemes-addons' ) . get_the_author() . '</li>';
$output .= '</ul>';
$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '<p class="excerpt">' . substr( get_the_excerpt(), 0, 150 ) . '...</p>';
$output .= '<a class="btn" href="' . get_the_permalink() . '"><span>' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</span><span class="btn-arrow"><i class="fa fa-angle-right"></i></span></a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';
