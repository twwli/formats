<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name="mobile-web-app-status-bar-style" content="black-translucent">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.svg">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#005aff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
        <meta name="theme-color" content="#005aff">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>
	</head>
	
	<body id="<?php echo isset($post) ? $post->post_name . '-page' : '404-page'; ?>" <?php body_class(); ?>>
	<div id="verticalLine" class="line"></div>
    <div id="horizontalLine" class="line"></div>
	<div id="verticalDiv">X: 0</div>
    <div id="horizontalDiv">Y: 0</div>
    <?php // Page transitions ?>
    <script>
      document.body.classList.add('fade');
    </script>

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<div id="logo">
					<a href="<?php echo home_url(); ?>" rel="nofollow">
						<svg fill="none" height="100" viewBox="0 0 601 100" width="601" xmlns="http://www.w3.org/2000/svg"><path d="m52.488 14.904h-38.192v24.528h35.504v11.536h-35.504v32.032h-13.439999v-79.744h51.631999zm53.323-13.32801c20.048 0 31.584 13.32801 31.584 33.60001 0 22.4-14.784 49.504-43.0076 49.504-20.16 0-31.472-13.328-31.472-33.6 0-22.4 14.56-49.50401 42.8956-49.50401zm-.56 11.98401c-18.8156 0-28.7836 21.28-28.7836 37.52 0 13.104 6.608 21.616 18.368 21.616 18.8156 0 29.0076-21.28 29.0076-37.52 0-13.104-6.608-21.616-18.592-21.616zm43.371-10.304h27.44c19.6 0 28.448 8.176 28.448 22.064 0 9.968-5.712 17.472-14.784 19.712v.224c5.712 1.904 8.288 5.264 11.872 15.232l8.176 22.512h-14.672l-6.72-20.048c-3.136-8.96-6.608-11.984-14.784-11.984h-11.536v32.032h-13.44zm13.44 11.088v25.648h13.328c11.088 0 15.68-5.376 15.568-13.328 0-8.512-5.824-12.32-16.352-12.32zm147.428 68.656h-12.992v-40.096c0-10.08.112-20.16.448-30.24h-.224c-3.024 10.08-6.272 20.048-9.632 30.016l-13.776 40.32h-15.344l-13.776-40.32c-3.36-9.968-6.608-19.936-9.632-30.016h-.224c.336 10.08.448 20.16.448 30.24v40.096h-12.992v-79.744h21.616l12.88 37.968c3.36 9.856 6.496 20.048 9.184 30.016h.224c2.799-9.968 5.936-20.16 9.296-30.016l12.88-37.968h21.616zm64.062-21.616h-33.04l-12.768 21.616h-15.008l48.832-79.744h18.032l9.184 79.744h-13.216zm-1.12-11.648-.56-6.272c-1.008-10.64-1.792-21.056-2.464-31.696h-.224c-5.824 10.64-11.76 21.056-18.032 31.696l-3.696 6.272zm90.666-34.832h-26.208v68.096h-13.328v-68.096h-26.208v-11.648h65.744zm34.88-14.8960063h11.2c-18.928 24.1920063-27.216 49.1680063-27.216 71.0080063 0 9.408.896 18.592 2.464 28.448h-10.304c-3.472-10.752-5.264-21.392-5.264-32.928 0-21.168 9.072-45.472 29.12-66.5280063zm44.64 1.5679963c17.472 0 26.32 6.83201 26.32 20.16001 0 1.792-.336 3.808-.896 6.048h-13.552c.336-1.456.448-2.8.448-4.032 0-7.392-4.816-11.2-13.888-11.2-9.744 0-15.456 5.712-15.456 11.536 0 6.384 4.928 8.96 15.008 12.32 11.536 3.808 21.28 7.952 21.28 22.624 0 11.648-10.864 25.648-32.592 25.648-17.696 0-27.888-7.392-27.888-21.392 0-2.128.224-4.256.784-6.608h13.776c-.336 1.792-.561 3.472-.561 4.928 0 8.064 5.265 11.984 15.233 11.984 12.32 0 17.136-7.28 17.136-12.656 0-7.28-5.264-9.408-14.56-12.768-11.648-4.032-21.616-7.952-21.616-22.288 0-10.752 10.416-24.30401 31.024-24.30401zm29.133 97.88801h-11.2c18.928-24.192 27.216-49.168 27.216-71.008 0-9.408-.784-18.59201-2.464-28.4480063h10.304c3.472 10.7520063 5.264 21.3920063 5.264 32.9280063 0 21.168-9.072 45.472-29.12 66.528z" fill="#005aff"/></svg>
					</a>
				</div>
					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu(array(
			         'container' => false,                           // remove nav container
			         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			         'menu' => __( 'The Main Menu', 'formats' ),  // nav name
			         'menu_class' => 'nav top-nav cf',               // adding custom nav class
			         'theme_location' => 'main-nav',                 // where it's located in the theme
			         'before' => '',                                 // before the menu
			         'after' => '',                                  // after the menu
			         'link_before' => '',                            // before each link
			         'link_after' => '',                             // after each link
			         'depth' => 0,                                   // limit the depth of the nav
			         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
					</nav>
          <div id="toggle-nav">
            <button class="toggle-menu">
              <span></span>
            </button>
          </div>
		</header>
