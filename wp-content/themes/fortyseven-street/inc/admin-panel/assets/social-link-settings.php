<?php
/**
 * 
 * Social Link Settings
 * 
 */
function fortyseven_street_social_settings( $wp_customize ) {
    //Social links settings to input url.
    $wp_customize->add_section(
        'social_link_option',
        array(
            'title' => __( 'Social Link/Url Settings', 'fortyseven-street' ),
            'description' => __( "Put your social url below.. Leave blank if you don't want to show it." , 'fortyseven-street' ),
            'priority' => 90,
        )
    );
    
    //Option to enable/disable social links in footer
    $wp_customize->add_setting(
        'social_link_footer',
        array(
            'default' => '1',
            'sanitize_callback' => 'fortyseven_street_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'social_link_footer',
        array(
            'label' => __( 'Check To Enable' , 'fortyseven-street' ),
            'description' => __( 'Enable social link in footer' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'checkbox',
        )
    );
    
    //facebook
    $wp_customize->add_setting(
        'facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'facebook',
        array(
            'label' => __( 'Facebook' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    ); 
    
    //twitter
    $wp_customize->add_setting(
        'twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'twitter',
        array(
            'label' => __( 'Twitter' , 'fortyseven-street' ), 
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );

    //Instagram
    $wp_customize->add_setting(
        'instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'instagram',
        array(
            'label' => __( 'Instagram' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Google Plus
    $wp_customize->add_setting(
        'google_plus',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'google_plus',
        array(
            'label' => __( 'Google plus' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Youtube  
    $wp_customize->add_setting(
        'youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'youtube',
        array(
            'label' => __( 'Youtube' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Pinterest
    $wp_customize->add_setting(
        'pinterest',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'pinterest',
        array(
            'label' => __( 'Pinterest' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Linkedin
    $wp_customize->add_setting(
        'linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'linkedin',
        array(
            'label' => __( 'Linkedin' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Flickr
    $wp_customize->add_setting(
        'flickr',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'flickr',
        array(
            'label' => __( 'Flickr' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_setting(
        'vimeo',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
   
    //Vimeo
    $wp_customize->add_control(
        'vimeo',
        array(
            'label' => __( 'Vimeo' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Stumbleupon
    $wp_customize->add_setting(
        'stumbleupon',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'stumbleupon',
        array(
            'label' => __( 'Stumbleupon' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Skype    
    $wp_customize->add_setting(
        'skype',
        array(
            'default' => '',
            'sanitize_callback' => 'fortyseven_street_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'skype',
        array(
            'label' => __( 'Skype' , 'fortyseven-street' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
}
add_action( 'customize_register', 'fortyseven_street_social_settings' );
