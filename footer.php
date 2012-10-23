<?php /* The footer for our theme.*/ ?>
</div><!--//content-->

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<div class="push">
</div>
</div><!--#wrapper-->
<div id="menu"><?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used.  */ ?>
<div id="footer">
<?php if(melville_footer == show) {echo '<p class="credits">Made by <a href="http://madebyraygun.com">Raygun</a>, powered by <a href="http://wordpress.org/" rel="generator">WordPress</a></p>';}?>
</div><!--/footer-->
<?php wp_footer();?>
</body>
</html>