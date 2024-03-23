<?php
if (!defined('ABSPATH')) {
    exit;
}

class ewpci_Admin {
    // Constructor
    public function __construct() {
        // Add menu page
        add_action('admin_menu', array($this, 'ewpci_add_menu_page'));

        // Register plugin settings
        add_action('admin_init', array($this, 'ewpci_register_settings'));
    }

    // Add menu page
    public function ewpci_add_menu_page() {
        add_menu_page(
            __('Easy WP Chat Integration Settings', 'ewpci'),
            __('Easy WP Chat', 'ewpci'),
            'manage_options',
            'easy-wp-chat-integration',
            array($this, 'settings_page'),
            'dashicons-format-chat', 57
        );
    }

    // Register plugin settings
    public function ewpci_register_settings() {
        register_setting('easy_wp_chat_integration_options', 'easy_wp_chat_integration_settings', array($this, 'sanitize_settings'));
    }

    // Settings page content
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Easy WP Chat Integration Settings', 'ewpci'); ?></h1>
            <form method="post" action="options.php">
            <?php settings_fields('easy_wp_chat_integration_options'); ?>
                <?php $options = get_option('easy_wp_chat_integration_settings', array()); ?>
                <table class="form-table">
                    <tr valign="top">
                            <th scope="row"><?php esc_html_e('Phone Number', 'ewpci'); ?></th>
                            <td><input type="tel" name="easy_wp_chat_integration_settings[phone_number]" value="<?php echo esc_attr($options['phone_number'] ?? ''); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('WhatsApp Number', 'ewpci'); ?></th>
                        <td><input type="tel" name="easy_wp_chat_integration_settings[whatsapp_number]" value="<?php echo esc_attr($options['whatsapp_number'] ?? ''); ?>" /></td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}

new ewpci_Admin();
