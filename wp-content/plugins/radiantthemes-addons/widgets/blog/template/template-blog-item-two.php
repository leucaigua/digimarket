<?php
/**
 * Template for Blog Item Two.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output                 .= '<!-- blog-item -->';
$output                 .= '<article class="blog-item">';
	$output             .= '<div class="holder matchHeight">';
		$output         .= '<div class="data">';
			$output     .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output     .= '<p class="excerpt">' . substr( get_the_excerpt(), 0, 230 ) . '...</p>';
			$output     .= '<div class="author-meta">';
				$output .= '<div class="author-meta-pic" style="background-image:url(' . get_avatar_url( get_the_author_meta( 'ID' ), 32 ) . ');"></div>';
				$output .= '<div class="author-meta-data">' . esc_html__( ' by ', 'radiantthemes-addons' ) . get_the_author() . '</div>';
			$output     .= '</div>';
		$output         .= '</div>';
	$output             .= '</div>';
$output                 .= '</article>';
$output                 .= '<!-- blog-item -->';
