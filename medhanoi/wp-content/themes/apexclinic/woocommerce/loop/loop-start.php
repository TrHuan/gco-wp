<?php
/**
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.2
 */
?>

<div class="clearfix"></div>

<!-- radiantthemes-shop -->
<?php if ( 'shop-style-three-column' === apexclinic_global_var( 'shop-style', '', false ) ) { ?>
    <div class="radiantthemes-shop three-column">
<?php } elseif ( 'shop-style-four-column' === apexclinic_global_var( 'shop-style', '', false ) ) { ?>
    <div class="radiantthemes-shop four-column">
<?php } elseif ( 'shop-style-five-column' === apexclinic_global_var( 'shop-style', '', false ) ) { ?>
    <div class="radiantthemes-shop five-column">
<?php } elseif ( 'shop-style-six-column' === apexclinic_global_var( 'shop-style', '', false ) ) { ?>
    <div class="radiantthemes-shop six-column">
<?php } else { ?>
    <div class="radiantthemes-shop four-column">
<?php } ?>
