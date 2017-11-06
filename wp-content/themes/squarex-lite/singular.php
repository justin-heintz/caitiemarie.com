<?php
/**
 * The Template for displaying single post.
 *
 * @package Squarex Lite
 */

get_header(); ?>

<div id="primary" class="content-area<?php if ( ! is_singular( 'page' ) || is_singular( 'page' ) && ! is_active_sidebar( 'sidebar-2' ) ) { ?> no-sidebar<?php } ?>">
	<main id="main" class="site-main" role="main">
<?php
	if ( is_singular( 'page' ) ) {

	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'page' );
		do_action( 'squarex_after_page_content' );

		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
			comments_template();
	endwhile; // end of the loop.

	} else {

	while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
		// see functions.php
		do_action( 'squarex_after_post_content' );
		if ( comments_open() || '0' != get_comments_number() )
			comments_template();
	endwhile; // end of the loop.

	} // page/post ?>

	</main>
<?php if ( ! is_singular( 'page' ) ) { squarex_content_nav( 'nav-below' ); } ?>
</div><!-- #primary -->

<?php if ( is_singular( 'page' ) ) { get_sidebar(); } ?>

<?php get_footer(); ?>