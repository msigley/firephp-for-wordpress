<?php
/*
Plugin Name: FirePHP for Wordpress
Plugin URI: https://github.com/msigley/firephp-for-wordpress
Description: Adds FirePHP Integration, php function fb(...) etc. More information <a href="http://www.firephp.org" target="_blank">http://www.firephp.org</a>
Author: Matthew Sigley. Based on work by Evalds Urtans.
Version: 1.0.0
Author URI: https://github.com/msigley
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
			ob_flush();
	}
}
$handlerFirePHP = new HandlerFirePHP();