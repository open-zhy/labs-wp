<?php
/**
 * Plugin Name: Mat Fra Toten WP Addons
 * Description: Additional behavior implemented on matfratoten.no website
 * Version:     0.1.0
 * Author:      WAU I/O
 * Author URI: https://www.wau.co
 * Text Domain: mft-addons
 *
 * @package mft-addons
 */

/**
 * Enforce all new users to have the option 'Publish product directly' enabled
 */
function set_seller_meta($user_id) {
    update_user_meta( $user_id, 'dokan_publishing', 'yes' );
}


add_action( 'user_register', 'set_seller_meta', 10);