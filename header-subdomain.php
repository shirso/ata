<!DOCTYPE html>
<!--[if lte IE 7]><html class="ie ie7"> <![endif]-->
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<title>
	<?php if ( is_tag() ) {
			echo 'Tag Archive for &quot;'.$tag.'&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title(); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() ) {
			bloginfo( 'name' ); 
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} else {
			echo wp_title( ' | ', false, right ); bloginfo( 'name' );
		} ?>
	</title>
	<meta name="keywords" content="<?php wp_title(); echo ' , '; bloginfo( 'name' ); echo ' , '; bloginfo( 'description' ); ?>" />
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="index" title="<?php bloginfo( 'name' ); ?>" href="<?php echo get_option('home'); ?>/" />
    <link rel="icon" href="<?php echo get_option('university_favicon'); ?>" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
    <!-- The HTML5 Shim is required for older browsers, mainly older versions IE -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" &nbsp;alt="" /></a>
    </div>
  <![endif]-->
    <!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->   
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/ie.css"><![endif]-->
    <!--[if lte IE 8]><script src="<?php bloginfo( 'template_url' ); ?>/js/respond.min.js"></script><![endif]-->
  
  <?php $link_custom_css = get_option('university_custom_css'); ?>
	<?php if($link_custom_css){?>
  <style type="text/css">
  	<?php echo get_option('university_custom_css'); ?>
  </style>
  <?php }?>
</head>
<body <?php body_class(); ?> >
<!----- Header Open  ------->
<header class="top-head">
    <div class="container">
        <div class="row clearfix">
            <div class="col-sm-4">
                <div class="logo-area">
                    <a href="<?php bloginfo('home') ?>"><img src="<?php echo get_option('university_logo');?>" class="img-responsive" alt="logo"></a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="call-us">
               <h2><?php _e('Now operating nationwide!');?> </h2>
                    <h3><?php echo get_option('university_ph');?> </h3>
                </div>
            </div>
        </div>
    </div>
</header>

<!----- Header Close  ------->