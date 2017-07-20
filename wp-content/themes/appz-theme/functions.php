<?php
/*
	Constants
*/
define("HOME_URL",              get_home_url());
define("THEME_DIR",             get_bloginfo('template_directory'));
define("JS_DIR",                THEME_DIR."/js");
define("IMG_DIR",               THEME_DIR."/img");
define("CSS_DIR",               THEME_DIR."/less");
define("FONTS_DIR",             THEME_DIR."/fonts");
define("TIMTHUMB_PATH",         THEME_DIR.'/thumb.php');
define("OPTIONS_FRAMEWORK_DIRECTORY", THEME_DIR."/admin/");

/*
	Includes
*/
require_once 'admin/options-framework.php';
require_once 'admin/options-framework-extended.php';

/*
	Translations
*/
define('TDOMAIN', 'appz');
define('LANGUAGE_FOLDER', TEMPLATEPATH.'/languages');

add_action('after_setup_theme', 'translations_setup');
function translations_setup(){
	load_theme_textdomain(TDOMAIN, LANGUAGE_FOLDER);
}

/*
	Assets
*/
function appz_assets(){
	$js_files = array(
		'appz-js-modernizr' => array(
			'path' => '/libs/modernizr.js',
			'footer' => false
		),
		'appz-js-bugfix' => array(
			'path' => '/libs/ios-viewport-scaling-bug-fix.js',
			'footer' => false
		),
		'appz-bxslider' => array(
			'path' => '/plugins/jquery.bxslider.min.js',
			'footer' => true
		),
		'appz-js-main' => array(
			'path' => '/main.js',
			'footer' => true
		)
	);

	$css_files = array(
		'appz-css' => '/main.css'
	);

	if(! is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', JS_DIR.'/libs/jquery-1.9.1.js', null, 1.0, true);
		wp_enqueue_script('jquery');
	}

	foreach($js_files as $name => $opt){
	    wp_register_script($name, JS_DIR.$opt["path"], array('jquery'), 1.0, $opt["footer"]);
	    wp_enqueue_script($name);		
	}

	foreach($css_files as $name => $path){
	    wp_register_style($name, CSS_DIR.$path, null, 1.0, null);
	    wp_enqueue_style($name);		
	}
}
add_action('wp_enqueue_scripts', 'appz_assets');


/*
	App features
*/
add_action('init', 'create_post_type');
function create_post_type() {
	register_post_type('appz_features',
		array(
			'labels' => array(
				'name' => __('Slider', TDOMAIN),
				'singular_name' => __('Slide', TDOMAIN)
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array(
				'title',
				'thumbnail', 
				'excerpt'
			)
		)
	);
}

if(class_exists('MultiPostThumbnails')){
	new MultiPostThumbnails(array(
		'label'     => __('App feature image', TDOMAIN),
		'id'        => 'app-feature-img',
		'post_type' => 'appz_features'
	));
}

add_theme_support('post-thumbnails'); 
function generate_tumbnail($src, $width = 100, $height = 100, $return_url = FALSE){
	$post_thumbnail_src = TIMTHUMB_PATH . '?w=' . $width . '&h=' . $height . '&src=' . $src;
	
	return (! $return_url) ? '<img src="' . $post_thumbnail_src . '" alt="" />' : $post_thumbnail_src;
}
function generate_thumbnail_by_id($post_id, $width = 100, $height = 100, $return_url = FALSE){
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
	
	return generate_tumbnail($thumbnail[0], $width, $height, $return_url);
}
