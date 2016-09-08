<?php

	class Base{
		/*
		
		Database=db_administracion;
		Data Source=ca-cdbr-azure-central-a.cloudapp.net;
		User Id=be00176cf03501;
		Password=b129547f
		*/
	    public function conexion(){

	        $conexion = new mysqli('ca-cdbr-azure-central-a.cloudapp.net', 'be00176cf03501', 'b129547f', 'db_administracion');
	        $conexion->query("SET NAMES 'utf8'");
	        return $conexion;

	    }

	}

?>
