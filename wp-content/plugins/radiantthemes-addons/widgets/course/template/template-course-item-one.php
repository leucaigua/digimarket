<?php
/**
 * Template for Course Style One.
 *
 * @package Radiantthemes
 */

$output .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
$output .= '<div class="course-style-one">';
$output .= '<div class="course-main-box">';
$output .= '<img class="responsive" src="' . esc_attr( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) . '">';
$output .= '<div class="course-content-box">';
$output .= '<h2><a href="' . get_the_permalink() . '">' . esc_attr( get_the_title() ) . '</a></h2>';
$output .= esc_attr( get_the_content() );
$output .= '</div>';
$output .= '<div class="ratings-section">';
$output .= '<div class="view-button">';
$output .= '<a href="' . get_the_permalink() . '">View Details</a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
