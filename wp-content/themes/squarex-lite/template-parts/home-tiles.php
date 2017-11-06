<?php
/**
 * @package Squarex Lite
 */
?>

<div class="box">
<div class="innerBox"<?php squarex_bg_tile(); ?>>
	<a href="<?php the_permalink(); ?>" rel="bookmark">
		<div class="titleBox">
			<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
				<h3<?php if ( ! has_post_thumbnail() ) { ?> class="no-thumb"<?php } ?>><?php the_title(); ?></h3>
			</article><!-- #post-## -->
		</div>
	</a>
</div><!-- .innerBox -->
</div>