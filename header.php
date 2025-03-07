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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.4/lottie.min.js"></script>
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
					<svg fill="none" height="100" viewBox="0 0 601 100" width="601" xmlns="http://www.w3.org/2000/svg"><path d="m52.488 14.904h-38.192v24.528h35.504v11.536h-35.504v32.032h-13.439999v-79.744h51.631999zm53.323-13.32801c20.048 0 31.584 13.32801 31.584 33.60001 0 22.4-14.784 49.504-43.0076 49.504-20.16 0-31.472-13.328-31.472-33.6 0-22.4 14.56-49.50401 42.8956-49.50401zm-.56 11.98401c-18.8156 0-28.7836 21.28-28.7836 37.52 0 13.104 6.608 21.616 18.368 21.616 18.8156 0 29.0076-21.28 29.0076-37.52 0-13.104-6.608-21.616-18.592-21.616zm43.371-10.304h27.44c19.6 0 28.448 8.176 28.448 22.064 0 9.968-5.712 17.472-14.784 19.712v.224c5.712 1.904 8.288 5.264 11.872 15.232l8.176 22.512h-14.672l-6.72-20.048c-3.136-8.96-6.608-11.984-14.784-11.984h-11.536v32.032h-13.44zm13.44 11.088v25.648h13.328c11.088 0 15.68-5.376 15.568-13.328 0-8.512-5.824-12.32-16.352-12.32zm147.428 68.656h-12.992v-40.096c0-10.08.112-20.16.448-30.24h-.224c-3.024 10.08-6.272 20.048-9.632 30.016l-13.776 40.32h-15.344l-13.776-40.32c-3.36-9.968-6.608-19.936-9.632-30.016h-.224c.336 10.08.448 20.16.448 30.24v40.096h-12.992v-79.744h21.616l12.88 37.968c3.36 9.856 6.496 20.048 9.184 30.016h.224c2.799-9.968 5.936-20.16 9.296-30.016l12.88-37.968h21.616zm64.062-21.616h-33.04l-12.768 21.616h-15.008l48.832-79.744h18.032l9.184 79.744h-13.216zm-1.12-11.648-.56-6.272c-1.008-10.64-1.792-21.056-2.464-31.696h-.224c-5.824 10.64-11.76 21.056-18.032 31.696l-3.696 6.272zm90.666-34.832h-26.208v68.096h-13.328v-68.096h-26.208v-11.648h65.744zm34.88-14.8960063h11.2c-18.928 24.1920063-27.216 49.1680063-27.216 71.0080063 0 9.408.896 18.592 2.464 28.448h-10.304c-3.472-10.752-5.264-21.392-5.264-32.928 0-21.168 9.072-45.472 29.12-66.5280063zm44.64 1.5679963c17.472 0 26.32 6.83201 26.32 20.16001 0 1.792-.336 3.808-.896 6.048h-13.552c.336-1.456.448-2.8.448-4.032 0-7.392-4.816-11.2-13.888-11.2-9.744 0-15.456 5.712-15.456 11.536 0 6.384 4.928 8.96 15.008 12.32 11.536 3.808 21.28 7.952 21.28 22.624 0 11.648-10.864 25.648-32.592 25.648-17.696 0-27.888-7.392-27.888-21.392 0-2.128.224-4.256.784-6.608h13.776c-.336 1.792-.561 3.472-.561 4.928 0 8.064 5.265 11.984 15.233 11.984 12.32 0 17.136-7.28 17.136-12.656 0-7.28-5.264-9.408-14.56-12.768-11.648-4.032-21.616-7.952-21.616-22.288 0-10.752 10.416-24.30401 31.024-24.30401zm29.133 97.88801h-11.2c18.928-24.192 27.216-49.168 27.216-71.008 0-9.408-.784-18.59201-2.464-28.4480063h10.304c3.472 10.7520063 5.264 21.3920063 5.264 32.9280063 0 21.168-9.072 45.472-29.12 66.528z" fill="#005aff"/></svg>
				</div>
			<a id="info-link" href="<?php echo home_url(); ?>/info">
				<svg fill="none" height="19" viewBox="0 0 267 47" width="92" xmlns="http://www.w3.org/2000/svg"><g fill="#000"><path d="m27.387 15.75-12.069-12.06899 3.1815-3.181498 17.5005 17.500488-17.5005 17.5005-3.1815-3.1815 12.069-12.069h-27.387v-4.5z"/><path d="m55.8162 39h-6.24v-37.02398h6.24zm36.499 0h-8.4243l-4.368-15.496c-1.508-5.2-2.964-10.608-4.264-15.91198h-.104c-1.196 5.61598-2.444 11.23198-3.848 16.84798l-3.588 14.56h-6.032l9.204-37.02398h8.424l4.42 15.49598c1.456 5.2 2.912 10.608 4.264 15.912h.104c1.144-5.616 2.392-11.232 3.7963-16.848l3.64-14.55998h5.9798zm12.4598-37.02398h11.856c12.376 0 19.396 6.656 19.396 18.51198 0 11.856-7.02 18.512-19.396 18.512h-11.856zm6.188 5.408v26.20798h5.564c8.632 0 13.052-4.472 13.052-13.104s-4.42-13.10398-13.052-13.10398zm61.023 0h-18.512l-2.444 10.03598h17.368l-1.404 5.356h-17.368l-2.704 10.816h19.032l-1.3 5.408h-25.272l9.204-37.02398h24.752zm18.668 12.68798 12.168 18.928h-7.28l-8.632-14.144h-.104l-8.632 14.144h-7.332l12.22-18.928-11.596-18.09598h7.228l8.112 13.57198h.104l8.112-13.57198h7.176zm28.131-19.603982h5.2c-8.788 11.231982-12.636 22.827982-12.636 32.967982 0 4.368.416 8.632 1.144 13.208h-4.784c-1.612-4.992-2.444-9.932-2.444-15.288 0-9.828 4.212-21.112 13.52-30.887982zm20.725.728002c8.112 0 12.22 3.172 12.22 9.35998 0 .832-.156 1.768-.416 2.808h-6.292c.156-.676.208-1.3.208-1.872 0-3.43198-2.236-5.19998-6.448-5.19998-4.524 0-7.176 2.652-7.176 5.35598 0 2.964 2.288 4.16 6.968 5.72 5.356 1.768 9.88 3.692 9.88 10.504 0 5.408-5.044 11.908-15.132 11.908-8.216 0-12.948-3.432-12.948-9.932 0-.988.104-1.976.364-3.068h6.396c-.156.832-.26 1.612-.26 2.288 0 3.744 2.444 5.564 7.072 5.564 5.72 0 7.956-3.38 7.956-5.876 0-3.38-2.444-4.368-6.76-5.928-5.408-1.872-10.036-3.692-10.036-10.348 0-4.99198 4.836-11.28398 14.404-11.28398zm13.527 45.44798h-5.2c8.788-11.232 12.636-22.828 12.636-32.968 0-4.36798-.364-8.63198-1.144-13.207982h4.784c1.612 4.992002 2.444 9.931982 2.444 15.287982 0 9.828-4.212 21.112-13.52 30.888z"/></g></svg>
			</a>

			<a id="home-link" href="<?php echo home_url(); ?>">
			<svg fill="none" height="19" viewBox="0 0 217 54" width="80" xmlns="http://www.w3.org/2000/svg"><g fill="#000"><path d="m36.387 24.75-12.069-12.069 3.1815-3.18153 17.5005 17.50053-17.5005 17.5005-3.1815-3.1815 12.069-12.069h-27.387v-4.5z"/><path d="m88.06 48h-6.188v-16.536h-17.056v16.536h-6.24v-37.024h6.24v15.08h17.056v-15.08h6.188z"/><path d="m115.887 10.196c9.308 0 14.664 6.188 14.664 15.6 0 10.4-6.864 22.984-19.968 22.984-9.36 0-14.6117-6.188-14.6117-15.6 0-10.4 6.7597-22.984 19.9157-22.984zm-.26 5.564c-8.736 0-13.364 9.88-13.364 17.42 0 6.084 3.068 10.036 8.528 10.036 8.736 0 13.468-9.88 13.468-17.42 0-6.084-3.068-10.036-8.632-10.036z"/><path d="m176.48 48h-6.032v-18.616c0-4.68.052-9.36.208-14.04h-.105c-1.404 4.68-2.912 9.308-4.472 13.936l-6.395 18.72h-7.125l-6.396-18.72c-1.56-4.628-3.068-9.256-4.472-13.936h-.104c.156 4.68.209 9.36.209 14.04v18.616h-6.032v-37.024h10.035l5.98 17.628c1.56 4.576 3.017 9.308 4.265 13.936h.104c1.3-4.628 2.756-9.36 4.316-13.936l5.979-17.628h10.037z"/><path d="m214.959 16.384h-18.512l-2.444 10.036h17.368l-1.404 5.356h-17.368l-2.704 10.816h19.032l-1.3 5.408h-25.272l9.204-37.024h24.752z"/></g></svg>
			</a>
		</header>
