<?php
/**
 * Testimonial Template Style Eight
 *
 * @package Radiantthemes
 */

// START OF LAYOUT EIGHT.
$output .= '<div class="testimonial-style6">';
$output .= '<div class="description">' . esc_attr( get_the_content() ) . '<div class="arrow"></div></div>';
$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID() ) . '" alt="" />';
$output .= '<div class="author">';
$output .= '<h5>' . esc_attr( get_the_title() ) . '</h5>';
$output .= '<p>' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</p>';
$output .= '</div>';
$output .= '</div>';
