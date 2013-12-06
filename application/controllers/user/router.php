<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Router extends MY_Controller{

		public function __construct() { 
			parent::__construct( TRUE ); 
		}

		public function go($route = null){
			if ( $route == null ){
				redirect('user/welcome');
			}else{
				switch ($route) {

					case 'Clientes':
						redirect('user/clients');
						break;

					case 'Inventario':
						redirect('user/inventory');
						break;

					case 'Venta':
						redirect('user/sell');
						break;

					case 'Rutas':
						redirect('user/routes');
						break;

					case 'Reportes':
						redirect('user/reports');
						break;

					case 'Permisos':
						redirect('user/permissions');
						break;

					case 'Usuarios':
						redirect('user/users');
						break;
					
					default:
						redirect('user/welcome');
						break;
				}
			}
		}
	}

?>