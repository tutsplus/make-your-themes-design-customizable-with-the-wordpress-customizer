<!DOCTYPE html>
<!--[if lt IE 7]><html lang="en-US" class="ie6"><![endif]-->
<!--[if IE 7]><html lang="en-US" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="en-US" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="en-US" class="ie9"><![endif]-->
<!--[if gt IE 9]><html lang="en-US"><![endif]-->
<!--[if !IE]><html lang="en-US"><![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href="https://fonts.googleapis.com/css?family=Assistant|Oswald" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		
	<div class="header-bg">
		
		<?php do_action( 'tutsplus_before_header' ); ?>
			
		<header role="banner">
	
			<hgroup class="site-name">
				
				<!-- site name and description -->
				<h1 id="site-title">
					<a href="<?php echo site_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			
			</hgroup>
		
		</header><!-- header -->
		
		<?php do_action( 'tutsplus_after_header' ); ?>
		
	</div><!-- header-bg-->
		
	<!-- full width navigation menu -->
	<nav class="menu main">
	
		<div class="skip-link screen-reader-text">
			<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'tutsplus' ); ?>"><?php _e( 'Skip to content', 'tutsplus' ); ?></a>
		</div>
		
		<?php wp_nav_menu( array( 'container_class' => 'main-nav', 'theme_location' => 'primary' ) ); ?>
			
	</nav><!-- .main -->