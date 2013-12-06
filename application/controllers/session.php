<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends MY_Controller{

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


		parent::__construct( FALSE ); 
	}


	public function index(){
		redirect("index");
	}


	//
	// LOGIN SESSION
	//

	public function login(){

		if( $this->session->userdata( 'user' ) ){

			// ASK IF WANT TO LOGOUT SHOWING USER INFO
			echo "Already logged in";
			// dump($this->session->all_userdata());
		}else{

			if ( $this->input->post() ) {

				$company = $this->input->post('company');
				$user = $this->input->post('user');
				$password = $this->input->post('password');

				$stm = "SELECT * FROM ctrl_personal WHERE txt_usuario = '{$user}' AND txt_password = md5('{$password}') LIMIT 1";
				$query = $this->db->query( $stm );

				$result = $query->result();

				// dump($query->result()[0]);

				if ( !empty( $result[0] ) ){

					if ( $result[0]->txt_usuario == $user ) {

						$this->session->set_userdata('user',$user);
						$this->session->set_userdata('userType',$result[0]->idTipoPersonal);
						$this->session->set_userdata('idPersonal',$result[0]->idPersonal);
						$stm = "SELECT
									tp.idRegistro, pant.idPantalla, pant.txt_pantalla, perm.idPermiso, perm.txt_permiso

								FROM
									cat_tipoPersonal_permisos as tp,
									cat_pantallas as pant,
									cat_permisos as perm

								WHERE
									tp.idPantalla = pant.idPantalla AND
									tp.idPermiso = perm.idPermiso AND
									tp.idTipoPersonal = {$result[0]->idTipoPersonal}
								;";

						$query = $this->db->query( $stm );

						$query = $query->result();

						// dump( $query->result() );

						if ( count( $query ) > 0 ) {

							$screens = array();

							$screen = array();

							$permission = array();

							foreach ( $query as $perm ){
								$screens[$perm->idPantalla][0] = $perm->txt_pantalla;
								$screens[$perm->idPantalla][$perm->idPermiso] = $perm->txt_permiso;
							}

							$this->session->set_userdata('permission',$screens);
							dump($this->session->all_userdata());

							redirect('user/welcome');

						}else{
							die( "error" );
						}

					}else{
						$data['alert'] = alert( 'error' , 'Error' , 'Datos incorrectos' );
						$this->myview( 'session/login' , $data );
					}
				}else{
					$data['alert'] = alert( 'error' , 'Error' , 'Datos incorrectos' );
					$this->myview( 'session/login' , $data );
				}

			}else{

				//
				// NO POST DATA
				//

				$this->title = "Login";
				// $this->footer = "footer";
				// $data['goBack'] = FALSE;
				$this->myview( 'session/login' );
			}
				
		}

	}


	//
	// LOGOUT SESSION
	//

	public function logout(){

		$this->session->sess_destroy();
		redirect('index');
	}

}

?>