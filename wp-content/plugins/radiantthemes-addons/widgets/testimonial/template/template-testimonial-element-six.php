<?php
/**
 * START OF LAYOUT SIX.
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<div class="testimonial-data">';
$output .= '<blockquote>';
$output .= '<p>"' . esc_attr( get_the_content() ) . '"</p>';
$output .= '</blockquote>';
$output .= '</div>';
$output .= '<div class="testimonial-title">';
$output .= '<div class="testimonial-title-pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID() ) . ');"></div>';
$output .= '<div class="testimonial-title-data">';
$output .= '<h4 class="title">' . esc_attr( get_the_title() ) . '</h4>';
$output .= '<p class="designation">' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
