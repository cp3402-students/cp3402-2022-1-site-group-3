<?php
/**
 * Miscellaneous Settings
 *
 * @package Education_Center
 */

function education_center_customize_register_post_page_settings( $wp_customize ) {

    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Post-Page Settings', 'baizonn-learning-center' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    ); 
    
    /** Hide Author Section */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Education_Center_Toggle_Control( 
            $wp_customize,
            'ed_post_author',
            array(
                'section'     => 'post_page_settings',
                'label'	      => __( 'Hide Author', 'baizonn-learning-center' ),
                'description' => __( 'Enable to hide author box.', 'baizonn-learning-center' ),
            )
        )
    );

    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Education_Center_Toggle_Control( 
            $wp_customize,
            'ed_post_date',
            array(
                'section'     => 'post_page_settings',
                'label'	      => __( 'Hide Posted Date', 'baizonn-learning-center' ),
                'description' => __( 'Enable to hide posted date.', 'baizonn-learning-center' ),
            )
        )
    );

    /** Hide Post views */
    $wp_customize->add_setting( 
        'ed_post_views', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Education_Center_Toggle_Control( 
            $wp_customize,
            'ed_post_views',
            array(
                'section'     => 'post_page_settings',
                'label'	      => __( 'Hide Post Views', 'baizonn-learning-center' ),
                'description' => __( 'Enable to hide post views.', 'baizonn-learning-center' ),
            )
        )
    );

    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You might also like', 'baizonn-learning-center' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'baizonn-learning-center' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector'        => '.related-post h2.title',
        'render_callback' => 'education_center_related_posts_title',
    ) );
}
add_action( 'customize_register', 'education_center_customize_register_post_page_settings' );