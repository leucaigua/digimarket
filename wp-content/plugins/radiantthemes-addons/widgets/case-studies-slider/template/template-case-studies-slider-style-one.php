<?php
/**
 * Template for Case Studies Slider Style One
 *
 * @package RadiantThemes
 */

		$terms               = get_the_terms( get_the_ID(), 'case-study-category' );
		$output             .= '<!-- radiantthemes-case-studies-slider-item -->';
		$output             .= '<div class="radiantthemes-case-studies-slider-item">';
			$output         .= '<div class="holder">';
				$output     .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')" href="' . get_the_permalink() . '"></div>';
				$output     .= '<div class="overlay"></div>';
				$output     .= '<div class="data">';
					$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
				$output     .= '</div>';
				$output     .= '<div class="action-button">';
if ( 'yes' === $settings['case_studies_slider_enable_zoom'] ) {
	$output .= '<a class="btn btn-zoom fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"><span class="ti-zoom-in"></span></a>';
}
					$output .= '<a class="btn btn-link" href="' . get_the_permalink() . '"><span class="ti-link"></span></a>';
				$output     .= '</div>';
			$output         .= '</div>';
		$output             .= '</div>';
		$output             .= '<!-- radiantthemes-case-studies-slider-item -->';

// $output .= '</div>';
