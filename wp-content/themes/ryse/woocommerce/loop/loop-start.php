<?php
/**
 * Template Loop Start
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.1
 */

?>

<div class="clearfix"></div>

<!-- radiantthemes-shop -->
<?php if ( 'shop-style-three-column' === ryse_global_var( 'shop-style', '', false ) ) { ?>
	<div class="radiantthemes-shop three-column <?php echo esc_attr( ryse_global_var( 'shop_box_style', '', false ) ); ?>">
<?php } elseif ( 'shop-style-four-column' === ryse_global_var( 'shop-style', '', false ) ) { ?>
	<div class="radiantthemes-shop four-column <?php echo esc_attr( ryse_global_var( 'shop_box_style', '', false ) ); ?>">
<?php } elseif ( 'shop-style-five-column' === ryse_global_var( 'shop-style', '', false ) ) { ?>
	<div class="radiantthemes-shop five-column <?php echo esc_attr( ryse_global_var( 'shop_box_style', '', false ) ); ?>">
<?php } elseif ( 'shop-style-six-column' === ryse_global_var( 'shop-style', '', false ) ) { ?>
	<div class="radiantthemes-shop six-column <?php echo esc_attr( ryse_global_var( 'shop_box_style', '', false ) ); ?>">
<?php } else { ?>
	<div class="radiantthemes-shop four-column <?php echo esc_attr( ryse_global_var( 'shop_box_style', '', false ) ); ?>">
<?php } ?>
