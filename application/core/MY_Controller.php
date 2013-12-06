<?php
class My_Controller extends CI_Controller{

	private $layout = "bootstrap";
	// public $goBack = FALSE;
	public $goBackUrl = "";	
	public $sidebar = 1;

	//
	// CHECK IF USER IS LOGGED IN
	//

	public function __construct( $reqLogin = TRUE ) {

		parent::__construct();

		if ( $reqLogin ) 
			if ( !$this->session->userdata( 'user' ) )
				redirect('index');

		if ( $this->session->userdata( 'browser' ) == 'mobile' )
			$this->setLayout('jquerymobile');


	}


	//
	// VERIFY PERMISSION
	//

	public function verify( $screen, $perm = null , $userType = null ){

		if ( $userType == null )
			$userType = $this->session->userdata('userType');

		if ( $perm != null ){

			$stm = "SELECT 
					*
				FROM
					cat_tipoPersonal_permisos
				WHERE
					idPantalla = {$screen} AND
					idPermiso = {$perm} AND
					idTipoPersonal = {$userType} LIMIT 1;";
		
			$query = $this->db->query( $stm );
			
			if ( count($query->result()) > 0)
				return true;
			else
				return false;

		}else if ( $perm == null || $perm == 0 ){

			$stm = "SELECT 
					*
				FROM
					cat_tipoPersonal_permisos
				WHERE
					idPantalla = {$screen} AND					
					idTipoPersonal = {$userType} LIMIT 1;";
		
			$query = $this->db->query( $stm );
			
			if ( count($query->result()) > 0)
				return true;
			else
				return false;

		}

		
	}


	//
	// SET LAYOUT
	// 

	protected function setLayout( $layout ) {
		$this->layout = $layout;
	}


	//
	// OVERRIDE OUTPUT FUNCTION
	//

	public function _output( $output ) {
		$data['output'] = $output;
		// if ( !$this->session->userdata( 'browser' ) )			
		// 	echo $this->load->view( "desktop/" . "layout/{$this->layout}", $data, true );
		// else
		echo $this->load->view( $this->session->userdata( 'browser' ) . "/" . "layout/{$this->layout}", $data, true );		
	}


	//
	// PREPARE TO OUTPUT ADDING BROWSER
	//

	public function myview( $view , $vars = array() , $return = FALSE ){		
		$this->load->view( $this->session->userdata( 'browser' ) . "/" . $view , $vars , $return );
	}

}
?>