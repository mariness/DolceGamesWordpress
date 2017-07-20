<?php
/*
	Theme options
*/

function optionsframework_option_name() {
	$themename = wp_get_theme();
	$themename = $themename->Name;
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options(){
	$options = array();

	$options[] = array( 
		"name" => __("Main Settings", TDOMAIN),
		"type" => "heading"
	);	

	$options[] = array( 
		"name" => __("App name", TDOMAIN),
		"desc" => "",
		"id"   => "theme_app_name",
		"std"  => __("Appz", TDOMAIN),
		"type" => "text"
	);

	$options[] = array( 
		"name" => __("Short app description", TDOMAIN),
		"desc" => "",
		"id"   => "theme_app_desc",
		"std"  => __("The amazing template to show off your new iPhone App!", TDOMAIN),
		"type" => "text"
	);

	$options[] = array( 
		"name" => __("Download link", TDOMAIN),
		"desc" => "",
		"id"   => "theme_app_down",
		"std"  => "",
		"type" => "text"
	);

	$options[] = array( 
		"name" => __("Copyright", TDOMAIN),
		"desc" => "",
		"id"   => "theme_copyright",
		"std"  => __("&copy; 2013 Appz. All Rights Reserved.", TDOMAIN),
		"type" => "textarea"
	); 



	$options[] = array( 
		"name" => __("Styling", TDOMAIN),
		"type" => "heading"
	);		

	$options[] = array( 
		"name" => __("Primary color", TDOMAIN),
		"id"   => "theme_color",
		"std"  => "#f12078",
		"type" => "color"
	);

	$options[] = array( 
		"name" => __("Secondary color", TDOMAIN),
		"id"   => "theme_color_secondary",
		"std"  => "#f88fbb",
		"type" => "color"
	);

	$options[] = array( 
		"name" => __("Background", TDOMAIN),
		"desc" => "",
		"id"   => "theme_background",
		"type" => "upload"
	);

	$options[] = array( 
		"name" => __("Show call to action phrase", TDOMAIN),
		"desc" => __("Get your free Download of Appz today!", TDOMAIN),
		"id"   => "theme_cta",
		"std"  => "1",
		"type" => "checkbox"
	);

	$options[] = array(
		"name" => __("Theme font", TDOMAIN),
		"desc" => "",
		"id"   => "theme_font",
		"std"  => "molle",
		"type" => "select",
		"options" => array(
			"molle"      => "Molle",
			"condiment"  => "Condiment",
			"sheppards"  => "Mrs Sheppards",
			"oleoscript" => "Oleo Script"
		)
	);

	return $options;
}
