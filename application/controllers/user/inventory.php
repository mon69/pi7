<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends MY_Controller{

	private $screen = 2;
	private $perm = 0;
	public $title = 'Inventario';

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

		$this->myview('user/inventory/index',$data);
	}

	public function lists(){
		$this->perm = 3;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');
		
		$this->goBackUrl = "user/inventory";
		$this->sidebar = 0;

		$this->title = 'Listado de productos';

		$this->load->model('cat_productos_model','products');

		$data['products'] = $this->products->getAllProducts();
					
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/inventory/list',$data);		

	}


	public function newProduct(){
		$this->perm = 1;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		$this->goBackUrl = "user/inventory/lists";
		$this->sidebar = 0;

		$this->title = 'Producto nuevo';

		if ( $this->input->post() ){
			$this->load->model('cat_productos_model','product');
			$this->product['txt_nombre'] = $this->input->post('txt_nombre');
			$this->product['txt_marca'] = $this->input->post('txt_marca');
			$this->product['txt_contenido'] = $this->input->post('txt_contenido');
			if ($this->product->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}
		}
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/inventory/new',$data);
	}


	public function editProduct($id = null){
		if ($id == null)
			redirect("user/inventory/");

		$this->perm = 4;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		$this->goBackUrl = "user/inventory/lists";
		$this->sidebar = 0;

		$this->title = 'Producto editar';

		$this->load->model('cat_productos_model','product');

		if ( $this->input->post() ){
			$product = new cat_productos_model();
			$product['idProducto'] = $id;
			$product['txt_nombre'] = $this->input->post('txt_nombre');
			$product['txt_marca'] = $this->input->post('txt_marca');
			$product['txt_contenido'] = $this->input->post('txt_contenido');

			if ($product->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}
		}
		$data['product'] = $this->product->getById($id);
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');
		$this->myview('user/inventory/edit',$data);
	}



	public function deleteProduct($id = null){
		if ($id == null)
			redirect("user/inventory/");

		$this->perm = 2;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		// $this->goBackUrl = "user/clients";
		// $this->sidebar = 0;

		// $this->title = 'Cliente eliminar';

		$this->load->model('cat_productos_model','product');

		$this->product['idProducto'] = $id;

		if ($this->product->delete()){
			$data['alert'] = alert('success','Bien','Borrado con exito');
		}else{				
			$data['alert'] = alert('error','Error','No se pudo eliminar, avise al administrador');
		}

		$data['screen'] = 1;
		$data['perm'] = 0;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/inventory/index',$data);
	}





	public function lotes($id = null){
		if ($id == null)
			redirect("user/inventory/");

		$this->perm = 3;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');
		
		$this->goBackUrl = "user/inventory/lists";
		$this->sidebar = 0;

		$this->title = 'Listado de lotes';
		
		$query = $this->db->query("
			SELECT 
				l.idLote,
				p.txt_marca,
				p.txt_nombre,
				p.txt_contenido,
				l.fec_caducidad,
				l.num_cantidad

			FROM
				cat_productos as p,
				ctrl_productoslotes as l

			WHERE
				p.idProducto = {$id} AND
				p.idProducto = l.idProducto
			");

		$data['lotes'] = $query->result();
		$data['id'] = $id;
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/inventory/lotes/list',$data);		


	}



	public function lotesNew($id = null){
		if ($id == null)
			redirect("user/inventory/");

		$this->perm = 1;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');
		
		$this->goBackUrl = "user/inventory/lotes/".$id;
		$this->sidebar = 0;

		$this->title = 'Nuevo lote';

		$query = $this->db->query("
			SELECT 
				p.txt_nombre,
				p.txt_marca
				
			FROM
				cat_productos as p
				
			WHERE
				p.idProducto = {$id}
			");

		$result = $query->result();
		$data['lote'] = $result[0];

		if ( $this->input->post() ){
			$this->load->model('ctrl_productoslotes_model','product');
			$this->product['idProducto'] = $id;
			$this->product['fec_caducidad'] = $this->input->post('fec_caducidad');
			$this->product['num_cantidad'] = $this->input->post('num_cantidad');

			if ($this->product->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}
		}

		$data['id'] = $id;
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/inventory/lotes/lotesNew',$data);
	}


	public function lotesEdit($id = null){
		if ($id == null)
			redirect("user/inventory/");

		$this->perm = 3;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');
		
		$this->sidebar = 0;

		$this->title = 'Editar lote';

		$query = $this->db->query("
			SELECT
				cp.txt_nombre,
				cp.txt_marca,
				cpl.fec_caducidad,
				cpl.num_cantidad,
				cpl.idProducto

			FROM
				cat_productos as cp,
				ctrl_productoslotes as cpl

			WHERE
				cp.idProducto = cpl.idProducto AND
				cpl.idLote = {$id}
			");

		$result = $query->result();
		$data['lote'] = $result[0];

		$this->goBackUrl = "user/inventory/lotes/".$result[0]->idProducto;

		if ( $this->input->post() ){
			$this->load->model('ctrl_productoslotes_model','product');
			$this->product['idLote'] = $id;
			$this->product['fec_caducidad'] = $this->input->post('fec_caducidad');
			$this->product['num_cantidad'] = $this->input->post('num_cantidad');

			if ($this->product->save()){
				$data['alert'] = alert('success','Bien','Guardado con exito');
			}else{				
				$data['alert'] = alert('error','Error','No se pudo guardar, avise al administrador');
			}
		}

		$data['id'] = $id;
		$data['screen'] = $this->screen;
		$data['perm'] = $this->perm;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/inventory/lotes/lotesEdit',$data);
	}




	public function lotesDelete($id = null){
		if ($id == null)
			redirect("user/inventory/");

		$this->perm = 2;

		if ( !$this->verify( $this->screen , $this->perm) )
			redirect('user/welcome');

		// $this->goBackUrl = "user/clients";
		// $this->sidebar = 0;

		// $this->title = 'Cliente eliminar';

		$this->load->model('ctrl_productoslotes_model','product');

		$this->product['idLote'] = $id;

		if ($this->product->delete()){
			$data['alert'] = alert('success','Bien','Borrado con exito');
		}else{				
			$data['alert'] = alert('error','Error','No se pudo eliminar, avise al administrador');
		}

		$data['screen'] = 1;
		$data['perm'] = 0;
		$data['permissions'] = $this->session->userdata('permission');

		$this->myview('user/inventory/index',$data);
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

			$this->load->model('cat_productos_model','products');

			// $clients = $this->db->query("SELECT idCliente as id, txt_nombre as nombre FROM ctrl_clientes WHERE txt_nombre LIKE '%".$query."%' ");
			$products = $this->products->getAllProductsLike($query);

			if ( count($products) > 0 ){

				foreach ($products as $row) {
					$return .= "<tr>
									<td>{$row->id}</td>
									<td>{$row->marca}</td>
									<td>{$row->nombre}</td>
									<td>{$row->contenido}</td>
									<td>{$row->total}</td>
								";

					if ( $this->verify( $this->screen , 4 ) )
						$return .= "<td>
										<button type = 'button' class = 'btn btn-warning' " . clickHref('user/inventory/editProduct/'.$row->id) . ">
											<i class = 'icon-map-marker icon-white'></i> Editar
										</button>
									</td>";

					if ( $this->verify( $this->screen , 2 ) )
						$return .= "<td>
										<button type = 'button' class = 'btn btn-danger' " . clickHref('user/inventory/deleteProduct/'.$row->id) . ">
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