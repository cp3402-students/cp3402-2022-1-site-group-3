<?php
/**
 * Course Features Settings
 * 
 * @package Education_Center
 */

if ( ! function_exists( 'education_center_customize_register_home_course_feature' ) ) :

function education_center_customize_register_home_course_feature( $wp_customize ){
    
	$wp_customize->add_section( 
        'course_feature_home', 
	    array(
	        'title'         => esc_html__( 'Course Features Section', 'baizonn-learning-center' ),
	        'priority'      => 25,
            'panel'         => 'frontpage_settings',
	    ) 
	);

    /** Enable course feature Section */
    $wp_customize->add_setting( 
        'ed_course_feature', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Toggle_Control( 
			$wp_customize,
			'ed_course_feature',
			array(
				'section'     => 'course_feature_home',
				'label'	      => __( 'Enable Course Feature Section', 'baizonn-learning-center' ),
                'description' => __( 'Enable to show course feature section in your homepage', 'baizonn-learning-center' ),
			)
		)
	);

    /** Title Text */
    $wp_customize->add_setting( 
        'features_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'features_title',
        array(
            'section'         => 'course_feature_home',
            'label'           => __( 'Section Title', 'baizonn-learning-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'features_title', array(
        'selector'        => '.site .course-highlights .section-header h2.section-header__title',
        'render_callback' => 'education_center_get_features_title',
    ) );

    /** Subtitle Text */
    $wp_customize->add_setting( 
        'features_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'features_subtitle',
        array(
            'section'         => 'course_feature_home',
            'label'           => __( 'Section Subtitle', 'baizonn-learning-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'features_subtitle', array(
        'selector'        => '.site .course-highlights .section-header .section-header__info',
        'render_callback' => 'education_center_get_features_subtitle',
    ) );

    $wp_customize->add_setting( 
        new Education_Center_Control_Repeater_Setting( 
            $wp_customize, 
            'course_feature_repeater', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Education_Center_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Control_Repeater(
			$wp_customize,
			'course_feature_repeater',
			array(
				'section' => 'course_feature_home',				
				'label'	  => __( 'Add Features', 'baizonn-learning-center' ),
				'fields'  => array(
                    'image' => array(
                        'type'    => 'image',
                        'label'   => __( 'Upload Icon/Image', 'baizonn-learning-center' ),
					),
                    'title' => array(
                        'type'    => 'text',
                        'label'   => __( 'Enter Title', 'baizonn-learning-center' ),
                    ),
                    'content' => array(
                        'type'    => 'text',
                        'label'   => __( 'Enter Content', 'baizonn-learning-center' ),
                    ),
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => esc_html__( 'feature', 'baizonn-learning-center' ),
                    'field' => 'title',
                ),
                'choices' => array(
                    'limit' => 3
                )
			)
		)
	);

    /** Course Featured Image */
	$wp_customize->add_setting( 
		'course_featured_image', 
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
    	)
	);
 
    $wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'course_featured_image', 
			array(
				'label'      => __( 'Upload the image', 'baizonn-learning-center' ),
				'section'    => 'course_feature_home',
			)
    	)
	);
}
endif;
add_action( 'customize_register', 'education_center_customize_register_home_course_feature' );