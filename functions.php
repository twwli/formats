<?php
/*
Author: Eddie Machado
URL: http://themble.com/formats/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD formats CORE (if you remove this, the theme will break)
require_once( 'library/formats.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH formats
Let's get everything up and running.
*********************/

function formats_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'formats', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'formats_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'formats_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'formats_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'formats_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'formats_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'formats_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  formats_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'formats_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'formats_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'formats_excerpt_more' );

} /* end formats ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'formats_ahoy' );

/*************  ACF WEBSITE OPTIONS *************/

/*
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Website General Settings',
		'menu_title'	=> 'Website Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Banner Settings',
		'menu_title'	=> 'Banner',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Sidebar Settings',
		'menu_title'	=> 'Sidebar',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	)); 
	
} */

/************* CONTACT FORM 7  *********************/

/**
 * Stop loading the CSS stylesheet on all pages 
 */

// add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Load JS files only if necessary
 */

/* if (!function_exists('juiz_wpcf7_dequeue_scripts')) {
	function juiz_wpcf7_dequeue_scripts() {
		if ( WPCF7_LOAD_JS && WPCF7_LOAD_CSS ) {
			global $post;
			if ( !strpos($post->post_content, '[contact-form-7') ) {
				wp_dequeue_script('contact-form-7');
			}
		}
	}
	add_action( 'wp_enqueue_scripts', 'juiz_wpcf7_dequeue_scripts' );
} */

/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'formats-thumb-600', 600, 150, true );
add_image_size( 'formats-thumb-300', 300, 100, true );
add_filter( 'image_size_names_choose', 'formats_custom_image_sizes' );

function formats_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'formats-thumb-600' => __('600px by 150px'),
        'formats-thumb-300' => __('300px by 100px'),
    ) );
}

/************* ALLOW SVG THUMBNAILS *********************/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function formats_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'formats_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function formats_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'formats' ),
		'description' => __( 'The first (primary) sidebar.', 'formats' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function formats_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'formats' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'formats' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'formats' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'formats' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* REMOVE DEFAULT WP WIDGETS *************/

/************* Stop Storing IP Address in Comments *************/

function wpb_remove_commentsip( $comment_author_ip ) {
return '';
}
add_filter( 'pre_comment_user_ip', 'wpb_remove_commentsip' );

/************* Disable the emoji's *************/

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/************* REMOVE POSTS FROM ADMIN MENU *************/

function remove_menus(){
    //remove_menu_page( 'index.php' );                  //Dashboard
    //remove_menu_page( 'jetpack' );                    //Jetpack* 
    //remove_menu_page( 'edit.php' );                   //Posts
    //remove_menu_page( 'upload.php' );                 //Media
    //remove_menu_page( 'edit.php?post_type=page' );    //Pages
    //remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    //remove_menu_page( 'tools.php' );                  //Tools
    //remove_menu_page( 'options-general.php' );        //Settings
}

add_action( 'admin_menu', 'remove_menus' );


/************* REMOVE DEFAULT WP WIDGETS *************/

//remove_action( 'init', 'wp_widgets_init', 1 );
//add_action( 'init', function() { do_action( 'widgets_init' ); }, 1 );

/************* Exclude pages from WordPress Search *****************/

/* if (!is_admin()) {
  function wpb_search_filter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
  }
  add_filter('pre_get_posts','wpb_search_filter');
} */

/************* HIDE WP-ADMIN (FRONT-END) *********************/

add_filter('show_admin_bar', '__return_false');

/************* HTML5 PREFETCH *****************/

add_action('wp_head', 'gkp_prefetch');
function gkp_prefetch() {
	
    if ( is_single() ) {  ?>
		
	<!-- Préchargement de la page d\'accueil -->
	<link rel="prefetch" href="<?php echo home_url(); ?>" />
	<link rel="prerender" href="<?php echo home_url(); ?>" />
		
	<!-- Préchargement de l\'article suivant -->
	<link rel="prefetch" href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?>" />
	<link rel="prerender" href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?>" />
   <?php
   }
}

/************* Deactivate XML *****************/

add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );


/************* MINIFY HTML/JS/CSS *****************/

class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;

	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);
		
		$savings = ($raw-$compressed) / $raw * 100;
		
		$savings = round($savings, 2);
		
		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			
			$content = $token[0];
			
			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;
					
					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;
						
						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
						
						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}
			
			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}
			
			$html .= $content;
		}
		
		return $html;
	}
		
	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);
		
		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}
	
	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		
		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}
		
		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');

/************* WP CACHE FLUSH *****************/

wp_cache_flush()


/* DON'T DELETE THIS CLOSING TAG */ ?>
