<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends MY_Controller{

	public $screen = 1;
	public $perm = 0;
	public $title = 'Clientes';		

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

	public function index(){
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/clients/index',$data);
	}

	public function lists(){
		$this->perm = 3;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');
		
		$this->goBackUrl = "user/clients";
		$this->sidebar = 0;

		$this->title = 'Listado de clientes';

		$this->load->model('ctrl_clientes_model','clients');

		$data['clients'] = $this->clients->getAll();
					
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/clients/list',$data);

	}

	public function newClient(){
		$this->perm = 1;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		$this->goBackUrl = "user/clients";
		$this->sidebar = 0;

		$this->title = 'Cliente nuevo';

		if ( $this->input->post() ){
			$this->load->model('ctrl_clientes_model','client');
			$this->client['txt_nombre'] = $this->input->post('txt_nombre');
			$this->client['txt_telefono'] = $this->input->post('txt_telefono');
			$this->client['txt_correo'] = $this->input->post('txt_correo');
			$this->client['lat'] = $this->input->post('lat');
			$this->client['lng'] = $this->input->post('lng');
			if ($this->client->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}
		}
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/clients/new',$data);
	}



	public function editClient($id = null){		
		if ($id == null)
			redirect("user/clients/");

		$this->perm = 4;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		$this->goBackUrl = "user/clients";
		$this->sidebar = 0;

		$this->title = 'Cliente editar';

		$this->load->model('ctrl_clientes_model','client');

		if ( $this->input->post() ){
			$client = new ctrl_clientes_model();
			$client['idCliente'] = $id;
			$client['txt_nombre'] = $this->input->post('txt_nombre');
			$client['txt_telefono'] = $this->input->post('txt_telefono');
			$client['txt_correo'] = $this->input->post('txt_correo');
			$client['lat'] = $this->input->post('lat');
			$client['lng'] = $this->input->post('lng');

			if ($client->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}

		}

		$data['client'] = $this->client->getById($id);
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');		

		$this->myview('user/clients/edit',$data);
	}

	public function deleteClient($id = null){
		if ($id == null)
			redirect("user/clients/");

		$this->perm = 4;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		// $this->goBackUrl = "user/clients";
		// $this->sidebar = 0;

		// $this->title = 'Cliente eliminar';

		$this->load->model('ctrl_clientes_model','client');

		$this->client['idCliente'] = $id;

		if ($this->client->delete()){
			$data['alert'] = alert('success','Bien','Borrado con exito');
		}else{				
			$data['alert'] = alert('error','Error','No se pudo eliminar, avise al administrador');
		}

		$data['screen'] = 1;
		$data['perm'] = 0;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/clients/index',$data);
	}

	public function query($query = ''){
		$this->perm = 3;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		$this->setLayout('blank');

		$return = "";

		if ($query == ''){

			$return .= "<tr><td>Sin Resultado</td>";

		}else{

			$clients = $this->db->query("SELECT idCliente as id, txt_nombre as nombre, txt_telefono as telefono, txt_correo as correo FROM ctrl_clientes WHERE txt_nombre LIKE '%".$query."%' ");
			if ( $clients->num_rows() >0 ){
				foreach ($clients->result() as $row) {
					$return .= "<tr>
									<td>{$row->id}</td>
									<td>{$row->nombre}</td>
									<td>{$row->telefono}</td>
									<td>{$row->correo}</td>
									<td>
										<button type = 'button' class = 'btn btn-primary' " . clickHref('user/clients/map/'.$row->id) . ">
											<i class = 'icon-map-marker icon-white'></i> Ver mapa
										</button>
									</td>";

					if ( $this->verify( $this->screen , 4 ) )
						$return .= "<td>
										<button type = 'button' class = 'btn btn-warning' " . clickHref('user/clients/editClient/'.$row->id) . ">
											<i class = 'icon-map-marker icon-white'></i> Editar
										</button>
									</td>";

					if ( $this->verify( $this->screen , 2 ) )
						$return .= "<td>
										<button type = 'button' class = 'btn btn-danger' " . clickHref('user/clients/deleteClient/'.$row->id) . ">
											<i class = 'icon-map-marker icon-white'></i> Eliminar
										</button>
									</td>";
				}
				
			}else{
				$return .= "<tr><td colspan= '4'>Sin Resultado</td>";
			}

			echo $return;

		}
		
	}

}

?>