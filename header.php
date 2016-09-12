<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="wrapper-content">
<!--	<a class="skip-link screen-reader-text" href="#content">--><?php //esc_html_e( 'Skip to content', 'my-theme' ); ?><!--</a>-->

	<header id="masthead" class="site-header" role="banner">
		<div class="container wrap-content-header">
			<div class="row">

				<div class="col-md-3" style="padding-top: 9px"><?php theme_prefix_the_custom_logo(); ?></div>

				<div class="col-md-9">
					<nav id="site-navigation" class="main-navigation" role="navigation">
		<!--				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Primary Menu', 'my-theme' ); ?><!--</button>-->
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						<div class="search-icon">
							<?php if(is_active_sidebar('search-icon')){
								dynamic_sidebar('search-icon');
							} ?>
						</div>

					</nav><!-- #site-navigation -->

				</div>
		</div>
	</header><!-- #masthead -->


<!--	<div id="content" class="site-content">-->
