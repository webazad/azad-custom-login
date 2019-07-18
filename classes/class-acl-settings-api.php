<?php
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'ACL_Settings_API' ) ):
    class ACL_Settings_API{
        protected static $_instance = null;
        protected $settings_sections = array();
        protected $settings_fields = array();
        public function __construct() {
            add_action('admin_enqueue_scripts',array($this,'admin_enqueue_scripts'));
        }
        public function admin_enqueue_scripts($hook){
            //wp_enqueue_media();
            //wp_enqueue_scripts('jquery');
        }
        public function set_sections($sections) {
            $this->setting_sections = $sections;
            return $this;
        }
        public function add_sections($sections) {
            $this->settings_sections[] = $sections;
            return $this;
        }
        public function set_fields($fields) {
            $default = array();
        }
        // public function admin_init() {
        //     $default = array();
        // }
        // public function get_field_description() {
        //     $default = array();
        // }
        // public function callback_text() {
        //     $default = array();
        // }
        // public function callback_url() {
        //     $default = array();
        // }
        // public function callback_number() {
        //     $default = array();
        // }
        // public function callback_checkbox() {
        //     $default = array();
        // }
        // public function callback_multicheck() {
        //     $default = array();
        // }
        // public function callback_radio() {
        //     $default = array();
        // }
        // public function callback_select() {
        //     $default = array();
        // }
        // public function callback_textarea() {
        //     $default = array();
        // }
        // public function callback_html() {
        //     $default = array();
        // }
        // public function callback_file() {
        //     $default = array();
        // }
        // public function callback_password() {
        //     $default = array();
        // }
        // public function callback_color() {
        //     $default = array();
        // }
        // public function callback_autologin() {
        //     $default = array();
        // }
        // public function callback_hidelogin() {
        //     $default = array();
        // }
        // public function callback_login_redirect() {
        //     $default = array();
        // }
        // public function callback_register_fileds() {
        //     $default = array();
        // }
        // public function sanitize_options() {
        //     $default = array();
        // }
        // public function get_sanitize_callback() {
        //     $default = array();
        // }
        // public function get_option() {
        //     $default = array();
        // }
        public function show_navigation() {
            $html = '<h2 class="nav-tab-wrapper">';
            $html = '<h2 class="nav-tab-wrapper">';
            $html = '<h2 class="nav-tab-wrapper">';
            $html = '</h2>';
            echo $html;
        }
        public function show_forms() {
            $html = 'asdf';
            echo $html;
        }
        // public function scripts() {
        //     $default = array();
        // }
        // public function style_fix() {
        //     $default = array();
        // }
        // public function get_description() {
        //     $default = array();
        // }
        // public function do_settings_sections($page) {
        //     //global $settings;
        // }
        // public function acl_setting_init() {
        //     //$this->settings_api->set_sections();
        // }
        public static function _get_instance() {
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
    }
endif;
if(! function_exists('load_acl_settings_api')){
    function load_acl_settings_api(){
        return ACL_Settings_API::_get_instance();
    }
}
//$GLOBALS['acl_settings_api'] = load_acl_settings_api();