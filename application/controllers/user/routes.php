<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routes extends MY_Controller{

	private $screen = 4;
	private $perm = 0;
	public $title = 'Rutas';

	public function __construct() { 

		//
		// CONF
		// 	
		// $this->perm = 3;
		// if ( !$this->verify( $this->screen , $this->perm) )
		// 		redirect('user/welcome');
		//
		// $data['screen'] = $this->screen;
		// $data['perm'] = $this->perm;
		// $data['permissions'] = $this->session->userdata('permission');
		// $this->goBackUrl = "user/clients";
		// $this->sidebar = 0; // 0 - CLOSE | 1 - OPEN


		parent::__construct( TRUE );
		if ( !$this->verify( $this->screen ) )
			redirect('user/welcome');

		$this->setLayout("sidr");
	}


	//
	// INDEX
	//

	public function index() {

		if ( !$this->verify( $this->screen ) )
			redirect('user/welcome');

		$userType = $this->session->userdata('userType');
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		if ( $userType == 1 ){
			$routes = $this->db->query("
				SELECT
					rh.idHistorial,
					rh.fec_dia,
					r.txt_nombreRuta,
					p.txt_usuario

				FROM
					ctrl_rutasHistorial as rh

				LEFT JOIN
					ctrl_rutas as r
				ON rh.idRuta = r.idRuta

				LEFT JOIN
					ctrl_personal as p
				ON rh.idChofer = p.idPersonal

				WHERE 
					fec_dia >= CURDATE()
			");

			$data['routes'] = $routes->result();
			$this->myview('user/routes/administrator',$data);

		}elseif ( $userType == 2 ) {
			$routes = $this->db->query("
				SELECT
					rh.idHistorial,
					rh.fec_dia,
					r.txt_nombreRuta

				FROM
					ctrl_rutasHistorial as rh

				LEFT JOIN
					ctrl_rutas as r
				ON rh.idRuta = r.idRuta

				WHERE
					idChofer = {$this->session->userdata('idPersonal')} AND
					fec_dia >= CURDATE()
			");

			$data['routes'] = $routes->result();
			$this->myview('user/routes/driver',$data);
		}
		
		
	} // INDEX


	public function newRoute() {
		$this->perm = 1;
		if ( !$this->verify( $this->screen , $this->perm) )
				redirect('user/welcome');
		
		if ( $this->input->post() ) {

			echo "post";

		}


		$this->load->model('ctrl_clientes_model','clients');

		$clients = $this->clients->getAllAsArray();

		$clients_to_view = array();
		foreach ($clients as $key => $client) {
			$clients_to_view[ $client['idCliente'] ] = $client['txt_nombre'];
		}

		$this->title = 'Nueva ruta';
		$this->goBackUrl = "user/routes";
		$this->sidebar = 0; // 0 - CLOSE | 1 - OPEN
		$data['clients'] = $clients_to_view;
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview( 'user/routes/newRoute' , $data );
	}

}