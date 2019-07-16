<?php
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Login_Presets' ) ):
    class Login_Presets extends WP_Customize_Control{
        public function render_content() { ?>
            <div class="login_thumbnail">
                <div class="">
                    Another
                </div>
            </div>
        <?php }
        public static function _get_instance() {
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
    }
endif;
if(! function_exists('load_login_presets')){
    function load_login_presets(){
        return Login_Presets::_get_instance();
    }
}
//$GLOBALS['login_presets'] = load_login_presets();