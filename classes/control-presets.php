<?php
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Login_Presets' ) ):
    class Login_Presets extends WP_Customize_Control{
        public function render_content() { 
            // if(empty($this->choices)){
            //     //return;
            // }
            ?>
            <span>Span here</span>
            <div class="themes">
                <?php foreach($this->choices as $val) : ?>
                    <div class="login_thumbnail">
                        <label>
                            <div class="">
                                <img src="<?php echo $val['thumbnail']; ?>" /> 
                            </div>
                        </label>
                    </div>
                <?php endforeach; ?>                
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

function loginpress_gallery_control_css(){ ?>
    <style>
        .themes .login_thumbnail{
            width: calc(50% - 10px);
            margin-bottom: 10px;
            position: relative;
            border: 5px solid transparent;
        }
        .themes .login_thumbnail:nth-child(odd){
            float: left;
        }
        .themes .login_thumbnail:nth-child(even){
            float: right;
        }
    </style>
<?php }
add_action( 'customize_controls_print_styles', 'loginpress_gallery_control_css' );