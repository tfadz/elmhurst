<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elmhurst_Family_Dentistry
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer elm-footer">
		
		<div class="container elm-footer__main">
		<?php
			wp_nav_menu( array(
			'theme_location' => 'footer-menu',
			'menu_id'        => 'footer-menu',
			) );
		?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
