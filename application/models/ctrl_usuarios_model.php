<?php
	class Ctrl_usuarios_model extends MY_Model {

		function __construct()
		{
			parent::__construct();
			$this->tableName = "ctrl_personal";
			$this->primaryKey = "idPersonal";
		}
	}
?>