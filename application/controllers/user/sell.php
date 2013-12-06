<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends MY_Controller{

	private $screen = 3;
	private $perm = 0;
	public $title = 'Venta';

	public function __construct() { 

		//
		// CONF
		// 	
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

		if ( $this->input->post() ) {
			$user = $this->session->userdata('user');
			$password = $this->input->post('password');

			$stm = "SELECT * FROM ctrl_personal WHERE txt_usuario = '{$user}' AND txt_password = md5('{$password}') LIMIT 1";
			$query = $this->db->query( $stm );

			$result = $query->result();

			if ( !empty( $result[0] ) ) {
				redirect('user/sell/active');
			}else{
				$data['alert'] = alert( 'error' , 'Error' , 'Contrase&ntilde;a incorrecta' );
			}
		}

		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');
		$this->myview('user/sell/index',$data);
	}


	//
	// SELL ACTIVE
	//

	public function active() {
		$this->perm = 4;
		if ( !$this->verify( $this->screen , $this->perm ) )
			redirect('user/welcome');

		$this->sidebar = 0; // 0 - CLOSE | 1 - OPEN

		if ( $this->input->post() ) {

		}else{

			$this->load->model( 'ctrl_clientes_model' , 'clients' );
			$clients = $this->clients->getAllAsArray();
			$clientsToView = array('');
			foreach ($clients as $client) {
				$clientsToView[] = $client['txt_nombre'];
			}

		} // INPUT POST
		
		$this->load->model('cat_productos_model','products');
		$this->goBackUrl = "user/sell";
		$data['products'] = json_encode( $this->products->getAllProducts() ) ;
		$data['clients'] = $clientsToView;
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');
		$this->myview( 'user/sell/active' , $data );
	}





	public function query($query = ''){
		$this->perm = 4;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		if ( $query == '')
			return false;

		$this->setLayout('blank');

		$return = "";

		if ($query == ''){

			$return .= "<tr><td>Sin Resultado</td>";

		}else{

			$this->load->model('cat_productos_model','products');

			$products = $this->db->query("
				SELECT 
					*
				FROM
					cat_productos
				WHERE
					txt_codigoBarras = '{$query}'

				LIMIT 1");

			if ( count($products) > 0 ){

				foreach ($products as $row) {
					


				}
				
			}else{
				$result = 'Sin resultados';
			}

			echo json_encode( $data );

		}
		
	}

}