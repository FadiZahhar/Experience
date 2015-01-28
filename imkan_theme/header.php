<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/app.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/modernizr/modernizr.js"></script>
  <?php //wp_head();
	require_once('includes/IMKAN.php');
  global $session;
  $session['code']=IMKAN::generateRandomString();

// code to get the logo and the footer from the settings categories
  global $post;
  global $footer_content;
         $arg = array( 'numberposts' => 2, 'category_name' => 'settings', 'orderby' => id, 'order' => 'ASC' );
		 $posts = get_posts( $arg );
		 $footer_content = $posts[1]->post_content;
	     $large_image_url = array();
	     foreach($posts as $index => $post) {
	     	$large_image_url[$index] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
	     }

	?>
</head>

<body>

    <header>
      <div class="h22">&nbsp</div>
      <div class="row">
      <div class="small-3 medium-4 large-4 columns">
        <a href="/"><img src="<?= $large_image_url[0][0]; ?>" alt="IMKAN Group" title="IMKAN Group" /></a>
      </div>
       <div class="small-9 medium-8 large-8 columns">
       	<nav>
       	<?php
if (class_exists('CSSDropDownMenu'))
 {
     $myMenu = new CSSDropDownMenu();
     /* Extra options here, like so: $myMenu->orientation="top"; */
     $myMenu->show();
 }
 ?>
      </nav>


      </div>
    </div>


    </header>
