<?php
/**
 * The template for displaying Category default template.
 * @package Squarex Lite
 */

get_header(); ?>
			
<?php get_template_part( 'template-parts/posts', 'wrap-start' ); ?>

<?php
	if ( 8 == get_theme_mod( 'squarex_layout_square' ) || 9 == get_theme_mod( 'squarex_layout_square' ) || 10 == get_theme_mod( 'squarex_layout_square' )) {
		get_template_part( 'template-parts/blog', 'boxes' );
	} else {
		get_template_part( 'template-parts/blog', 'tiles' );
	}
?>	

<?php get_template_part( 'template-parts/posts', 'wrap-end' ); ?>

<?php get_footer(); ?>
