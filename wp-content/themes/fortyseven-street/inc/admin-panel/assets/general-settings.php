<?php
/**
 * 
 * General Settings
 * 
 * @package FortySeven Street
 * 
 */

function fortyseven_street_general_settings( $wp_customize ){

    //Adding the General Setup Panel
    $wp_customize->add_panel('default_settings',array(
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'title' => __('Core Settings','fortyseven-street'),
        'description' => __('Manage General Setups for the site','fortyseven-street')
        ));

    //Add Default Sections to General Panel
    $wp_customize->get_section('title_tagline')->panel = 'default_settings'; //priority 20
    $wp_customize->get_section('colors')->panel = 'default_settings'; //priority 40
    $wp_customize->get_section('header_image')->panel = 'default_settings'; //priority 60
    $wp_customize->get_section('background_image')->panel = 'default_settings'; //priority 80
    $wp_customize->get_section('static_front_page')->panel = 'default_settings'; //priority 120

    $wp_customize->add_panel( 
        'general_settings',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'description' => __( 'General settings of the theme.' , 'fortyseven-street' ),
            'theme_supports' => '',
            'title' => __( 'General Settings', 'fortyseven-street' ),
            ) 
        );

    //Webpage Layout
    $wp_customize->add_section('webpage_layout',array(
        'title'            =>       __('Layout Setting', 'fortyseven-street'),
        'priority'         =>      '5',
        'panel'            =>      'general_settings',
        ));

    $wp_customize->add_setting('webpage_layout',array(
        'default'       =>  'fullwidth',
        'sanitize_callback' => 'fortyseven_street_sanitize_radio_webpagelayout'
        ));

    $wp_customize->add_control('webpage_layout',array(
        'type' => 'radio',
        'label' => __('Website Layout', 'fortyseven-street'),
        'description' => __('Make your website either box layout or full width from click away', 'fortyseven-street'),
        'section' => 'webpage_layout',
        'choices' => array(
            'boxed' => __('Boxed Layout', 'fortyseven-street'),
            'fullwidth' => __('Full Width', 'fortyseven-street')
            )
        ));

    //header type
    $wp_customize->add_section('fortyseven_street_header_setting', array(
        'priority' => 10,
        'title' => __('Header Settings', 'fortyseven-street'),
        'panel' => 'general_settings'
        ));

    $wp_customize->add_setting('fortyseven_street_header_top', array(
        'default' => 'enable',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fortyseven_street_enable_disable',
        ));

    $wp_customize->add_control('fortyseven_street_header_top', array(
        'type' => 'radio',
        'label' => __('Enable Top Header?', 'fortyseven-street'),
        'section' => 'fortyseven_street_header_setting',
        'setting' => 'fortyseven_street_header_top',
        'choices' => array(
            'enable'=>__('Enable', 'fortyseven-street'),
            'disable'=>__('Disable', 'fortyseven-street')
            )
        ));

    $wp_customize->add_setting('fortyseven_street_logo_alignment', array(
        'default' => 'left',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fortyseven_street_sanitize_position',
        ));

    $wp_customize->add_control('fortyseven_street_logo_alignment', array(
        'type' => 'radio',
        'label' => __('Choose the logo alignment that you want', 'fortyseven-street'),
        'section' => 'fortyseven_street_header_setting',
        'setting' => 'fortyseven_street_logo_alignment',
        'choices' => array(
            'left'=>__('Left', 'fortyseven-street'),
            'center'=>__('Center', 'fortyseven-street'),
            'right'=>__('Right', 'fortyseven-street')
            )
        ));
    
    /**
     * 
     * Footer Settings
     * 
     */ 
    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => __( 'Footer Settings' , 'fortyseven-street' ),
            'priority' => 15,
            'panel' => 'general_settings',
            )
        );
    //enable/disable option
    $wp_customize->add_setting(
        'footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_text',
            )
        );

    $wp_customize->add_control(
        'footer_copyright_text',
        array(
            'label' => __( 'Copyright Text' , 'fortyseven-street' ),
            'section' => 'footer_section',
            'type' => 'text',
            )
        );
}
add_action( 'customize_register', 'fortyseven_street_general_settings' ); 