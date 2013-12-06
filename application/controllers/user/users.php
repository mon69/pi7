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

		public function newUser(){
			$this->perm = 1;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		$this->goBackUrl = "user/users";
		$this->sidebar = 0;

		$this->title = 'Usuario nuevo';

		if ( $this->input->post() ){
			$this->load->model('ctrl_usuarios_model','user');
			$this->user['txt_usuario'] = $this->input->post('txt_usuario');
			$this->user['txt_nombre'] = $this->input->post('txt_nombre');
			$this->user['txt_password'] = $this->input->post('txt_password');
			$this->user['txt_telefono'] = $this->input->post('txt_telefono');
			$this->user['txt_correo'] = $this->input->post('txt_correo');
			$this->user['lat'] = $this->input->post('lat');
			$this->user['lng'] = $this->input->post('lng');
			
			//dump($this->user);
			//die();
			//$this->client['idTipoPersonal'] = $this->input->post('idTipoPersonal');
			if ($this->user->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}
		}
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/users/new',$data);
		}

		public function lists(){
		$this->perm = 3;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');
		
		$this->goBackUrl = "user/users";
		$this->sidebar = 0;

		$this->title = 'Listado de usuarios';

		$this->load->model('ctrl_usuarios_model','users');

		$data['users'] = $this->users->getAll();
					
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/users/list',$data);

		}

		public function editUser($id = null){		
		if ($id == null)
			redirect("user/users/");

		$this->perm = 4;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		$this->goBackUrl = "user/users";
		$this->sidebar = 0;

		$this->title = 'Usuario editar';

		$this->load->model('ctrl_usuarios_model','user');

		if ( $this->input->post() ){
			$user = new ctrl_usuarios_model();
			$user['idPersonal'] = $id;
			$user['txt_usuario'] = $this->input->post('txt_usuario');
			$user['txt_nombre'] = $this->input->post('txt_nombre');
			$user['txt_password'] = $this->input->post('txt_password');
			$user['txt_telefono'] = $this->input->post('txt_telefono');
			$user['txt_correo'] = $this->input->post('txt_correo');
			$user['lat'] = $this->input->post('lat');
			$user['lng'] = $this->input->post('lng');

			if ($user->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}

		}

		$data['user'] = $this->user->getById($id);
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');		

		$this->myview('user/users/edit',$data);
		}

		public function deleteUser($id = null){
		if ($id == null)
			redirect("user/users/");

		$this->perm = 4;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		// $this->goBackUrl = "user/clients";
		// $this->sidebar = 0;

		// $this->title = 'Cliente eliminar';

		$this->load->model('ctrl_usuarios_model','user');

		$this->user['idPersonal'] = $id;

		if ($this->user->delete()){
			$data['alert'] = alert('success','Bien','Borrado con exito');
		}else{				
			$data['alert'] = alert('error','Error','No se pudo eliminar, avise al administrador');
		}

		$data['screen'] = 1;
		$data['perm'] = 0;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/users/index',$data);
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

			$users = $this->db->query("SELECT idPersonal as id, txt_usuario as usuario, txt_nombre as nombre, txt_telefono as telefono, txt_correo as correo FROM ctrl_usuarios WHERE txt_nombre LIKE '%".$query."%' ");
			if ( $users->num_rows() >0 ){
				foreach ($users->result() as $row) {
					$return .= "<tr>
									<td>{$row->id}</td>
									<td>{$row->usuario}</td>
									<td>{$row->nombre}</td>
									<td>{$row->telefono}</td>
									<td>{$row->correo}</td>
									<td>
										<button type = 'button' class = 'btn btn-primary' " . clickHref('user/users/map/'.$row->id) . ">
											<i class = 'icon-map-marker icon-white'></i> Ver mapa
										</button>
									</td>";

					if ( $this->verify( $this->screen , 4 ) )
						$return .= "<td>
										<button type = 'button' class = 'btn btn-warning' " . clickHref('user/users/editUser/'.$row->id) . ">
											<i class = 'icon-map-marker icon-white'></i> Editar
										</button>
									</td>";

					if ( $this->verify( $this->screen , 2 ) )
						$return .= "<td>
										<button type = 'button' class = 'btn btn-danger' " . clickHref('user/users/deleteUser/'.$row->id) . ">
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