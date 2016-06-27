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
  
  <?php $link_custom_css = get_option('ata_custom_css'); ?>
	<?php if($link_custom_css){?>
  <style type="text/css">
  	<?php echo get_option('ata_custom_css'); ?>
  </style>
  <?php }?>
    <?php if(is_user_logged_in()){?>
    <style type="text/css">
        @media (max-width: 767px) {
            .pg_header {
                margin-top: 40px;
            }
            .navbar-collapse{
                margin-top: 145px!important;
            }
        }
    </style>
    <?php }?>
</head>
<body <?php body_class(); ?> >
<?php $header_class=is_home() || is_front_page() ? "pg_header" : "pg_header_2" ?>
<section class="<?=$header_class?>">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-sm-2">
                <div class="lg-sec">
                    <?php $logo_image=is_home() || is_front_page() ? get_option('ata_logo') : get_option('ata_inner_logo'); ?>
                    <a href="<?=bloginfo('home');?>"><img src="<?=$logo_image;?>" class="img-responsive"/></a>
                </div>
            </div>
            <div class="col-xs-8 col-sm-10">
                <div class="hedlnk-sec">
                    <ul>
                        <li>
                            <a href="<?=get_option('ata_lang_url')?>"><?=get_option('ata_lang_text')?></a>
                        </li>
                        <li>
                            <a class="srch" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            <div class="srch-frm">
                                <form class="form-inline" method="get" id="searchform" action="<?php bloginfo('home'); ?>">
                                    <div class="form-group">
                                        <input name="s" class="form-control" type="text" placeholder="<?=__("Search","ata");?>" value="<?php the_search_query(); ?>">
                                    </div>
                                    <button type="submit" class="btn srch-btm-top"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                        <li><a href="<?=get_option("ata_fb")?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed nbartgl">
                                <i></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                            <?php
                            wp_nav_menu( array(
                                'container'       => 'ul',
                                'menu_class'      => 'nav navbar-nav',
                                'menu_id'         => '',
                                'depth'           => 0,
                                'theme_location' => 'header_menu',
                            ));
                            ?>
                        </div>
                    </div>
                </nav>
            </div>

        </div>
    </div>
</section>