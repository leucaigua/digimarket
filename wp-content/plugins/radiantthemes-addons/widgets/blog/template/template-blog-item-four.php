<?php
/**
 * Template for Blog Item Four.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item">';
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<ul class="meta">';
$output .= '<li class="date">' . get_the_date() . '</li>';
$output .= '</ul>';
$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';
