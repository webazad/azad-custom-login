<?php
/* 
Plugin Name: Azad Custom Login
Description: Description will go here...
Plugin URi: gittechs.com/plugin/azad-custom-login 
Author: Md. Abul Kalam Azad
Author URI: gittechs.com/author
Author Email: webdevazad@gmail.com
Version: 0.0.0.1
Text Domain: azad-custom-login
*/ 

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Azad_Custom_Login' ) ):

    final class Azad_Custom_Login {
        public static $version = '0000';
        protected static $_instance = null;
        public $session = null;
        public $query = null;
        public $countries = null;
        public function __construct() {
            $this->define_constants();
            $this->includes();
            $this->_hooks();
        }
        private function define_constants() {
            $this->define('AZAD_CUSTOM_LOGIN_BASENAME',plugin_basename(__FILE__));
            $this->define('AZAD_CUSTOM_LOGIN_DIR_PATH',plugin_dir_path(__FILE__));
            $this->define('AZAD_CUSTOM_LOGIN_DIR_URL',plugin_dir_url(__FILE__));
            $this->define('AZAD_CUSTOM_LOGIN_ROOT_PATH',dirname(__FILE__) . '/');
            $this->define('AZAD_CUSTOM_LOGIN_ROOT_FILE',__FILE__);
            $this->define('AZAD_CUSTOM_LOGIN_VERSION',$this->version);
            $this->define('AZAD_CUSTOM_LOGIN_FEEDBACK_SERVER','https://www.gigtechs.com');
        }
        public function includes() {
            include_once(AZAD_CUSTOM_LOGIN_DIR_PATH . 'custom.php');
            include_once(AZAD_CUSTOM_LOGIN_DIR_PATH . 'classes/class-login-setup.php');
        }
        private function _hooks() {
            add_action('admin_menu',array($this,'register_options_page'));
        }
        public function render_optin() {
            //include AZAD_CUSTOM_LOGIN_DIR_PATH . 'include/azad-custom-login-optin-form.php';
        }
        public function textdomain() {
            
        }
        private function define($name,$value) {
            if(! defined($name)){
                define($name,$value);
            }
        }
        public function init(){}
        public function register_options_page() {
            add_submenu_page(null,__('Activate','azad-custom-login'),__('Activate','azad-custom-login'),'manage_options','login_optin',array($this,'render_optin'));
            add_theme_page(__('Azad Custom Login','azad-custom-login'),__('Azad Custom Login','azad-custom-login'),'manage_options','abw','__return_null');
        }
        public function redirect_acl_edit_page() {
            
        }
        public function _send_data() {
            
        }
        public function load_assets() {
            
        }
        public function _admin_scripts() {
            
        }
        public function _row_meta() {
            
        }
        public function add_deactive_modal() {
            
        }
        public static function plugin_activation() {
            $login_key = get_option('login_customization');
            $login_setting = get_option('login_setting');

            if(! $login_key){
                update_option('login_customization',array());
            }
            if(! $login_setting){
                update_option('login_setting',array());
            }
        }
        public static function plugin_deactivation() {
            //delete_option('login_customization');
            //delete_option('login_setting');
        }
        public static function plugin_uninstallation() {
            $email = get_option('admin_email');
            $fields = array(
                // 'email'             => $email,
                // 'website'           => get_site_url(),
                // 'action'            => 'Uninstall',
                // 'reason'            => '',
                // 'reason_detail'     => '',
                // 'blog_language'     => get_bloginfo('language'),
                // 'wordpress_version' => get_bloginfo('version'),
                // 'php_version'       => PHP_VERSION,
                // 'plugin_version'    => LOGIN_PRESS_VERSION,
                // 'plugin_name'       => 'logpress_free'
            );
            $response = wp_remote_post('AZAD_FEEDBACK_SERVER',
                array(
                    // 'method'        => 'POST',
                    // 'timeout'       => 5,
                    // 'httpversion'   => '1.0',
                    // 'blocking'      => false,
                    // 'headers'       => array(),
                    // 'body'          => $fields
                )
            );
        }
        public function get_acl_page() {
            
        }
        public function acl_action_links($links,$file) {
            
        }
        public static function _get_instance() {
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
    }
endif;
if(! function_exists('load_azad_custom_login')){
    function load_azad_custom_login(){
        return Azad_Custom_Login::_get_instance();
    }
}
$GLOBALS['azad_custom_login'] = load_azad_custom_login();

register_activation_hook(__FILE__,array('Azad_Custom_Login','plugin_activation'));
register_deactivation_hook(__FILE__,array('Azad_Custom_Login','plugin_deactivation'));
register_uninstall_hook(__FILE__,array('Azad_Custom_Login','plugin_uninstallation'));