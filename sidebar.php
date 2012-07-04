<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Melville
 * @since Melville 1.0
 */
?>
		<div id="secondary" class="widget-area<?php echo melville_layout('secondary');?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'melville' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'melville' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end main sidebar widget area ?>
			
			<?php if ( is_single() && !is_singular('portfolio_slideshow') || is_home() || is_archive() ) { //only show the second widget area if we're on a blog-related page ?>
						
				<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
			
							<aside id="archives" class="widget">
								<h1 class="widget-title"><?php _e( 'Archives', 'melville' ); ?></h1>
								<ul>
									<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
								</ul>
							</aside>
			
							<aside id="meta" class="widget">
								<h1 class="widget-title"><?php _e( 'Meta', 'melville' ); ?></h1>
								<ul>
									<?php wp_register(); ?>
									<li><?php wp_loginout(); ?></li>
									<?php wp_meta(); ?>
								</ul>
							</aside>
							
							<aside id="search" class="widget widget_search">
								<?php get_search_form(); ?>
							</aside>
			
						<?php endif; // end second sidebar widget area ?>
			<?php } ?>
						
		</div><!-- #secondary .widget-area -->
