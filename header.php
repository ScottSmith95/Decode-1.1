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
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="http://beyondtheco.de/wp-content/themes/Decode/css/sh-ttybrowser.css" />
<![endif]-->
<link rel="shortcut icon" href="http://beyondtheco.de/wp-content/themes/Decode/images/favicon.ico">

<!-- Typekit -->
<script type="text/javascript" src="//use.typekit.net/olq0xkh.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<noscript>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/noscript.css" /></noscript>  
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

<?php
#twitter cards hack
if(is_single() || is_page()) {
  $twitter_url    = get_permalink();
 $twitter_title  = get_the_title();
 $twitter_desc   = get_the_excerpt();
   $twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full );
    $twitter_thumb  = $twitter_thumbs[0];
      if(!$twitter_thumb) {
      $twitter_thumb = 'http://ScottHSmith.com/images/ScottPic.png';
    }
  $twitter_name   = str_replace('@', '', get_the_author_meta('twitter'));
?>
<meta name="twitter:card" value="summary" />
<meta name="twitter:url" value="<?php echo $twitter_url; ?>" />
<meta name="twitter:title" value="<?php echo $twitter_title; ?>" />
<meta name="twitter:description" value="<?php echo $twitter_desc; ?>" />
<meta name="twitter:image" value="<?php echo $twitter_thumb; ?>" />
<meta name="twitter:site" value="@BeyondTheCode" />
<?
  if($twitter_name) {
?>
<meta name="twitter:creator" value="@<?php echo $twitter_name; ?>" />
<?
  }
}
?>

<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	<div id="header">
		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</<?php echo $heading_tag; ?>>
			<div id="site-description">by <a href="http://ScottHSmith.com">Scott Smith</a></div>
			<div id="sociallinks">
				<ol> 
					<a id="TwitterLink" href="http://twitter.com/BeyondTheCode">
						<img src="http://beyondtheco.de/wp-content/themes/Decode/images/Twitter.svg"/>
					</a>
					<a id="AppNetLink" class="desktop" href="https://alpha.app.net/scottsmith">
						<img src="http://beyondtheco.de/wp-content/themes/Decode/images/AppNet.svg"/>
					</a>
					<a id="AppNetLink" class="mobile" href="http://BeyondTheCo.de/ADN">
						<img src="http://beyondtheco.de/wp-content/themes/Decode/images/AppNet.svg"/>
					</a>
					<a id="FacebookLink" href="https://www.facebook.com/BeyondTheCode">
						<img src="http://beyondtheco.de/wp-content/themes/Decode/images/Facebook.svg"/>
					</a>
					
				</ol>
			</div>
		<div id="menu"><?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used.  */ ?>
<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'primary' ) ); ?></div>
		
	</div><!--#header-->
	
<div id="content">	