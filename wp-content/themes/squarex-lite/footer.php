<?php
/**
 * The template for displaying the footer.
 * @package Squarex Lite
 */
?>

	</div><!-- #content -->
</div><!--#wrap-content-->

<div class="clearfix"></div>

<div class="out-wrap site-footer">

	<footer id="colophon" class="wrap site-footer" role="contentinfo">

<?php if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) ) { ?>

<div class="grid3 clearfix">
 <div class="col">
	<?php dynamic_sidebar('footer1'); ?>
</div>
 <div class="col">
	<?php dynamic_sidebar('footer2'); ?>
</div>
 <div class="col">
	<?php dynamic_sidebar('footer3'); ?>
</div>
</div><!--.grid3-->

<div class="footer-border"></div>

<?php } ?>

		<div class="site-info">
<div class="grid2 clearfix">
 	<div class="col">
		<?php echo '&copy; '.date('Y'); ?>&nbsp;
<span id="footer-copyright"><?php echo esc_html( get_theme_mod( 'copyright_txt', 'All rights reserved' ) ); ?></span><span class="sep"> &middot; </span>
	<?php do_action( 'squarex_credits' ); ?>
	</div>
	 <div class="col">
		<!--<div class="search-footer">
			<a href="#search-footer-bar"><i class="fa fa-search"></i></a>
		</div>-->
<?php if ( has_nav_menu( 'social' ) ) {
wp_nav_menu(
	array(
	'theme_location'  => 'social',
	// 'container_id'    => 'icon-footer',
	'container_class' => 'icon-footer', 
	'menu_id'         => 'menu-social',
	'depth'           => 1,
	'link_before'     => '<span class="screen-reader-text">',
	'link_after'      => '</span>',
	'fallback_cb'     => '',
	)
);
} ?>
	</div><!-- .col -->
</div><!--grid2-->
		</div><!-- .site-info -->

            <div id="back-to-top">
	<a href="#masthead" id="scroll-up" ><i class="fa fa-chevron-up"></i></a>
            </div>

	</footer><!-- #colophon -->
</div><!-- .out-wrap -->

<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
</div><!-- #offside-cont - see header.php -->
<?php } ?>

<?php wp_footer(); ?>

<!-- <?= wp_footer(); ?> -->
<script src="http://www.caitiemarie.com/wp-includes/js/jquery.masonry.min.js"></script>



<div style=" z-index: 9999; width: 225px; text-align: right; position: absolute; right: 30px; top: 35px;">
	<a style="display:inline-block" href="https://www.facebook.com/profile.php?id=100013220437878&fref=ts">
		<img width="40" height="40"  alt="Facebook" title="Facebook" src="http://www.caitiemarie.com/wp-content/uploads/fb.jpg" width="40" height="40" style=""  effect="">
	</a>

	<a style="display:inline-block" href="http://caitiest.tumblr.com/">
		<img width="40" height="40" alt="" title="" src="http://www.caitiemarie.com/wp-content/uploads/tm.jpg" width="40" height="40" style="" effect="">
	</a>
	<a style="display:inline-block" href="https://www.instagram.com/caitie.marie/">
		<img width="40" height="40" alt="" title="" src="http://www.caitiemarie.com/wp-content/uploads/inst.jpg" width="40" height="40" style=""  effect="">	
	</a>
</div>	

</body>
</html>