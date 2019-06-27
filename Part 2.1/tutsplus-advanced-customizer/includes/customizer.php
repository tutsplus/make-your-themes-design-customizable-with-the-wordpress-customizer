<?php
/********************************************************************************
	The file with all of the code relating to the customizer
	Supports tutsplus course on using the Customizer to edit theme design
********************************************************************************/

/********************************************************************************
Add the section for design controls
********************************************************************************/
function tutsplus_customize_register_sections( $wp_customize ) {

	// add the section for header design
	$wp_customize->add_section( 'tutsplus_header' , array(
		'title' => __( 'Site Header', 'tutsplus' ),
	) );
	
	// add the section for layout
	$wp_customize->add_section( 'tutsplus_layout' , array(
		'title' => __( 'Site Layout', 'tutsplus' ),
	) );
	
	// add the section for layout
	$wp_customize->add_section( 'tutsplus_colorscheme' , array(
		'title' => __( 'Color Scheme', 'tutsplus' ),
	) );

}
add_action( 'customize_register', 'tutsplus_customize_register_sections' );