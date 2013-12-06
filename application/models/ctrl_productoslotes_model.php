<?php
	class Ctrl_productoslotes_model extends MY_Model {

		function __construct()
		{
			parent::__construct();
			$this->tableName = "ctrl_productoslotes";
			$this->primaryKey = "idLote";
		}
	}
?>