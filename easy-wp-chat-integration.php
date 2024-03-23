<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*
* Plugin Name: Easy WP Chat Integration
* Plugin URI:        https://anothermonk.com/plugins/easy-wp-chat-integration
* Description:       This plugin enables a feature of WhatsApp and Phone call button integration easily to website.
* Version:           1.0.0
* Author:            Masum Billah
* Author URI:        https://masum.anothermonk.com/
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       clufw
* Domain Path:       /languages
*/

class ewpbtn_Phone_Call_WhatsApp_Icons {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'ewpbtn_enqueue_assets'));
        add_action('wp_footer', array($this, 'ewpbtn_render_phone_call_icon'));
        add_action('wp_footer', array($this, 'ewpbtn_render_whatsapp_icon'));
    }

    public function ewpbtn_enqueue_assets() {
        // Enqueue Font Awesome
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        // Enqueue plugin CSS
        wp_enqueue_style('ewpbtn-phone-call-icon-styles', plugins_url('assets/css/phone-call-icon.css', __FILE__));
        wp_enqueue_style('ewpbtn-whatsapp-icon-styles', plugins_url('assets/css/whatsapp-icon.css', __FILE__));
        
        // Enqueue plugin JavaScript
        wp_enqueue_script('ewpbtn-phone-call-icon-script', plugins_url('assets/js/phone-call-icon.js', __FILE__), array('jquery'), '', true);
        wp_enqueue_script('ewpbtn-whatsapp-icon-script', plugins_url('assets/js/whatsapp-icon.js', __FILE__), array('jquery'), '', true);
    }

    public function ewpbtn_render_phone_call_icon() {
        ?>
        <div class="ewpbtn-phone-call-icon">
            <i class="fas fa-phone-alt"></i> <!-- Font Awesome phone icon -->
        </div>
        <?php
    }

    public function ewpbtn_render_whatsapp_icon() {
        ?>
        <div class="ewpbtn-whatsapp-icon">
            <i class="fab fa-whatsapp"></i> <!-- Font Awesome WhatsApp icon -->
        </div>
        <?php
    }
}

$ewpbtn_phone_call_whatsapp_icons = new ewpbtn_Phone_Call_WhatsApp_Icons();


