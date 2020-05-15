<?php
// START OF LAYOUT FIVE.
$output             .= '<div class="holder">';
	$output         .= '<div class="testimonial-data">';
		$output     .= '<blockquote>';
			$output .= '<p>"' . esc_attr( get_the_content() ) . '"</p>';
		$output     .= '</blockquote>';
	$output         .= '</div>';
	$output         .= '<div class="testimonial-title">';
		$output     .= '<h4 class="title">' . esc_attr( get_the_title() ) . '</h4>';
	$output         .= '</div>';
$output             .= '</div>';
