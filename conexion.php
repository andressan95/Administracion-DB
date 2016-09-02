<?php
	/*
		
		Database=db_administracion;
		Data Source=ca-cdbr-azure-central-a.cloudapp.net;
		User Id=be00176cf03501;
		Password=b129547f
		*/
	$mysqli=new mysqli("ca-cdbr-azure-central-a.cloudapp.net","be00176cf03501","b129547f","db_administracion"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>