<?php

function fotocover_addition_field() {

     // Color Picker field for theme Color
    Kirki::add_field( 
        'fotogenic_config', array(
            'type'        => 'color',
            'settings'    => 'fotogenic_theme_color',
            'label'       => __( 'Theme Color', 'fotocover' ),
            'section'     => 'colors',
            'default'     => '#f07f13',
        )
    );

    /**
     * Call To Action Section
     *
     */
    Kirki::add_section( 'fotocover_cta_section', array(
        'title'          => esc_attr__( 'Call To Action Section', 'fotocover' ),
        'panel'          => 'fotogenic_homepage_panel',
        'priority'       => 30,
    ) );

    Kirki::add_field( 'fotogenic_config', array(
        'type'        => 'toggle',
        'settings'    => 'fotocover_enable_cta_sec',
        'label'       => esc_attr__( 'Show/Hide Section', 'fotocover' ),
        'section'     => 'fotocover_cta_section',
        'default'     => true,
        'priority'    => 5,
    ) );

    Kirki::add_field( 'fotogenic_config', array(
        'type'        => 'image',
        'settings'    => 'fotocover_cta_bg_image_setting',
        'label'       => __( 'Add bg image here', 'fotocover' ),
        'section'     => 'fotocover_cta_section',
        'priority'    => 5,
        'active_callback' => array(
                array(
                    'setting'  => 'fotocover_enable_cta_sec',
                    'value'    => true,
                    'operator' => 'in',
                ),
            )
    ) );

    Kirki::add_field( 'fotogenic_config', array(
        'type'     => 'text',
        'settings' => 'fotocover_cta_subtitle_setting',
        'label'    => __( 'Subtitle', 'fotocover' ),
        'section'  => 'fotocover_cta_section',
        'priority' => 10,
        'active_callback' => array(
                array(
                    'setting'  => 'fotocover_enable_cta_sec',
                    'value'    => true,
                    'operator' => 'in',
                ),
            )
    ) );

    Kirki::add_field( 'fotogenic_config', array(
        'type'     => 'text',
        'settings' => 'fotocover_cta_main_title_setting',
        'label'    => __( 'Main Title', 'fotocover' ),
        'section'  => 'fotocover_cta_section',
        'priority' => 15,
        'active_callback' => array(
                array(
                    'setting'  => 'fotocover_enable_cta_sec',
                    'value'    => true,
                    'operator' => 'in',
                ),
            )
    ) );

    Kirki::add_field( 'fotogenic_config', array(
        'type'     => 'text',
        'settings' => 'fotocover_cta_button_label_setting',
        'label'    => __( 'Button Label', 'fotocover' ),
        'section'  => 'fotocover_cta_section',
        'priority' => 20,
        'active_callback' => array(
                array(
                    'setting'  => 'fotocover_enable_cta_sec',
                    'value'    => true,
                    'operator' => 'in',
                ),
            )
    ) );

    Kirki::add_field( 'fotogenic_config', array(
        'type'     => 'link',
        'settings' => 'fotocover_cta_button_url_setting',
        'label'    => __( 'Button url', 'fotocover' ),
        'section'  => 'fotocover_cta_section',
        'priority' => 25,
        'active_callback' => array(
                array(
                    'setting'  => 'fotocover_enable_cta_sec',
                    'value'    => true,
                    'operator' => 'in',
                ),
            )
    ) );

}

add_action( 'after_setup_theme', 'fotocover_addition_field' );

