<?php
include('conexion.php');
$usu = addslashes($_POST['usu']);
$pass = addslashes($_POST['pass']);
$area = addslashes($_POST['area']);

$usuario = mysql_query("SELECT * FROM usuarios WHERE id_usu = '$usu'");
if(mysql_num_rows($usuario)<1){
	echo 'usuario';
}else{
	$area = mysql_query("SELECT * FROM usuarios WHERE id_usu = '$usu' AND id_area = '$area'");
	if(mysql_num_rows($area)<1){
		echo 'area';
	}else{
		$consulta = mysql_query("SELECT * FROM usuarios WHERE id_usu = '$usu' AND pass_usu = '$pass'");
		if(mysql_num_rows($consulta)<1){
			echo 'password';
		}else{
			$consulta2 = mysql_fetch_array($consulta);
			$_SESSION['id_usu'] = $consulta2['id_usu'];
			$_SESSION['id_area'] = $consulta2['id_area'];
			switch($consulta2['id_area']){
				case 'ventas':
					echo 'ventas';
				break;
				case 'almacen':
					echo 'almacen';
				break;
			}
		}
	}
}
?>
