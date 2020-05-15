<?php
/**
 * Template Style One for Team
 *
 * @package RadiantThemes
 */
$output         .= '<!-- team-item -->' . "\r";
$output         .= '<div class="team-item matchHeight">';
	$output     .= '<div class="holder">';
		$output .= '<div class="pic">';
			if ( 'true' === $settings['team_enable_link'] ) {
				$output .= '<a class="placeholder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
			} else {
				$output .= '<div class="placeholder" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></div>';
			}
		$output     .= '</div>';
		$output     .= '<div class="data">';
			$terms   = get_the_terms( get_the_ID(), 'profession' );
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$output .= '<p class="designation">' . $term->name . '</p>';
				}
			}
			if ( 'true' === $settings['team_enable_link'] ) {
				$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			} else {
				$output .= '<h4 class="title">' . get_the_title() . '</h4>';
			}
		$output .= '</div>';
	$output     .= '</div>';
$output         .= '</div>';
$output         .= '<!-- team-item -->' . "\r";
