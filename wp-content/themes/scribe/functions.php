<?php

//-----------------------------------  // Load Scripts //-----------------------------------//

//Include Scripts
add_action('init', 'ok_theme_js');
function ok_theme_js() {
	if (is_admin()) return;
	
	//Register jQuery
	wp_enqueue_script('jquery');
	
	//Custom JS
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/includes/js/custom/custom.js', false, false , true);
	
	//Fancybox Easing
	wp_enqueue_script('fancybox_js', get_stylesheet_directory_uri() . '/includes/js/fancybox/jquery.fancybox-1.3.4.pack.js', false, false , true);
	
	//Sticky Sidebar
	wp_enqueue_script('sticky_js', get_stylesheet_directory_uri() . '/includes/js/jquery.sticky.js', false, false , true);
}


//-----------------------------------  // Localization //-----------------------------------//

load_theme_textdomain( 'okay', TEMPLATEPATH . '/includes/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/includes/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
		

//-----------------------------------  // Add Editor Styles //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/editor/add-styles.php");


//-----------------------------------  // Auto Feed Links //-----------------------------------//

add_theme_support( 'automatic-feed-links' );


//-----------------------------------  // Load Widgets //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/widgets/twitter.php");
require_once(dirname(__FILE__) . "/includes/widgets/flickr.php");


//-----------------------------------  // Custom Excerpt Limit //-----------------------------------//

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


//-----------------------------------  // Lightbox Attachment Images //-----------------------------------//

add_filter( 'wp_get_attachment_link', 'gallery_lightbox');

function gallery_lightbox ($content) {
	// adds a lightbox to wp gallery images
	return str_replace("<a", "<a rel='gallery' class='lightbox'", $content);
}


//-----------------------------------  // Add Menus //-----------------------------------//

add_theme_support( 'menus' );
register_nav_menu('main', 'Main Menu');
register_nav_menu('footer', 'Footer Menu');
register_nav_menu('custom', 'Custom Menu');


//-----------------------------------  // Add Image Sizes //-----------------------------------//

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 150, true ); // Default Thumb
add_image_size( 'large-image', 565, 9999, false ); // Large Post Image


//-----------------------------------  // Custom Background //-----------------------------------//

add_custom_background();


//-----------------------------------  // Register Widget Areas //-----------------------------------//

if ( function_exists('register_sidebars') )

register_sidebar(array(
'name' => 'Sidebar',
'description' => 'Widgets in this area will be shown on the sidebar of all pages.',
'before_widget' => '<div class="widget">',
'after_widget' => '</div>'
));

register_sidebar(array(
'name' => 'Sticky Sidebar',
'description' => 'Widgets in this area will be shown on the sticky sidebar which follows users as they scroll.',
'before_widget' => '<div class="widget">',
'after_widget' => '</div>'
));

register_sidebar(array(
'name' => 'Footer Right',
'description' => 'This is the small widget area in the right side of the footer. I recommend a small bit of text or a small logo, as seen on the demo site.',
'before_widget' => '<div class="footer-right">',
'after_widget' => '</div>'
));


//-----------------------------------  // Options Framework - Only wizards allowed beyond this point //-----------------------------------//

options_check();

function options_check()
{
  if ( !function_exists('optionsframework_activation_hook') )
  {
    add_thickbox(); // Required for the plugin install dialog.
    add_action('admin_notices', 'options_check_notice');
  }
}


//-----------------------------------  // Add Notice To Install Options Framework //-----------------------------------//

function options_check_notice()
{
?>
  <div class='updated fade'>
    <p>The Options Framework plugin is required for this theme to function properly. <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=589'); ?>" class="thickbox onclick">Install now</a>.</p>
  </div>
<?php
}

if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
		
		$optionsframework_settings = get_option('optionsframework');
		
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		
		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}
			
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}

//-----------------------------------  // Allow Code in Textarea //-----------------------------------//

add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}


//-----------------------------------  // Add Support Tab To Theme Options //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/support/support.php");