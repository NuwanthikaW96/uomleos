<?php
/**
 * 
 * Homepage Settings
 * 
 * @package FortySeven Street
 * 
 */

function fortyseven_street_homepage_settings( $wp_customize ){
    $wp_customize->add_panel( 
        'homepage_settings',
        array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'description' => __( 'Settings to control the homepage features.It will use Homepage Template that comes up with theme.' , 'fortyseven-street' ),
            'title' => __( 'Homepage Settings', 'fortyseven-street' ),
            ) 
        );
    
    /** ******************************** About Us Settings ******************************** */ 
    $wp_customize->add_section(
        'section_one',
        array(
            'title' => __( 'About Section' , 'fortyseven-street' ),
            'priority' => 10,
            'panel' => 'homepage_settings',
            )
        );

    //enable/disable option
    $wp_customize->add_setting(
        'section_one_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );

    $wp_customize->add_control(
        'section_one_enable',
        array(
            'label' => __( 'Enable About Section' , 'fortyseven-street' ),
            'section' => 'section_one',
            'type' => 'checkbox',
            )
        );

    //section one section title
    $wp_customize->add_setting(
        'section_one_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_one_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_one',
            'type' => 'textarea',
            )
        ); 

    //section one page choose
    $wp_customize->add_setting(
        'section_one_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );

    $wp_customize->add_control(
        'section_one_page',
        array(
            'label' => __( 'Section Page Choose' , 'fortyseven-street' ),
            'section' => 'section_one',
            'type' => 'dropdown-pages',
            )
        );

    //section one button text
    $wp_customize->add_setting(
        'section_one_button_text',
        array(
            'default' => __('Visit Us','fortyseven-street'),
            'sanitize_callback' => 'fortyseven_street_sanitize_text',
            )
        );

    $wp_customize->add_control(
        'section_one_button_text',
        array(
            'label' => __( 'Button Link Text' , 'fortyseven-street' ),
            'section' => 'section_one',
            'type' => 'text',
            )
        ); 

    //section one button link
    $wp_customize->add_setting(
        'section_one_button_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
            )
        );

    $wp_customize->add_control(
        'section_one_button_link',
        array(
            'label' => __( 'Button Link' , 'fortyseven-street' ),
            'section' => 'section_one',
            'type' => 'text',
            )
        ); 

    /** ******************************** Our Service Settings ******************************** */ 
    $wp_customize->add_section(
        'section_two',
        array(
            'title' => __( 'Service Section' , 'fortyseven-street' ),
            'priority' => 20,
            'panel' => 'homepage_settings',
            )
        );

    //enable/disable option
    $wp_customize->add_setting(
        'section_two_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );
    
    $wp_customize->add_control(
        'section_two_enable',
        array(
            'label' => __( 'Enable Service Section' , 'fortyseven-street' ),
            'section' => 'section_two',
            'type' => 'checkbox',
            )
        );

    //section one section title
    $wp_customize->add_setting(
        'section_two_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );
    
    $wp_customize->add_control(
        'section_two_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_two',
            'type' => 'textarea',
            )
        );  
    
    //section three section title
    $wp_customize->add_setting(
        'section_two_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );
    
    $wp_customize->add_control(
        'section_two_section_desc',
        array(
            'label' => __( 'Section Description' , 'fortyseven-street' ),
            'section' => 'section_two',
            'type' => 'textarea',
            )
        );  
    
    //section page choose
    $wp_customize->add_setting(
        'section_two_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new fortyseven_street_category_Dropdown($wp_customize,
        'section_two_page',
        array(
            'label' => __( 'Section Category Choose' , 'fortyseven-street' ),
            'section' => 'section_two',
            'type' => 'select',
            )
        )
    );
    
    
    /** ******************************** Testimonials Settings ******************************** */ 
    $wp_customize->add_section(
        'section_three',
        array(
            'title' => __( 'Testimonials Section' , 'fortyseven-street' ),
            'priority' => 30,
            'panel' => 'homepage_settings',
            )
        );

    //enable/disable option
    $wp_customize->add_setting(
        'section_three_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );
    
    $wp_customize->add_control(
        'section_three_enable',
        array(
            'label' => __( 'Enable Testimonal Section' , 'fortyseven-street' ),
            'section' => 'section_three',
            'type' => 'checkbox',
            )
        );
    
    //section section title
    $wp_customize->add_setting(
        'section_three_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );
    
    $wp_customize->add_control(
        'section_three_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_three',
            'type' => 'textarea',
            )
        );

    //section section desc
    $wp_customize->add_setting(
        'section_three_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );
    
    $wp_customize->add_control(
        'section_three_section_desc',
        array(
            'label' => __( 'Section Description Text' , 'fortyseven-street' ),
            'section' => 'section_three',
            'type' => 'textarea',
            )
        );

    //section page choose
    $wp_customize->add_setting(
        'section_three_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new fortyseven_street_category_Dropdown($wp_customize,
        'section_three_page',
        array(
            'label' => __( 'Section Category Choose' , 'fortyseven-street' ),
            'section' => 'section_three',
            'type' => 'select',
            )
        )
    );
    
    
    /** ************************************** Portfolio Settings ******************************** */ 
    $wp_customize->add_section(
        'section_four',
        array(
            'title' => __( 'Portfolio Section' , 'fortyseven-street' ),
            'priority' => 40,
            'panel' => 'homepage_settings',
            )
        );

    //enable/disable option
    $wp_customize->add_setting(
        'section_four_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );
    
    $wp_customize->add_control(
        'section_four_enable',
        array(
            'label' => __( 'Enable Portfolio Section' , 'fortyseven-street' ),
            'section' => 'section_four',
            'type' => 'checkbox',
            )
        );
    
    //section section title
    $wp_customize->add_setting(
        'section_four_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );
    
    $wp_customize->add_control(
        'section_four_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_four',
            'type' => 'text',
            )
        );

    //section section desc
    $wp_customize->add_setting(
        'section_four_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );
    
    $wp_customize->add_control(
        'section_four_section_desc',
        array(
            'label' => __( 'Section Description Text' , 'fortyseven-street' ),
            'section' => 'section_four',
            'type' => 'textarea',
            )
        );

    //section button text
    $wp_customize->add_setting(
        'section_four_button_text',
        array(
            'default' => __('View All Work','fortyseven-street'),
            'sanitize_callback' => 'fortyseven_street_sanitize_text',
            )
        );
    
    $wp_customize->add_control(
        'section_four_button_text',
        array(
            'label' => __( 'View All Button Text' , 'fortyseven-street' ),
            'section' => 'section_four',
            'type' => 'text',
            )
        );

    //section page choose
    $wp_customize->add_setting(
        'section_four_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new fortyseven_street_category_Dropdown($wp_customize,
        'section_four_page',
        array(
            'label' => __( 'Section Category Choose' , 'fortyseven-street' ),
            'section' => 'section_four',
            'type' => 'select',
            )
        )
    );
    
    
    
    /** *************************************** Skills Settings ******************************** */ 
    $wp_customize->add_section(
        'section_five',
        array(
            'title' => __( 'Skills Section' , 'fortyseven-street' ),
            'priority' => 50,
            'panel' => 'homepage_settings',
            'description' => __( 'Insert Widgets on Skill Section Widget Area, Use Text widget for title and description & loader widgets for numbers.' , 'fortyseven-street' ),
            )
        );
    //enable/disable option
    $wp_customize->add_setting(
        'section_five_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );

    $wp_customize->add_control(
        'section_five_enable',
        array(
            'label' => __( 'Enable Skills Section' , 'fortyseven-street' ),
            'section' => 'section_five',
            'type' => 'checkbox',
            )
        );

    /** *************************** Clients Settings *************************** */ 
    $wp_customize->add_section(
        'section_six',
        array(
            'title' => __( 'Clients Section' , 'fortyseven-street' ),
            'priority' => 60,
            'panel' => 'homepage_settings',
            )
        );

    //enable/disable option
    $wp_customize->add_setting(
        'section_six_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );

    $wp_customize->add_control(
        'section_six_enable',
        array(
            'label' => __( 'Enable Client Section' , 'fortyseven-street' ),
            'section' => 'section_six',
            'type' => 'checkbox',
            )
        );

    //section section title
    $wp_customize->add_setting(
        'section_six_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_six_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_six',
            'type' => 'text',
            )
        );

    //section section desc
    $wp_customize->add_setting(
        'section_six_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_six_section_desc',
        array(
            'label' => __( 'Section Description Text' , 'fortyseven-street' ),
            'section' => 'section_six',
            'type' => 'textarea',
            )
        );

    //section page choose
    $wp_customize->add_setting(
        'section_six_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );

    $wp_customize->add_control( new fortyseven_street_category_Dropdown($wp_customize,
        'section_six_page',
        array(
            'label' => __( 'Section Category Choose' , 'fortyseven-street' ),
            'section' => 'section_six',
            'type' => 'select',
            )
        )
    );

    //section six button text
    $wp_customize->add_setting(
        'section_six_button_text',
        array(
            'default' => __('Visit Us','fortyseven-street'),
            'sanitize_callback' => 'fortyseven_street_sanitize_text',
            )
        );

    $wp_customize->add_control(
        'section_six_button_text',
        array(
            'label' => __( 'Button Link Text' , 'fortyseven-street' ),
            'section' => 'section_six',
            'type' => 'text',
            )
        ); 

    //section six button link
    $wp_customize->add_setting(
        'section_six_button_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
            )
        );

    $wp_customize->add_control(
        'section_six_button_link',
        array(
            'label' => __( 'Button Link' , 'fortyseven-street' ),
            'section' => 'section_six',
            'type' => 'text',
            )
        ); 

    

    /** *************************************** Pricing Settings ******************************* */ 
    $wp_customize->add_section(
        'section_seven',
        array(
            'title' => __( 'Pricing Section' , 'fortyseven-street' ),
            'priority' => 70,
            'panel' => 'homepage_settings',
            )
        );
    //enable/disable option
    $wp_customize->add_setting(
        'section_seven_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );

    $wp_customize->add_control(
        'section_seven_enable',
        array(
            'label' => __( 'Enable Pricing Section' , 'fortyseven-street' ),
            'section' => 'section_seven',
            'type' => 'checkbox',
            )
        ); 
    //section eight section title
    $wp_customize->add_setting(
        'section_seven_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_seven_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_seven',
            'type' => 'text',
            )
        );

    //section eight section title
    $wp_customize->add_setting(
        'section_seven_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_seven_section_desc',
        array(
            'label' => __( 'Section Description Text' , 'fortyseven-street' ),
            'section' => 'section_seven',
            'type' => 'textarea',
            )
        );

    //section nine page choose
    $wp_customize->add_setting(
        'section_seven_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );

    $wp_customize->add_control(
        'section_seven_page',
        array(
            'label' => __( 'Section Page Choose' , 'fortyseven-street' ),
            'section' => 'section_seven',
            'type' => 'dropdown-pages',
            )
        );

    


    /** ************************************ CTA Settings ********************************* */ 
    $wp_customize->add_section(
        'section_eight',
        array(
            'title' => __( 'Call To Action Section' , 'fortyseven-street' ),
            'priority' => 80,
            'panel' => 'homepage_settings',
            )
        );
    //enable/disable option
    $wp_customize->add_setting(
        'section_eight_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );

    $wp_customize->add_control(
        'section_eight_enable',
        array(
            'label' => __( 'Enable CTA Section' , 'fortyseven-street' ),
            'section' => 'section_eight',
            'type' => 'checkbox',
            )
        );

    //section eight section title
    $wp_customize->add_setting(
        'section_eight_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_eight_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_eight',
            'type' => 'textarea',
            )
        );  
    //section description
    $wp_customize->add_setting(
        'section_eight_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_eight_section_desc',
        array(
            'label' => __( 'Section Description' , 'fortyseven-street' ),
            'section' => 'section_eight',
            'type' => 'textarea',
            )
        );  

    //section one button text
    $wp_customize->add_setting(
        'section_eight_button_text',
        array(
            'default' => __('Check Out','fortyseven-street'),
            'sanitize_callback' => 'fortyseven_street_sanitize_text',
            )
        );

    $wp_customize->add_control(
        'section_eight_button_text',
        array(
            'label' => __( 'Button Link Text' , 'fortyseven-street' ),
            'section' => 'section_eight',
            'type' => 'text',
            )
        ); 

    //section one button link
    $wp_customize->add_setting(
        'section_eight_button_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
            )
        );

    $wp_customize->add_control(
        'section_eight_button_link',
        array(
            'label' => __( 'Button Link' , 'fortyseven-street' ),
            'section' => 'section_eight',
            'type' => 'text',
            )
        ); 

    
    
    /** ******************************** Team Settings ******************************* */ 
    $wp_customize->add_section(
        'section_nine',
        array(
            'title' => __( 'Team Section' , 'fortyseven-street' ),
            'priority' => 90,
            'panel' => 'homepage_settings',
            )
        );
    //enable/disable option
    $wp_customize->add_setting(
        'section_nine_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );

    $wp_customize->add_control(
        'section_nine_enable',
        array(
            'label' => __( 'Enable Team Section' , 'fortyseven-street' ),
            'section' => 'section_nine',
            'type' => 'checkbox',
            )
        ); 

    //section one section title
    $wp_customize->add_setting(
        'section_nine_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_nine_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_nine',
            'type' => 'textarea',
            )
        );  

    //section section description
    $wp_customize->add_setting(
        'section_nine_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_nine_section_desc',
        array(
            'label' => __( 'Section Description' , 'fortyseven-street' ),
            'section' => 'section_nine',
            'type' => 'textarea',
            )
        ); 

    //section one button text
    $wp_customize->add_setting(
        'section_nine_button_text',
        array(
            'default' => __('Join Us','fortyseven-street'),
            'sanitize_callback' => 'fortyseven_street_sanitize_text',
            )
        );

    $wp_customize->add_control(
        'section_nine_button_text',
        array(
            'label' => __( 'Button Text' , 'fortyseven-street' ),
            'section' => 'section_nine',
            'type' => 'text',
            )
        ); 

    //section button link
    $wp_customize->add_setting(
        'section_nine_button_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
            )
        );

    $wp_customize->add_control(
        'section_nine_button_link',
        array(
            'label' => __( 'Button Link' , 'fortyseven-street' ),
            'section' => 'section_nine',
            'type' => 'text',
            )
        );

    //section page choose
    $wp_customize->add_setting(
        'section_nine_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new fortyseven_street_category_Dropdown($wp_customize,
        'section_nine_page',
        array(
            'label' => __( 'Section Category Choose' , 'fortyseven-street' ),
            'section' => 'section_nine',
            'type' => 'select',
            )
        )
    );

    
    /** ************************************ Blog Section *********************************** */ 
    $wp_customize->add_section(
        'section_ten',
        array(
            'title' => __( 'Blog Section' , 'fortyseven-street' ),
            'priority' => 100,
            'panel' => 'homepage_settings',
            )
        );

    //enable/disable option
    $wp_customize->add_setting(
        'section_ten_enable',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
        );

    $wp_customize->add_control(
        'section_ten_enable',
        array(
            'label' => __( 'Enable Blog Section' , 'fortyseven-street' ),
            'section' => 'section_ten',
            'type' => 'checkbox',
            )
        ); 
    //section eight section title
    $wp_customize->add_setting(
        'section_ten_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_ten_section_title',
        array(
            'label' => __( 'Section Title Text' , 'fortyseven-street' ),
            'section' => 'section_ten',
            'type' => 'text',
            )
        );

    //section eight section title
    $wp_customize->add_setting(
        'section_ten_section_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

    $wp_customize->add_control(
        'section_ten_section_desc',
        array(
            'label' => __( 'Section Description Text' , 'fortyseven-street' ),
            'section' => 'section_ten',
            'type' => 'textarea',
            )
        );

    //section page choose
    $wp_customize->add_setting(
        'section_ten_page',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new fortyseven_street_category_Dropdown($wp_customize,
        'section_ten_page',
        array(
            'label' => __( 'Section Category Choose' , 'fortyseven-street' ),
            'section' => 'section_ten',
            'type' => 'select',
            )
        )
    );    

}
add_action( 'customize_register', 'fortyseven_street_homepage_settings' );