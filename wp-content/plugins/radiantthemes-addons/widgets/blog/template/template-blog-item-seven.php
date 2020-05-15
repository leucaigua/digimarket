<?php

$output                 .= '<!-- blog-item -->';
	$output             .= '<article class="blog-item large-layout">';
		$output         .= '<div class="holder">';
			$output     .= '<div class="pic">';
				$output .= '<img src="' . plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x52.png' ) . '" alt="Blank Image" width="100" height="52">';
				$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
			$output     .= '</div>';
			$output     .= '<div class="data">';
				$output .= '<ul class="meta-data">';

					$output .= '<li class="date">' . get_the_date() . '</li>';
				$output     .= '</ul>';
				$output     .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
				$output     .= '<p>' . substr( get_the_excerpt(), 0, 120 ) . '...</p>';
				$output     .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__( 'Continue Reading', 'radiantthemes-addons' ) . '</a>';
			$output         .= '</div>';
		$output             .= '</div>';
	$output                 .= '</article>';
	$output                 .= '<!-- blog-item -->';
