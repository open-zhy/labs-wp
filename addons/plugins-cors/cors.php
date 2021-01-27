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


remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );

add_filter( 'rest_pre_serve_request', function ( $value ) {
    header( 'Access-Control-Allow-Origin: *' );
    header( 'Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS,PATCH' );
    header( 'Access-Control-Allow-Credentials: true' );
    header( 'Access-Control-Allow-Headers: origin, x-requested-with, content-type, sentry-trace, authorization' );
    return $value;
});