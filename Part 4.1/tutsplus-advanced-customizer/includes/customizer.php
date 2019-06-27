<?php
/**************************************************************************
	The file with all the Customizer code
	Supports tutsplus course on using the Customizer to edit theme design
**************************************************************************/

/**************************************************************************
Add the sections for design controls
**************************************************************************/
function tutsplus_customize_register_sections( $wp_customize ){
	
	//add the section for header
	$wp_customize->add_section( 'tutsplus_header', array(
		'title' => __( 'Site Header', 'tutsplus' )
	));
	
	//add the section for layout
	$wp_customize->add_section( 'tutsplus_layout', array(
		'title' => __( 'Site Layout', 'tutsplus' )
	));
	
	//add the section for color scheme
	$wp_customize->add_section( 'tutsplus_colorscheme', array(
		'title' => __( 'Color Scheme', 'tutsplus' )
	));

	
}
add_action( 'customize_register', 'tutsplus_customize_register_sections' );

/**************************************************************************
add controls for the header
**************************************************************************/
function tutsplus_customize_register_header( $wp_customize ) {
	
	//add the setting for the banner upload
	$wp_customize->add_setting( 'tutsplus_banner_upload' );
	
	//add a control for the banner upload
	$wp_customize->add_control(
		new WP_Customize_Image_control(
			$wp_customize,
			'tutsplus_banner_upload_control',
			array(
				'label' 	=> __( 'Upload your banner or header image', 'tutsplus' ),
				'section'	=> 'tutsplus_header',
				'settings'	=> 'tutsplus_banner_upload'
			)
		)
	);
	
	//add the setting for the banner position
	$wp_customize->add_setting( 'tutsplus_banner_position' );
	
	//add the control for the banner postion
	$wp_customize->add_control( 'tutsplus_banner_position_control', array(
		'label'		=> __( 'Banner position', 'tutsplus' ),
		'section'	=> 'tutsplus_header',
		'settings'	=> 'tutsplus_banner_position',
		'type'		=>	'radio',
		'choices'	=> array(
			'top'		=>	'above header',
			'bottom'	=>	'below header'
		)
	));
	
}
add_action( 'customize_register', 'tutsplus_customize_register_header' );


/**************************************************************************
add the banner image to the header.php file
**************************************************************************/
// above the header
function tutsplus_display_banner_above_header() {
	
	$banner_position = get_theme_mod( 'tutsplus_banner_position' );
	$banner_image = get_theme_mod( 'tutsplus_banner_upload' );
	
	if( $banner_position == 'top' ) {
		
		//output the banner ?>
		<div class="banner">
			<img src="<?php echo $banner_image; ?>">
		</div>
	<?php }
	
}
add_action( 'tutsplus_before_header', 'tutsplus_display_banner_above_header' );

// below the header
function tutsplus_display_banner_below_header() {
	
	$banner_position = get_theme_mod( 'tutsplus_banner_position' );
	$banner_image = get_theme_mod( 'tutsplus_banner_upload' );
	
	if( $banner_position == 'bottom' ) {
		
		//output the banner ?>
		<div class="banner">
			<img src="<?php echo $banner_image; ?>">
		</div>
	<?php }
	
}
add_action( 'tutsplus_after_header', 'tutsplus_display_banner_below_header' );


/**************************************************************************
add controls for layout
**************************************************************************/
function tutsplus_customize_register_layout( $wp_customize ) {
	
	//add the setting for the layout
	$wp_customize->add_setting( 'tutsplus_layout_setting' );
	
	//add control for layout
	$wp_customize->add_control( 'tutsplus_layout_control', array(
		'label'		=> __( 'Site layout', 'tutsplus' ),
		'section'	=> 'tutsplus_layout',
		'settings'	=> 'tutsplus_layout_setting',
		'type'		=> 'radio',
		'choices'	=>	array(
			'sidebar-left'		=>	'Sidebar on the left',
			'sidebar-right'		=>	'Sidebar on the right',
			'no-sidebar'		=>	'No sidebar'
		)
	) );
	
}
add_action( 'customize_register', 'tutsplus_customize_register_layout' );