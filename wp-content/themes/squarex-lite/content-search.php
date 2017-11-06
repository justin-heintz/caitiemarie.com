<?php
/**
 * @package Squarex Lite
 */
?>

<article id="post-<?php the_ID(); ?>">

	<hr />

	<div class="entry-content search-list">
		<h3><a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php
				if ( get_the_title() ) {
					the_title();
				} else {
					esc_html_e( 'No Title', 'squarex-lite');
				} ?>
		</a></h3>
	</div><!-- .entry-content -->

</article><!-- #post-## -->