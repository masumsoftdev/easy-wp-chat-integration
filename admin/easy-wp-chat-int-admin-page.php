<?php
if (!defined('ABSPATH')) {
    exit;
}

class Ewpci_Admin {
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
            __('Easy WP Chat Integration Settings', 'easy-wp-chat-integration'),
            __('Easy WP Chat', 'easy-wp-chat-integration'),
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

    // Sanitize settings input
    public function sanitize_settings($input) {
        $input['phone_number'] = sanitize_text_field($input['phone_number'] ?? '');
        $input['whatsapp_number'] = sanitize_text_field($input['whatsapp_number'] ?? '');
        $input['enable_integration'] = isset($input['enable_integration']) ? 1 : 0; // Sanitize checkbox
        return $input;
    }

    // Settings page content
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Easy WP Chat Integration Settings', 'easy-wp-chat-integration'); ?></h1>
            <form method="post" action="options.php">
                <?php settings_fields('easy_wp_chat_integration_options'); ?>
                <?php $options = get_option('easy_wp_chat_integration_settings', array()); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('Enable Integration', 'easy-wp-chat-integration'); ?></th>
                        <td>
                            <input type="checkbox" name="easy_wp_chat_integration_settings[enable_integration]" value="1" <?php checked($options['enable_integration'] ?? 0, 1); ?> />
                            <label for="enable_integration"><?php esc_html_e('Enable chat integration', 'easy-wp-chat-integration'); ?></label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('Phone Number', 'easy-wp-chat-integration'); ?></th>
                        <td>
                            <input type="tel" name="easy_wp_chat_integration_settings[phone_number]" value="<?php echo esc_attr($options['phone_number'] ?? ''); ?>" />
                            <small><?php esc_html_e("Leave this field blank if you do not wish to display a Phone Icon.", "easy-wp-chat-integration"); ?></small>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('WhatsApp Number', 'easy-wp-chat-integration'); ?></th>
                        <td>
                            <input type="tel" name="easy_wp_chat_integration_settings[whatsapp_number]" value="<?php echo esc_attr($options['whatsapp_number'] ?? ''); ?>" />
                            <small><?php esc_html_e("Leave this field blank if you do not wish to display a WhatsApp Icon.", "easy-wp-chat-integration"); ?></small>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}

new Ewpci_Admin();
