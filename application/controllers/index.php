<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	DETECT WEB BROWSER AND REDIRECTS
*/

class Index extends MY_Controller {

	public function __construct() { 
		parent::__construct( FALSE ); 
	}
	
	//
	// DETECT BROWSER AND REDIRECT
	//	

	public function index(){
		
		if ( !$this->session->userdata( 'browser' ) ) {			

			if ( $this->agent->is_mobile() ) 
				$browser = "mobile";

			elseif( $this->agent->is_browser() )
				$browser = "desktop";

			else
				$browser = "desktop";

			$this->session->set_userdata( 'browser' , $browser );
			// $this->session->set_userdata( 'browser' , 'mobile' );

		}

		
		redirect( 'session/login' );

	}	

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */