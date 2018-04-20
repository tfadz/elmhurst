<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elmhurst_Family_Dentistry
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elmhurst' ); ?></a>

	<header id="masthead" class="site-header container elm-header">
    <nav class="elm-nav--left">
    <!-- Top Left Nav -->
  <?php
  wp_nav_menu( array( 
      'theme_location' => 'top-left-nav', 
      'container_class' => 'top-left-nav' ) ); 
  ?>
  </nav>
<!-- Logo Centered -->
  <a class="elm-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
   <?php the_custom_logo(); ?>
  </a>
  <!-- end logo -->

  <!-- Top right nav -->
  <nav class="elm-nav--right">
  <?php
  wp_nav_menu( array( 
      'theme_location' => 'top-right-nav', 
      'container_class' => 'top-right-nav' ) ); 
  ?>
</nav>

  
  </header><!-- #masthead -->

	<div id="content" class="site-content">
