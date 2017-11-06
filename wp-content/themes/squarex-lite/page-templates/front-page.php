<?php
/**
 * Template Name: Front Page
 *
 * @package Squarex Lite
 */

get_header(); ?>

<?php
	if ( get_theme_mod( 'home_tagline' ) ) {
		get_template_part( 'template-parts/home', 'tagline' );
	}
	if ( true === get_theme_mod( 'frontpage_header' ) ) {
		get_template_part( 'template-parts/home', 'hero' );
	}
	if ( true === get_theme_mod( 'frontpage_slider' ) ) {
		squarex_featured_content(); // see template-tags.php
	}
?>

<!-- widgets top -->
<?php if ( is_active_sidebar( 'home-one-prebefore' ) ) { ?>
<section id="prebefore-home-widget">

<?php dynamic_sidebar( 'home-one-prebefore' ); ?>

</section>
<?php } ?>

<?php if ( is_active_sidebar( 'home-one-before' ) ) { ?>
<section id="before-home-widget">

<div class="grid<?php $sidebars_widgets = wp_get_sidebars_widgets(); echo count($sidebars_widgets['home-one-before']); ?> clearfix">
<?php dynamic_sidebar( 'home-one-before' ); ?>
</div>

</section>
<?php } ?>
<!-- END widgets top -->

	<div id="primary" class="site-content">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'template-parts/home', 'posts' ); ?>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/home', 'content' );
			endwhile;
			// LOOP ?>

			<?php get_template_part( 'template-parts/home', 'childpage' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<!-- widgets bottom -->
<?php if ( is_active_sidebar( 'home-one-after' ) ) { ?>
<section id="after-home-widget">

<div class="grid<?php $sidebars_widgets = wp_get_sidebars_widgets(); echo count($sidebars_widgets['home-one-after']); ?> clearfix">
<?php dynamic_sidebar( 'home-one-after' ); ?>
</div>

</section>
<?php } ?>

<?php if ( is_active_sidebar( 'home-one-after2' ) ) { ?>
<section id="after2-home-widget">

<?php dynamic_sidebar( 'home-one-after2' ); ?>

</section>
<?php } ?>
<!-- END widgets bottom -->

<?php get_footer(); ?>