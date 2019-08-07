<?php
/**
 * 
 * Post Settings..............
 * 
 */

function fortyseven_street_customize_archive( $wp_customize ) {



    //Archive layout settings....
$wp_customize->add_section(
    'archive_option_section',
    array(
        'title' => __( 'Archive Settings', 'fortyseven-street' ),
        'priority' => 60,
        )
    );
 
  $wp_customize->add_setting('fortyseven_street_archive_post_layout',array(
    'default'       =>      'blog_layout1',
    'sanitize_callback'     =>  'fortyseven_street_blog_layout'
    ));

  $wp_customize->add_control( 'fortyseven_street_archive_post_layout',array(
    'section' => 'archive_option_section',
    'label' => __('Archive Pages Layout', 'fortyseven-street'),
    'type' => 'select',
    'choices' => array( 
      'blog_layout1' => __('Image Large', 'fortyseven-street'),
      'blog_layout2' => __('Square Image Medium', 'fortyseven-street'),
      'blog_layout3' => __('Square Image Alternate Medium', 'fortyseven-street')
      )
    ));


$wp_customize->add_setting(
    'archive_page_sidebar_option',
    array(
        'default' => 'right-sidebar',
        'sanitize_callback' => 'fortyseven_street_side_layout',
        )
    );


$imagepath = get_template_directory_uri() . '/inc/images/' ;
$wp_customize->add_control( 'archive_page_sidebar_option',array(
        'label' => __( 'Default Post Sidebar', 'fortyseven-street' ),
        'description' => __( "Define - Choose sidebar for all archive pages.", 'fortyseven-street' ),
        'section' => 'archive_option_section',
        'type' => 'radio',
        'choices' => array(
            'right-sidebar' => __('Right Sidebar','fortyseven-street'),
            'left-sidebar' => __('Left Sidebar','fortyseven-street'),
            'no-sidebar' => __('No Sidebar','fortyseven-street'),
            ),

        )
    );

}
add_action( 'customize_register', 'fortyseven_street_customize_archive' );