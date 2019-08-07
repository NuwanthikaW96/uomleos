<?php
/**
 * 
 * Slider Settings
 * 
 * @package FortySeven Street
 * 
 */

function fortyseven_street_customizer_slider( $wp_customize ) {
        
    // select slider type............
    $wp_customize->add_section(
        'slider_general_settings',
        array(
            'title' => __( 'Slider Settings' , 'fortyseven-street' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
            )
        );
    
    $wp_customize->add_setting(
        'slider_category',
        array(
            'sanitize_callback' => 'fortyseven_street_sanitize_integer'
            )
        );
    
    $wp_customize->add_control( new fortyseven_street_Category_Dropdown( $wp_customize, 
        'slider_category',
        array(
            'label' => __( 'Select a category', 'fortyseven-street' ),
            'description' => __( 'Select a category containing Posts with featured images for slider.' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'select',
            )
        )
    );   
    
    //enable/disable slider in homepage
    $wp_customize->add_setting(
        'slider_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );
    
    $wp_customize->add_control(
        'slider_option',
        array(
            'label' => __( 'Check To Disable', 'fortyseven-street' ),
            'description' => __( 'Check to disable the slider in homepage' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'checkbox',
            )
        ); 
    
    //Slider pagination settings
    $wp_customize->add_setting(
        'slider_pager_option',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'fortyseven_street_yes_no',
            )
        );
    
    $wp_customize->add_control(
        'slider_pager_option',
        array(
            'label' => __( 'Show Slider Pager (Navigation dots)' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                'yes' => __( 'Yes', 'fortyseven-street' ),
                'no' => __( 'No' , 'fortyseven-street' ),
                )
            )
        ); 
    
    //Slider control settings
    $wp_customize->add_setting(
        'slider_control_option',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'fortyseven_street_yes_no',
            )
        );
    
    $wp_customize->add_control(
        'slider_control_option',
        array(
            'label' => __( 'Show Slider Controls (Arrows)' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                'yes' => __( 'Yes' , 'fortyseven-street' ),
                'no' => __( 'No' , 'fortyseven-street' ),
                )
            )
        );   
    
    //Slider transition settings
    $wp_customize->add_setting(
        'slider_transition',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'fortyseven_street_fade_slide',
            )
        );
    
    $wp_customize->add_control(
        'slider_transition',
        array(
            'label' => __( 'Slider Transition - fade/slide' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                'fade' => __( 'Fade' , 'fortyseven-street' ),
                'slide' => __( 'Slide' , 'fortyseven-street' ),
                )
            )
        );  
    
    //Slider auto transition settings.   
    $wp_customize->add_setting(
        'slider_auto_transition',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'fortyseven_street_yes_no',
            )
        );
    
    $wp_customize->add_control(
        'slider_auto_transition',
        array(
            'label' => __( 'Slider auto Transition' ,'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                'yes' => __( 'Yes' , 'fortyseven-street' ),
                'no' => __( 'No' , 'fortyseven-street' ),
                )
            )
        );  
    
    //Option to control slider speed.
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => '3000',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );
    
    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Choose slider speed?' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'number',
            )
        );
    
    //Option to control slider pause.    
    $wp_customize->add_setting(
        'slider_pause',
        array(
            'default' => '4000',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );
    
    $wp_customize->add_control(
        'slider_pause',
        array(
            'label' => __( 'Choose slider pause time?' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'number',
            )
        );
    
    //Caption control setting in slider.
    $wp_customize->add_setting(
        'slider_captions',
        array(
            'default' => 'show',
            'sanitize_callback' => 'fortyseven_street_show_hide',
            )
        );
    
    $wp_customize->add_control(
        'slider_captions',
        array(
            'label' => __( 'Show/hide slider captions' , 'fortyseven-street' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                'show' => __( 'Show' , 'fortyseven-street' ),
                'hide' => __( 'Hide' , 'fortyseven-street' ),
                )
            )
        );
}
add_action( 'customize_register', 'fortyseven_street_customizer_slider' );
