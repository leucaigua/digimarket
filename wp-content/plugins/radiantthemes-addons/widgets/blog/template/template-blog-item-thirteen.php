<?php
/**
 * Template for Blog Item Thirteen.
 *
 * @package RadiantThemes
 */

$output .= ' <article class="blog-item matchHeight">';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="blog-date-tag">';
$output .= '<p class="blog-date-tag-text">' . get_the_date() . '</p>';
$output .= '</div>';
$output .= '<div class="pic">';
$output .= '<a class="pic-main" href="' . get_the_permalink() . '">';
$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID() ) . '">';
$output .= '</a>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<ul class="meta-data">';
$output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
$output .= '</ul>';
$output .= '<h4 class="title">';
$output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
$output .= '</h4>';
$output .= '<p class="comment">';
$output .= '<span><img src="' . plugins_url( 'radiantthemes-addons/assets/images/comment-icon.png' ) . '" alt="" />' . get_comments_number( $query->ID ) . esc_attr__( ' Comments ', 'radiantthemes-addons' ) . '</span>';
$output .= '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';



