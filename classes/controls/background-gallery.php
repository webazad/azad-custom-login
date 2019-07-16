<?php
defined('ABSPATH') || exit;

if ( ! class_exists( 'WP_Customize_Control' ) ){
    return null;
}
class Login_Background_Control extends WP_Customize_Control{
    public function render_content(){
        
    }
}
function loginpress_gallery_control_css(){
    
}
add_action( 'customize_controls_print_styles', 'loginpress_gallery_control_css' );