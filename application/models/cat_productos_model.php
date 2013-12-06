<?php
	class Cat_productos_model extends MY_Model {

		function __construct()
		{
			parent::__construct();
			$this->tableName = "cat_productos";
			$this->primaryKey = "idProducto";
		}


		//
		// GET ALL PRODUCTS WITH TOTAL
		//

		public function getAllProducts(){
			$query = $this->db->query("
				SELECT
					p.idProducto,
					p.txt_nombre as nombre,
					p.txt_categoria as categoria,
					p.txt_marca as marca,
					p.txt_contenido as contenido,
					p.txt_precio as precio,
					p.txt_codigoBarras as codigo,
					SUM(pl.num_cantidad) as total

				FROM 
					cat_productos as p

				LEFT JOIN ctrl_productoslotes as pl
					ON pl.idProducto = p.idProducto

				GROUP BY
					p.txt_nombre
				");

			return $query->result();
		}


		//
		// GET PRODUCTS WITH TOTAL USING LIKE
		//

		public function getAllProductsLike($like){
			$query = $this->db->query("
				SELECT
					p.idProducto as id,
					p.txt_nombre as nombre,
					p.txt_categoria as categoria,
					p.txt_marca as marca,
					p.txt_contenido as contenido,
					p.txt_precio as precio,
					SUM(pl.num_cantidad) as total

				FROM 
					cat_productos as p

				LEFT JOIN ctrl_productoslotes as pl
					ON pl.idProducto = p.idProducto

				WHERE
					p.txt_nombre LIKE '%{$like}%' OR
					p.txt_marca LIKE '%{$like}%' OR
					p.txt_contenido LIKE '%{$like}%'

				GROUP BY
					p.txt_nombre
				");

			return $query->result();
		}

	}
?>