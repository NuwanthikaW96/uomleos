<?php
/**
 * 
 * FortySeven Street Senitizer
 * 
 * @package FortySeven Street
 * 
 */

function fortyseven_street_sanitize_checkbox($input){
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}    
}
function fortyseven_street_pro_floatval($input){
	return floatval($input);
}

function fortyseven_street_sanitize_text( $input ){
	return wp_kses_post( force_balance_tags( $input ) );
} 

function fortyseven_street_sanitize_integer( $input ) {
	return absint( $input );
} 

function fortyseven_street_sanitize_radio_webpagelayout($input) {
	$valid_keys = array(
		'boxed' => __('Boxed', 'fortyseven-street'),
		'fullwidth' => __('Full Width', 'fortyseven-street')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function fortyseven_street_sanitize_bkg_style($input) {
	$valid_keys = array(
		'no-repeat' => __('No Repeat' , 'fortyseven-street'),
		'repeat' => __('Tile' , 'fortyseven-street'),
		'repeat-x' => __('Tile Horizontally' , 'fortyseven-street'),
		'repeat-y' => __('Tile Vertically' , 'fortyseven-street'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}



function fortyseven_street_sanitize_position($input) {
	$valid_keys = array(
		'left' => __('Left' , 'fortyseven-street'),
		'center' => __('Center' , 'fortyseven-street'),
		'right' => __('Right' , 'fortyseven-street'),                                
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function fortyseven_street_sanitize_attach($input) {
	$valid_keys = array(
		'fixed' => __('Fixed' , 'fortyseven-street'),
		'scroll' => __('Scroll' , 'fortyseven-street'),                                
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function fortyseven_street_blog_layout($input){
	$valid_keys = array( 
		'blog_layout1' => __('Image Large', 'fortyseven-street'),
		'blog_layout2' => __('Square Image Medium', 'fortyseven-street'),
		'blog_layout3' => __('Square Image Alternate Medium', 'fortyseven-street'),
		'blog_layout4' => __('Circular Image Medium', 'fortyseven-street'),
		'blog_layout5' => __('Circular Image Alternate Medium', 'fortyseven-street'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}

}

function fortyseven_street_side_layout($input){
	$valid_keys = array( 
		'right-sidebar' => 'Right Sidebar',
		'left-sidebar' => 'Left Sidebar',
		'no-sidebar' => 'No Sidebar',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}

}

function fortyseven_street_enable_disable($input){
	$valid_keys = array( 
		'enable'=>__('Enable', 'fortyseven-street'),
		'disable'=>__('Disable', 'fortyseven-street')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}

}

function fortyseven_street_yes_no($input){
	$valid_keys = array( 
		'yes' => __( 'Yes', 'fortyseven-street' ),
		'no' => __( 'No' , 'fortyseven-street' ),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}

}

function fortyseven_street_fade_slide($input){
	$valid_keys = array( 
		'fade' => __( 'Fade' , 'fortyseven-street' ),
		'slide' => __( 'Slide' , 'fortyseven-street' ),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}

}

function fortyseven_street_show_hide($input){
	$valid_keys = array( 
		'show' => __( 'Show' , 'fortyseven-street' ),
		'hide' => __( 'Hide' , 'fortyseven-street' ),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}

}