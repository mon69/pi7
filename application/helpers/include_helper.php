<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * puntoVenta Include Helper
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Enrique Amezcua
 *
 */


//
// REQUIRE URL HELPER
//


// ------------------------------------------------------------------------




//
//
// CSS
//
//



//
// INCLUDE CSS
//

if ( ! function_exists('includeCss') ) {

	function includeCss( $css = '' ){

		$pathCss = base_url() . "application/views/css/" . $css;

		return '<LINK rel="stylesheet" href="'.$pathCss.'.css" type="text/css">';

	}

}





//
// INCLUDE BOOTSTRAP
//

if ( ! function_exists('includeBootstrap') ) {

	function includeBootstrap() {

		return includeCss('bootstrap/css/bootstrap.min');

	}

}








//
// INCLUDE BOOTSTRAP RESPONSIVE
//

if ( ! function_exists('includeBootstrapResponsive') ) {

	function includeBootstrapResponsive() {

		return includeCss('bootstrap/css/bootstrap-responsive.min');

	}

}




//
// INCLUDE JQUERY MOBILE
//

if ( ! function_exists('includeJqueryMobileCss') ) {

	function includeJqueryMobileCss() {

		return includeCss('jquery.mobile.min');

	}

}








//
//
// JS
//
//



//
// INCLUDE JS
//

if ( ! function_exists('includeJs') ) {

	function includeJs($js = '') {

		$pathJs = base_url() . "application/libraries/js/" . $js;

		return '<script type="text/javascript" src="' . $pathJs .'.js"></script>';

	}

}



//
// INCLUDE JS BOOTSTRAP
//

if ( ! function_exists('includeBootstrapJs') ) {

	function includeBootstrapJs() {

		return includeJS('bootstrap.min');

	}

}




//
// INCLUDE JQUERY
//

if ( ! function_exists('includeJquery') ) {

	function includeJquery() {

		return includeJS('jquery.min');

	}

}




//
// INCLUDE JQUERY MOBILE
//

if ( ! function_exists('includeJqueryMobileJs') ) {

	function includeJqueryMobileJs() {

		return includeJS('jquery.mobile.min');

	}

}




//
// INCLUDE JS BASE URL
//

if ( ! function_exists('includeJsBaseUrl') ) {

	function includeJsBaseUrl() {

		return '<script type="text/javascript">var base_url = "' . base_url() . '";</script>' ;

	}

}


//
// INCLUDE GOOGLE MAPS JS
//

if ( ! function_exists('includeGMaps') ) {

	function includeGMaps($api = '', $sensor = 'false') {

		return "<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=".$api."&sensor=".$sensor."'></script>";

	}

}



?>