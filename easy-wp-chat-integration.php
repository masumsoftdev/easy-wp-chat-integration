<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*
* Plugin Name: Easy WP Chat Integration
* Plugin URI:        https://anothermonk.com/plugins/easy-wp-chat-integration
* Description:       This plugin enables a feature of WhatsApp and Phone call button integration easily to the website.
* Version:           1.0.0
* Author:            Masum Billah
* Author URI:        https://masum.anothermonk.com/
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       ewpci
* Domain Path:       /languages
*/

class Ewpci_Phone_Call_WhatsApp_Icons {

    public function __construct() {
        include_once('admin/easy-wp-chat-int-admin-page.php');
        add_action('wp_enqueue_scripts', array($this, 'ewpci_enqueue_assets'));
        add_action('wp_footer', array($this, 'ewpci_render_phone_call_icon'));
        add_action('wp_footer', array($this, 'ewpci_render_whatsapp_icon'));
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'ewpci_settings_link'));
    }

    public function ewpci_enqueue_assets() {

        // Enqueue plugin CSS
        wp_enqueue_style('ewpci-phone-call-icon-styles', plugins_url('assets/css/phone-call-icon.css', __FILE__), array(), '1.0.0');
        wp_enqueue_style('ewpci-whatsapp-icon-styles', plugins_url('assets/css/whatsapp-icon.css', __FILE__), array(), '1.0.0');

        // Enqueue plugin JavaScript
        wp_enqueue_script('ewpci-phone-call-icon-script', plugins_url('assets/js/phone-call-icon.js', __FILE__), array('jquery'), '1.0.0', true);
        wp_enqueue_script('ewpci-whatsapp-icon-script', plugins_url('assets/js/whatsapp-icon.js', __FILE__), array('jquery'), '1.0.0', true);

   
        $options         = get_option('easy_wp_chat_integration_settings', array());
        $phone_number    = isset($options['phone_number']) ? $options['phone_number'] : '';
        $whatsapp_number = isset($options['whatsapp_number']) ? $options['whatsapp_number'] : '';
        
        wp_localize_script( 'ewpci-phone-call-icon-script', 'phone_obj', array(
            'adminurl' => admin_url('admin-ajax.php'),
            'phone_number' => $phone_number
        ));
        wp_localize_script( 'ewpci-whatsapp-icon-script', 'whatsapp_obj', array(
            'adminurl' => admin_url('admin-ajax.php'),
            'whatsapp_number' => $whatsapp_number
        ));
   
   
    }

    public function ewpci_settings_link($links){
        $settings_link = '<a href="admin.php?page=easy-wp-chat-integration">Settings</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
    public function ewpci_render_phone_call_icon() {
        ?>
        <div class="ewpci-phone-call-icon">
            <span class="dashicons dashicons-phone"></span> <!-- Font Awesome phone icon -->
        </div>
        <?php
    }

    public function ewpci_render_whatsapp_icon() {
        ?>
        <div class="ewpci-whatsapp-icon">
            <span class="dashicons dashicons-whatsapp"></span> <!-- Font Awesome WhatsApp icon -->
        </div>
        <?php
    }
}

$ewpci_phone_call_whatsapp_icons = new Ewpci_Phone_Call_WhatsApp_Icons();


