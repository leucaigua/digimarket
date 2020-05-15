<?php
/**
 * Template Style Six for Team
 *
 * @package RadiantThemes

 */
 
 $output .= '<div class="team-item ">';
               $output .= ' <div class="team-hoverfx" >';
                    $output .= '<div class="team-figure">';
                        $output .= '<ul>';
						if ( ! empty( get_post_meta( get_the_ID(), '_team_facebook', true ) ) ) {
                           $output .= ' <li><a href="' . get_post_meta( get_the_ID(), '_team_facebook', true ) . '"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
						}
						if ( ! empty( get_post_meta( get_the_ID(), '_team_twitter', true ) ) ) {
                           $output .= '<li><a href="' . get_post_meta( get_the_ID(), '_team_twitter', true ) . '"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
						}
                        if ( ! empty( get_post_meta( get_the_ID(), '_team_gplus', true ) ) ) {
                            $output .= '<li><a href="' . get_post_meta( get_the_ID(), '_team_gplus', true ) . '"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
						}
						if ( ! empty( get_post_meta( get_the_ID(), '_team_pinterest', true ) ) ) {
                           $output .= ' <li><a href="' . get_post_meta( get_the_ID(), '_team_pinterest', true ) . '"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>';
						}
                        $output .= '</ul>';
                    $output .= '</div>';

                   $output .= ' <div class="team-figure">';
                        $output .= '<hr>';
                        $output .= '<a href="' . get_the_permalink() . '"><h3>' . get_the_title() . '</h3></a>';
                        $terms   = get_the_terms( get_the_ID(), 'profession' );
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$output .= '<p >' . $term->name . '</p>';
				}
			}
                   $output .= ' </div>';
                    $output .= '<div class="team-overlay">';
                   $output .= ' </div>';
                   $output .= ' <img src="'. get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '">';
                    $output .= '<div class="team_detail_bx">';
                        $output .= '<h3>' . get_the_title() . '</h3>';
						
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$output .= '<p >' . $term->name . '</p>';
				}
			}
                        
                   $output .= ' </div>';
                $output .= '</div>';
            $output .= '</div>';
			
			

