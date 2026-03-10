<?php
/*
Plugin Name: Wordpress plugins
Version: 0.0.1
Description: Wordpress plugins
Author: Jon Barton
Text Domain: woocommerce
Requires at least: 6.0
Requires PHP: 7.4
WC requires at least: 7.0
WC tested up to: 7.0
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Wordpress_plugins {
     public function __construct() {
  add_filter('woocommerce_get_availability_text', [$this, 'in_stock'], 10, 2);
     }

 public  function in_stock( $availability_text, $product) {
   //return all the stock as a test to check all the stock
  return __( 'In stock', 'woocommerce');
   //then going through the varients and show whats in stock and what isn't
 }
}

new Wordpress_plugins();
