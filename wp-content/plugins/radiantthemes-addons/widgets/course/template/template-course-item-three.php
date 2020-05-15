<?php
/**
 * Template for Course Style Three.
 *
 * @package Radiantthemes
 */

$output .= '<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">';
$output .= '<div class="course-style-three">';
$output .= '<div class="course-main-box">';
$output .= '<img class="responsive" src="' . esc_attr( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) . '">';
$output .= '<div class="ratings-section">';
$output .= '<div class="row">';
$output .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
$output .= '<div class="course-content-box">';
$output .= '<h2><a href="' . get_the_permalink() . '">' . esc_attr( get_the_title() ) . '</a></h2>';

$terms = get_the_terms( get_the_ID(), 'course_category' );
foreach ( $terms as $single_term ) {
	$output .= '<h3>-' . $single_term->name . '</h3>';
}

$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
