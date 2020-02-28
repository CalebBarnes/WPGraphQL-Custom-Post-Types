<?php

/**
 * Plugin Name: WPGraphQL Register Custom Post Types
 * Plugin URI: https://github.com/CalebBarnes/
 * Description: Automatically registers custom post types created with CPTUI in WPGraphQL
 * Version: 0.1
 * Author: Caleb Barnes
 * Author URI: https://github.com/CalebBarnes/
 */


add_filter( 'register_post_type_args', function( $args, $post_type ) {
    if (isset($args['cptui']) && $args['cptui'] == true) {
        $args['show_in_graphql'] = true;
        $args['graphql_single_name'] = lcfirst($args['labels']['singular_name']);
        $args['graphql_plural_name'] = lcfirst($args['labels']['name']);
    }

	return $args;

}, 10, 2 );

add_filter( 'cptui_pre_register_post_type', function( $args, $post_type ) {
    $args['cptui'] = true;

    return $args;

}, 10, 2 );