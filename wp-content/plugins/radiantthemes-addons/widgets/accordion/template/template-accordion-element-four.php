<?php
/**
 * Accordion Template Style Four
 *
 * @package Radiantthemes
 */

$output .= '<div class="radiantthemes-accordion-item">';
$output .= '<div class="radiantthemes-accordion-item-title">';
$output .= '<div class="radiantthemes-accordion-item-title-icon"><i class="main-icon"></i></div>';
$output .= '<' . $settings['title_html_tag'] . ' class="panel-title">' . esc_html( $item['tab_title'] ) . '</' . $settings['title_html_tag'] . '>';
$output .= '</div>';
$output .= '<div' . $this->get_render_attribute_string( 'tab_content' ) . ' class="radiantthemes-accordion-item-body">';
$output .= $this->parse_text_editor( $item['tab_content'] );
$output .= '</div>';
$output .= '</div>';
