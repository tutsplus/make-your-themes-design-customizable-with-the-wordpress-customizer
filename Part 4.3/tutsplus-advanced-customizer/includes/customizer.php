<?php
/********************************************************************************
	The file with all of the code relating to the customizer
	Supports tutsplus course on using the Customizer to edit theme design
********************************************************************************/

/********************************************************************************
Add the sections for design controls
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


/********************************************************************************
Add the controls for the header
********************************************************************************/
function tutsplus_customize_register_header( $wp_customize ) {
	
	// add the setting for the banner upload
	$wp_customize->add_setting( 'tutsplus_banner_upload' );

	// add the control for the banner upload
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'tutsplus_banner_upload_control',
			array(
				'label' => __( 'Upload your banner image', 'tutsplus' ),
				'section' => 'tutsplus_header',
				'settings' => 'tutsplus_banner_upload'
	) ) );
	
	
	// add the setting for the banner position
	$wp_customize->add_setting( 'tutsplus_banner_position' );
	
	// add the control for the banner position
	$wp_customize->add_control( 'tutsplus_banner_position_control', array(
		'label'      => __( 'Banner position', 'tutsplus' ),
		'section'    => 'tutsplus_header',
		'settings'   => 'tutsplus_banner_position',
		'type'       => 'radio',
		'choices'    => array(
			'top'   	=> 'above header',
			'bottom'  	=> 'below header',
	) ) );
				
}
add_action( 'customize_register', 'tutsplus_customize_register_header' );

/********************************************************************************
 Display banner in header, in correct position
********************************************************************************/
// display above header if that's been chosen
function tutsplus_display_banner_above_header() {
	
	// fetch the position of the logo
	$banner_position = get_theme_mod ( 'tutsplus_banner_position' );
	
	if ( $banner_position != 'bottom' ) {
				
		//output the banner ?>
		<div class="banner">
			<img src="<?php echo get_theme_mod( 'tutsplus_banner_upload' ); ?>">
		</div>
		
	<?php }
}
add_action( 'tutsplus_before_header', 'tutsplus_display_banner_above_header' );

// display below header if that's been chosen
function tutsplus_display_banner_below_header() {
	
	// fetch the position of the logo
	$banner_position = get_theme_mod ( 'tutsplus_banner_position' );
	
	if ( $banner_position != 'top' ) {
		
		//output the banner ?>
		<div class="banner">
			<img src="<?php echo get_theme_mod( 'tutsplus_banner_upload' ); ?>">
		</div>

	<?php }
	
}
add_action( 'tutsplus_after_header', 'tutsplus_display_banner_below_header' );


/********************************************************************************
Add the controls for the layout
********************************************************************************/
function tutsplus_customize_register_layout( $wp_customize ) {
	
	// add the setting for the layout
	$wp_customize->add_setting( 'tutsplus_layout' );
	
	// add the control for the layout
	$wp_customize->add_control( 'tutsplus_layout_control', array(
		'label'      => __( 'Banner position', 'tutsplus' ),
		'section'    => 'tutsplus_layout',
		'settings'   => 'tutsplus_layout',
		'type'       => 'radio',
		'choices'    => array(
			'left-sidebar' 		=> 'sidebar on right',
			'right-sidebar'		=> 'sidebar on left',
			'no-sidebar'		=> 'no sidebar',
	) ) );
				
}
add_action( 'customize_register', 'tutsplus_customize_register_layout' );

/********************************************************************************
Add the CSS classes for the layout
********************************************************************************/
function tutsplus_layout_body_classes( $classes ) {
	
	$bodyclass = get_theme_mod( 'tutsplus_layout' );
	$classes[] = $bodyclass;
	return $classes;
	
}
add_filter( 'body_class', 'tutsplus_layout_body_classes' );