<?php
/*
		
		Database=db_administracion;
		Data Source=ca-cdbr-azure-central-a.cloudapp.net;
		User Id=be00176cf03501;
		Password=b129547f
		*/

		$mysqli = new MySQLi("ca-cdbr-azure-central-a.cloudapp.net", "be00176cf03501","b129547f", "db_administracion");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else
			//echo "Conexión exitossa!";

//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}
?>