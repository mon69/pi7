<?php
	class Ctrl_venta_model extends MY_Model {

		function __construct()
		{
			parent::__construct();
			$this->tableName = "ctrl_venta";
			$this->primaryKey = "idVenta";
		}


		public function getVenta($client = null)
		{
			if ($client == null) return false;

			$idPersonal = $this->session->userdata("idPersonal");
			
			$sql = "SELECT
						cv.idVenta as id,
						cp.txt_nombre as producto,
						cp.txt_marca as marca,
						cp.txt_contenido as contenido,
						sum(cvd.cantidad) as cantidad,
						cp.txt_precio as precio

					FROM
						ctrl_venta as cv,
						ctrl_venta_detalle as cvd,
						cat_productos as cp,
						ctrl_clientes as cc

					where
						cv.id_personal = {$idPersonal} and
						cv.id_cliente = cc.idCliente and
						cc.txt_nombre = '{$client}' and
						cv.idVenta = cvd.idVenta and
						cvd.idProducto = cp.idProducto and 
						cv.pagado = 0

					GROUP BY cp.txt_nombre;";

			$query = $this->db->query($sql);

			return $query->result();
		}

		public function addProduct($product = null , $client = null )
		{
			if ($product == null || $client == null) return false;
			
			$idPersonal = $this->session->userdata("idPersonal");

			$sql = "SELECT cv.*
					FROM 
						ctrl_venta as cv,
						ctrl_clientes as cc

					WHERE
						id_personal = {$idPersonal} and
						cv.id_cliente = cc.idCliente AND
						cc.txt_nombre = '{$client}' and
						pagado = 0 LIMIT 1;";

			$query = $this->db->query($sql);
			$query = $query->result();

			$idVenta = $query[0]->idVenta;
			$id_cliente = $query[0]->id_cliente;

			// dump($query);
			// die();

			if ( count($query) < 0 ){
				$sql = "INSERT INTO ctrl_venta (id_personal,id_cliente,pagado) values ({$idPersonal},{$id_cliente},0)";
				$this->db->query($sql);
			}

			$sql = "INSERT INTO ctrl_venta_detalle (idVenta,idProducto,cantidad) values({$idVenta},{$product},1)";
			$this->db->query($sql);
		}
	}
?>