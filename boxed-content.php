<?php
/*
Plugin Name: Boxed Content
Description: Multiple types of Boxed Content shortcode and widget
Version: 1.0
Author: DigitalCourt
Author URI: http://DigitalSafari.co
License: GPL2
*/
/*
Copyright 2014 Digital Safari 

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'after_setup_theme', 'boxed_setup' );

function boxed_setup() {
	add_action( 'init', 'box_shortcodes' );
	add_action('wp_enqueue_scripts', 'boxed_enqueue_assets' );
}

function boxed_enqueue_assets() {
	wp_enqueue_style( 'boxed-css', plugins_url( 'css/boxed-content.css', __FILE__ ));
}

function box_shortcodes() {
	//Box
	add_shortcode( 'box', 'box_func' );
}

function box_func( $attr, $content = null ) {
	extract(shortcode_atts(array(
		'type' => 'color-box',
		'color' => 'transparent',
		'height' => '',
		'opacity' => '1'
	), $attr));
	
	$output = '<div class="' . $type . ' clearfix" ';  
	$output .= 'style="height:' . $height . '; background-color:'. $color . '; opacity:' . $opacity . ';"';
	$output .= '>';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}
?>