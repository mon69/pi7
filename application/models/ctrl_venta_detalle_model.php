<?php
	class Ctrl_venta_detalle_model extends MY_Model {

		function __construct()
		{
			parent::__construct();
			$this->tableName = "ctrl_venta_detalle";
			$this->primaryKey = "idVentaDetalle";
		}
	}
?>