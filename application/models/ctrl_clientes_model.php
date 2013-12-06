<?php
	class Ctrl_clientes_model extends MY_Model {

		function __construct()
		{
			parent::__construct();
			$this->tableName = "ctrl_clientes";
			$this->primaryKey = "idCliente";
		}
	}
?>