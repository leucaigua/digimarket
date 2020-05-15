<?php
/**
 * Template for Course Style Four.
 *
 * @package Radiantthemes
 */

$output .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
$output .= '<div class="course-style-five">';
$output .= '<div class="course-main-box">';
$output .= '<img class="responsive" src="' . esc_attr( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) . '">';
$output .= '<div class="course-content-box">';
$output .= '<h2><a href="' . get_the_permalink() . '">' . esc_attr( get_the_title() ) . '</a></h2>';

$terms = get_the_terms( get_the_ID(), 'course_category' );
foreach ( $terms as $single_term ) {
	$output .= '<h3>-' . $single_term->name . '</h3>';
}

$output .= '<p>The languages only differ in their grammar, their pronunciation and their most common words.</p>';
$output .= esc_attr( get_the_content() );
$output .= '</div>';
$output .= '<div class="ratings-section">';
$output .= '<div class="view-button">';
$output .= '<a href="' . esc_url( get_the_permalink() ) . '">View Details</a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
