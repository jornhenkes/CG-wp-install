<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php wp_title(''); ?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="maximum-scale=1">
  
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <!-- CSS : implied media="all" -->
  <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css") ?>
  <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."InternetExplorer.css") ?>

  <!-- For the less-enabled mobile browsers like Opera Mini -->
  <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/handheld.css", 'media="handheld"') ?>

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/modernizr-1.5.min.js") ?>

  <!-- Loading typekit font('s) -->
  <script type="text/javascript" src="http://use.typekit.com/jyc6gpy.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  
  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script>!window.jQuery && document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>html5-boilerplate/js/jquery-1.4.2.min.js"><\/script>')</script>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."javascripts/jquery.cycle.all.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."javascripts/script.js") ?>

  <!--[if lt IE 7 ]>
    <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/dd_belatedpng.js") ?>
  <![endif]-->
  
  <!-- yui profiler and profileviewer - remove for production -->
  <!-- <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/profiling/yahoo-profiling.min.js") ?>
    <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/profiling/config.js") ?> -->
  <!-- end profiling code -->
  
  <!-- Wordpress Head Items -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php wp_head(); ?>
  
  <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-26459094-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

</head>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->

<!--[if lt IE 7 ]> <body <?php body_class('ie6'); ?>> <![endif]-->
<!--[if IE 7 ]>    <body <?php body_class('ie7'); ?>> <![endif]-->
<!--[if IE 8 ]>    <body <?php body_class('ie8'); ?>> <![endif]-->
<!--[if IE 9 ]>    <body <?php body_class('ie9'); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class('ie6'); ?>> <!--<![endif]-->
<?
//DEV-mode notification
if ($_SERVER['HTTP_HOST'] == "christengemeenschapkampen.dev" || $_SERVER['HTTP_HOST'] == "www.christengemeenschapkampen.dev") {
echo "<center><div class=\"dev_mode\">Let op: je werkt op dit moment in de DEV-mode!</div></center>";
} else { }
//einde DEV-mode notification ?>
    <header role="banner">
        <nav id="main">
            <?php wp_nav_menu( array('menu' => 'Top menu' )); ?>
        </nav>
        <h1 id="maintitle" class="hide_titles"><?php echo get_bloginfo('name'); ?></h1>
        <h2 id="maindesc" class="hide_titles"><?php echo get_bloginfo('description'); ?></h2>
    </header>
    <div id="container">