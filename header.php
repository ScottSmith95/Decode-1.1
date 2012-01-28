<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 */
 
?><!DOCTYPE html>
<!--[if IE ]>    <html <?php language_attributes(); ?> class="ie"> <![endif]-->
 <!--[if !(IE)]><!-->  <html <?php language_attributes(); ?>>  <!--<![endif]-->


<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

 <script type="text/javascript">
      WebFontConfig = {
       custom: { families: ['OFLSortsMillGoudyRegular', 'OFLSortsMillGoudyItalic'],
    urls: [ '<?php echo get_template_directory_uri(); ?>/fonts/OFL-Sorts-Mill-Goudy/ofl-normal.css',
      '<?php echo get_template_directory_uri(); ?>/fonts/OFL-Sorts-Mill-Goudy/ofl-italic.css' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>
<noscript><link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/noscript.css" /></noscript>  
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	<div id="header">
		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

		
	</div><!--#header-->
	
<div id="content">	