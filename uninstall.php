<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete options 
delete_option('easy_wp_chat_integration_settings');
