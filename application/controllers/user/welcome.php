<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Welcome extends MY_Controller{

		public $title = 'Bienvenido';

		public function __construct() { 
			parent::__construct( TRUE );
			$this->setLayout("sidr");
		}

		public function index(){
			$data['username'] = $this->session->userdata('user');
			$this->myview( 'user/welcome' , $data );
		}
	}

?>