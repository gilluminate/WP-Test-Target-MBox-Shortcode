<?php
/*
Plugin Name: Test&Target MBox Shortcode
Plugin URI: http://www.gilluminate.com/wordpress-plugins/testtarget-mbox-shortcode/
Description: Provides a shortcode to wrap your content with, which will automatically be converted to the proper mbox syntax for use with <a href="https://microsite.omniture.com/t2/help/en_US/tnt/help/">Adobe Test&Target</a>.
Version: 1.5.1
Author: Jason Gill
Author URI: http://www.gilluminate.com
License: GPL2
*/

/*
Correct Syntax:
[mbox name="myMbox"]My Test Content[/mbox]
*/


function tnt_mbox_shortcode($atts, $content = null){
	//I haven't found a good explanation on Adobe's site as to what is a valid or invalid mbox name. When I do, I plan to add better validation here if necessary.
	$name = $atts["name"];
	//make sure the markup is correct
	if ($name && $content) {
		$mbox_code = "<div class='mboxDefault'>\n";
		$mbox_code .= wpautop( $content ); //wpautop helps avoid extra br and p from showing up
		$mbox_code .= "\n</div>\n";
		$mbox_code .= '<script type="text/javascript">mboxCreate("';
		$mbox_code .= $name;
		$mbox_code .= '");</script>';
	} else {
		//if markup is bad, simply return the content as in tact as possible
		$mbox_code = wpautop( $content );
	}
	
	return $mbox_code;
}
add_shortcode('mbox', 'tnt_mbox_shortcode');

function tnt_mbox_js(){
	$mbox_options = get_option('tnt_mbox_options');
	if(isset($mbox_options['tnt_mbox_js_url']) && $mbox_options['tnt_mbox_js_url']!=""){
		wp_enqueue_script('mbox', $mbox_options['tnt_mbox_js_url'], false);
	}
}
add_action('wp', 'tnt_mbox_js');

// Add support and donate links
function tnt_mbox_plugin_links($links, $file)
{
	if ( $file == plugin_basename(__FILE__) )
	{
		$links[] = '<a href="http://www.gilluminate.com/wordpress-plugins/testtarget-mbox-shortcode/">' . __('Support', 'tnt-mbox-shortcode') . '</a>';
		$links[] = '<a href="http://www.gilluminate.com/wordpress-plugins/donations/">' . __('Donate', 'tnt-mbox-shortcode') . '</a>';
	}
	
	return $links;
}
add_filter('plugin_row_meta', 'tnt_mbox_plugin_links', 10, 2);

// if an admin is loading the admin menu then call the admin actions function
if( is_admin() ) add_action('admin_menu', 'tnt_mbox_admin_actions');

// actions to perform when the admin menu is loaded
function tnt_mbox_admin_actions() {
	add_options_page("MBox Options", "MBox Options", "edit_pages", "tnt-mbox-options", "tnt_mbox_admin");
}

// function called when Indeed Options is selected from the admin menu
function tnt_mbox_admin() {
	include('tnt-mbox-options.php');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
	wp_enqueue_style('thickbox');
}

//cleanup after ourselves when the plugin is removed
register_uninstall_hook(__FILE__,'tnt_mbox_uninstall');
function tnt_mbox_uninstall() {
	delete_option('tnt_mbox_options');
}