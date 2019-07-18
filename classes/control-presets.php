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
            <!-- <span>Span here</span> -->
            <div class="themes">
                <?php foreach($this->choices as $val) : ?>
                    <div class="login_thumbnail">
                        <label for="">
                            <div class="login_thumbnail_img">
                                <img src="<?php echo $val['thumbnail']; ?>" /> 
                            </div>
                            <h3><?php echo $val['name']; ?></h3>
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
        .themes .login_thumbnail h3{
            margin: 0;
            font: 400 14px 'Open Sans', Arial, Helvetica, sans-serif;
            line-height: 1.1;
            padding: 3px;
            text-align: center;
            background: #eee;
            color: #777777;
        }
        #customize-control-customize_presets_settings .login_thumbnail_img:after {
            content: '';
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #2EB150;
            position: absolute;
            top: -5px;
            left: -5px;
            border-radius: 50%;
            visibility: hidden;
        }
        #customize-control-customize_presets_settings .login_thumbnail_img:before {
            height: 6px;
            width: 3px;
            -webkit-transform-origin: left top;
            -moz-transform-origin: left top;
            -ms-transform-origin: left top;
            -o-transform-origin: left top;
            transform-origin: left top;
            border-right: 3px solid white;
            border-top: 3px solid white;
            border-radius: 2.5px !important;
            content: '';
            position: absolute;
            z-index: 2;
            opacity: 0;
            margin-top: 0px;
            margin-left: -7px;
            top: 5px;
            left: 4px;
        }
        #customize-control-customize_presets_settings .login_thumbnail_img{
            display: block;
            position: relative;
        }
        #customize-control-customize_presets_settings input[type="radio"]:checked + label .login_thumbnail_img:before {
            -webkit-animation-delay: 100ms;
            -moz-animation-delay: 100ms;
            animation-delay: 100ms;
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-timing-function: ease;
            -moz-animation-timing-function: ease;
            animation-timing-function: ease;
            -webkit-animation-name: checkmark;
            -moz-animation-name: checkmark;
            animation-name: checkmark;
            -webkit-transform: scaleX(-1) rotate(135deg);
            -moz-transform: scaleX(-1) rotate(135deg);
            -ms-transform: scaleX(-1) rotate(135deg);
            -o-transform: scaleX(-1) rotate(135deg);
            transform: scaleX(-1) rotate(135deg);
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            z-index: 2;
        }
    </style>
<?php }
add_action( 'customize_controls_print_styles', 'loginpress_gallery_control_css' );