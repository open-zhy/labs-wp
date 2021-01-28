<?php
/**
 * Plugin Name: Cors Policy
 * Description: WordPress Cors Policy.
 * Version:     1.0.0
 * Author:      Irzhy Ranaivoarivony
 * License:     GPL-3.0
 * Text Domain: cors
 *
 * @package cors
 */

function rest_pre_serve_request_set_cors( $value ) {
    set_cors();

    return $value;
}

function set_cors() {
    header( 'Access-Control-Allow-Origin: *' );
    header( 'Access-Control-Allow-Methods: GET,POST,PUT,DELETE,PATCH,OPTIONS' );
    // header( 'Access-Control-Allow-Credentials: true' );
    header( 'Access-Control-Allow-Headers: accept, referer, user-agent, origin, x-requested-with, content-type, sentry-trace, authorization' );

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header("HTTP/1.1 200 OK");
        exit;
    }
}


remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );

add_filter( 'rest_pre_serve_request', 'rest_pre_serve_request_set_cors', 10);
add_action( 'rest_api_init', 'set_cors', 10);