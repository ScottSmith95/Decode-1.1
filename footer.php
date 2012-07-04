<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Melville
 * @since Melville 1.0
 */
?>

	</div><!-- #main -->
<div class="push"></div>
</div><!-- #page .hfeed .site -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'melville_credits' ); ?>
			Powered by <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'melville' ); ?>" rel="generator"><?php printf( __( '%s', 'melville' ), 'WordPress' ); ?></a>.
			<?php printf( __( ' Melville theme by %s.', 'melville' ), '<a href="http://madebyraygun.com" rel="designer">Raygun</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->


<?php wp_footer(); ?>

</body>
</html>