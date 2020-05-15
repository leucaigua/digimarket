<?php
/**
 * Template for Contact Box Element Two.
 *
 * @package RadiantThemes
 */

$output .= '<ul class="contact">';
if ( $settings['contact_box_address'] ) {
	$output .= '<li class="address"><i class="fa fa-map-marker"></i>' . $settings['contact_box_address'] . '</li>';
}
if ( $settings['contact_box_email'] ) {
	$output .= '<li class="email"><i class="fa fa-envelope"></i>' . $settings['contact_box_email'] . '</li>';
}
if ( $settings['contact_box_phone'] ) {
	$output .= '<li class="phone"><i class="fa fa-phone"></i>' . $settings['contact_box_phone'] . '</li>';
}
if ( $settings['contact_box_fax'] ) {
	$output .= '<li class="fax"><i class="fa fa-fax"></i>' . $settings['contact_box_fax'] . '</li>';
}
if ( $settings['contact_box_whatsapp'] ) {
	$output .= '<li class="whatsapp"><i class="fa fa-whatsapp"></i>' . $settings['contact_box_whatsapp'] . '</li>';
}
$output .= '</ul>';
