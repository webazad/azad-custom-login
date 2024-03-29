<?php
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Azad_Custom_Login_Customizer' ) ):
    class Azad_Custom_Login_Customizer{
        public $login_key;
        protected static $_instance = null;
        public function __construct(){
            $this->_hooks();
        }
        private function _hooks(){
            add_action('customize_register',array($this,'customize_login_panel'));
        }
        public function login_customizer_js(){}
        public function login_customizer_preview_js(){}
        public function login_rangle_setting(){}
        public function login_group_setting(){}
        public function login_color_setting(){}
        public function customize_login_panel($customize_azad){
            
            //include(AZAD_CUSTOM_LOGIN_ROOT_PATH . 'classes/controls/background-gallery.php');
            include(AZAD_CUSTOM_LOGIN_ROOT_PATH . 'classes/control-presets.php');
            include(AZAD_CUSTOM_LOGIN_ROOT_PATH . 'classes/controls/radio-button.php');
            
            // AZAD CUSTOM LOGIN PANEL
            $customize_azad->add_panel('azad_custom_login',array(
                'title'             => __('Azad Custom Login','azad-custom-login'),
                'description'       => 'Header',
                'priority'          => 30,
                'capability'        => 'edit_theme_options',
                //'theme_supports'    => '',
                //'type'              => '',
                //'active_callback'   => ''
            ));
            // STANDARD add_section() for AZAD CUSTOM LOGIN
            $customize_azad->add_section('theme_section',array(
                'title'             => __('Themes','azad'),
                'description'       => 'Choose theme...',        
                'priority'          => 1,
                'panel'             => 'azad_custom_login',
                'capability'        => 'edit_theme_options',
                //'theme_supports'    => '',
                //'type'              => '',
                //'active_callback'   => '',
                //'description_hidden'=> '',
            ));
            // STANDARD add_setting() for HEADER
            $customize_azad->add_setting('theme_setting',array(
                'default'               => get_template_directory_uri().'/assets/img/logo.jpg',
                //'type'                  => '',
                'capability'            => 'manage_options',
                'theme_supports'        => '',
                'transport'             => 'postMessage', // Or refresh
            ));
            $free_templates = array();
            $theme_names = array(
                "","",
                __('Company','azad-custom-login'),
                __('Personal','azad-custom-login'),
                __('Corporate','azad-custom-login'),
                __('Startup','azad-custom-login'),
                __('Wedding #1','azad-custom-login'),
                __('Wedding #2','azad-custom-login'),
                __('Company','azad-custom-login'),
                __('Bikers','azad-custom-login'),
                __('Fitness','azad-custom-login'),
                __('Shopping','azad-custom-login'),
                __('Writers','azad-custom-login'),
                __('Geek','azad-custom-login'),
                __('Innovation','azad-custom-login'),
                __('Animated','azad-custom-login'),
                __('Professors','azad-custom-login'),
                __('Lecturer','azad-custom-login')
            );
            $free_templates['default1'] = array(
                'img'       => plugins_url('img/bg.jpg',AZAD_CUSTOM_LOGIN_ROOT_FILE),
                'thumbnail' => plugins_url('img/thumbnail/default-1.png',AZAD_CUSTOM_LOGIN_ROOT_FILE),
                'id'        => 'default',
                'name'      => 'Default'
            );
            $_count = 2;
            while($_count <= 17) :
                $free_templates["default{$_count}"] = array(
                    //'img'     => plugins_url('img/bg.jpg',AZAD_CUSTOM_LOGIN_ROOT_FILE),
                    'thumbnail' => plugins_url("img/thumbnail/default-{$_count}.png",AZAD_CUSTOM_LOGIN_ROOT_FILE),
                    'id'        => 'default',
                    'name'      => $theme_names[$_count],
                    'pro'       => 'yes'
                );
                $_count++;
            endwhile;
            $login_templates = apply_filters('pro_templates',$free_templates);
            // STANDARD add_control() for Image
            $customize_azad->add_control(
                new Login_Presets(
                    $customize_azad,'customize_presets_settings',array(
                        'label'             => '',
                        'description'       => '',        
                        'section'           => 'theme_section',
                        'settings'          => 'theme_setting',        
                        //'setting'         => 'logo',        
                        'priority'          => 1,         
                        'choices'           => $login_templates,        
                        //'input_attrs'       => '',        
                        //'allow_addition'    => '',        
                        //'type'              => '',        
                        //'active_callback'   => ''        
                    )
                )
            );
            // STANDARD add_section() for AZAD CUSTOM LOGIN LOGO
            $customize_azad->add_section('logo_section',array(
                'title'             => __('Logo','azad'),
                'description'       => 'Customize your logo section',        
                'priority'          => 2,
                'panel'             => 'azad_custom_login',
                'capability'        => 'manage_options',
                //'theme_supports'    => '',
                //'type'              => '',
                //'active_callback'   => '',
                //'description_hidden'=> '',
            ));
            // STANDARD add_setting() for HEADER
            $customize_azad->add_setting('logo_setting',array(
                'default'               => get_template_directory_uri().'/assets/img/logo.jpg',
                'type'                  => 'option',
                'capability'            => 'manage_options',
                'theme_supports'        => '',
                'transport'             => 'postMessage', // Or refresh
            ));
            $customize_azad->add_control(
                new Login_Radio_Control(
                    $customize_azad,'customize_logo_settings',array(
                        'label'             => 'Disable logo',
                        'description'       => 'asdf',        
                        'section'           => 'logo_section',
                        'settings'          => 'logo_setting',        
                        //'setting'         => 'logo',        
                        'priority'          => 1,         
                        //'choices'           => $login_templates,        
                        //'input_attrs'       => '',        
                        //'allow_addition'    => '',        
                        'type'              => 'ios',        
                        //'active_callback'   => ''        
                    )
                )
            );
            // STANDARD add_section() for AZAD CUSTOM LOGIN BACKGROUND
            $customize_azad->add_section('background_section',array(
                'title'             => __('Background','azad'),
                'description'       => 'Insert logo...',        
                'priority'          => 3,
                'panel'             => 'azad_custom_login',
                'capability'        => 'manage_options',
                //'theme_supports'    => '',
                //'type'              => '',
                //'active_callback'   => '',
                //'description_hidden'=> '',
            ));
            // STANDARD add_setting() for HEADER
            $customize_azad->add_setting('background_setting',array(
                'default'               => get_template_directory_uri().'/assets/img/logo.jpg',
                'type'                  => 'option',
                'capability'            => 'manage_options',
                'theme_supports'        => '',
                'transport'             => 'postMessage', // Or refresh
            ));
            $customize_azad->add_control(
                new WP_Customize_Color_Control(
                    $customize_azad,'customize_background_settings',array(
                        'label'             => 'Disable logo',
                        'description'       => '',        
                        'section'           => 'background_section',
                        'settings'          => 'background_setting',        
                        //'setting'         => 'logo',        
                        'priority'          => 2,         
                        //'choices'           => $login_templates,        
                        //'input_attrs'       => '',        
                        //'allow_addition'    => '',        
                        //'type'              => '',        
                        //'active_callback'   => ''        
                    )
                )
            );

        }
        public function login_page_custom_header(){}
        public function login_page_logo_url(){}
        public function login_page_custom_footer(){}
        public function login_woo_login_errors(){}
        public function login_error_messages(){}
        public function lost_password_messages(){}
        public function change_username_label(){}
        public function change_password_label(){}
        public function change_welcome_message(){}
        public function redirect_to_custom_page(){}
        public function menu_url(){}
        public function remove_error_messages_in_wp_customiser(){}
        public static function _get_instance() {
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
        public function __destruct(){}
    }
endif;
if(! function_exists('load_azad_custom_login_customizer')){
    function load_azad_custom_login_customizer(){
        return Azad_Custom_Login_Customizer::_get_instance();
    }
}
$GLOBALS['azad_custom_login_customizer'] = load_azad_custom_login_customizer();