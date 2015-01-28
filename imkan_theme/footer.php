<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
global $footer_content;
global $session;
?>

	<footer><?=$footer_content; ?></footer>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/foundation/js/foundation.min.js"></script>


		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>
  </body>
</html>
