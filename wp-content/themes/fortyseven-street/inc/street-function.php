<?php

/**
 * 
 * FortySeven Street custom functions
 * 
 * @package FortySeven Street
 * 
 */

function fortyseven_street_section_enable(){
    $sections = array( 
        'one' => 'about',
        'two' => 'service',
        'three' => 'testimonials',
        'four' => 'portfolio',
        'five' => 'skills',
        'six' => 'clients',
        'seven' => 'pricing',
        'eight' => 'action',
        'nine' => 'team',
        'ten' => 'blog' 
    );
    $section_template_data = array();
    foreach($sections as $section => $value){
        $section_enable_disable = get_theme_mod( 'section_'.$section.'_enable'  , 1 );
        if( !empty($section_enable_disable) && $section_enable_disable == 1 ){
            $section_template_data[] = array(
                'section-id' => $section,
                'template-part' => $value,
            );
        } 
    }
    return $section_template_data;    
} 

function fortyseven_street_page_id( $value ){
    $post = get_post($value);
    return $post;

}

//adding class to body boxed/full-width
function fortyseven_street_bodyclass($classes){
    $classes[]= get_theme_mod('webpage_layout','fullwidth');
    return $classes;
}
add_filter('body_class','fortyseven_street_bodyclass' );

function fortyseven_street_sidebar_layout($classes){
    global $post;
    if( is_404()){
        $classes[] = ' ';
    }
    elseif(is_singular()){
        $post_class = get_post_meta( $post -> ID, 'fortyseven_street_sidebar_layout', true );
        if(empty($post_class)){
            $post_class = 'right-sidebar';
            $classes[] = $post_class;
        }
        else{
            $post_class = get_post_meta( $post -> ID, 'fortyseven_street_sidebar_layout', true );
            $classes[] = $post_class;
        }
    }else{
        $classes[] = 'right-sidebar';   
    }
    return $classes;
}
add_filter('body_class', 'fortyseven_street_sidebar_layout');

function fortyseven_street_is_slider_active($classes){
    if(is_front_page() || is_page_template('template-boxedhome.php') || is_page_template('template-header-layouts.php') ){
        if( get_theme_mod('slider_option','1') != '1') { 
            $classes[] = 'yes-slider';
        }else{
            $classes[] = 'no-slider';
        }
    }else{
        $classes[] = 'no-slider';
    }
    return $classes;
}
add_filter('body_class', 'fortyseven_street_is_slider_active');

function fortyseven_street_get_attachment_id_from_url( $attachment_url = '' ) {

    global $wpdb;
    $attachment_id = false;

    // If there is no url, return.
    if ( '' == $attachment_url )
        return;

    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();

    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url , $upload_dir_paths['baseurl'] ) ) {

        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

    }

    return $attachment_id;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function fortyseven_street_wrapper_start() {
    echo '<div class="ed-container"><div id="primary" class="right-sidebar">';
}
add_action('woocommerce_before_main_content', 'fortyseven_street_wrapper_start', 10);

function fortyseven_street_wrapper_end() {
    echo '</div>';
    do_action( 'woocommerce_sidebar' );
    echo '</div>';
}
add_action('woocommerce_after_main_content','fortyseven_street_wrapper_end',9);

add_filter( 'loop_shop_per_page', 'street_shop_per_page', 20 );
function street_shop_per_page($cols){
    return 8;
}


add_action( 'admin_enqueue_scripts', 'fortyseven_street_admin_scripts' );
function fortyseven_street_admin_scripts( $hook )
{
    wp_enqueue_style( 'fortyseven-street-admin-style', get_template_directory_uri().'/inc/admin-panel/css/admin.css' );
    wp_enqueue_script('fortyseven-street-admin-custom', get_template_directory_uri().'/inc/admin-panel/js/custom.js', array('jquery'),'1.0',true);
    wp_localize_script( 'fortyseven-street-admin-custom', 'fortysevenWelcomeObject', array(
        'admin_nonce'   => wp_create_nonce('fortyseven_plugin_installer_nonce'),
        'activate_nonce'    => wp_create_nonce('fortyseven_plugin_activate_nonce'),
        'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
        'activate_btn' => __('Activate', 'fortyseven-street'),
        'installed_btn' => __('Activated', 'fortyseven-street'),
        'demo_installing' => __('Installing Demo', 'fortyseven-street'),
        'demo_installed' => __('Demo Installed', 'fortyseven-street'),
        'demo_confirm' => __('Are you sure to import demo content ?', 'fortyseven-street'),
    ) );
}

//adding custom scripts and styles in header for favicon and other
function fortyseven_street_header_scripts(){
    $header_bg_v = get_header_image();
    $header_bg_c = get_background_color();
    $header_bg_css = "";
    if(($header_bg_v)){
        $header_bg_css .=   '.main-header { background: url("'.esc_url($header_bg_v).'") no-repeat scroll left top rgba(0, 0, 0, 0); position: relative; z-index: 1;background-size: cover; }\n';
        $header_bg_css .= '.main-header:before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: '.fortyseven_street_hex2rgba($header_bg_c,'0.7').';
            z-index: -1;
        }';
    }
    wp_add_inline_style( 'fortyseven-street-style', $header_bg_css );
}
add_action('wp_enqueue_scripts','fortyseven_street_header_scripts');

/** rgb from hex color code */
/* Convert hexdec color string to rgb(a) string */ 
function fortyseven_street_hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

     //Return default if no color provided
    if(empty($color))
        return $default; 

            //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

            //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

            //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

            //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

            //Return rgb(a) color string
    return $output;
}