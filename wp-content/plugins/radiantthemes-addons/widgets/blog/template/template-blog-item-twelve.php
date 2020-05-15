<?php
/**
 * Template for Blog Item Twelve.
 *
 * @package RadiantThemes
 */

// POST FORMAT QUOTE.
$output .= '<article class="blog_col_box">';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="blog_img_area">';
$output .= '<div class="cat_blog_detail"><a href="' . get_category_link( get_the_category( $query->ID )[0]->cat_ID ) . '" class="blue1">' . get_the_category( $query->ID )[0]->name . '</a></div>';
$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" />';
$output .= '</div>';
$output .= '<div class="blog_box_area">';
$output .= '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
$output .= '<div class="blog-author">';
$output .= '<div class="blog_post-author-image">';
$output .= '<a href="' . get_the_permalink() . '">';

if ( get_avatar_url( get_the_author_meta( 'ID' ), 30 ) ) {
	$output .= '<img src="' . get_avatar_url( get_the_author_meta( 'ID' ), 30 ) . '">';
}

$output .= '</a></div>By <a href="' . get_the_permalink() . '" title="' . esc_attr__( ' Posts by ', 'radiantthemes-addons' ) . get_the_author() . '" rel="author">' . get_the_author() . '</a>';
$output .= '</div>';
$output .= '<div class="blog-date">' . get_the_date() . '</div>';
$output .= '<p>' . substr( get_the_excerpt(), 0, 120 ) . '...</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
