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


//Making out of stock messaging or low stock 
class Wordpress_plugins {
   public function __construct() {
      add_filter('woocommerce_available_variation', [$this, 'in_stock_availabilty'], 10, 3);
       add_action('woocommerce_before_add_to_cart',[$this, 'messages'],10);
     }
    public function in_stock_availabilty($data, $product, $variation) {
        $stock = $variation->get_stock_quantity();
         
        //elseif stock is equal or less fhan 3 override it eith low stock
        if ($stock <= 3) {
            $data['availability_html'] = '<p class="stock low-stock" style="color:red;">Low Stock ' . $stock . '</p>';
        }
           if ($stock > 3) {
            $data['availability_html'] = '<p class="In-stock" style="color:red;">in  Stock ' . $stock . '</p>';
        }
//return data
    return $data;
    }
    public function messages() {
        echo '<p> Hello  </p>
}

new Wordpress_plugins();
