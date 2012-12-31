<?php
/* The Template for displaying all single posts. */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<?php if ( has_post_format( 'link' )): ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-title"><h1><?php print_post_title() ?></h1>
					<div class="reply"><a href="https://twitter.com/intent/tweet?screen_name=ScottSmith95&text=(about%3A%20<?php the_permalink(); ?>)" class="twitterreply replylink" data-related="ScottSmith95">With Twitter</a><a class="replytrigger">Reply</a><a href="https://alpha.app.net/scottsmith" class="adnreply replylink">With ADN</a></div></div>
					<?php the_content( __( 'continue reading &raquo;', 'twentyten' ) ); ?>
					<p class="date">Committed on <?php twentyten_posted_on(); ?></p>
					</div>
					
					<?php elseif ( has_post_format( 'quote' )): ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_content( __( 'continue reading &raquo;', 'twentyten' ) ); ?>
					<div class="entry-title"><div class="reply"><a href="https://twitter.com/intent/tweet?screen_name=ScottSmith95&text=(about%3A%20<?php the_permalink(); ?>)" class="twitterreply replylink" data-related="ScottSmith95">With Twitter</a><a class="replytrigger">Reply</a><a href="https://alpha.app.net/scottsmith" class="adnreply replylink">With ADN</a></div></div>
					<p class="date">Committed on <?php twentyten_posted_on(); ?></p>
					</div>
			
<?php /* How to display all other posts. */ ?>

	<?php else : ?>
	 
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-title"><h1 class="entry-title"><?php the_title(); ?></h1>
							<div class="reply"><a href="https://twitter.com/intent/tweet?screen_name=ScottSmith95&text=(about%3A%20<?php the_permalink(); ?>)" class="twitterreply replylink" data-related="ScottSmith95">With Twitter</a><a class="replytrigger">Reply</a><a href="https://alpha.app.net/scottsmith" class="adnreply replylink">With ADN</a></div></div>

						
							
							<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					<p class="date">Committed on <?php twentyten_posted_on(); ?></p>
		<?php endif; ?>
						 
				

<?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>