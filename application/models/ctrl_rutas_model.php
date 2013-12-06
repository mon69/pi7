<?php
	class Ctrl_rutas_model extends MY_Model {

		function __construct()
		{
			parent::__construct();
			$this->tableName = "ctrl_rutas";
			$this->primaryKey = "idRuta";
		}
	}
?>