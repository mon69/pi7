<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Users extends MY_Controller{

		private $screen = 7;
		private $perm = 0;
		public $title = "Usuarios";

		public function __construct() { 
			parent::__construct( TRUE );
			if ( !$this->verify( $this->screen ) )
				redirect('user/welcome');

			$this->setLayout("sidr"); 
		}

		public function index(){
			$data['screen'] = $this->screen;
			$data['perm'] = $this->perm;
			$data['permissions'] = $this->session->userdata('permission');
			
			$this->myview('user/users/index',$data);
		}
	}

?>