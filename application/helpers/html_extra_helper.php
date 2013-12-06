<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * puntoVenta html Helper
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Enrique Amezcua
 *
 */

// ------------------------------------------------------------------------


//
// CREATE IMG TAG WITH ATTRIBUTES
//

if ( ! function_exists('image'))
{
	function image( $src = '' , $format = 'jpg', $attributes = '' ,  $fullPath = false )
	{		
		if ($fullPath){
			return '<img src = "' . base_url() . $src . '" style = "' . $attributes .'"/>';	
		}else{
			$src = base_url() . "application/views/images/" . $src;
			return '<img src = "' . $src . '.' . $format . '" style = "' . $attributes . '"/>';	
		}		
	}
}

//
// DUMP A VARIABLE WITH PRINT_R
//

if ( ! function_exists('dump'))
{
	function dump( $var )
	{		
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
}


//
// ECHO ONCLICK HREF
//

if ( ! function_exists('clickHref'))
{
	function clickHref( $url )
	{		
		return "onclick='window.location.href=\"" . base_url($url) . "\"'";
	}
}



//
// ECHO ONCLICK HREF
//

if ( ! function_exists('mapCanvas'))
{
	function mapCanvas( $class = '' , $attr = '' )
	{		
		return "<div id = 'map-canvas' class = '{$attr}' style = '{$attr}'></div>";
	}
}



//
// ALERT
//

if ( ! function_exists('alert'))
{
	function alert( $type = '', $title = '' , $content = '')
	{		
		return "	<div class=\"alert alert-{$type}\">
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<br/>
						<h4>{$title}!</h4>
						<br/>{$content}<br/>&nbsp;
					</div>";
	}
}


?>