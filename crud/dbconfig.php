<?php


	/*
		
		Database=db_administracion;
		Data Source=ca-cdbr-azure-central-a.cloudapp.net;
		User Id=be00176cf03501;
		Password=b129547f
		*/
error_reporting(0);
$host = "ca-cdbr-azure-central-a.cloudapp.net";
$user = "be00176cf03501";
$password = "b129547f";
$datbase = "db_administracion";
mysql_connect($host,$user,$password);
mysql_select_db($datbase);
?>