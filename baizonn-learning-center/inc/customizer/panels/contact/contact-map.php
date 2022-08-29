<?php
/**
 * Contact Map Section Theme Option.
 * 
 * @package Education_Center
 */

function education_center_customize_register_map( $wp_customize ) {
    
    /** Google Map Settings */
    $wp_customize->add_section(
        'google_map_settings',
        array(
            'title'    => __( 'Google Map Section', 'baizonn-learning-center' ),
            'priority' => 30,
            'panel'    => 'contact_page_settings',
        )
    );

    /** Contact Form */
    $wp_customize->add_setting(
        'ed_googlemap',
        array(
            'default'           => true,
            'sanitize_callback' => 'education_center_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Education_Center_Toggle_Control( 
            $wp_customize,
            'ed_googlemap',
            array(
                'section'       => 'google_map_settings',
                'label'         => __( 'Google Map Settings', 'baizonn-learning-center' ),
                'description'   => __( 'Disable to hide the Google Map Settings', 'baizonn-learning-center' ),
            )
        )
    );

    $wp_customize->add_setting(
        'contact_google_map_iframe',
        array(
            'default'           => '',
            'sanitize_callback' => 'education_center_sanitize_google_map_iframe',
        )
    );
    
    $wp_customize->add_control(
        'contact_google_map_iframe',
        array(
            'section'         => 'google_map_settings',
            'label'           => __( 'Embeded Google Map', 'baizonn-learning-center' ),
            'type'            => 'text',
        )
    );

    }
add_action( 'customize_register', 'education_center_customize_register_map' );