<?php
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Login_Radio_Control' ) ):
    class Login_Radio_Control extends WP_Customize_Control{
        public $tyle;
        public $loader;
        public function enqueue() {
            $css = '';
        }
        public function render_content() { 
            ?>
                <label for="">
                    <div style="display:flex;flex-direction:row;">
                        <span>Label</span>
                    </div>
                </label>
        <?php }
        public static function _get_instance() {
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
    }
endif;
if(! function_exists('load_login_radio_control')){
    function load_login_radio_control(){
        return Login_Radio_Control::_get_instance();
    }
}
//$GLOBALS['login_radio_control'] = load_login_radio_control();