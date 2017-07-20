<?php
/*
	2011 (c)jurgelenas.lt
	Wordpress theme framework 
*/
	
//nicier function name and easier to remember
if ( function_exists( 'of_get_option' ) ){
	function theme_option($name, $default = FALSE){
		return of_get_option($name, $default);
	}
}

//get permalink via options page
function get_option_permalink( $option_name )
{
	$id = theme_option( $option_name );
	
	return get_permalink( $id ) ? get_permalink( $id ) : '#';
}