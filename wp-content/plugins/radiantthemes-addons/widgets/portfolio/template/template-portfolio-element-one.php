<?php
/**
 * Template for Portfolio Style One
 *
 * @package RadiantThemes
 */

$k = 1;

if ( empty( $settings['radiant_portfolio_category'] ) ) {
	$portfolio_category = '';
} else {
	$portfolio_category = array(
		array(
			'taxonomy' => 'portfolio-category',
			'field'    => 'slug',
			'terms'    => $settings['radiant_portfolio_category'],
		),
	);
	$hidden_filter      = 'hidden';
}
$output = '<div class="rt-portfolio-box element-one row isotope ' . esc_attr( $settings['radiant_portfolio_extra_class'] ) . '" id="' . esc_attr( $portfolio_id ) . '">';
// WP_Query arguments.
global $wp_query;
$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => esc_attr( $settings['radiant_portfolio_max_posts'] ),
	'orderby'        => esc_attr( $settings['radiant_portfolio_looping_order'] ),
	'order'          => esc_attr( $settings['radiant_portfolio_looping_sort'] ),
	'tax_query'      => $portfolio_category,
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		// include file with color sanitization functions.
		if ( ! function_exists( 'sanitize_hex_color' ) ) {
			include_once ABSPATH . 'wp-includes/class-wp-customize-manager.php';
		}

		// fetch and sanitize the colors.
		$background_color = sanitize_hex_color( get_post_meta( get_the_id(), 'radiant_pc_primary_color', true ) );

		if ( ( $k % 8 ) && ( $k != 1 ) ) {
			// SECOND BOX.
			$output .= '<div class="rt-portfolio-box-item small-box col-lg-4 col-md-4 col-sm-6 col-xs-12 ';
			if ( $terms ) {
				foreach ( $terms as $term ) {
					$output .= $term->slug . ' ';
				}
			}
			$output .= '">';
			$output .= '<div class="holder">';
			$output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
			$output .= '<div class="data">';
			$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output .= '<h5 class="categories">';

			$cats = get_the_terms( get_the_ID(), 'portfolio-category' );

			foreach ( $cats as $cat ) {
				$term_id    = $cat->term_id;
				$ptype_name = $cat->name;
				$ptype_des  = $cat->description;
				$ptype_slug = $cat->slug;
				$term_link  = get_term_link( $cat );
				$output    .= '<span>';
				$output    .= $ptype_name;
				$output    .= '</span>';
			}

			$output .= '</h5>';
			if ( $settings['radiant_portfolio_add_link'] ) {
				$output .= '<a class="portfolio-link" href="' . get_the_permalink() . '"><i class="fa fa-link"></i></a>';
			}
			if ( $settings['radiant_portfolio_add_zoom'] ) {
				$output .= '<a class="portfolio-zoom fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"><i class="fa fa-search"></i></a>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';

		} else {

			// FIRST BOX.
			$output .= '<div class="rt-portfolio-box-item large-box col-lg-6 col-md-6 col-sm-12 col-xs-12 ';
			if ( $terms ) {
				foreach ( $terms as $term ) {
					$output .= $term->slug . ' ';
				}
			}

			$output .= '">';
			$output .= '<div class="holder">';
			$output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
			$output .= '<div class="data">';
			$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output .= '<h5 class="categories">';

			$cats = get_the_terms( get_the_ID(), 'portfolio-category' );

			foreach ( $cats as $cat ) {
				$term_id    = $cat->term_id;
				$ptype_name = $cat->name;
				$ptype_des  = $cat->description;
				$ptype_slug = $cat->slug;
				$term_link  = get_term_link( $cat );
				$output    .= '<span>';
				$output    .= $ptype_name;
				$output    .= '</span>';
			}
			$output .= '</h5>';
			if ( $settings['radiant_portfolio_add_link'] ) {
				$output .= '<a class="portfolio-link" href="' . get_the_permalink() . '"><i class="fa fa-link"></i></a>';
			}
			if ( $settings['radiant_portfolio_add_zoom'] ) {
				$output .= '<a class="portfolio-zoom fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"><i class="fa fa-search"></i></a>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';

		}
		$k++;

	endwhile;
}
$output .= '</div>';
