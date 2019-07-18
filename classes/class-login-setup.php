<?php
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Azad_Custom_Login_Settings' ) ):
    class Azad_Custom_Login_Settings{
        protected static $_instance = null;
        private $settings_api;
        public function __construct() {
            include_once(AZAD_CUSTOM_LOGIN_ROOT_PATH . 'classes/class-acl-settings-api.php');
            $this->settings_api = new ACL_Settings_API();
            add_action('admin_init',array($this,'acl_setting_init'));
            add_action('admin_menu',array($this,'acl_setting_menu'));
        }
        public function acl_setting_init() {
            $this->settings_api->set_sections($this->get_settings_sections());
            $this->settings_api->set_fields($this->get_settings_fields());
        }
        public function acl_setting_menu() {
            add_menu_page(__('Azad Login', 'azad-custom-login'), __('Azad Login','azad-custom-login'), 'manage_options', 'acl-settings', array($this, 'plugin_page'), false, 25);
            add_submenu_page('acl-settings', __('Settings','azad-custom-login'),__('Settings','azad-custom-login'), 'manage_options', 'acl-settings', array($this, 'plugin_page'));
            add_submenu_page('acl-settings', __('Customizer','azad-custom-login'),__('Customizer','azad-custom-login'), 'manage_options', 'login', '__return_null');
            add_submenu_page('acl-settings', __('Help','azad-custom-login'),__('Help','azad-custom-login'), 'manage_options', 'help', '__return_null');
            add_submenu_page('acl-settings', __('Import / Export','azad-custom-login'),__('Import / Export','azad-custom-login'), 'manage_options', 'login', '__return_null');
            add_submenu_page('acl-settings', __('Add-Ons','azad-custom-login'),__('Add-Ons','azad-custom-login'), 'manage_options', 'login', '__return_null');
            
        }
        public function plugin_page() { ?>
            <div class="wrap">
                <h2><?php esc_html_e('Azad Custom Login','azad-custom-login'); ?></h2>
                <?php $this->settings_api->show_navigation(); ?>
                <?php $this->settings_api->show_forms(); ?>
            </div>            
        <?php }
        public function login() { ?>
            <div class="">
                asdfasdf
            </div>            
        <?php }
        public function get_settings_sections(){}
        public function get_settings_fields(){}
        public function plugin_help_page(){}
        public static function _get_instance() {
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
    }
endif;
if(! function_exists('load_azad_custom_login_settings')){
    function load_azad_custom_login_settings(){
        return Azad_Custom_Login_Settings::_get_instance();
    }
}
$GLOBALS['azad_custom_login_settings'] = load_azad_custom_login_settings();