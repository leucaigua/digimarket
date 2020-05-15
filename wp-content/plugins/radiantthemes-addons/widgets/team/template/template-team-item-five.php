<?php
/**
 * Template Style Five for Team
 *
 * @package RadiantThemes

 */
 
 $output .= '<div class="team-item-five matchHeight">';
                $output .= '<div class="rt_team_area">';
                    $output .= '<div class="rt_img_bx"><img src="'. get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '"></div>';
                    $output .= '<div class="rt_team_detail_bx">';
                        if ( 'true' === $settings['team_enable_link'] ) {
	$output .= '<a href="' . get_the_permalink() . '"><h3 >' . get_the_title() . '</h3></a>';
} else {
	$output .= '<h3 >' . get_the_title() . '</h3>';
}
                       $terms   = get_the_terms( get_the_ID(), 'profession' );
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$output .= '<p >' . $term->name . '</p>';
				}
			}
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';


