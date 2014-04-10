<?php
/*
Plugin Name: FirePHP for Wordpress
Plugin URI: https://github.com/msigley/firephp-for-wordpress
Description: Adds FirePHP Integration, php function fb(...) etc. More information <a href="http://www.firephp.org" target="_blank">http://www.firephp.org</a>
Author: Matthew Sigley. Based on work by Evalds Urtans.
Version: 1.0.1
Author URI: https://github.com/msigley

Change Log:
-Fixed no buffer set issue. (1.0.1) Props to https://github.com/afragen.
*/

//Firebug
if(!function_exists('fb'))
{
	require_once(dirname(__FILE__) . '/vendor/fb.php');
}

class HandlerFirePHP {
	
	public function __construct()
    {    	
		add_action('init', array( $this, 'onInit' ), 0 );		
		add_action('wp_footer', array( $this, 'onFooter' ), 100 );
		add_action('admin_footer', array( $this, 'onFooter' ), 100 );	 						  
    }
	
	public function onInit() 
	{
		ob_start();
	}
	
	public function onFooter() 
	{
		if ( 0 < ob_get_level() )
			ob_flush();
	}
}
$handlerFirePHP = new HandlerFirePHP();