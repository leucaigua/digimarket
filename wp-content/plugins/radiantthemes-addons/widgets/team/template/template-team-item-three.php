<?php
/**
 * Template Style Three for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder">';
$output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
$output .= '<div class="overlay"></div>';
$output .= '<div class="data">';
if ( 'yes' === $settings['team_enable_link'] ) {
	$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
} else {
	$output .= '<h4 class="title">' . get_the_title() . '</h4>';
}
$terms = get_the_terms( get_the_ID(), 'profession' );
if ( ! empty( $terms ) ) {
	foreach ( $terms as $term ) {
		$output .= '<p class="designation">' . $term->name . '</p>';
	}
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '<!-- team-item -->' . "\r";
