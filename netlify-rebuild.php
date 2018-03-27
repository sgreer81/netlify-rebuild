<?php
/*
Plugin Name: Netlify Rebuild
Plugin URI: http://stephengreer.me
Description: Post to Netlify Webhook on post save
Author: Stephen Greer
Version: 0.1.0
Author URI: http://stephengreer.me
*/

namespace NetlifyRebuild;

// Make sure this file is only run from within WordPress.
defined( 'ABSPATH' ) or die();

/**
 * Send a POST request to a Netlify webhook
 *
 * @param int    $post_id The wordpress post_id
 * @param object $post    The wordpress Post object
 */
function send_webhook( $post_id, $post ) {
    $post_status = $post->post_status;

    if ( $post_status === 'publish' && defined( 'NETLIFY_WEBHOOK' ) ) {
        \wp_remote_post( NETLIFY_WEBHOOK );
    }
}
add_action( 'publish_post', __NAMESPACE__ . '\\send_webhook', 10, 2 );