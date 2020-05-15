<?php
/**
 * Navigation Menu
 *
 * @package Radiantthemes
 */

/**
 * Walker Nav Menu
 */
class Radiantthemes_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Walker Nav Menu
	 *
	 * @param string       $output Passed by reference. Used to append additional content.
	 * @param WP_Post      $item Menu item data object.
	 * @param integer      $depth Depth of menu item. Used for padding.
	 * @param array|object $args An array|object of wp_nav_menu() arguments.
	 * @param integer      $current_object_id Current Object ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {

		$this->curItem = $item;
		$indent        = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names   = '';
		$value         = '';
		$mega_class    = '';

		$is_mega = ( 'mega_menu' === $item->object ) ? true : false;

		if ( $is_mega ) {
			$mega_class = ' menu-item-has-children mega-parent-menu';
		}

		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]   = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . $mega_class . '"' : '';
		$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output        .= $indent . '<li' . $id . $value . $class_names . '>';
		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';
		$atts           = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
		$attributes     = '';
		$item_output    = '';

		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr && ! empty( $item->url ) && ! $is_mega ) ? esc_url( $value ) : '#';
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		if ( 'page' === $item->object ) {
			$item_output .= $args->before;
			$item_output .= '<a ' . $attributes . ' data-description="' . $item->description . '">';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			// mega menu.
		} else {
			$item_output .= $args->before;
			$item_output .= '<a ' . $attributes . ' data-description="' . $item->description . '">';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		}

		if ( $is_mega ) {
			$post_obj = get_post( $item->object_id, 'OBJECT' );
			if ( did_action( 'elementor/loaded' ) ) {
				$item_output .= '<ul class="mega-child-menu"><li>' . \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_obj->ID ) . '</li></ul>';
			} else {
				$item_output .= '<ul class="mega-child-menu"><li>' . do_shortcode( $post_obj->post_content ) . '</li></ul>';
			}
		}

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
